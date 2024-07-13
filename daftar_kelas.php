<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM daftar_kelas");
$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2 mb-3">
    <div class="card">
        <div class="card-header">
            Daftar Kelas
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title justify-content-right"> Semester 1</h5>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTambahKelas"> Tambah
                        Kelas</button>
                </div>
            </div>
            <!-- Modal tambah kelas -->
            <div class="modal fade" id="ModalTambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kelas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate
                            action="proses/proses_input_kelas.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="ID"
                                        name="noid" required>
                                    <label for="floatingInput">No ID</label>
                                    <div class="invalid-feedback">
                                        Masukkan No ID
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="select" required>
                                        <option selected hidden value="-">Open this class menu</option>
                                        <option value="1-A (L)">1-A (L)</option>
                                        <option value="1-A (P)">1-A (P)</option>
                                        <option value="1-B (L)">1-B (L)</option>
                                        <option value="1-B (P)">1-B (P)</option>
                                        <option value="1-C (L)">1-C (L)</option>
                                        <option value="1-C (P)">1-C (P)</option>
                                    </select>
                                    <label for="floatingInput">Class</label>
                                    <div class="invalid-feedback">
                                        Masukkan Kelas
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Jumlah Santri" name="jumlahsantri" required>
                                    <label for="floatingInput">Jumlah Santri</label>
                                    <div class="invalid-feedback">
                                        Masukkan Jumlah Santri
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_user_validate"
                                        value="12345">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal tambah kelas -->

            <!-- Modal view -->
            <div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Kelas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="viewKelas"></p>
                            <p id="viewJumlahSantri"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="#" id="downloadLink" class="btn btn-success">Download Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal view -->

            <?php
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jumlah Santri</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id_kelas'] ?></td>
                                    <td><?php echo $row['kelas'] ?></td>
                                    <td><?php echo $row['jumlah_santri'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info me-2"><i class="bi bi-pen"></i></button>
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalView"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-danger me-2"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
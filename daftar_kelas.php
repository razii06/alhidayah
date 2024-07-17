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
                <h5 class="card-title justify-content-right">Semester 1</h5>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTambahKelas">Tambah
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
                            <form class="needs-validation" novalidate action="proses/proses_input_kelas.php"
                                method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="ID"
                                        name="noid" required>
                                    <label for="floatingInput">No ID</label>
                                    <div class="invalid-feedback">
                                        Masukkan No ID
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="select"
                                        required>
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

            <?php if (empty($result)): ?>
                <p>Data user tidak ada</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $row['id_kelas'] ?></td>
                                    <td><?php echo $row['kelas'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info me-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['id_kelas'] ?>"><i
                                                class="bi bi-pen"></i></button>
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#ModalView"
                                            onclick="viewKelas('<?php echo $row['id_kelas'] ?>', '<?php echo $row['kelas'] ?>', '<?php echo $row['jumlah_santri'] ?>')"><i
                                                class="bi bi-eye"></i></button>
                                        <button class="btn btn-danger me-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id_kelas'] ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Modal edit -->
                                <div class="modal fade" id="ModalEdit<?php echo $row['id_kelas'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate
                                                    action="proses/proses_edit_daftarkelas.php" method="POST">
                                                    <input type="hidden" name="id_kelas" value="<?php echo $row['id_kelas'] ?>">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Kelas" name="kelas" value="<?php echo $row['kelas'] ?>"
                                                            required>
                                                        <label for="floatingInput">Kelas</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Kelas
                                                        </div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Jumlah Santri" name="jumlah_santri"
                                                            value="<?php echo $row['jumlah_santri'] ?>" required>
                                                        <label for="floatingInput">Jumlah Santri</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Jumlah Santri
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="edit_kelas_validate"
                                                            value="12345">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modal edit -->

                                <!-- Modal delete -->
                                <div class="modal fade" id="ModalDelete<?php echo $row['id_kelas'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin ingin menghapus data kelas ini?</div>
                                            <div class="modal-footer">
                                                <form action="proses/proses_delete_daftarkelas.php" method="POST">
                                                    <input type="hidden" name="id_kelas" value="<?php echo $row['id_kelas'] ?>">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger" name="delete_kelas_validate"
                                                        value="12345">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modal delete -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal view -->
<div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="viewIdKelas"></p>
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

<script>
    function viewKelas(id_kelas, kelas, jumlah_santri) {
        document.getElementById('viewIdKelas').innerText = "ID Kelas: " + id_kelas;
        document.getElementById('viewKelas').innerText = "Kelas: " + kelas;
        document.getElementById('viewJumlahSantri').innerText = "Jumlah Santri: " + jumlah_santri;
    }

    function deleteKelas(id_kelas) {
        if (confirm('Apakah Anda yakin ingin menghapus kelas ini?')) {
            window.location.href = 'proses/proses_delete_daftarkelas.php?id_kelas=' + id_kelas;
        }
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
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
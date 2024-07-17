<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT nis, kelas, tahfidz, kitab, uas, (tahfidz + kitab + uas) / 3 as rata_rata FROM daftar_nilai");
$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2 mb-3">
    <div class="card">
        <div class="card-header">Daftar Nilai Santri Al-Hidayah</div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title justify-content-right">Semester 1</h5>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTambahNilai">Tambah
                        Nilai</button>
                </div>
            </div>

            <!-- Modal tambah nilai -->
            <div class="modal fade" id="ModalTambahNilai" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Nilai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_nilai.php"
                                method="POST" id="tambahNilaiForm">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputNIS" placeholder="NIS"
                                        name="nis" required>
                                    <label for="floatingInputNIS">NIS</label>
                                    <div class="invalid-feedback">Masukkan Nomor Induk Santri</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="kelas"
                                        required>
                                        <option selected hidden value="-">Menu Kelas</option>
                                        <option value="1-A (L)">1-A (L)</option>
                                        <option value="1-A (P)">1-A (P)</option>
                                        <option value="1-B (L)">1-B (L)</option>
                                        <option value="1-B (P)">1-B (P)</option>
                                        <option value="1-C (L)">1-C (L)</option>
                                        <option value="1-C (P)">1-C (P)</option>
                                    </select>
                                    <label for="floatingInput">Kelas</label>
                                    <div class="invalid-feedback">Masukkan Kelas</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInputTahfidz"
                                        placeholder="Tahfidz" name="tahfidz" required>
                                    <label for="floatingInputTahfidz">Tahfidz</label>
                                    <div class="invalid-feedback">Masukkan Nilai Tahfidz</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInputKitab"
                                        placeholder="Kitab" name="kitab" required>
                                    <label for="floatingInputKitab">Kitab</label>
                                    <div class="invalid-feedback">Masukkan Nilai Kitab</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInputUAS" placeholder="UAS"
                                        name="uas" required>
                                    <label for="floatingInputUAS">UAS</label>
                                    <div class="invalid-feedback">Masukkan Nilai UAS</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="input_nilai_validate"
                                        value="12345">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal tambah nilai -->

            <?php foreach ($result as $row): ?>
                <!-- Modal view -->
                <div class="modal fade" id="ModalView<?php echo $row['nis'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Nilai Santri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputNIS" placeholder="NIS"
                                        name="nis" value="<?php echo $row['nis'] ?>">
                                    <label for="floatingInputNIS">NIS</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputKelas"
                                        placeholder="Kelas" name="kelas" value="<?php echo $row['kelas'] ?>">
                                    <label for="floatingInputKelas">Kelas</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="number" class="form-control" id="floatingInputTahfidz"
                                        placeholder="Tahfidz" name="tahfidz" value="<?php echo $row['tahfidz'] ?>">
                                    <label for="floatingInputTahfidz">Tahfidz</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="number" class="form-control" id="floatingInputKitab"
                                        placeholder="Kitab" name="kitab" value="<?php echo $row['kitab'] ?>">
                                    <label for="floatingInputKitab">Kitab</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="number" class="form-control" id="floatingInputUAS"
                                        placeholder="UAS" name="uas" value="<?php echo $row['uas'] ?>">
                                    <label for="floatingInputUAS">UAS</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="number" class="form-control" id="floatingInputRataRata"
                                        placeholder="Rata-rata" name="rata_rata" value="<?php echo $row['rata_rata'] ?>">
                                    <label for="floatingInputRataRata">Rata-rata</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal view -->

                <!-- Modal edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['nis'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Nilai Santri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_nilai.php"
                                    method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="nis" value="<?php echo $row['nis'] ?>">
                                        <input type="number" class="form-control" id="floatingInputTahfidz"
                                            placeholder="Tahfidz" name="tahfidz" required
                                            value="<?php echo $row['tahfidz'] ?>">
                                        <label for="floatingInputTahfidz">Tahfidz</label>
                                        <div class="invalid-feedback">Masukkan Nilai Tahfidz</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInputKitab"
                                            placeholder="Kitab" name="kitab" required value="<?php echo $row['kitab'] ?>">
                                        <label for="floatingInputKitab">Kitab</label>
                                        <div class="invalid-feedback">Masukkan Nilai Kitab</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInputUAS" placeholder="UAS"
                                            name="uas" required value="<?php echo $row['uas'] ?>">
                                        <label for="floatingInputUAS">UAS</label>
                                        <div class="invalid-feedback">Masukkan Nilai UAS</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="edit_nilai_validate"
                                            value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal edit -->

                <!-- Modal delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['nis'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Nilai</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Apakah Anda yakin ingin menghapus data nilai santri ini?</div>
                            <div class="modal-footer">
                                <form action="proses/proses_delete_nilai.php" method="POST">
                                    <input type="hidden" name="nis" value="<?php echo $row['nis'] ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="delete_nilai_validate"
                                        value="12345">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal delete -->
            <?php endforeach; ?>

            <div class="table-responsive mt-2">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Tahfidz</th>
                            <th>Kitab</th>
                            <th>UAS</th>
                            <th>Rata-rata</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($result)): ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data!</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1;
                            foreach ($result as $row): ?>
                                <tr class="text-center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nis'] ?></td>
                                    <td><?php echo $row['kelas'] ?></td>
                                    <td><?php echo $row['tahfidz'] ?></td>
                                    <td><?php echo $row['kitab'] ?></td>
                                    <td><?php echo $row['uas'] ?></td>
                                    <td><?php echo $row['rata_rata'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ModalView<?php echo $row['nis'] ?>"><i
                                                class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['nis'] ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['nis'] ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    // Contoh JavaScript untuk menonaktifkan pengiriman form jika ada field yang tidak valid
    (() => {
        'use strict';

        // Ambil semua form yang ingin kita terapkan gaya validasi Bootstrap kustom
        const forms = document.querySelectorAll('.needs-validation');

        // Loop melalui setiap form dan mencegah pengiriman jika tidak valid
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();

    // JavaScript untuk mereset form ketika modal ditampilkan
    document.addEventListener('DOMContentLoaded', function () {
        var modalTambahNilai = document.getElementById('ModalTambahNilai');
        modalTambahNilai.addEventListener('show.bs.modal', function (event) {
            var formTambahNilai = document.getElementById('tambahNilaiForm');
            formTambahNilai.reset();
            formTambahNilai.classList.remove('was-validated');
        });
    });
</script>
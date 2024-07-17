<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM jadwal_akademik");
$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2 mb-3">
    <div class="card">
        <div class="card-header">Jadwal Akademik Al-Hidayah</div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title justify-content-right">Semester 1</h5>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTambahJadwal">Tambah
                        Jadwal</button>
                </div>
            </div>

            <!-- Modal tambah jadwal -->
            <div class="modal fade" id="ModalTambahJadwal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Jadwal Akademik</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_jadwal.php"
                                method="POST" id="tambahJadwalForm">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputIdKelas"
                                        placeholder="ID Kelas" name="id_kelas" required>
                                    <label for="floatingInputIdKelas">ID Kelas</label>
                                    <div class="invalid-feedback">Masukkan ID Kelas</div>
                                </div>
                                <select class="form-select" aria-label="Default select example" name="kelas" required>
                                    <option value="1-A (L)">1-A (L)</option>
                                    <option value="1-A (P)">1-A (P)</option>
                                    <option value="1-B (L)">1-B (L)</option>
                                    <option value="1-B (P)">1-B (P)</option>
                                    <option value="1-C (L)">1-C (L)</option>
                                    <option value="1-C (P)">1-C (P)</option>
                                </select>
                                <label for="floatingInputKelas">Kelas</label>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputMapel"
                                        placeholder="Mata Pelajaran" name="mapel" required>
                                    <label for="floatingInputMapel">Mata Pelajaran</label>
                                    <div class="invalid-feedback">Masukkan Mata Pelajaran</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="hari"
                                        required>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <label for="floatingInputHari">Hari</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="floatingInputWaktu" placeholder="Waktu"
                                        name="waktu" required>
                                    <label for="floatingInputWaktu">Waktu</label>
                                    <div class="invalid-feedback">Masukkan Waktu</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success"
                                        name="input_jadwal_validate">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal tambah jadwal -->

            <div class="table-responsive mt-2">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>ID Kelas</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($result)): ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data!</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach ($result as $row): ?>
                                <tr class="text-center">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['id_kelas']; ?></td>
                                    <td><?php echo $row['kelas']; ?></td>
                                    <td><?php echo $row['mapel']; ?></td>
                                    <td><?php echo $row['hari']; ?></td>
                                    <td><?php echo $row['waktu']; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['id_kelas']; ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id_kelas']; ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="ModalEdit<?php echo $row['id_kelas']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Jadwal Akademik</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_edit_jadwal.php"
                                                    method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $row['id_kelas']; ?>">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="kelas" required>
                                                            <option value="1-A (L)" <?php if ($row['kelas'] == '1-A (L)')
                                                                echo 'selected'; ?>>1-A (L)</option>
                                                            <option value="1-A (P)" <?php if ($row['kelas'] == '1-A (P)')
                                                                echo 'selected'; ?>>1-A (P)</option>
                                                            <option value="1-B (L)" <?php if ($row['kelas'] == '1-B (L)')
                                                                echo 'selected'; ?>>1-B (L)</option>
                                                            <option value="1-B (P)" <?php if ($row['kelas'] == '1-B (P)')
                                                                echo 'selected'; ?>>1-B (P)</option>
                                                            <option value="1-C (L)" <?php if ($row['kelas'] == '1-C (L)')
                                                                echo 'selected'; ?>>1-C (L)</option>
                                                            <option value="1-C (P)" <?php if ($row['kelas'] == '1-C (P)')
                                                                echo 'selected'; ?>>1-C (P)</option>
                                                        </select>
                                                        <label for="floatingInputKelas">Kelas</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInputMapel"
                                                            placeholder="Mata Pelajaran" name="mapel" required
                                                            value="<?php echo $row['mapel']; ?>">
                                                        <label for="floatingInputMapel">Mata Pelajaran</label>
                                                        <div class="invalid-feedback">Masukkan Mata Pelajaran</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="hari" required>
                                                            <option value="Senin" <?php if ($row['hari'] == 'Senin')
                                                                echo 'selected'; ?>>Senin</option>
                                                            <option value="Selasa" <?php if ($row['hari'] == 'Selasa')
                                                                echo 'selected'; ?>>Selasa</option>
                                                            <option value="Rabu" <?php if ($row['hari'] == 'Rabu')
                                                                echo 'selected'; ?>>Rabu</option>
                                                            <option value="Kamis" <?php if ($row['hari'] == 'Kamis')
                                                                echo 'selected'; ?>>Kamis</option>
                                                            <option value="Jumat" <?php if ($row['hari'] == 'Jumat')
                                                                echo 'selected'; ?>>Jumat</option>
                                                            <option value="Sabtu" <?php if ($row['hari'] == 'Sabtu')
                                                                echo 'selected'; ?>>Sabtu</option>
                                                            <option value="Minggu" <?php if ($row['hari'] == 'Minggu')
                                                                echo 'selected'; ?>>Minggu</option>
                                                        </select>
                                                        <label for="floatingInputHari">Hari</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingInputWaktu"
                                                            placeholder="Waktu" name="waktu" required
                                                            value="<?php echo $row['waktu']; ?>">
                                                        <label for="floatingInputWaktu">Waktu</label>
                                                        <div class="invalid-feedback">Masukkan Waktu</div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success"
                                                            name="edit_jadwal_validate">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit -->

                                <!-- Modal Delete -->
                                <div class="modal fade" id="ModalDelete<?php echo $row['id_kelas']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Jadwal Akademik</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin ingin menghapus jadwal akademik kelas
                                                    <b><?php echo $row['kelas']; ?></b> dengan mata pelajaran
                                                    <b><?php echo $row['mapel']; ?></b>?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="proses/proses_delete_jadwal.php" method="POST">
                                                    <input type="hidden" name="id_kelas"
                                                        value="<?php echo $row['id_kelas']; ?>">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger"
                                                        name="delete_jadwal_validate">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Delete -->

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk mengatur validasi formulir dan mereset form ketika modal ditampilkan
    (() => {
        'use strict';

        // Mengambil semua form yang ingin kita terapkan gaya validasi Bootstrap kustom
        const forms = document.querySelectorAll('.needs-validation');

        // Looping untuk mencegah pengiriman jika form tidak valid
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
        var modalTambah = document.getElementById('ModalTambahJadwal');
        modalTambah.addEventListener('show.bs.modal', function (event) {
            var form = document.getElementById('tambahJadwalForm');
            form.reset();
            form.classList.remove('was-validated');
        });

        // Tambahan untuk modal edit, agar form juga direset ketika ditampilkan
        var modalsEdit = document.querySelectorAll('[id^="ModalEdit"]');
        modalsEdit.forEach(modal => {
            modal.addEventListener('show.bs.modal', function (event) {
                var form = modal.querySelector('form');
                form.reset();
                form.classList.remove('was-validated');
            });
        });
    });
</script>
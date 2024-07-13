<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM biodata");
$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2 mb-3">
    <div class="card">
        <div class="card-header">Daftar Kelas</div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title justify-content-right">Biodata Santri Al-Hidayah</h5>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalTambahbiodata">Tambah
                        Biodata</button>
                </div>
            </div>
            <!-- Modal tambah biodata -->
            <div class="modal fade" id="ModalTambahbiodata" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah biodata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_biodata.php"
                                method="POST" enctype="multipart/form-data" id="tambahBiodataForm">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputNIS" placeholder="NIS"
                                        name="nis" required>
                                    <label for="floatingInputNIS">NIS</label>
                                    <div class="invalid-feedback">Masukkan Nomor Induk Santri</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputNama" placeholder="Nama"
                                        name="nama" required>
                                    <label for="floatingInputNama">Nama</label>
                                    <div class="invalid-feedback">Masukkan Nama Santri</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputUsia" placeholder="Usia"
                                        name="usia" required>
                                    <label for="floatingInputUsia">Usia</label>
                                    <div class="invalid-feedback">Masukkan Usia Santri</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputTglLahir"
                                        placeholder="Tanggal Lahir" name="tgl_lahir" required>
                                    <label for="floatingInputTglLahir">Tanggal Lahir</label>
                                    <div class="invalid-feedback">Masukkan Tanggal Lahir</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin"
                                        required>
                                        <option selected hidden value="-">Laki-laki / Perempuan</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="floatingInput">Jenis Kelamin</label>
                                    <div class="invalid-feedback">Pilih Jenis Kelamin</div>
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
                                    <input type="text" class="form-control" id="floatingInputNoHpWali"
                                        placeholder="Nomor Hp Wali" name="nohp_wali" required>
                                    <label for="floatingInputNoHpWali">Nomor Hp. Wali</label>
                                    <div class="invalid-feedback">Masukkan Nomor Hp. Wali</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="floatingTextareaAlamat" placeholder="Alamat"
                                        name="alamat" style="height: 150px; width: 100%;" required></textarea>
                                    <label for="floatingTextareaAlamat">Alamat</label>
                                    <div class="invalid-feedback">Masukkan Alamat</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" id="floatingInputFoto" name="foto"
                                        accept="image/*">
                                    <label for="floatingInputFoto">Foto</label>
                                    <div class="invalid-feedback">Upload Foto Santri</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="input_user_validate"
                                        value="12345">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal tambah biodata -->

            <?php foreach ($result as $row): ?>
                <!-- Modal view -->
                <div class="modal fade" id="ModalView<?php echo $row['nis'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail KelasBiodata Santri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputNIS" placeholder="NIS"
                                        name="nis" value="<?php echo $row['nis'] ?>">
                                    <label for="floatingInputNIS">NIS</label>
                                    <div class="invalid-feedback">Masukkan Nomor Induk Santri</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputNama"
                                        placeholder="Nama" name="nama" value="<?php echo $row['nama'] ?>">
                                    <label for="floatingInputNama">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputUsia"
                                        placeholder="Usia" name="usia" value="<?php echo $row['usia'] ?>">
                                    <label for="floatingInputUsia">Usia</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputTglLahir"
                                        placeholder="Tanggal Lahir" name="tgl_lahir"
                                        value="<?php echo $row['tgl_lahir'] ?>">
                                    <label for="floatingInputTglLahir">Tanggal Lahir</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputJenisKelamin"
                                        placeholder="Jenis Kelamin" name="jenis_kelamin"
                                        value="<?php echo $row['jenis_kelamin'] ?>">
                                    <label for="floatingInputJenisKelamin">Jenis Kelamin</label>
                                    <div class="invalid-feedback">Pilih Jenis Kelamin</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputKelas"
                                        placeholder="Kelas" name="kelas" value="<?php echo $row['kelas'] ?>">
                                    <label for="floatingInputKelas">Kelas</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputNoHpWali"
                                        placeholder="Nomor Hp. Wali" name="nohp_wali"
                                        value="<?php echo $row['nohp_wali'] ?>">
                                    <label for="floatingInputNoHpWali">Nomor Hp. Wali</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInputAlamat"
                                        placeholder="Alamat" name="alamat" value="<?php echo $row['alamat'] ?>">
                                    <label for="floatingInputAlamat">Alamat</label>
                                </div>
                                <div disabled class="text-center">
                                    <img src="<?php echo $row['foto'] ?>" alt="Foto Santri" class="img-fluid">
                                </div>
                                <div class="text-center mt-3">
                                    <?php
                                    if ($row['kelas'] == '1-A (L)' || $row['kelas'] == '1-A (P)') {
                                        echo '<span class="badge bg-success">Kelas Inti</span>';
                                    } else {
                                        echo '<span class="badge bg-secondary">Kelas Biasa</span>';
                                    }
                                    ?>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Biodata Santri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_biodata.php"
                                    method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputNIS" placeholder="NIS"
                                            name="nis" required value="<?php echo $row['nis'] ?>">
                                        <label for="floatingInputNIS">NIS</label>
                                        <div class="invalid-feedback">Masukkan Nomor Induk Santri</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputNama" placeholder="Nama"
                                            name="nama" required value="<?php echo $row['nama'] ?>">
                                        <label for="floatingInputNama">Nama</label>
                                        <div class="invalid-feedback">Masukkan Nama Santri</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputUsia" placeholder="Usia"
                                            name="usia" required value="<?php echo $row['usia'] ?>">
                                        <label for="floatingInputUsia">Usia</label>
                                        <div class="invalid-feedback">Masukkan Usia Santri</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputTglLahir"
                                            placeholder="Tanggal Lahir" name="tgl_lahir" required
                                            value="<?php echo $row['tgl_lahir'] ?>">
                                        <label for="floatingInputTglLahir">Tanggal Lahir</label>
                                        <div class="invalid-feedback">Masukkan Tanggal Lahir</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputJenisKelamin"
                                            placeholder="Jenis Kelamin" name="jenis_kelamin" required
                                            value="<?php echo $row['jenis_kelamin'] ?>">
                                        <label for="floatingInputJenisKelamin">Jenis Kelamin</label>
                                        <div class="invalid-feedback">Pilih Jenis Kelamin</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputKelas" placeholder="Kelas"
                                            name="kelas" required value="<?php echo $row['kelas'] ?>">
                                        <label for="floatingInputKelas">Kelas</label>
                                        <div class="invalid-feedback">Masukkan Kelas</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputNoHpWali"
                                            placeholder="Nomor Hp. Wali" name="nohp_wali" required
                                            value="<?php echo $row['nohp_wali'] ?>">
                                        <label for="floatingInputNoHpWali">Nomor Hp. Wali</label>
                                        <div class="invalid-feedback">Masukkan Nomor Hp. Wali</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputAlamat"
                                            placeholder="Alamat" name="alamat" required
                                            value="<?php echo $row['alamat'] ?>">
                                        <label for="floatingInputAlamat">Alamat</label>
                                        <div class="invalid-feedback">Masukkan Alamat</div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="input_user_validate"
                                            value="12345">Simpan Edit</button>
                                    </div>
                                </form>
                                <div disabled class="text-center">
                                    <img src="<?php echo $row['foto'] ?>" alt="Foto Santri" class="img-fluid">
                                </div>
                                <div class="text-center mt-3">
                                    <?php
                                    if ($row['kelas'] == '1-A (L)' || $row['kelas'] == '1-A (P)') {
                                        echo '<span class="badge bg-success">Kelas Inti</span>';
                                    } else {
                                        echo '<span class="badge bg-secondary">Kelas Biasa</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['nis'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Biodata Santri</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_biodata.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['nis'] ?>" name="nis">
                                    <div class="col-lg-12">
                                        Apakah Anda ingin Menghapus Biodata <b><?php echo $row['nis'] ?></b>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="input_user_validate"
                                            value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal Delete -->


            <?php endforeach; ?>

            <?php if (empty($result)): ?>
                <p>Data user tidak ada</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Usia</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">No HP Wali</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nis'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['usia'] ?></td>
                                    <td><?php echo $row['tgl_lahir'] ?></td>
                                    <td><?php echo $row['jenis_kelamin'] ?></td>
                                    <td><?php echo $row['kelas'] ?></td>
                                    <td><?php echo $row['nohp_wali'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info me-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalView<?php echo $row['nis'] ?>"><i
                                                class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['nis'] ?>"><i
                                                class="bi bi-pen"></i></button>
                                        <button class="btn btn-danger me-2" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['nis'] ?>"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
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
        var modal = document.getElementById('ModalTambahbiodata');
        modal.addEventListener('show.bs.modal', function (event) {
            var form = document.getElementById('tambahBiodataForm');
            form.reset();
            form.classList.remove('was-validated');
        });
    });
</script>
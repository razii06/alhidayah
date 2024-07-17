<?php
include 'connect.php';

if (isset($_POST['edit_jadwal_validate'])) {
    // Ambil data dari formulir
    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $mapel = $_POST['mapel'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];

    // Debugging data
    var_dump($_POST);

    // Query untuk melakukan update data
    $query = "UPDATE jadwal_akademik SET kelas='$kelas', mapel='$mapel', hari='$hari', waktu='$waktu' WHERE id_kelas='$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil atau tidak
    if ($result) {
        echo "<script>alert('Jadwal berhasil diedit!'); window.location='../jadwalakademik';</script>";
    } else {
        echo "<script>alert('Jadwal gagal diedit!'); window.location='../jadwalakademik';</script>";
        echo mysqli_error($conn); // Tampilkan error MySQL
    }
}
?>
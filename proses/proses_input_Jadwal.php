<?php
include 'connect.php';

if (isset($_POST['input_jadwal_validate'])) {
    $id_kelas = $_POST['id_kelas'];
    $kelas = $_POST['kelas'];
    $mapel = $_POST['mapel'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];

    $query = "INSERT INTO jadwal_akademik (id_kelas, kelas, mapel, hari, waktu) VALUES ('$id_kelas', '$kelas', '$mapel', '$hari', '$waktu')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Jadwal berhasil ditambahkan!'); window.location='../jadwalakademik';</script>";
    } else {
        echo "<script>alert('Jadwal gagal ditambahkan!'); window.location='../jadwalakademik';</script>";
    }
}
?>

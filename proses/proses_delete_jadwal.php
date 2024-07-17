<?php
include 'connect.php';

// Pastikan koneksi berhasil
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete_jadwal_validate'])) {
    // Pastikan id_kelas ada dalam data POST
    if (isset($_POST['id_kelas'])) {
        $id_kelas = $_POST['id_kelas']; // Ambil id_kelas yang akan dihapus

        // Debugging untuk memastikan id_kelas terkirim
        // echo $id_kelas;

        $query = "DELETE FROM jadwal_akademik WHERE id_kelas='$id_kelas'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Jadwal berhasil dihapus!'); window.location='../jadwalakademik';</script>";
        } else {
            echo "<script>alert('Jadwal gagal dihapus!'); window.location='../jadwalakademik';</script>";
            echo mysqli_error($conn); // Tampilkan error MySQL
        }
    } else {
        echo "<script>alert('ID Kelas tidak ditemukan!'); window.location='../jadwalakademik';</script>";
    }
} else {
    echo "<script>alert('Form tidak valid!'); window.location='../jadwalakademik';</script>";
}
?>
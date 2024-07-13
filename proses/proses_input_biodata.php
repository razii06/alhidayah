<?php
include "connect.php";

$nis = isset($_POST['nis']) ? htmlentities($_POST['nis']) : "";
$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) : "";
$usia = isset($_POST['usia']) ? htmlentities($_POST['usia']) : "";
$tgl_lahir = isset($_POST['tgl_lahir']) ? htmlentities($_POST['tgl_lahir']) : "";
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? htmlentities($_POST['jenis_kelamin']) : "";
$kelas = isset($_POST['kelas']) ? htmlentities($_POST['kelas']) : "";
$nohp_wali = isset($_POST['nohp_wali']) ? htmlentities($_POST['nohp_wali']) : "";
$alamat = isset($_POST['alamat']) ? htmlentities($_POST['alamat']) : "";
$foto = "";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $foto = "uploads/" . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
}

if (!empty($nis) && !empty($nama) && !empty($usia) && !empty($tgl_lahir) && !empty($jenis_kelamin) && !empty($kelas) && !empty($nohp_wali) && !empty($alamat) && !empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO biodata (nis, nama, usia, tgl_lahir, jenis_kelamin, kelas, nohp_wali, alamat, foto) VALUES ('$nis', '$nama', '$usia', '$tgl_lahir', '$jenis_kelamin', '$kelas', '$nohp_wali', '$alamat', '$foto')");
    if (!$query) {
        $message = '<script>alert("Data gagal dimasukkan")</script>';
    } else {
        $message = '<script>alert("Data berhasil dimasukkan"); window.location="../biodata"</script>';
    }
    echo $message;
} else {
    echo '<script>alert("Semua field harus diisi")</script>';
}
?>
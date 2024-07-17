<?php
include "connect.php";

$nis = isset($_POST['nis']) ? htmlentities($_POST['nis']) : "";
$kelas = isset($_POST['kelas']) ? htmlentities($_POST['kelas']) : "";
$tahfidz = isset($_POST['tahfidz']) ? htmlentities($_POST['tahfidz']) : "";
$kitab = isset($_POST['kitab']) ? htmlentities($_POST['kitab']) : "";
$uas = isset($_POST['uas']) ? htmlentities($_POST['uas']) : "";

if (!empty($nis) && !empty($kelas) && !empty($tahfidz) && !empty($kitab) && !empty($uas) && !empty($_POST['input_nilai_validate'])) {
    $rata_rata = ($tahfidz + $kitab + $uas) / 3;
    $query = mysqli_query($conn, "INSERT INTO daftar_nilai (nis, kelas, tahfidz, kitab, uas, rata_rata) VALUES ('$nis', '$kelas', '$tahfidz', '$kitab', '$uas', '$rata_rata')");
    if (!$query) {
        $message = '<script>alert("Data gagal dimasukkan")</script>';
    } else {
        $message = '<script>alert("Data berhasil dimasukkan"); window.location="../nilaiakademik"</script>';
    }
    echo $message;
} else {
    echo '<script>alert("Semua field harus diisi")</script>';
}
?>
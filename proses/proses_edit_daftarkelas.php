<?php
include ("connect.php");

$id_kelas = (isset($_POST['id_kelas'])) ? htmlentities($_POST['id_kelas']) : "";
$kelas = (isset($_POST['kelas'])) ? htmlentities($_POST['kelas']) : "";
$jumlah_santri = (isset($_POST['jumlah_santri'])) ? htmlentities($_POST['jumlah_santri']) : "";

if (!empty($_POST['edit_kelas_validate'])) {
    $query = mysqli_query($conn, "UPDATE daftar_kelas SET kelas = '$kelas', jumlah_santri = '$jumlah_santri' WHERE id_kelas = '$id_kelas'");
    if (!$query) {
        $message = '<script>alert("data gagal diubah")</script>';
    } else {
        $message = '<script>alert("data berhasil diubah"); window.location="../daftarkelas"</script>';
    }
    echo $message;
}
?>
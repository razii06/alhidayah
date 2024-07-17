<?php
include ("connect.php");

$id_kelas = (isset($_POST['id_kelas'])) ? htmlentities($_POST['id_kelas']) : "";

if (!empty($_POST['delete_kelas_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM daftar_kelas WHERE id_kelas = '$id_kelas'");
    if (!$query) {
        $message = '<script>alert("data gagal dihapus")</script>';
    } else {
        $message = '<script>alert("data berhasil dihapus"); window.location="../daftarkelas"</script>';
    }
    echo $message;
}
?>
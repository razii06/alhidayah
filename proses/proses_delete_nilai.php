<?php
include ("connect.php");

$nis = isset($_POST['nis']) ? htmlentities($_POST['nis']) : "";

if (!empty($nis) && !empty($_POST['delete_nilai_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM daftar_nilai WHERE nis='$nis'");
    if (!$query) {
        $message = '<script>alert("Data nilai tidak terhapus")</script>';
    } else {
        $message = '<script>alert("Data nilai terhapus"); window.location="../nilaiakademik"</script>';
    }
    echo $message;
} else {
    echo '<script>alert("NIS harus diisi")</script>';
}
?>
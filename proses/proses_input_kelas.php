<?php
include ("connect.php");

$noid = (isset($_POST['noid'])) ? htmlentities($_POST['noid']) : "";
$kelas = (isset($_POST['select'])) ? htmlentities($_POST['select']) : "";
$jumlah_santri = (isset($_POST['jumlahsantri'])) ? htmlentities($_POST['jumlahsantri']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO daftar_kelas (kelas, jumlah_santri) VALUES ('$kelas', '$jumlah_santri')");
    if (!$query) {
        $message = '<script>alert("data gagal dimasukkan")</script>';
    } else {
        $message = '<script>alert("data berhasil"); window.location="../daftarkelas"</script>';
    }
    echo $message;
}
?>
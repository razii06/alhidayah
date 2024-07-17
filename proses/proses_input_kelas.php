<?php
include ("connect.php");

$id_kelas = isset($_POST['noid']) ? intval($_POST['noid']) : 0; // Ubah menjadi integer
$kelas = isset($_POST['select']) ? $_POST['select'] : "";
$jumlah_santri = isset($_POST['jumlahsantri']) ? intval($_POST['jumlahsantri']) : 0; // Ubah menjadi integer

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO daftar_kelas (id_kelas, kelas, jumlah_santri) VALUES ('$id_kelas', '$kelas', '$jumlah_santri')");
    if (!$query) {
        $message = '<script>alert("Data gagal dimasukkan")</script>';
    } else {
        $message = '<script>alert("Data berhasil ditambahkan"); window.location="../daftarkelas"</script>';
    }
    echo $message;
}
?>
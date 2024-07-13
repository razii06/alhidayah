<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $nohp_wali = $_POST['nohp_wali'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    // Check if a new photo is uploaded
    if (!empty($foto)) {
        // Rename the photo with the nis value
        $new_foto = $nis . '_' . $foto;
        $path = "../uploads/" . $new_foto;

        // Move the uploaded photo to the target directory
        if (move_uploaded_file($tmp, $path)) {
            $query = "UPDATE biodata SET nama='$nama', usia='$usia', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', kelas='$kelas', nohp_wali='$nohp_wali', alamat='$alamat', foto='$new_foto' WHERE nis='$nis'";
        } else {
            echo "Error uploading the photo";
        }
    } else {
        $query = "UPDATE biodata SET nama='$nama', usia='$usia', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', kelas='$kelas', nohp_wali='$nohp_wali', alamat='$alamat' WHERE nis='$nis'";
    }

    if (mysqli_query($conn, $query)) {
        $message = '<script>alert("Data gagal di update")</script>';
    } else {
        $message = '<script>alert("data berhasil di update"); window.location="../biodata"</script>';
    }

    mysqli_close($conn);
}
?>
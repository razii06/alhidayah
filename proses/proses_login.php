<?php
session_start();
include ("connect.php");
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION["username_alhidayah"] = $username;
        header('Location: ../home');
        exit; // Make sure to exit after redirect
    } else {
        echo '<script>
            alert("Username atau password yang Anda masukkan salah");
            window.location.href = "../login";
        </script>';
    }
}
?>
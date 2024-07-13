<?php
session_start();
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username_alhidayah']; // Ambil username dari sesi

    $passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
    $passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
    $repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";

    if (!empty($_POST['ubah_password_validate'])) {
        // Query untuk mendapatkan data user berdasarkan username dan password lama
        $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$passwordlama'");
        $user = mysqli_fetch_assoc($query);

        if ($user) {
            // Jika password baru dan konfirmasi password baru sama
            if ($passwordbaru == $repasswordbaru) {
                // Query update password ke dalam database
                $query_update = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE username='$username'");

                if ($query_update) {
                    $message = '<script>
                        alert("Password berhasil diubah");
                        window.location.href = "../home";
                    </script>';
                } else {
                    $message = '<script>
                        alert("Password tidak berhasil diubah");
                        window.history.back();
                    </script>';
                }
            } else {
                $message = '<script>
                    alert("Password baru tidak sama");
                    window.history.back();
                </script>';
            }
        } else {
            $message = '<script>
                alert("Password lama tidak sesuai");
                window.history.back();
            </script>';
        }
    } else {
        $message = '<script>
            alert("Permintaan ubah password tidak valid");
            window.history.back();
        </script>';
    }
} else {
    header('location:../home');
}

echo $message;
?>
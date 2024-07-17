<?php
session_start();
include ("connect.php");

if (isset($_POST['submit_validate'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // Sanitasi input (jika perlu)
    $username = htmlentities($username);

    // Menggunakan md5 untuk password (tidak direkomendasikan)
    $password = md5($password);

    // Query menggunakan parameter binding dan prepared statement
    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["username_alhidayah"] = $username;
        header('Location: ../home');
        exit; // Pastikan untuk keluar setelah pengalihan
    } else {
        echo '<script>
            alert("Username atau password yang Anda masukkan salah");
            window.location.href = "../login";
        </script>';
    }

    // Menutup prepared statement
    $stmt->close();
}
?>
<?php
session_start();

// Jika user belum login, arahkan ke halaman login
if (empty($_SESSION["username_alhidayah"])) {
    include 'login.php';
    exit; // Pastikan eksekusi skrip dihentikan setelah mengarahkan ke login.php
}

// Set a default page
$page = "home.php";

// Override the default page if $_GET['x'] is set
if (isset($_GET['x'])) {
    if ($_GET['x'] == 'biodata') {
        $page = "biodata.php";
        include "main.php";
    } else if ($_GET['x'] == 'nilaiakademik') {
        $page = "nilai_akademik.php";
        include "main.php";
    } else if ($_GET['x'] == 'jadwalakademik') {
        $page = "jadwal_akademik.php";
        include "main.php";
    } else if ($_GET['x'] == 'daftarkelas') {
        $page = "daftar_kelas.php";
        include "main.php";
    } else if ($_GET['x'] == 'login') {
        include ('login.php');
        exit; // Ensure script stops execution after including login.php
    } else if ($_GET['x'] == 'logout') {
        include ('proses/proses_logout.php');
    } else {
        $page = "home.php";
        include "main.php";
    }
}

?>
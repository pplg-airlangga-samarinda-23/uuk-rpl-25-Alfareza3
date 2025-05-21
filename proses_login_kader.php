<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $koneksi->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM kader WHERE email = '$email'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $kader = $result->fetch_assoc();
        if ($password === $kader['password']) {
            $_SESSION['kader'] = $kader['nama'];
            header("Location: pendaftaran_bayi.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
} else {
    header("Location: login_kader.php");
    exit();
}
?>

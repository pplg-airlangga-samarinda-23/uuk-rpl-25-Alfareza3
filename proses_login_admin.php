<?php 
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $koneksi->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = $koneksi->query($query);

        if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        if ($password === $admin['password']) {
            $_SESSION['admin'] = $admin['nama'];
            header("Location: dashboard_admin.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
} else {
    header("Location: login_admin.php");
    exit();
}

?>
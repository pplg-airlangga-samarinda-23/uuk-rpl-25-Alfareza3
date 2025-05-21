<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['kader'])) {
    header("Location: login_kader.php");
    exit();
}

$required_fields = ['nama_bayi', 'nama_orang_tua', 'tinggi_badan', 'berat_badan', 'alamat', 'umur'];
foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        die("Error: Field '$field' harus diisi.");
    }
}

$nama_bayi = trim($_POST['nama_bayi']);
$nama_orang_tua = trim($_POST['nama_orang_tua']);
$tinggi_badan = floatval($_POST['tinggi_badan']);
$berat_badan = floatval($_POST['berat_badan']);
$alamat = trim($_POST['alamat']);
$umur = intval($_POST['umur']);

if ($tinggi_badan <= 0 || $berat_badan <= 0 || $umur < 0) {
    die("Error: Data tinggi badan, berat badan, dan umur harus bernilai positif.");
}

$stmt = $koneksi->prepare("INSERT INTO bayi (nama_bayi, nama_orang_tua, tinggi_badan, berat_badan, alamat, umur) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error);
}

$stmt->bind_param("ssddsi", $nama_bayi, $nama_orang_tua, $tinggi_badan, $berat_badan, $alamat, $umur);

if ($stmt->execute()) {
    $_SESSION['success_message'] = "Pendaftaran bayi berhasil!";
    header("Location: dashboard_admin.php");
    exit();
} else {
    echo "Error saat mendaftar bayi: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>

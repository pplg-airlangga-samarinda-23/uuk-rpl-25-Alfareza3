<?php 
session_start();
if (!isset($_SESSION['kader'])) {
    header("Location: login_kader.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran bayi posyandu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-right">
            <?= htmlspecialchars($_SESSION['kader'])?> <span class=""></span> 
        </div>
    </header>
    <div class="container form-container">
        <h1>Pendaftaran Bayi Posyandu</h1>
        <form action="proses_pendaftaran.php" method="post">
            <label for="nama_bayi">Nama Bayi</label>
            <input type="text" id="nama_bayi" name="nama_bayi" required />

            <label for="nama_orang_tua">Nama Orang Tua</label>
            <input type="text" id="nama_orang_tua" name="nama_orang_tua" required />

            <label for="tinggi_badan">Tinggi Badan (cm)</label>
            <input type="number" step="0.01" id="tinggi_badan" name="tinggi_badan" required />

            <label for="berat_badan">Berat Badan (kg)</label>
            <input type="number" id="berat_badan" name="berat_badan" required />

            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" required></textarea>

            <label for="umur">Umur (bulan)</label>
            <input type="number" id="umur" name="umur" required />

            <button type="submit" class="btn daftar-btn">Daftar</button>
            <a href="dashboard_admin.php" class="btn daftar-btn">Kembali</a>
        </form>
    </div>
</body>
</html>
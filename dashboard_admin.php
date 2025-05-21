<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

include 'koneksi.php';

$result = $koneksi->query("SELECT * FROM bayi");
$bayi_list = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $bayi_list[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-right">
            <?= htmlspecialchars($_SESSION['admin']) ?>
        </div>
    </header>
    <div class="container dashboard-container">
        <h1>Data Bayi Posyandu 2025</h1>
        <h2>Dashboard</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Bayi</th>
                    <th>Tinggi Badan (cm)</th>
                    <th>Berat Badan (kg)</th>
                    <th>Umur (bulan)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($bayi_list) > 0): ?>
                    <?php foreach ($bayi_list as $bayi): ?>
                    <tr>
                        <td><?= htmlspecialchars($bayi['nama_bayi']) ?></td>
                        <td><?= htmlspecialchars($bayi['tinggi_badan']) ?></td>
                        <td><?= htmlspecialchars($bayi['berat_badan']) ?></td>
                        <td><?= htmlspecialchars($bayi['umur']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">Belum ada data bayi.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="pendaftaran_bayi.php" class="btn daftar-btn">Daftar Bayi</a>
        <a href="index.php" class="btn daftar-btn">Kembali</a>
    </div>
</body>
</html>
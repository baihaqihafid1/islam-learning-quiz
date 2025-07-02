<?php
session_start();
if (!isset($_SESSION['score'], $_SESSION['total'], $_SESSION['nama'])) {
    header("Location: quiz.php"); // atau halaman quiz jika belum ada hasil
    exit;
}
$score = $_SESSION['score'];
$total = $_SESSION['total'];
$nama = $_SESSION['nama'] ?? 'Tidak diketahui';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Hasil Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light p-4">
    <div class="container text-center">
        <h1 class="mb-4 text-success">Hasil Quiz <?= htmlspecialchars($nama) ?></h1>
        <p class="fs-4">Skor Anda: <strong><?= $score ?></strong> dari <strong><?= $total ?></strong> soal.</p>
        <a href="quiz.php" class="btn btn-primary mt-3">Ulangi Quiz</a>
        <a href="grafik.php" class="btn btn-success mt-3 ms-2">Lihat Grafik Hasil Quiz</a>
    </div>
</body>
</html>

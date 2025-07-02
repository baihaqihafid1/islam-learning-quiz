<?php
include "db.php";
$result = $conn->query("SELECT * FROM materi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Materi Pembelajaran Islam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .card-body {
            text-align: center;
        }
        .card-title i {
            color: #198754;
            margin-right: 8px;
        }
    </style>
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">📘 Islam Learning</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <!-- Tombol "Mulai Quiz" umum DIHAPUS -->
                    <a href="grafik.php" class="btn btn-success">Lihat Grafik Hasil Quiz</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Konten -->
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2><span style="margin-right:10px;">📖</span> Materi Pembelajaran Islam</h2>
        <p class="text-muted">Pelajari dasar-dasar Islam dengan mudah dan menyenangkan ✨</p>
    </div>

    <div class="row justify-content-center">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-mosque"></i> <?= htmlspecialchars($row['judul']) ?>
                        </h5>
                        <a href="materi.php?id=<?= $row['id'] ?>" class="btn btn-outline-success mt-3">📖 Baca Materi</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-success text-white text-center p-3 mt-5">
    &copy; <?= date('Y') ?> Islam Learning.
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>

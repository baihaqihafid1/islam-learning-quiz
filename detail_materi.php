<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
include "db.php";

$id = $_GET['id'] ?? 0;
$id = (int)$id;

$stmt = $conn->prepare("SELECT * FROM materi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Materi tidak ditemukan.";
    exit;
}

$materi = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($materi['judul']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            padding-top: 80px; /* untuk navbar */
        }
        .materi-container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px 40px;
        }
        h2 {
            color: #0d6efd;
            font-weight: bold;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Pembelajaran Islam</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="materi.php" class="nav-link">Materi</a></li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link btn btn-danger text-white ms-3">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="materi-container">
    <h2 class="mb-4"><?= htmlspecialchars($materi['judul']) ?></h2>
    <p style="line-height: 1.8;"><?= nl2br(htmlspecialchars($materi['isi'])) ?></p>
    <a href="materi.php" class="btn btn-secondary mt-4">← Kembali ke Materi</a>
</div>

</body>
</html>

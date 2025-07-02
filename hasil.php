<?php
session_start();

if (!isset($_SESSION['score'])) {
    header("Location: quiz.php");
    exit;
}

$score = $_SESSION['score'];
$total = $_SESSION['total'];
$materi = $_SESSION['materi'] ?? '';

unset($_SESSION['score'], $_SESSION['total'], $_SESSION['materi']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Hasil Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            background: #f8f9fa;
        }
        .hasil-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-weight: 700;
            color: #28a745;
            margin-bottom: 20px;
        }
        .score {
            font-size: 2.5rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 30px;
        }
        .btn-group a {
            min-width: 140px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="hasil-container">
        <h1>Hasil Quiz</h1>
        <div class="score">
            Skor Anda: <span class="text-success"><?= $score ?></span> dari <span class="text-primary"><?= $total ?></span>
        </div>
        <div class="btn-group" role="group" aria-label="Tombol navigasi">
            <a href="quiz.php?materi=<?= urlencode($materi) ?>" class="btn btn-success me-3">Ulangi Quiz</a>
            <a href="index.php" class="btn btn-outline-primary">Ke Materi</a>
        </div>
    </div>
</body>
</html>

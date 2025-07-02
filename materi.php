<?php
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

// Generate slug dari judul
$slug = strtolower(str_replace(' ', '_', $materi['judul']));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($materi['judul']) ?> - Islam Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 15px;
            font-family: 'Segoe UI', sans-serif;
        }
        .materi-container {
            max-width: 800px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
            padding: 35px 40px;
            animation: fadeIn 0.5s ease;
        }
        h2 {
            color: #198754;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.7;
            color: #343a40;
            white-space: pre-line;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="materi-container">
        <h2 class="mb-4 text-success">
            <i class="fas fa-mosque me-2"></i> <?= htmlspecialchars($materi['judul']) ?>
        </h2>

        <p><?= nl2br(htmlspecialchars($materi['isi'])) ?></p>

        <a href="index.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Materi
        </a>

        <a href="mulai_quiz.php?materi=<?= urlencode($slug) ?>&id=<?= $materi['id'] ?>" 
           class="btn btn-success mt-3 float-end">
           <i class="fas fa-play me-1"></i> Mulai Quiz
        </a>
    </div>
</body>
</html>

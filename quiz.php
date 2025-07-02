<?php
session_start();
include "db.php";

// Ambil parameter dari URL
$materi = $_GET['materi'] ?? '';
$id_materi = $_GET['id'] ?? '';

// Simpan ke session jika belum ada
if (!empty($materi)) {
    $_SESSION['materi_slug'] = $materi;
}
if (!empty($id_materi)) {
    $_SESSION['id_materi'] = $id_materi;
}

// Ambil soal dari DB
$stmt = $conn->prepare("SELECT * FROM soal WHERE materi = ?");
$stmt->bind_param("s", $materi);
$stmt->execute();
$result = $stmt->get_result();
$soal = [];
while ($row = $result->fetch_assoc()) {
    $soal[] = $row;
}

if (empty($soal)) {
    echo "Belum ada soal untuk materi ini.";
    exit;
}

// Cek identitas
if (!isset($_SESSION['nama'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
        $_SESSION['nama'] = $_POST['nama'];
        $_SESSION['kelas'] = $_POST['kelas'];
        $_SESSION['sekolah'] = $_POST['sekolah'];
        $_SESSION['umur'] = $_POST['umur'];
        $_SESSION['id_materi'] = $_POST['id_materi'];
        $_SESSION['materi_slug'] = $_POST['materi'];
    } else {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Identitas Sebelum Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height:100vh;background:#f0f8ff">
<div class="card p-4 shadow" style="max-width:500px;width:100%;">
    <h3 class="mb-3 text-center text-success">Isi Identitas Diri</h3>
    <form method="post">
        <input type="hidden" name="materi" value="<?= htmlspecialchars($materi) ?>">
        <input type="hidden" name="id_materi" value="<?= htmlspecialchars($id_materi) ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sekolah" class="form-label">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" name="umur" id="umur" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Lanjut ke Quiz</button>
    </form>
</div>
</body>
</html>
<?php
        exit;
    }
}

// Proses submit quiz
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jawaban'])) {
    $score = 0;
    foreach ($soal as $index => $s) {
        $jawaban_user = $_POST['jawaban'][$index] ?? '';
        if ($jawaban_user == $s['jawaban']) {
            $score++;
        }
    }

    $_SESSION['score'] = $score;
    $_SESSION['total'] = count($soal);
    $_SESSION['materi'] = $_SESSION['materi_slug'];

    $nama = $_SESSION['nama'];
    $kelas = $_SESSION['kelas'];
    $sekolah = $_SESSION['sekolah'];
    $umur = $_SESSION['umur'];
    $materi_slug = $_SESSION['materi_slug'];
    $total_soal = count($soal);

    $stmt = $conn->prepare("INSERT INTO hasil_quiz (nama, skor, total_soal, kelas, sekolah, umur, materi) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siissss", $nama, $score, $total_soal, $kelas, $sekolah, $umur, $materi_slug);
    $stmt->execute();

    header("Location: hasil.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Quiz <?= ucfirst(str_replace('_', ' ', $_SESSION['materi_slug'])) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body { background: #f0f8ff; min-height: 100vh; padding: 40px 15px; }
        .quiz-container {
            max-width: 700px; margin: auto; background: white; padding: 30px 40px;
            border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        fieldset { border: 1px solid #ddd; padding: 20px 25px; border-radius: 8px; margin-bottom: 20px; }
        legend { font-weight: 600; font-size: 1.1rem; }
        .back-link { display: block; margin-top: 20px; text-align: center; color: #28a745; font-weight: 600; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="quiz-container">
    <h1 class="text-center mb-4 text-success">Quiz: <?= ucfirst(str_replace('_', ' ', $_SESSION['materi_slug'])) ?></h1>
    <form method="post" action="">
        <input type="hidden" name="id_materi" value="<?= htmlspecialchars($_SESSION['id_materi']) ?>">
        <?php foreach ($soal as $index => $s): ?>
            <fieldset>
                <legend>Soal <?= $index + 1 ?>: <?= htmlspecialchars($s['pertanyaan']) ?></legend>
                <?php foreach (['a', 'b', 'c', 'd'] as $pil): ?>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="radio" name="jawaban[<?= $index ?>]" id="j<?= $index . $pil ?>" value="<?= $pil ?>" required>
                        <label class="form-check-label" for="j<?= $index . $pil ?>"><?= htmlspecialchars($s["pilihan_$pil"]) ?></label>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-success mt-4 w-100">Kirim Jawaban</button>
    </form>

    <?php if (!empty($_SESSION['id_materi']) && !empty($_SESSION['materi_slug'])): ?>
        <a href="materi.php?id=<?= urlencode($_SESSION['id_materi']) ?>&materi=<?= urlencode($_SESSION['materi_slug']) ?>" class="back-link">← Kembali ke Materi</a>
    <?php endif; ?>
</div>
</body>
</html>

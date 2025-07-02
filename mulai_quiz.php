<?php
session_start();

$materi = $_GET['materi'] ?? '';
$id_materi = $_GET['id'] ?? ''; // Ambil ID materi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['kelas'] = $_POST['kelas'];
    $_SESSION['sekolah'] = $_POST['sekolah'];
    $_SESSION['umur'] = $_POST['umur'];
    $_SESSION['materi'] = $_POST['materi'];
    $_SESSION['id_materi'] = $_POST['id_materi']; // Simpan id materi

    header("Location: quiz.php?materi=" . urlencode($_POST['materi']) . "&id_materi=" . urlencode($_POST['id_materi']));
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mulai Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-5 shadow" style="width: 100%; max-width: 500px;">
        <h3 class="mb-4 text-center text-success">Masukkan Data Diri</h3>
        <form method="post">
            <input type="hidden" name="materi" value="<?= htmlspecialchars($materi) ?>">
            <input type="hidden" name="id_materi" value="<?= htmlspecialchars($id_materi) ?>">

            <div class="mb-3"> 
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Misal: 6A" required>
            </div>

            <div class="mb-3">
                <label for="sekolah" class="form-label">Asal Sekolah</label>
                <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Misal: SDN 1 Harapan" required>
            </div>

            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" name="umur" id="umur" min="4" max="99" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Mulai Quiz</button>
        </form>
    </div>
</body>
</html>

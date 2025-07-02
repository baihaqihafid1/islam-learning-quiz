<?php
include "db.php";

// Reset data jika tombol reset ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    $conn->query("TRUNCATE TABLE hasil_quiz");
    header("Location: grafik.php");
    exit;
}

// Ambil daftar materi
$materi_terpilih = $_GET['materi'] ?? '';
$materi_list = $conn->query("SELECT DISTINCT materi FROM hasil_quiz ORDER BY materi");

if ($materi_terpilih) {
    $stmt = $conn->prepare("SELECT nama, skor, kelas, sekolah, umur FROM hasil_quiz WHERE materi = ? ORDER BY waktu DESC LIMIT 10");
    $stmt->bind_param("s", $materi_terpilih);
    $stmt->execute();
    $data = $stmt->get_result();
} else {
    $data = $conn->query("SELECT nama, skor, kelas, sekolah, umur FROM hasil_quiz ORDER BY waktu DESC LIMIT 10");
}

$nama = [];
$skor = [];
$tooltipInfo = [];

if (!$data) {
    die("Query error: " . $conn->error);
}

while ($d = $data->fetch_assoc()) {
    $nama[] = $d['nama'];
    $skor[] = $d['skor'];
    $tooltipInfo[] = "Kelas: {$d['kelas']}, Sekolah: {$d['sekolah']}, Umur: {$d['umur']} thn";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Grafik Hasil Quiz</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #grafik-container {
            height: 450px;
        }
    </style>
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2 class="text-center mb-4 text-success">📊 Grafik Hasil Quiz</h2>

        <form method="get" class="text-center mb-3">
            <label class="me-2 fw-bold">Pilih Materi:</label>
            <select name="materi" onchange="this.form.submit()">
                <option value="">-- Semua Materi --</option>
                <?php while ($row = $materi_list->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($row['materi']) ?>" <?= $row['materi'] == $materi_terpilih ? 'selected' : '' ?>>
                        <?= ucfirst(str_replace('_', ' ', $row['materi'])) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </form>

        <div id="grafik-container">
            <canvas id="grafikHasil"></canvas>
        </div>

        <form method="post" class="mt-4 text-center">
            <button type="submit" name="reset" class="btn btn-danger" onclick="return confirm('Yakin ingin reset semua data hasil quiz?');">
                🔄 Reset Data Hasil Quiz
            </button>
        </form>

        <a href="index.php" class="btn btn-outline-success mt-3 d-block mx-auto" style="width: 220px;">
            ← Kembali ke Halaman Utama
        </a>
    </div>

    <script>
        const ctx = document.getElementById('grafikHasil').getContext('2d');
        const tooltipInfo = <?= json_encode($tooltipInfo) ?>;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($nama) ?>,
                datasets: [{
                    label: 'Skor Quiz',
                    data: <?= json_encode($skor) ?>,
                    backgroundColor: 'rgba(40, 167, 69, 0.8)',
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 14
                            }
                        },
                        title: {
                            display: true,
                            text: 'Nilai',
                            font: {
                                size: 16
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 16
                            },
                            maxRotation: 0,
                            minRotation: 0
                        },
                        title: {
                            display: true,
                            font: {
                                size: 16
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            afterLabel: function(context) {
                                return tooltipInfo[context.dataIndex];
                            }
                        }
                    },
                    legend: {
                        labels: {
                            font: {
                                size: 15
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

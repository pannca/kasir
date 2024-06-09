<?php
session_start();
$total_belanja = 0;
foreach ($_SESSION['pembelajaan'] as $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Bayar Sekarang</h2>
        </div>
        <div class="text-center mb-4">
            <p>Masukan Nominal Uang</p>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <input type="number" name="bayar" class="form-control" placeholder="Pastikan uang yang Anda masukan cukup" required>
            </div>
            <div class="text-center mb-4">
                <h3>Uang yang harus Anda bayarkan adalah <?= "Rp." . number_format($total_belanja, 0, ',', '.'); ?></h3>
            </div>
            <?php 
            if (isset($_POST['cash'])) {
                $uang = $_POST['bayar'];
                $bayar = $uang - $total_belanja;
                if ($bayar < 0) {
                    echo "<p class='text-danger text-center'>Uang anda kurang Rp. " . number_format(abs($bayar), 0, ',', '.') . " !!</p>" ;
                } else {
                    $_SESSION['kembalian'] = $bayar;
                    $_SESSION['bayar'] = $uang;
                    header("Location: bon.php");
                    exit();
                }
            }
            ?>
            <div class="text-center">
                <button type="submit" name="cash" class="btn btn-primary">Bayar</button>
            </div>
            <div class="text-center mt-3">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

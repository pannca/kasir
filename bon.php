<?php
session_start();
$total_belanja = 0;
foreach($_SESSION['pembelajaan'] as $belan => $b) {
    $total_belanja += $b['harga'] * $b['jumlah'];
    $bayar = $_SESSION['bayar'] - $total_belanja;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Bukti Pembayaran</h1>
        </div>
        <div class="row mb-3">
            <div class="col">
                <h4>No.Transaksi#<?= rand() ?></h4>
            </div>
            <div class="col text-right">
                <h4><?= date("l jS \of F Y A") ?></h4>
            </div>
        </div>
        <hr>
        <?php 
        foreach($_SESSION['pembelajaan'] as $belan => $b) :
        ?>
        <div class="row mb-2">
            <div class="col">
                <p><?= htmlspecialchars($b['barang']) ?></p>
            </div>
            <div class="col text-right">
                <p><?= "Rp. " . number_format($b['harga'], 0, ',', '.') ?></p>
            </div>
            <div class="col text-right">
                <p><b>x<?= htmlspecialchars($b['jumlah']) ?></b></p>
            </div>
        </div>
        <?php endforeach;?>
        <hr>
        <div class="row mb-2">
            <div class="col">
                <p>Uang yang di bayarkan adalah</p>
            </div>
            <div class="col text-right">
                <p>Rp. <?= number_format($_SESSION['bayar'], 0, ',', '.') ?></p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <p>Total harga</p>
            </div>
            <div class="col text-right">
                <p>Rp. <?= number_format($total_belanja, 0, ',', '.') ?></p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <p>Kembaliannya adalah</p>
            </div>
            <div class="col text-right">
                <p>Rp. <?= number_format($bayar, 0, ',', '.') ?></p>
            </div>
        </div>
        <div class="text-center">
            <p>Terima kasih telah belanja di toko <b>Makmur Sejahtera</b></p>
            <a href="index.php" class="btn btn-secondary" onclick="<?php session_destroy() ?>">Kembali</a>
            <button onclick="window.print()" class="btn btn-primary">Print</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

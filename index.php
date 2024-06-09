<?php
require_once "logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Masukan Belanjaan</h1>
        </div>
        <form action="" method="post" class="mb-4">
            <div class="form-group">
                <input type="text" name="barang" class="form-control" placeholder="Masukan Barang" required>
            </div>
            <div class="form-group">
                <input type="number" name="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $total_belanja = 0;
                $item_exists = false;
                foreach ($_SESSION['pembelajaan'] as $belan => $b) :
                    $total_belanja += $b['harga'] * $b['jumlah'];
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= htmlspecialchars($b['barang']) ?></td>
                    <td><?= "Rp." . number_format($b['harga'], 0, ',', '.') ?></td>
                    <td><?= htmlspecialchars($b['jumlah']) ?></td>
                    <td><?= "Rp." . number_format($b['harga'] * $b['jumlah'], 0, ',', '.') ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="hapus_key" value="<?= $belan ?>">
                            <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                        </form>    
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
                <tr>
                    <td colspan="5" class="text-right">Total Barang</td>
                    <td><?= count($_SESSION['pembelajaan']) ?></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">Total Belanja</td>
                    <td><?= "Rp." . number_format($total_belanja, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center">
                        <form action="" method="post">
                            <button type="submit" name="bayar" class="btn btn-success">Bayar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

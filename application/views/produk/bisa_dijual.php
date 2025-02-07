<!DOCTYPE html>
<html>
<head>
    <title>Produk Bisa Dijual</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Produk Bisa Dijual</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $p) : ?>
                <tr>
                    <td><?= $p->id_produk ?></td>
                    <td><?= $p->nama_produk ?></td>
                    <td><?= number_format($p->harga, 0, ',', '.') ?></td>
                    <td><?= $p->nama_kategori ?></td>
                    <td><?= $p->nama_status ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url('produk'); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>

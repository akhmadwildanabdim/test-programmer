<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <?= validation_errors(); ?>
    <form action="<?= site_url('produk/tambah') ?>" method="post">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" required>
        <br>
        <label>Harga:</label>
        <input type="number" name="harga" required>
        <br>
        <label>Kategori ID:</label>
        <input type="number" name="kategori_id">
        <br>
        <label>Status ID:</label>
        <input type="number" name="status_id">
        <br>
        <button type="submit">Simpan</button>
    </form>
    <a href="<?= site_url('produk') ?>">Kembali</a>
</body>
</html>

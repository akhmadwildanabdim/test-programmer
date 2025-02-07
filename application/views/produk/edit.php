<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <?= validation_errors(); ?>
    <form action="<?= site_url('produk/edit/'.$produk->id_produk) ?>" method="post">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" value="<?= $produk->nama_produk ?>" required>
        <br>
        <label>Harga:</label>
        <input type="number" name="harga" value="<?= $produk->harga ?>" required>
        <br>
        <label>Kategori ID:</label>
        <input type="number" name="kategori_id" value="<?= $produk->kategori_id ?>">
        <br>
        <label>Status ID:</label>
        <input type="number" name="status_id" value="<?= $produk->status_id ?>">
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="<?= site_url('produk') ?>">Kembali</a>
</body>
</html>

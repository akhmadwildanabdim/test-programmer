<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <script>
        function confirmDelete(url) {
            if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                window.location.href = url;
            }
        }
    </script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Produk</h2>

    <a class="btn btn-secondary"href="<?= site_url('produk/tambah') ?>">Tambah Produk</a><br>
    <a class="btn btn-secondary"href="<?= site_url('produk/bisa_dijual') ?>">Lihat Produk Bisa Dijual</a><br>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($produk as $p): ?>
        <tr>
            <td><?= $p->id_produk ?></td>
            <td><?= $p->nama_produk ?></td>
            <td><?= $p->harga ?></td>
            <td><?= $p->kategori_id ?></td>
            <td><?= $p->status_id ?></td>
            <td>
                <a class="btn btn-warning"href="<?= site_url('produk/edit/'.$p->id_produk) ?>">Edit</a>
                <a class="btn btn-danger"href="javascript:void(0)" onclick="confirmDelete('<?= site_url('produk/hapus/'.$p->id_produk) ?>')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
</head>
<body>

    <h2>Data Produk</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>

        <?php foreach ($produk as $p): ?>
        <tr>
            <td><?= $p['id_produk']; ?></td>
            <td><?= $p['nama_produk']; ?></td>
            <td><?= $p['harga']; ?></td>
            <td><?= $p['stok']; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
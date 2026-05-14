<!DOCTYPE html>
<html>
<head>

    <title>Data Pesanan</title>

    <style>

        body{
        font-family: Arial;

        background: url('/bg.gif');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;

        padding: 30px;
    }
        h2{
            text-align:center;
            color:#be185d;
        }

        table{
            width:100%;
            border-collapse: collapse;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(10px);
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        th{
            background:#ec4899;
            color:white;
            padding:15px;
        }

        td{
            padding:12px;
            border-bottom:1px solid #eee;
            vertical-align: top;
        }

        tr:hover{
            background:#fff0f5;
        }

    </style>

</head>

<body>

<h2>Data Pesanan 🛒</h2>

<table>

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Produk</th>
    <th>Total</th>
</tr>

<?php foreach($pesanan as $p): ?>

<tr>

    <td><?= $p->id ?></td>

    <td><?= $p->nama ?></td>

    <td><?= $p->alamat ?></td>

    <td>

        <?php

        $produk = json_decode($p->produk);

        if($produk){

            foreach($produk as $item){

                echo "- " . $item->title .
                " (" . $item->qty . "x)<br>";

            }

        }

        ?>

    </td>

    <td>
        Rp <?= number_format($p->total,0,',','.') ?>
    </td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>
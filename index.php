<?php
require_once "connect.php";

$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
</head>
<style>
    body{
            background-image: url(AYG.jpg);
            background-size: cover;
        }
    h1 {
        text-align: center;
        color: blueviolet;
    }           
    p {
        text-align: center;
        color: blue;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    table tr td {
        color: white; 
        padding: 10px; 
        text-align: center; 
    }
        table tr td a {
        color: #3498db;
        text-decoration: none;
        margin-right: 5px;
    }
    table tr td a:hover {
        text-decoration: underline;
    }

</style>
<body>
    <h1>Data Penjualan</h1>

    <p><a href="create.php">Tambah Produk</a></p>

    <table border="2"> 
        <tr>
            <th><span style="color: rgb(255, 255, 255);">ID</th>
            <th><span style="color: rgb(255, 255, 255);">Nama Produk</th>
            <th><span style="color: rgb(255, 255, 255);">Harga</th>
            <th><span style="color: rgb(255, 255, 255);">Stok</th>
            <th><span style="color: rgb(255, 255, 255);">Aksi</th>
        </tr>   
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nama_produk']}</td>";
            echo "<td>{$row['harga']}</td>";
            echo "<td>{$row['stok']}</td>";
            echo "<td><a href='update_form.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>


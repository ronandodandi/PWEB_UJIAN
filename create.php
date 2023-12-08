<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $sql = "INSERT INTO produk (ID, nama_produk, harga, stok) VALUES ('$ID','$nama_produk', $harga, $stok)";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<style>
    body{
        background-image: url(AYG.jpg);
        background-size: cover;
    }
    h2{
        text-align: left;
        color: white;
    }
    label {
            display: block;
            margin-bottom: 5px;
            color: white;
            text-align: left;
        }

        input {
            padding: 5px;
            margin-bottom: 5px;
            width: 20%;
            box-sizing: border-box;           
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            cursor: pointer;    
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
</style>
<body>
    <h2>Tambah Produk</h2>

    <form method="POST" action="tambah_produk.php">
        <label for="nama_produk">Nama Produk: </label>
        <input type="text" name="nama_produk" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required><br>

        <label for="stok">Stok</label>
        <input type="number" name="stok" required><br>
   
        <input type="submit" value="Tambah Produk">
    </form>
</body>
</html>
<?php
require_once "connect.php";

// Periksa apakah parameter id telah diteruskan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data produk berdasarkan ID
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Formulir untuk mengedit data
        echo "
            <h2>Edit Produk</h2>
            <form method='POST' action='update.php'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <label for='nama_produk'>Nama Produk:</label>
                <input type='text' name='nama_produk' value='{$row['nama_produk']}' required><br>
                <label for='harga'>Harga:</label>
                <input type='number' name='harga' value='{$row['harga']}' required><br>
                <label for='stok'>Stok:</label>
                <input type='number' name='stok' value='{$row['stok']}' required><br>
                <input type='submit' value='Simpan Perubahan'>
            </form>
        ";

        mysqli_free_result($result);
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak diteruskan.";
}

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
    <h2>Data Penjualan</h2>

    <a href="index.php">Tambah Produk</a>

    <table border="1">
        <tr>
            <th><span style="color: rgb(255, 255, 255);">ID</th>
            <th><span style="color: rgb(255, 255, 255);">Nama Produk</th>
            <th><span style="color: rgb(255, 255, 255);">Harga</th>
            <th><span style="color: rgb(255, 255, 255);">Stok</th>
            <th><span style="color: rgb(255, 255, 255);">Aksi</th>
        </tr>
        <?php
        // Periksa apakah parameter id telah diteruskan melalui URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Ambil data produk berdasarkan ID
            $query = "SELECT * FROM produk WHERE id = $id";
            
            // Pastikan koneksi masih terbuka sebelum menjalankan query
            if ($conn) {
                $result_detail = mysqli_query($conn, $query);

                if ($result_detail && mysqli_num_rows($result_detail) > 0) {
                    while ($row = mysqli_fetch_assoc($result_detail)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['nama_produk']}</td>";
                        echo "<td>{$row['harga']}</td>";
                        echo "<td>{$row['stok']}</td>";
                        echo "<td><a href='update_form.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Hapus</a></td>";
                        echo "</tr>";
                    }

                    mysqli_free_result($result_detail);
                } else {
                    echo "Produk tidak ditemukan.";
                }
            } else {
                echo "Koneksi MySQL tidak tersedia.";
            }
        } else {
            echo "ID produk tidak diteruskan.";
        }
        ?>
    </table>

</body>
</html>


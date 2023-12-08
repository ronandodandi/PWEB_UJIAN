CREATE DATABASE penjualan;

USE penjualan;

CREATE TABLE produk (
    id INT (11) AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255) NOT NULL,
    harga Decimal(10) NOT NULL,
    stok INT NOT NULL
);
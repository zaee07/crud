<?php
include 'config.php';

$nama  = $_POST['nama'];
$harga = $_POST['harga'];

$conn->query("INSERT INTO produk (nama, harga) VALUES ('$nama', '$harga')");

header("Location: index.php");

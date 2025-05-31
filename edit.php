<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses update data
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];

    $conn->query("UPDATE produk SET nama='$nama', harga='$harga' WHERE id=$id");

    header("Location: index.php");
    exit;
} else {
    // Tampilkan form edit
    $id = $_GET['id'];
    $data = $conn->query("SELECT * FROM produk WHERE id=$id")->fetch_assoc();
    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Edit Produk</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

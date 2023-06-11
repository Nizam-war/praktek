<?php

require "conn.php";
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Proses Tambah perpustakaan
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $penerbit = $_POST['penerbit'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $query = "INSERT INTO perpustakaan (judul, genre, penerbit) VALUES ('$judul', '$genre', '$penerbit')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container mt-3">
<h3>Tambah Data</h3>
<form method="POST" action="tambah.php">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" required>
            </div>
           
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </form>
</div>
</body>
</html>
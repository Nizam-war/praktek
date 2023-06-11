<?php
    session_start();
    require 'conn.php';

    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
        exit();
    }
    
// Proses Hapus perpustakaan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM perpustakaan WHERE id = $id";
    mysqli_query($koneksi, $query);
}

// Ambil Data perpustakaan
$query = "SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $query);
    

// Ambil username admin dari session
$admin = $_SESSION['admin'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pendaftaran perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Daftar perpustakaan</h1>
       <a href="tambah.php" class="btn btn-sm btn-primary">Tambah +</a>
       <a href="logout.php" class="btn btn-danger">Logout</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['judul']; ?></td>
                        <td><?php echo $row['genre']; ?></td>
                        <td><?php echo $row['penerbit']; ?></td>

                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?hapus=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus perpustakaan ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                 }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

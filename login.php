<?php

session_start();
include 'conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Cek kecocokan username dan password di database
    
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    echo mysqli_num_rows($result);

    if (mysqli_num_rows($result) == 1) {
        // Jika login berhasil, set session dan redirect ke halaman dashboard
        $_SESSION['admin'] = $username;
        header('Location: index.php');
        // echo mysqli_num_rows($result); 
        // $error = "Login Berhasil!";
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error
        // $error = "Username atau password salah | $username, $password"; // Versi debugging
        $error = "Username atau password salah | $username, $password"; // Normal
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-4">
        <h1>Login Admin</h1>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <a href="register.php">Belum punya akun? <b>Register</b></a>
            </div>
            <button type="submit" class="btn btn-primary" id="login" name="login">Login</button>
        </form>
    </div>
</body>
</html>

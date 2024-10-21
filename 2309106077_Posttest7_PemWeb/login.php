<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style/form.css" />
</head>

<body>
<div class="kontainer">
    <div class="box form-box">
        <?php 
        include("koneksi.php");

        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password']; 

            // Ambil data pengguna berdasarkan username
            $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'") or die("Error");
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                // Verifikasi password hash
                if (password_verify($password, $row['password'])) {
                    $_SESSION['valid'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];

                    // Arahkan ke halaman sesuai dengan peran pengguna
                    if ($row['role'] === 'Admin') {
                        header("Location: CRUD.php"); // Halaman CRUD admin
                    } else {
                        echo "
                        <script>
                            alert('Login berhasil');
                            document.location.href = 'index.html';
                        </script>";
                    }
                    exit();
                } else {
                    echo "
                    <script>
                        alert('Login gagal! Password salah.');
                        document.location.href = 'index.html';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Login gagal! Username tidak ditemukan.');
                    document.location.href = 'index.html';
                </script>";
            }
        } else {
        ?>
        <header>Login</header>
        <form action="" method="post">
            <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="field">
                <input type="submit" class="btn" name="submit" value="Login">
            </div>
            <div class="link">
                Belum punya Akun? <a href="register.php">Daftar sekarang</a>
            </div>
        </form>            
    </div>
    <?php } ?>
</div>
</body>
</html>

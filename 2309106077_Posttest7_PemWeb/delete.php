<?php
    require "koneksi.php";

    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    // Jika belum login atau bukan admin, arahkan ke index.php
    header('Location: index.html');
    exit;
    }

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM buku_novel WHERE id = $id");

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'CRUD.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'CRUD.php';
        </script>";
    }
?>
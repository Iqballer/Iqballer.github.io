<?php
    require "koneksi.php";

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
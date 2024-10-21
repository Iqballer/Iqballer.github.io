<?php
require "koneksi.php";

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
// Jika belum login atau bukan admin, arahkan ke index.php
header('Location: index.html');
exit;
}

if (isset($_POST['tambah'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $tanggal_terbit = htmlspecialchars($_POST['tanggal_terbit']);

    // Proses Upload File
    $cover = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    $cover_size = $_FILES['cover']['size'];
    $upload_dir = "uploads/";

    // Batas ukuran 2MB (2 * 1024 * 1024 byte)
    if ($cover_size > 2 * 1024 * 1024) {
        echo "
            <script>
                alert('Ukuran file terlalu besar. Maksimal 2MB!');
                document.location.href = 'CRUD.php';
            </script>";
        exit;
    }

    // Cek apakah direktori uploads ada, jika tidak, buat.
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $target_file = $upload_dir . basename($cover);

    if (move_uploaded_file($tmp_name, $target_file)) {
        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO buku_novel (judul, penulis, tanggal_terbit, cover) 
                VALUES ('$judul', '$penulis', '$tanggal_terbit', '$cover')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil menambah data buku!');
                    document.location.href = 'CRUD.php';
                </script>";
        } else {
            echo "
                <script>
                    alert('Gagal menambah data buku!');
                    document.location.href = 'CRUD.php';
                </script>";
        }
    } else {
        echo "
            <script>
                alert('Gagal mengunggah file!');
                document.location.href = 'CRUD.php';
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah data</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style/base.css" />

  <link rel="stylesheet" href="style/home.css" />

  <link rel="stylesheet" href="style/admin.css">

  <link rel="stylesheet" href="style/crud.css">
</head>

<body>

  <main class="data-mahasiswa-section">
    <h1 class="data-mahasiswa-title">
      Tambah Data Novel
    </h1>

    <div class="container">
      <a href="CRUD.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

    <div class="form-mhs">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-field">
          <label class="label-field" for="judul">Judul Novel</label>
          <input type="text" name="judul" id="judul" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="penulis">Nama Penulis</label>
          <input type="text" name="penulis" id="penulis">
        </div>
        <div class="input-field">
            <label class="label-field" for="tanggal_terbit" class="label-field">Tanggal terbit</label>
            <input type="date" name="tanggal_terbit" id="tanggal_terbit" require>
        </div>
        <div class="input-field">
            <label for="cover">Upload Cover</label>
            <input type="file" name="cover" id="cover" accept="image/*" required>
        </div>
        <input class="button" type="submit" value="Tambah" name="tambah">
      </form>

      <script>
        function validateFile() {
          const fileInput = document.getElementById('cover');
          const file = fileInput.files[0];

          if (file && file.size > 2 * 1024 * 1024) {  // 2MB dalam byte
            alert('Ukuran file tidak boleh lebih dari 2MB.');
            return false;
          }
          return true;
        }
      </script>
    </div>

  </main>


</body>

</html>
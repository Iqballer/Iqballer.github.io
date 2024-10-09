<?php
require "koneksi.php";

if (isset($_POST['tambah'])) {
  $judul = htmlspecialchars($_POST['judul']);
  $penulis = htmlspecialchars($_POST['penulis']);
  $tanggal_terbit = htmlspecialchars($_POST['tanggal_terbit']);

  $sql = "INSERT INTO buku_novel (judul, penulis, tanggal_terbit) VALUES ('$judul', '$penulis', '$tanggal_terbit')";


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
        <input class="button" type="submit" value="Tambah" name="tambah">
      </form>
    </div>

  </main>


</body>

</html>
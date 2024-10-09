<?php
    require "koneksi.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM buku_novel WHERE id = $id");
    
    $buku = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $buku[] = $row;
    }

    $buku = $buku[0];

    if (isset($_POST['ubah'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tanggal_terbit = $_POST['tanggal_terbit'];


    $sql = "UPDATE buku_novel SET judul='$judul', penulis='$penulis', tanggal_terbit='$tanggal_terbit' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'CRUD.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
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
  <title>Edit data Novel</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style/base.css" />

  <link rel="stylesheet" href="style/home.css" />

  <link rel="stylesheet" href="style/admin.css">

  <link rel="stylesheet" href="style/crud.css">
</head>

<body>

  <main class="data-mahasiswa-section">
    <h1 class="data-mahasiswa-title">
      Ubah Data Novel
    </h1>

    <div class="container">
      <a href="CRUD.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

    <div class="form-mhs">
      <form action="" method="post">
        <div class="input-field">
          <label class="label-field" for="judul">Judul Lengkap</label>
          <input type="text" name="judul" id="judul" value="<?php echo $buku['judul'] ?>" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="penulis">penulis</label>
          <input type="text" name="penulis" id="penulis" value="<?php echo $buku['penulis'] ?>" required>
        </div>
        <div class="input-field">
          <label class="label-field" for="tanggal_terbit">Tanggal terbit</label>
          <input type="date" name="tanggal_terbit" id="tanggal_terbit" value="<?php echo $buku['tanggal_terbit'] ?>" required>
        </div>
        <input class="button" type="submit" value="Ubah" name="ubah">
      </form>
    </div>

  </main>


</body>

</html>
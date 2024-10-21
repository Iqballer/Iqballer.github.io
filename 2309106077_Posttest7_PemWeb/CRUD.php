<?php
  require "koneksi.php";

  session_start();
  if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
  // Jika belum login atau bukan admin, arahkan ke index.php
  header('Location: index.html');
  exit;
  }

  $sql = mysqli_query($conn, "SELECT * FROM buku_novel");

  $buku = [];
  while ($row = mysqli_fetch_assoc($sql)) {
      $buku[] = $row;
  }

  if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = mysqli_query($conn, "SELECT * FROM buku_novel WHERE judul LIKE '%$search%' OR
    penulis LIKE '%$search%'");

    $buku = [];

    while ($row = mysqli_fetch_assoc($sql)) {
    $buku[] = $row;
    }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DATA BUKU</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style/base.css" />

  <link rel="stylesheet" href="style/home.css" />

  <link rel="stylesheet" href="style/admin.css">
</head>

<body>

  <main class="data-mahasiswa-section">
    <h1 class="title_novel">
      Data Novel
    </h1>

    <div class="container">
      <a href="tambah.php">
        <button class="tambah">
          <p>Tambah</p>
        </button>
      </a>
      <a href="logout.php">
        <button class="back">
          <p>Logout</p>
        </button>
      </a>
    </div>

    <search>
    <form action="" method="GET" class="search-bar-mahasiswa">
      <input type="text" name="search" placeholder="Cari Judul buku"
      class="search-input-mahasiswa" />
      <button type="submit" class="search-button-mahasiswa">
      <i class="fa-solid fa-magnifying-glass fa-xl"></i>
      </button>
    </form>
    </search>

    <table class="table_novel">
      <thead>
        <tr class="table-mahasiswa-row">
          <th class="table-mahasiswa-header">ID</th>
          <th class="table-mahasiswa-header">Foto</th>
          <th class="table-mahasiswa-header">Judul</th>
          <th class="table-mahasiswa-header">Penulis</th>
          <th class="table-mahasiswa-header">Tanggal Terbit</th>
        </tr>
      </thead>

      <tbody>
        <?php $i = 1; foreach($buku as $buku_novel) : ?>
          <tr class="table-mahasiswa-row">
            <td class="table-mahasiswa-data"><?php echo $i ?></td>
            <td class="table-mahasiswa-data">
            <img src="uploads/<?php echo $buku_novel['cover']; ?>" 
              alt="<?php echo $buku_novel['judul']; ?>" 
              width="80px" height="100px" style="display: block;">
            </td>
            <td class="table-mahasiswa-data"><?php echo $buku_novel['judul'] ?></td>
            <td class="table-mahasiswa-data"><?php echo $buku_novel['penulis'] ?></td>
            <td class="table-mahasiswa-data"><?php echo $buku_novel['tanggal_terbit'] ?></td>
            <td class="table-mahasiswa-data">
              <div class="button-UD">
                <a href="edit.php?id=<?php echo $buku_novel['id']?>">
                  <button class="edit-data">
                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                  </button>
                </a>
                <a href="delete.php?id=<?php echo $buku_novel['id']?>" onclick="return confirm('Yakin ingin menghapus data ini?');">
                  <button class="hapus-data">
                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                  </button>
                </a>
              </div>
            </td>
          </tr>
        <?php $i++; endforeach ?>
      </tbody>
    </table>
  </main>

</body>

</html>

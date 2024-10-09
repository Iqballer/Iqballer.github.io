<?php
  require "koneksi.php";

  $sql = mysqli_query($conn, "SELECT * FROM buku_novel");

  $buku = [];
  while ($row = mysqli_fetch_assoc($sql)) {
      $buku[] = $row;
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

      <a href="index.html">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

    <table class="table_novel">
      <thead>
        <tr class="table-mahasiswa-row">
          <th class="table-mahasiswa-header">ID</th>
          <th class="table-mahasiswa-header">Judul</th>
          <th class="table-mahasiswa-header">Penulis</th>
          <th class="table-mahasiswa-header">Tanggal Terbit</th>
        </tr>
      </thead>

      <tbody>
        <?php $i = 1; foreach($buku as $buku_novel) : ?>
          <tr class="table-mahasiswa-row">
            <td class="table-mahasiswa-data"><?php echo $i ?></td>
            <td class="table-mahasiswa-data"><?php echo $buku_novel['judul'] ?></td>
            <td class="table-mahasiswa-data"><?php echo $buku_novel['penulis'] ?></td>
            <td class="table-mahasiswa-data"><?php echo $buku_novel['tanggal_terbit'] ?></td>
            <!-- <td class="table-mahasiswa-data">
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
            </td> -->
          </tr>
        <?php $i++; endforeach ?>
      </tbody>
    </table>
  </main>

</body>

</html>

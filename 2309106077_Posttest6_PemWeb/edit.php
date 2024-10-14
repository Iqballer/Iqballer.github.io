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

    // Periksa apakah pengguna mengunggah gambar baru
    if ($_FILES['cover']['name']) {
        $namaFile = $_FILES['cover']['name'];
        $tmpName = $_FILES['cover']['tmp_name'];
        $error = $_FILES['cover']['error'];
        $size = $_FILES['cover']['size'];

        // Batasan ukuran file (contoh: 2MB)
        if ($size > 2 * 1024 * 1024) {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB.');</script>";
            exit;
        }

        // Validasi ekstensi gambar (jpg, jpeg, png)
        $extValid = ['jpg', 'jpeg', 'png'];
        $extFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        if (!in_array($extFile, $extValid)) {
            echo "<script>alert('Format file tidak didukung! (jpg, jpeg, png)');</script>";
            exit;
        }

        // Hapus gambar lama
        if (file_exists('uploads/' . $buku['cover'])) {
            unlink('uploads/' . $buku['cover']);
        }

        // Simpan gambar baru
        $namaBaru = uniqid() . '.' . $extFile;
        move_uploaded_file($tmpName, 'uploads/' . $namaBaru);

        // Update query dengan cover baru
        $sql = "UPDATE buku_novel SET judul='$judul', penulis='$penulis', tanggal_terbit='$tanggal_terbit', cover='$namaBaru' WHERE id=$id";
    } else {
        // Jika tidak ada gambar baru, hanya update data lainnya
        $sql = "UPDATE buku_novel SET judul='$judul', penulis='$penulis', tanggal_terbit='$tanggal_terbit' WHERE id=$id";
    }

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="style/base.css" />
    <link rel="stylesheet" href="style/home.css" />
    <link rel="stylesheet" href="style/admin.css" />
    <link rel="stylesheet" href="style/crud.css" />
</head>

<body>

<main class="data-mahasiswa-section">
    <h1 class="data-mahasiswa-title">Ubah Data Novel</h1>

    <div class="container">
        <a href="CRUD.php">
            <button class="back"><p>Back</p></button>
        </a>
    </div>

    <div class="form-mhs">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-field">
                <label class="label-field" for="judul">Judul Lengkap</label>
                <input type="text" name="judul" id="judul" value="<?php echo $buku['judul']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="penulis">Penulis</label>
                <input type="text" name="penulis" id="penulis" value="<?php echo $buku['penulis']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="tanggal_terbit">Tanggal Terbit</label>
                <input type="date" name="tanggal_terbit" id="tanggal_terbit" value="<?php echo $buku['tanggal_terbit']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="cover">Cover Buku (Optional)</label>
                <input type="file" name="cover" id="cover" accept=".jpg, .jpeg, .png">
            </div>
            <input class="button" type="submit" value="Ubah" name="ubah">
        </form>
    </div>

</main>

</body>

</html>

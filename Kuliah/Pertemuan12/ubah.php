<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location: login.php');
}

require 'functions.php';
// Jika tidak ada id URL
if (!isset($_GET['id'])) {
  header("location: index.php");
  exit;
}
// Ambil data dari URL
$id = $_GET['id'];
// Query mahasiswa berdasarkan id
$mhs = Query("select * from mahasiswa where id = $id");
// Apakah tombol ubah sudah di tekan?
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
    alert('data berhasil diubah!')
    document.location.href ='index.php'
    </script>";
  } else {
    echo "Data gagal diubah!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $mhs['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          NPM :
          <input type="text" name="npm" required value="<?= $mhs['npm']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="text" name="email" required value="<?= $mhs['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required value="<?= $mhs['jurusan']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar
          <input type="text" name="gambar" required value="<?= $mhs['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">ubah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>
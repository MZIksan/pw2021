<?php
// Koneksi ke database & pilih database
$conn = mysqli_connect('localhost', 'root', '', 'pw_2020');
// Query isi tabel mahasiswa
$result = mysqli_query($conn, "select * from mahasiswa");
// Ubah data kedalam bentuk array
// $row = mysqli_fetch_row($result); // Array Numerik
// $row = mysqli_fetch_assoc($result); // Array Associative
// $row = mysqli_fetch_array($result); // Array Numerik & Array Associative
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

// Tampung ke variable mahasiswa
$mahasiswa = $rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NPM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="image/<?= $mhs['gambar']; ?>" width="60"></td>
        <td><?= $mhs['npm']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['email']; ?></td>
        <td><?= $mhs['jurusan']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
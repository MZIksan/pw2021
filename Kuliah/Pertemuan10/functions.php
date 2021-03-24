<?php
function Koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_2020');
}

function Query($query)
{
  $conn = Koneksi();
  $result = mysqli_query($conn, $query);
  // Jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function Tambah($data)
{
  $conn = Koneksi();

  $nama = htmlspecialchars($data['nama']);
  $npm = htmlspecialchars($data['npm']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "insert into mahasiswa values (null, '$nama','$npm','$email','$jurusan','$gambar')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

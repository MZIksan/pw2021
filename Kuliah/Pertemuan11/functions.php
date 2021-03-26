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
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function Hapus($id)
{
  $conn = Koneksi();
  mysqli_query($conn, "delete from mahasiswa where id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function Ubah($data)
{
  $conn = Koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $npm = htmlspecialchars($data['npm']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "update mahasiswa set nama='$nama', npm='$npm', email='$email', jurusan='$jurusan', gambar='$gambar' where id=$id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = Koneksi();
  $query = "select * from mahasiswa where nama like '%$keyword%' or npm like '%$keyword%' ";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

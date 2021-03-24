<?php
require 'functions.php';
// Jika tidak ada id URL
if (!isset($_GET['id'])) {
  header("location: index.php");
  exit;
}
// Mengambil id dari URL
$id = $_GET['id'];
if (Hapus($id) > 0) {
  echo "<script>
  alert('data berhasil dihapus!')
  document.location.href ='index.php'
  </script>";
} else {
  echo "Data gagal dihapus!";
}

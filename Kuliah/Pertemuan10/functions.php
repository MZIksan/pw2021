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

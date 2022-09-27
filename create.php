<?php
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

if(!$koneksi){
  die("Gagal terhubung dengan database : " . mysqli_connect_error());
}

$jenisproduk = $_POST['jenis_produk'];
$kategori = $_POST['kategori'];
$namaproduk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$catatan = $_POST['catatan'];


$query = "INSERT INTO `menu_costumer` (`id_menu`, `jenis_produk`, `kategori`, `nama_produk`, `harga`, `catatan`) VALUES (NULL, \'$jenisproduk\', \'$kategori\', \'$namaproduk\', \'$harga\', \'$catatan\');";


mysqli_query($koneksi, $query);

// if (isset($_POST["submit"])){
//   header('Location: read.php');
//   exit;
// }
?>
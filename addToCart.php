<?php
$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

if(!$koneksi){
  die("Gagal terhubung dengan database : " . mysqli_connect_error());
}

$id_customer = $_POST["id_customer"];
$id_menu = $_POST["id_menu"];
$nama_produk = $_POST["nama_produk"];
$src_gambar = $_POST["src_gambar"];
$jumlah_pesanan = $_POST["jumlah_pesanan"];
$harga = $_POST["harga"];
$total_pesanan = $_POST["total_pesanan"];
$total_harga = $_POST["total_harga"];
$catatan = $_POST["catatan"];
$rating = $_POST["rating"];
$tanggal = $_POST["tanggal"];
$waktu = $_POST["submit"];

$query = "INSERT INTO `membeli` (`id_customer`, `id_menu`, `nama_produk`, `src_gambar`, `jumlah_pesanan`, `harga`, `total_pesanan`, `total_harga`, `catatan`, `rating`, `tanggal`, `waktu`) VALUES ('$id_customer', '$id_menu', '$nama_produk', '$src_gambar', '$jumlah_pesanan', '$harga', '$total_pesanan', '$total_harga', '$catatan', '$rating', '$tanggal', '$waktu');";

$saved = mysqli_query($koneksi, $query);

if ($saved){
  echo '
  <script> 
  alert("Pesanan telah ditambahkan ke keranjang!");
  document.location.href = "index.php";
  </script>

  ';
  exit;
} else {
  echo '
  <script> alert("Pesanan gagal ditambahkan ke keranjang..")</script>
  ';
  exit;
}
?>
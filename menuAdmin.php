<?php
  session_start();
  if(!isset($_SESSION['session_username'])){
    header("location: login.php");
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menu Bobaho</title>

    <style>
      button{
        position: right;
      }
    </style>

  </head>
  <body align="">
    <button onClick="window.location = 'logout.php'">Logout</button>
    <h1>Kategori Makanan</h1>
    <h2>Best Seller</h2>
    <table border = 1 cellpadding = 10 cellspacing = 0>
      <tr>
        <th>No</th>
        <th>Nama Merek</th>
        <th>Warna</th>
        <th>Jumlah</th>
        <th colspan = 2>Tindakan</th> 
      </tr> 

      <?php $y = 1; ?>
      <?php foreach($statistik as $data) : ?>
      <tr>
        <td><?php echo $data["no"]; ?></td>
        <td><?php echo $data["nama_merek"]; ?></td>
        <td><?php echo $data["warna"]; ?></td>
        <td><?php echo $data["jumlah"]; ?></td>
        <td> <a href="update.php?no=<?php echo $data["no"]; ?>">Ubah</a> </td>
        <td> <a href="delete.php?no=<?php echo $data["no"]; ?>" onclick="confirm('Makan bro?')" >Hapus</a> </td>
      </tr>
      <?php $y++; ?>
      <?php endforeach; ?>
    </table>
    <br>
    <p>Total Data Barang = <?php echo ($y - 1); ?></p>

    <br>



    <!-- <form class="" action="CRUD/create.php" method="post">
      <label for="">Nama Merek</label>
      <input type="text" name="nama_merek"> <br>
      <label for="">Warna</label>
      <input type="text" name="warna"> <br>
      <label for="">Jumlah</label>
      <input type="text" name="jumlah"> <br>
      <button type="submit" name="submit">Submit</button>
    </form>
    <br> -->
    <a href="CRUD/read.php">Lihat hasil semua data Barang</a>
  </body>
</html>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "Toko");
$statistik = query("SELECT * FROM Barang");

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kumpulan Data Barang</title>
  </head>
  <body>
    <h1 align="center">Kumpulan Data Barang</h1>
    <p>Berikut kumpulan data barang yang terdapat di Database Toko<p>
    <table border = 1 cellpadding = 10 cellspacing = 0>
      <tr>
        <th>No</th>
        <th>Nama Merek</th>
        <th>Warna</th>
        <th>Jumlah</th>
        <th colspan = 2>Tindakan</th> 
      </tr> 

      <?php $y = 1; ?>
      <?php foreach($statistik as $data) : ?>
      <tr>
        <td><?php echo $data["no"]; ?></td>
        <td><?php echo $data["nama_merek"]; ?></td>
        <td><?php echo $data["warna"]; ?></td>
        <td><?php echo $data["jumlah"]; ?></td>
        <td> <a href="update.php?no=<?php echo $data["no"]; ?>">Ubah</a> </td>
        <td> <a href="delete.php?no=<?php echo $data["no"]; ?>" onclick="confirm('Makan bro?')" >Hapus</a> </td>
      </tr>
      <?php $y++; ?>
      <?php endforeach; ?>
    </table>
    <br>
    <p>Total Data Barang = <?php echo ($y - 1); ?></p>
    <br>
    <a href="/Toko/index.php">Isi Data Barang</a>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bobaho</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="menuUtama.css?v=0.0.1">
    
</head>
<body>
    <!-- Navbar -->
<header>
  <nav class="navbar navbar-expand-lg fixed-top bg-green">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Boba and Tea</a>
      <img src="aset boba/logo bobaho.png" alt="tidak tersedia" width=25%>
    
        <form class="d-flex" role="search" >
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="wrapper-scroll">
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">Best&nbsp;Seller</button><br>
          </div>
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">New&nbsp;Series</button><br>
          </div>
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">Coffee</button>
          </div>
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">Fruit&nbsp;&&nbsp;Smothies</button>
          </div>
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">Yakult</button>
          </div>
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">Mocktail</button>
          </div>
          <div class="wrapper-item">
            <button type="button" class="btn btn-primary">Tea&nbsp;Series</button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- Close Navbar -->

<main>
<h2 align="center" height="40%" class="textt">Best Seller</h2>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- looping php -->
      <?php
        $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");
        $sql = "SELECT * FROM menu_costumer";
        $result = mysqli_query($koneksi ,$sql);
        $counter = 1;
        while($row = mysqli_fetch_array($result)) {
      ?>
      <div class="carousel-item <? if($counter <=1){ echo "active";} ?> ">
        <div class="card" style="width: 10rem;">
            <img src="aset boba/1x/<?php echo $row["src_gambar"]; ?>" class="card-img-top" alt="..." width="100%">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["namaproduk"]; ?></h5>
              <p class="card-text"><?php echo $row["harga"]; ?></p>
              <button type="button" class="btn btn-light" onclick="decrement<?php echo $row['js_btn'];?>()">-</button>
              <span id="valueDisplay<?php echo $row['js_btn'];?>" class="box">0</span>
              <button type="button" class="btn btn-light" onclick="increment<?php echo $row['js_btn'];?>()">+</button>
              <script>
                let count<?php echo $row['js_btn'];?> = 0;
                const valueDisplay<?php echo $row['js_btn'];?> = document.getElementById("valueDisplay<?php echo $row['js_btn'];?>");
                increment<?php echo $row['js_btn'];?>();
                decrement<?php echo $row['js_btn'];?>();
              </script>
            </div>
          </div>
          <br>
          <p class="fst-italic" align="center">Rasa:<br> <?php echo $row["catatan"]?></p>
      </div>
      <?php $counter++; }?>
      <!-- end of looping php -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</main>

<footer>
  <nav class="navbar navbar-expand-lg fixed-bottom bg-green">
    <div class="container-fluid" style="
                                        padding-right: 0;
                                        padding-left: 0;">
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="25%" viewBox="0 0 30 30">
            <path fill="#000000" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
         </svg>
        </button>
        <!-- btn add to cart -->
        <button type="button" class="btn btn-warning" onclick="document.location.href = 'Topping.html'">
          <svg xmlns="http://www.w3.org/2000/svg" width="25%" viewBox="0 0 30 30">
            <path fill="#000000" d="M10 0V4H8L12 8L16 4H14V0M1 2V4H3L6.6 11.6L5.2 14C5.1 14.3 5 14.6 5 15C5 16.1 5.9 17 7 17H19V15H7.4C7.3 15 7.2 14.9 7.2 14.8V14.7L8.1 13H15.5C16.2 13 16.9 12.6 17.2 12L21.1 5L19.4 4L15.5 11H8.5L4.3 2M7 18C5.9 18 5 18.9 5 20S5.9 22 7 22 9 21.1 9 20 8.1 18 7 18M17 18C15.9 18 15 18.9 15 20S15.9 22 17 22 19 21.1 19 20 18.1 18 17 18Z" />
         </svg>
        </button>
      </div>  
    </div>
  </nav>
</footer>

<!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" 
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<!-- fungsi Button -->
  <script src="button.js"></script>
</body>
</html>

<?php
  session_start();
  date_default_timezone_set("Asia/Jakarta");
  if(!isset($_SESSION['session_username'])){
    header("location: login.php");
  } 
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");
    $sesUnCus = $_SESSION['session_username'];
    $qry = "SELECT id_customer FROM customer WHERE nama_customer = '$sesUnCus';";
    $sqlIdCus = mysqli_query($koneksi, $qry);
    $idCustomer = mysqli_fetch_array($sqlIdCus);
?>
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
    <link rel="stylesheet" href="menuUtama.css">
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
<h2 align="center" height="40%" class="textt">Menu</h2>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- looping php -->
      <?php
        $sql = "SELECT * FROM menu_costumer";
        $result = mysqli_query($koneksi ,$sql);
        $counter = 1;
        while($row = mysqli_fetch_array($result)) {
      ?>
      <div class="carousel-item <?php if($counter <=1){ echo "active";} ?> ">
        <div class="card" style="width: 10rem;">
            <img src="aset boba/1x/<?php echo $row["src_gambar"]; ?>" class="card-img-top" alt="..." width="100%">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["namaproduk"]; ?></h5>
              <p class="card-text"><?php echo $row["harga"]; ?></p>

              <button id='increment<?php $row['id_menu'];?>' aria-hidden="true" tabIndex="0">+</button>
              <input class="input" id="input<?php $row['id_menu'];?>" type="number" value="1" aria-valuemin="1" autocomplete="off" aria-valuemax="100" aria-valuenow="1" tabIndex="0">
              <button id='decrement<?php $row['id_menu'];?>' aria-hidden="true" tabIndex="0">-</button>
              
              <script>
              /** @type {!Element} The input element. */
      let inputEl<?php $row['id_menu'];?>;
      /** @type {!Element} The button up element. */
      let incrementButtonEl<?php $row['id_menu'];?>;
      /** @type {!Element} The button down element. */
      let decrementButtonEl<?php $row['id_menu'];?>;

      /** @type {number} The value as a number. */
      let valueNumber<?php $row['id_menu'];?>;
      /** @type {string} The string value of the input. */
      let valueText<?php $row['id_menu'];?>;

      /** @type {number} Constant representing aria-valuemax. */
      let MIN_VALUE<?php $row['id_menu'];?>;
      /** @type {number} Constant representing aria-valuemin. */
      let MAX_VALUE<?php $row['id_menu'];?>;
      /** @type {number} Constant representing the initial aria-valuenow. */
      let INITIAL_VALUE<?php $row['id_menu'];?>;
      /** @type {number} Constant representing increment/decrement size. */
      let STEP_SIZE<?php $row['id_menu'];?>;

      function init() {
        inputEl<?php $row['id_menu'];?> = document.getElementById('input<?php $row['id_menu'];?>');
        incrementButtonEl<?php $row['id_menu'];?> = document.getElementById('increment<?php $row['id_menu'];?>');
        decrementButtonEl<?php $row['id_menu'];?> = document.getElementById('decrement<?php $row['id_menu'];?>');
        MIN_VALUE<?php $row['id_menu'];?> = Number(inputEl<?php $row['id_menu'];?>.getAttribute('aria-valuemin'));
        MAX_VALUE<?php $row['id_menu'];?> = Number(inputEl<?php $row['id_menu'];?>.getAttribute('aria-valuemax'));
        valueNumber<?php $row['id_menu'];?> = Number(inputEl<?php $row['id_menu'];?>.getAttribute('aria-valuenow'));
        valueText<?php $row['id_menu'];?> = inputEl<?php $row['id_menu'];?>.value;
        INITIAL_VALUE<?php $row['id_menu'];?> = valueNumber<?php $row['id_menu'];?>;
        STEP_SIZE<?php $row['id_menu'];?> = 1;
        setEventListeners();
      }

      function setEventListeners() {
        inputEl<?php $row['id_menu'];?>.addEventListener('input', handleInputInput, false);
        inputEl<?php $row['id_menu'];?>.addEventListener('keydown', handleInputKeyDown, false);
        incrementButtonEl<?php $row['id_menu'];?>.addEventListener('click', handleIncrementButtonClick, false);
        decrementButtonEl<?php $row['id_menu'];?>.addEventListener('click', handleDecrementButtonClick, false);
      }

      function handleIncrementButtonClick(e) {
        increment();
        inputEl<?php $row['id_menu'];?>.focus();
      }


      function handleDecrementButtonClick(e) {0
        decrement();
        inputEl<?php $row['id_menu'];?>.focus();
      }

      /**
      * Sets input field to default upon blur of the empty input.
      * Sets value to default if value is no longer valid.
      * Otherwise truncates value and updates aria-valuenow.
      * @param {!Event} e
      */
      function handleInputInput(e) {
        if (!input.value || input.value === '-' || input.value === '.') {
          // clear the value.
          inputEl<?php $row['id_menu'];?>.setAttribute('aria-valuenow', '');
          valueNumber<?php $row['id_menu'];?> = null;
          valueText<?php $row['id_menu'];?> = input.value;
          return;
        }
        let newValueNumber<?php $row['id_menu'];?> = Number(input.value);
        if (isNaN(newValueNumber<?php $row['id_menu'];?>)) {
          input.value = valueText<?php $row['id_menu'];?>;
        } else {
          // Note that this will set an invalid aria-valuenow.
          // Bug tracking how and when to modify aria-valuenow:
          // https://github.com/w3c/aria-practices/issues/704
          setValue(newValueNumber<?php $row['id_menu'];?>);
        }
      }

      /**
      * Switch that handles all valid non-numerical key downs.
      * @param {!Event} e
      */
      function handleInputKeyDown(e) {
        switch (e.key) {
          case 'ArrowUp':
            increment();
            break;
          case 'ArrowDown':
            decrement();
            break;
          case 'Home':
            setValue(MIN_VALUE<?php $row['id_menu'];?>);
            break;
          case 'End':
            setValue(MAX_VALUE<?php $row['id_menu'];?>);
            break;
          default:
            return;
        }
        e.preventDefault();
        e.stopPropagation();
      }

      // add jsdoc
      function increment() {
        if (valueNumber<?php $row['id_menu'];?> >= MAX_VALUE<?php $row['id_menu'];?>) {
          setValue(MAX_VALUE<?php $row['id_menu'];?>);
        } else if (valueNumber<?php $row['id_menu'];?> < MIN_VALUE<?php $row['id_menu'];?>) {
          setValue(MIN_VALUE<?php $row['id_menu'];?>);
        } else {
          setValue(valueNumber<?php $row['id_menu'];?> + STEP_SIZE<?php $row['id_menu'];?>)
        }
      }

      // add jsdoc
      function decrement() {
        if (valueNumber<?php $row['id_menu'];?> <= MIN_VALUE<?php $row['id_menu'];?>) {
          setValue(MIN_VALUE<?php $row['id_menu'];?>);
        } else if (valueNumber<?php $row['id_menu'];?> > MAX_VALUE<?php $row['id_menu'];?>) {
          setValue(MAX_VALUE<?php $row['id_menu'];?>);
        } else {
          setValue(valueNumber<?php $row['id_menu'];?> - STEP_SIZE<?php $row['id_menu'];?>)
        }
      }

      /**
      * Sets value property and aria-valuenow attribute together.
      * @param {number} newValue
      */
      function setValue(newValue) {
        inputEl<?php $row['id_menu'];?>.value = newValue;
        inputEl<?php $row['id_menu'];?>.setAttribute('aria-valuenow', newValue);
        valueNumber<?php $row['id_menu'];?> = newValue;
        valueText<?php $row['id_menu'];?> = inputEl<?php $row['id_menu'];?>.value;
      }


      window.addEventListener('load', init, false);
              </script>
              <!-- <span id="valueDisplay" class="box">1</span> -->
              
              <?php
              echo '
              <form action="addToCart.php" method="post">
              <input type="hidden" name="id_customer" value="'.$idCustomer['id_customer'].'">
              <input type="hidden" name="id_menu" value="'.$row['id_menu'].'">
              <input type="hidden" name="jumlah_pesanan" value = "" >
              <input type="hidden" name="harga" value="'.$row['harga'].'">
              <input type="hidden" name="total_pesanan" value="4">
              <input type="hidden" name="total_harga" value="Rp 56.000">
              <input type="hidden" name="catatan" value="Apa itu gulaaa">
              <input type="hidden" name="tanggal" value='.date('d-m-Y').'>
              <button type="submit" name="submit" value='.date('H:i:s').' style="display:flex; margin:auto; margin-top:10px; padding:0px 10px;">Pesan!</button>
              </form>';
              ?>
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
    <div class="container-fluid" style="padding-right: 0; padding-left: 0;">
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="25%" viewBox="0 0 30 30">
            <path fill="#000000" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
         </svg>
        </button>
        <!-- btn Lihat Keranjang -->
        <button type="button" class="btn btn-warning" onclick="document.location.href = 'Topping.php'">
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
</body>
</html>
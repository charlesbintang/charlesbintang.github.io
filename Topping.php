<?php
    session_start();
    //hapus error reporting ketika debugging. Jangan hapus jika tidak debugging
    //error_reporting(0);
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
    <link rel="stylesheet" href="Topping.css">
    
</head>
<body>
    <!-- Navbar -->
<header>
  <nav class="navbar navbar-expand-lg fixed-top bg-green">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Boba and Tea</a>
      <img src="aset boba/logo bobaho.png" alt="tidak tersedia" width="25%" onclick="document.location.href ='index.php'">
    </div>
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary" style="width: 80px; border-top-width: 0; padding-top: 0; padding-bottom: 0;" onclick="document.location.href= 'index.php'">
            <svg xmlns="http://www.w3.org/2000/svg" width="80%" viewBox="0 0 24 24">
                <path fill="#fff" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z"></path>
            </svg>
            <path fill="#000000" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
         </svg>
        </button>
    </div>
    <div class="container-fluid">
        <div class="pengenbuatline">&nbsp;</div>
    </div>
  </nav>
</header>
     <!-- Close Navbar -->

     <!-- Boba -->
<main class="container">
    <?php
    // looping php, dibeli
    $sql = "SELECT * FROM membeli WHERE id_customer = '$idCustomer[id_customer]'; ";
    $result = mysqli_query($koneksi ,$sql);
    $counter = 1;
    while($row = mysqli_fetch_array($result)) {
    ?>
    <table class="table">
        <tr>
            <td rowspan="2" style="width: 35%;" align="center">
                <img src="aset boba/1x/<?php echo $row["src_gambar"]; ?>" alt="..." width="50%">        
            </td>
            <td rowspan="2" class="boba"> <h6><?php echo $row["nama_produk"]; ?></h6> <img src="aset boba/bintang.png" alt="..." class="bintang">&nbsp;<?php echo $row["rating"]; ?></td>
            <td><br>
                <span class="box">Rp&nbsp;<?php echo $row["harga"]; ?>.000</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"><p>
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Topping
                <svg xmlns="http://www.w3.org/2000/svg" width="7%" viewBox="0 0 24 24" style="margin: auto;">
                    <path fill="#b2b3b4" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                </svg>
                </button>
            </p>
                <div class="collapse" id="collapseExample">
                    <!-- Topping -->
                <!-- Tanpa Topping -->
                    <table class="table">
                        <tr>
                            <td colspan="8">Tanpa Topping:</td>
                        </tr>
                        <tr align="center">
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                </label>
                                </div>
                            </td>
                        <tr>
                            <td colspan="8">Topping:</td>
                        </tr>
                        <!-- Bonus Topping  -->
                        <tr align="center">
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                            <td style="padding-left:2%; padding-right: 2%;">
                                <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <div class="vertical"></div>
                    
                        <tr align="center">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                                </tr>
                                <!-- Extra Topping -->
                        <td colspan="8"> Extra Topping: +2K/Topping</td>
                            </tr>
                            <tr align="center">
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    </label>
                                    </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                    </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                </td>
                                <td style="padding-left:2%; padding-right: 2%;">
                                    <div class="form-check" style="padding-left: 80%; ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        </label>
                                        </div>
                                </td>
                            </tr>
                            <div class="vertical"></div>
                        
                            <tr align="center">
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                            </tr>   
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <?php $counter++; } 
    // end of looping, dibeli?>
    <!-- Close Boba -->
</main>


<footer>
    <nav class="navbar navbar-expand-lg fixed-bottom bg-green" style="padding-bottom: 0;">
      <div class="container-fluid" style="
                                          padding-right: 0;
                                          padding-left: 0;
                                          padding-bottom:0;">
            <button type="button" class="btn btn-warning" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Bayar Sekarang <br> <h4>Total pembayaran</h4></button>
        </div>  
      </div>
    </nav>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
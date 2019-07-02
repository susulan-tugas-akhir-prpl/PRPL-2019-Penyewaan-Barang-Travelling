<?php
  include '../dbconnect.php';
  include 'product.php';  
  include 'support.php';
?>


<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/body.css">
  <title>Alat Kemah</title>
  <div id="kepala1" class="shadow-sm py-1 sticky-top " >
    <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand a" href="../index.php">Mlaku.co</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse sticky" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto pl-2">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="../pencariandatapesan.php">Search Order</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="alatkemah.php">Alat Kemah</a>
                    <a class="dropdown-item" href="alathiking.php">Alat Hiking</a>
                    <a class="dropdown-item" href="pakaiantravelling.php">Pakaian Travelling</a>
                </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About Us</a>
                </li>
            </ul>
            <!-- copas ini pak -->
            <a class="nav-link my-2 my-lg-0 ml-5" href="../login.php">Sign in for Admin</a>
            <form class="form-inline my-2 my-lg-0" method="GET" action="../pencarian.php">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" onkeyup="this.value = this.value.toLowerCase();"> 
        <!--      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>-->
            
            </form>
            <!-- sampai sini, ganti aja yang sebelumnya. -->
        </div>
    </nav>
</div>
</head>

<body class="bg2">
<?php
    $query=mysqli_query($konek, 
    "SELECT i.id_bar as 'id_bar', i.nama_bar as 'nama_bar', i.harga as 'harga', f.nama_foto as 'nama_foto' 
    FROM itemproduk i, fotoproduk f 
    WHERE f.id_foto=i.id_foto 
    AND i.kategori LIKE '%kemah%'");
    // var_dump($query); die();
  ?>

  <div class="container">
    <div class="row justify-content-md-center">
      <?php //for ($i=0; $i < $jumlah; $i++) { 
        foreach($query as $item){
        //if ($i == "3" or $i=="5" or $i == "6" or $i == "7") {
       ?>
        <div class="col product">
          <div class="card" style="width: 14rem;">
            <?= "<img src='../img/images/".$item['nama_foto']."' class='card-img-top thumbnail'>" ?>
            <div class="card-body">
              <center>
                <h5 class="card-title"><div style="font-size:20px; "><?= $item['nama_bar'], "</div></br> Rp", number_format($item ['harga']) , ",-"?> / 24 Jam</h5>
                <a href="../transaction/cart.php?id_bar=<?=$item['id_bar']?>" class="btn btn-primary"><i class="material-icons">add_shopping_cart</i></a>
              </center>
            </div>
          </div>
        </div>
      <?php //} 
      }?>
    </div>
  </div>
</body>
</html>
<?php
  include 'dbconnect.php';
  $search=$_GET['search'];
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Hasil Pencarian</title>

   <div>
        <nav>
            <a href="index.php">Mlaku.co</a>
            <div>
                <ul>
                    <li>
                        <a href="pencariandatapesan.php">Search Order</a>
                    </li>
                    <li>
                        <a href="#">
                        Categories
                        </a>
                    <div> <!-- dropdown -->
                        <a href="./categories/alatkemah.php">Alat Kemah</a>
                        <a href="./categories/alathiking.php">Alat Hiking</a>
                        <a href="./categories/pakaiantravelling.php">Pakaian Travelling</a>
                    </div>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                </ul>
                <!-- copas ini pak -->
                <a href="login.php">Sign in for Admin</a>
                <form method="GET" action="pencarian.php">
                    <input type="text" name="search" onkeyup="this.value = this.value.toLowerCase();"> 
                </form>
                <!-- sampai sini, ganti aja yang sebelumnya. -->
            </div>
        </nav>
    </div>
</head>

<body>
  <!-- <div class="jumbotron jumbotron-fluid alhamdulillah2"> -->

    <?php
      $data=mysqli_query($konek, "SELECT i.id_bar as 'id_bar', i.nama_bar as 'nama_bar', i.harga as 'harga', f.nama_foto as 'nama_foto' FROM itemproduk i, fotoproduk f WHERE f.id_foto=i.id_foto AND i.nama_bar LIKE '%$search%'");
    ?>

  <div>
    <div>
    <?php while($sql= mysqli_fetch_array($data)){ ?>
      <!-- <div class="card" style="width: 18rem;"> -->
      <div>
        <?= "<img src='./img/images/".$sql['nama_foto']."'>" ?>

        <center>
          <h5 class="card-title"><div style="font-size:20px; "><?= $sql['nama_bar'], "</div></br> Rp", number_format($sql ['harga']) , ",-"?> / 24 Jam</h5>
          <a href="./transaction/cart.php?id_bar=<?=$sql['id_bar']?>" class="btn btn-primary"><i class="material-icons">add_shopping_cart</i></a>
        </center>
       </div> <br>
    <?php } ?>

  </div>  
</body>
</html>
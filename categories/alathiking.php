<?php
  include '../dbconnect.php';
  include 'product.php';  
?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Alat Hiking</title>
  <div>
    <nav>
        <a href="../index.php">Mlaku.co</a>
        <div>
            <ul>
                <li>
                    <a href="../pencariandatapesan.php">Search Order</a>
                </li>
                <li>
                    <a href="#">
                    Categories
                    </a>
                <div> <!-- dropdown -->
                    <a href="alatkemah.php">Alat Kemah</a>
                    <a href="alathiking.php">Alat Hiking</a>
                    <a href="pakaiantravelling.php">Pakaian Travelling</a>
                </div>
                </li>
                <li>
                    <a href="../about.php">About Us</a>
                </li>
            </ul>
            <!-- copas ini pak -->
            <a href="../login.php">Sign in for Admin</a>
            <form method="GET" action="pencarian.php">
                <input type="text" name="search" onkeyup="this.value = this.value.toLowerCase();"> 
            </form>
            <!-- sampai sini, ganti aja yang sebelumnya. -->
        </div>
    </nav>
  </div>
</head>

<body>

  <?php
    $query=mysqli_query($konek, 
    "SELECT i.id_bar as 'id_bar', i.nama_bar as 'nama_bar', i.harga as 'harga', f.nama_foto as 'nama_foto' 
    FROM itemproduk i, fotoproduk f 
    WHERE f.id_foto=i.id_foto 
    AND i.kategori LIKE '%hiking%'");
    // var_dump($query); die();
  ?>

  <div>
    <?php //for ($i=0; $i < $jumlah; $i++) { 
      foreach($query as $item){
      //if ($i == "3" or $i=="5" or $i == "6" or $i == "7") {
      ?>
    <div>
      <center>
        <h5><div style="font-size:20px; "><?= $item['nama_bar'], "</div></br> Rp", number_format($item ['harga']) , ",-"?> / 24 Jam</h5>
        <a href="../transaction/cart.php?id_bar=<?=$item['id_bar']?>"><i>add_shopping_cart</i></a>
      </center>
    </div>
    <?php //} 
    }?>

  </div>
</body>
</html>
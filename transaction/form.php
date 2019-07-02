<?php
  session_start();
  include '../dbconnect.php';
  $s=$_SESSION['s'];
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Form Data Pelanggan</title>
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
                        <a href="../categories/alatkemah.php">Alat Kemah</a>
                        <a href="../categories/alathiking.php">Alat Hiking</a>
                        <a href="../categories/pakaiantravelling.php">Pakaian Travelling</a>
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
            <!--      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>-->
                
                </form>
                <!-- sampai sini, ganti aja yang sebelumnya. -->
            </div>
        </nav>
    </div>
</head>

<body>
  <form method="GET" action="upload.php">
    <div class="jumbotron jumbotron-fluid alhamdulillah2">
      <div class="containerform">
          <div class="form-group">
          
              <label for="email">E-mail</label>
              <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Masukkan E-mail" required oninvalid="this.setCustomValidity('E-mail wajib diisi!')" oninput="setCustomValidity('')">
              <br>
              <label for="text">Nama Lengkap</label>
              <input type="text" class="form-control" name="namalengkap" placeholder="Masukkan Nama Lengkap" required oninvalid="this.setCustomValidity('Nama lengkap wajib diisi!')" oninput="setCustomValidity('')">
              <br>

              <label for="id">ID Pelanggan (KTP/SIM)</label>
              <input type="text" class="form-control" name="id" placeholder="Masukkan ID" required oninvalid="this.setCustomValidity('ID wajib diisi!')" oninput="setCustomValidity('')">
              <br>

              <label for="lamasewa">Lama Penyewaan (hari)</label>
              <input type="number" min=1 class="form-control" name="lamasewa" placeholder="Masukkan Lama Penyewaan" required oninvalid="this.setCustomValidity('Lama penyewaan wajib diisi!')" oninput="setCustomValidity('')">
              <br>
              
              <label for="tanggalpsn">Tanggal Pesan</label>
              <input type="date" class="form-control" name="tanggalpsn" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" required oninvalid="this.setCustomValidity('Tanggal wajib diisi!')" oninput="setCustomValidity('')">

              
              <!-- <input type="hidden" name="kodebar" value="
              "> -->
          </div>
              
          <input type="submit" value="Next" class="btn btn-primary">

      </div> 
    </div>
    <?php
      $cart = unserialize(serialize($_SESSION['cart']));
      $_SESSION['cart']=$cart;
      $_SESSION['s']=$s;
    ?>
  </form>

  <!-- <div class="buttonnext"> -->
  <!-- <a href="alathiking2.php"><button type="button" class="btn btn-success">Next</button></a> -->
  <!-- </div> -->
</body>
</html>


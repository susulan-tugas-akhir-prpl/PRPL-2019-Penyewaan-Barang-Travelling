<?php include 'support.php' ?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript" src="../js/script.js"></script>

    <title>Lihat Pemesanan</title>
    <div id="kepala1" class="shadow-sm py-1 sticky-top " >
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand a" href="index.php">Mlaku.co</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sticky" id="navbarSupportedContent">
                        
                <ul class="navbar-nav mr-auto pl-2">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="tambahproduk.php">Tambah Barang <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item active">
                        <a class="nav-link" href="view.php">Lihat Barang <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="lihatpesanan.php">Lihat Daftar Pemesanan <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <!-- copas ini pak -->
                <div class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../img/admin.png" alt="" style="height:30;">&nbsp;
                        ADMIN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
                
                <!-- <form class="form-inline my-2 my-lg-0" method="GET" action="pencarian.php"> -->
                    <!-- <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" onkeyup="this.value = this.value.toLowerCase();">  -->
            <!--      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>-->
                
                <!-- </form> -->
                <!-- sampai sini, ganti aja yang sebelumnya. -->
            </div>
        </nav>
    </div>
</head>

<body class="bg2">
  <div class="container" style="padding:15px 33px;">
    <div class="row">
        <h3 class="mr-auto">Data Pemesanan</h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="lebarcanvas" style="width: 100%; margin: 10px 0px">
            
            <table class="table">
                <thead  class="thead-dark">
                    <tr>
                      <th>Nomor Pemesanan</th>
                      <th>Nama Pelanggan</th>
                      <th>Tanggal Pesan</th>
                      <th>Aksi</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                // Load file koneksi.php
                include "../dbconnect.php";

                $query = "SELECT d.no_pemesanan as 'nopes', p.nama_pelanggan as 'napel', d.tanggal_pesan as 'tglpsn' FROM detailpemesanan d, pemesanan p WHERE p.no_pemesanan=d.no_pemesanan";

                // $query = "SELECT * FROM fotoproduk"; // Tampilkan semua data gambar
                $sql = mysqli_query($konek, $query); // Eksekusi/Jalankan query dari variabel $query
                $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo "<tr>";
                    echo "<td>".$data['nopes']."</td>";
                    echo "<td>".$data['napel']."</td>";
                    
                    $newtgl=date("d-m-Y", strtotime($data['tglpsn']));
                                    
                    echo "<td>".$newtgl."</td>";
                    echo "<td><a href='detailpesanan.php?nomorpemesanan=".$data['nopes']."'>Detail</a></td>";
                    echo "</tr>";
                  }
                }else{ // Jika data tidak ada
                  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                }?>
            </tbody>
            </table>
        </div>
    </div>
  </div>
</table>
</body>
</html>
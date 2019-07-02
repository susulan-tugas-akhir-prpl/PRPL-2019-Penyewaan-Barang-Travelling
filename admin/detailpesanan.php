<?php include 'support.php' ;
    include '../dbconnect.php';
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/style.css">

    <script type="text/javascript" src="../js/script.js"></script>

    <title>Detail Pemesanan</title>
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

<body>
    <?php
        $nopes=$_GET['nomorpemesanan'];
        $query = mysqli_query($konek,
                "SELECT d.no_pemesanan as 'nopes', d.tanggal_pesan as 'tglpsn', p.id_pelanggan as 'idpel', p.nama_pelanggan as 'napel', p.email as 'email', d.lama_pesan as 'lamasewa', d.total_harga as 'totalharga'
                FROM detailpemesanan d, pemesanan p 
                WHERE p.no_pemesanan=d.no_pemesanan AND d.no_pemesanan = '$nopes'"
                )->fetch_object();
    ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col product">                
                <br>
                <div class="card" style="width: 20rem;">
                    <div class="card body px-3 py-3">
                        <center>
                            Nomor Pemesanan: <b style="font-size:20px"><?= $query->nopes ?></b>
                            <br><br>
                            Tanggal Pesan: <b><?php 
                                $newtgl=date("d-m-Y", strtotime($query->tglpsn));
                                echo $newtgl
                            ?></b>
                        </center>
                        <!-- <br><br> -->
                    </div>
                </div>
                            
                <br>
                <div class="card" style="width: 20rem;">
                    <div class="card body px-3 py-3">
                        <center>
                            <p>E-Mail: <br><b><?php echo $query->email ?></b></p>
                            
                            <p>Nama Lengkap: <br><b><?php echo $query->napel ?></b></p>

                            <lp>ID Pelanggan (KTP/SIM): </br><b><?php echo $query->idpel ?></b>
                        </center>
                        <!-- <br><br> -->
                    </div>
                </div>
                
            </div>
            
            <div class="col product">                
                <br>
                <div class="card" style="width: 25rem;">
                    <div class="card body px-3 py-3">
                        <p>Barang yang dipesan:</p>
                        <center>
                            <table id="t01">
                                <tr style="font-size:14px">
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th> 
                                    <th>Jumlah</th>
                                </tr>

                                <?php 
                                        $sql = mysqli_query($konek,
                                                "SELECT i.nama_bar as 'namabar', pp.harga as 'harga', pp.kuantitas as 'kuantitas' 
                                                    FROM itemproduk i, produkpemesanan pp 
                                                    WHERE pp.id_bar = i.id_bar AND pp.nomor_pemesanan LIKE '$nopes'"
                                                ); 
                                    // $cart = unserialize(serialize($_SESSION['cart']));
                                    // $s = 0;
                                    // $index = 0;
                                    // for($i=0; $i<count($cart); $i++){
                                        // $s += $cart[$i]->price * $cart[$i]->quantity;
                                        $s=0;
                                        while($query2 = mysqli_fetch_object($sql)){
                                ?>

                                <tr style="font-size:13px">
                                        <td> <?php echo $query2->namabar; ?> </td>
                                        <td> Rp<?php echo number_format($query2->harga); ?>,- </td>
                                        <td> <center> <?php echo $query2->kuantitas; ?></center> </td> 
                                        <?php $subtot=$query2->harga * $query2->kuantitas; 
                                                $s+=$subtot;
                                        ?>
                                        <td> Rp<?php echo number_format($subtot); ?>,- </td> 
                                        
                                </tr>
                                        <?php } ?>
                                <tr style="font-size:14px">
                                    <td colspan="3" style="text-align:center; font-weight:bold">Subtotal
                                    </td>
                                    <td> <b>Rp<?php echo number_format($s); ?>,-<b> </td>
                                </tr>
                            </table>
                        </center>
                        <br>

                        <?php 
                            if(isset($_GET["id"]) || isset($_GET["index"])){
                            //  header('Location: cart.php');
                            } 
                        ?>

                    
                    
                    </div>
                </div>
            </div>
            <div class="col product">                
                <br>
                <div class="card" style="width: 15rem;">
                    <div class="card body px-3 py-3">
                        <center>
                            <p>Lama Penyewaan: <br><b><?php echo $query->lamasewa ?> hari</b>
                            
                            <?php //$totalbayar = $s * $query->lamasewa ?>
                            <p>Total Pembayaran: <br><b style="font-size:20px">Rp<?php echo number_format($query->totalharga) ?>,-</b>
                        </center>
                    </div>
                </div>
                <br>
                <!-- <p style="text-align: justify; width:15rem; font-size: 13px">Bila ada kesalahan data hasil inputan pelanggan, dapat menghubungi kontak Admin yang ada di halaman About Us.
                <b>(Harap mencantumkan nomor pesanan beserta data yang salah atau mengirim hasil Screenshot halaman ini).</b></p> -->
            </div>

        </div>
    <!-- </div> -->

        
        
        <br>
        
    </div>

</body>

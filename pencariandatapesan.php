<?php
  include 'dbconnect.php';
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pencarian Data Pemesanan</title>
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

    <div>
        <form action="" method="get">
            Masukkan Nomor Pemesanan:
            <input type="text" name="no_pes" required oninvalid="this.setCustomValidity('Nomor pemesanan wajib diisi!')" oninput="setCustomValidity('')">
            <input type="submit" name="submit" value="Cari">
        </form>
    </div>

    <?php
        if($_GET){
            $nopes=$_GET['no_pes'];
            $query = mysqli_query($konek,
                    "SELECT d.no_pemesanan as 'nopes', d.tanggal_pesan as 'tglpsn', p.id_pelanggan as 'idpel', p.nama_pelanggan as 'napel', p.email as 'email', d.lama_pesan as 'lamasewa', d.total_harga as 'totalharga'
                    FROM detailpemesanan d, pemesanan p 
                    WHERE p.no_pemesanan=d.no_pemesanan AND d.no_pemesanan = '$nopes'"
                    )->fetch_object();
    ?>

        <div>
            <div>
                <div>                               
                    <center>
                        Nomor Pemesanan: <b style="font-size:20px"><?= $query->nopes ?></b>
                        <br><br>
                        Tanggal Pesan: <b><?php 
                            $newtgl=date("d-m-Y", strtotime($query->tglpsn));
                            echo $newtgl
                        ?></b>
                    </center>
                    <!-- <br><br> -->
              
                    <br>
                    <div>
                        <center>
                            <p>E-Mail: <br><b><?php echo $query->email ?></b></p>
                            
                            <p>Nama Lengkap: <br><b><?php echo $query->napel ?></b></p>

                            <lp>ID Pelanggan (KTP/SIM): </br><b><?php echo $query->idpel ?></b>
                        </center>
                    </div>                    
                </div>
                
                <div>                
                    <br>
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
                                <td colspan="3" style="font-weight:bold">Subtotal
                                </td>
                                <td> <b>Rp<?php echo number_format($s); ?>,-<b> </td>
                            </tr>
                        </table>
                    </center>
                    <br>
                </div>
                <div>                
                    <br>
                    <center>
                        <p>Lama Penyewaan: <br><b><?php echo $query->lamasewa ?> hari</b>
                        
                        <?php //$totalbayar = $s * $query->lamasewa ?>
                        <p>Total Pembayaran: <br><b style="font-size:20px">Rp<?php echo number_format($query->totalharga) ?>,-</b>
                    </center>
                    <br>
                    <p style="text-align: justify; font-size: 13px">Bila ada kesalahan data hasil inputan pelanggan, dapat menghubungi kontak Admin yang ada di halaman About Us.
                    <b>(Harap mencantumkan nomor pesanan beserta data yang salah atau mengirim hasil Screenshot halaman ini).</b></p>
                </div>

            </div>
            <br>       
        </div>

    <?php
        }
    ?>
</body>

</html>
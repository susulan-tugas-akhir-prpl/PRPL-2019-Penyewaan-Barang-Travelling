<?php 
session_start();
require '../dbconnect.php';
require 'item.php';

$nopes=$_SESSION['nopes'];

$namalengkap=$_SESSION['namalengkap'];
$email=$_SESSION['email'];
$id=$_SESSION['id'];
//$jumlahbar=$_SESSION['jumlahbar'];
$lamasewa=$_SESSION['lamasewa'];
$tglpsn=$_SESSION['tanggalpsn'];
// $kodebar=$_SESSION['kodebar'];
?>
<?php include 'support.php' ?>

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/body.css">
<link rel="stylesheet" href="../css/style.css">

<script type="text/javascript" src="js/script.js"></script>
<head>
    <title>Checkout</title>
</head>
<body class="bg2">
    <hr>
    <center><h3><b>CHECKOUT</b></h3></center>
    <hr>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col product">                
                <br>
                <div class="card" style="width: 20rem;">
                    <div class="card body px-3 py-3">
                        <center>
                            Nomor Pemesanan: <b style="font-size:20px"><?= $nopes ?></b>
                            <br><br>
                            Tanggal Pesan: <b><?php 
                                $newtgl=date("d-m-Y", strtotime($tglpsn));
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
                            <p>E-Mail: <br><b><?php echo $email ?></b></p>
                            
                            <p>Nama Lengkap: <br><b><?php echo $namalengkap ?></b></p>

                            <lp>ID Pelanggan (KTP/SIM): </br><b><?php echo $id ?></b>
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
                                    $cart = unserialize(serialize($_SESSION['cart']));
                                    $s = 0;
                                    $index = 0;
                                    for($i=0; $i<count($cart); $i++){
                                        $s += $cart[$i]->price * $cart[$i]->quantity;
                                ?>

                                <tr style="font-size:13px">
                                        <td> <?php echo $cart[$i]->name; ?> </td>
                                        <td> Rp<?php echo number_format($cart[$i]->price); ?>,- </td>
                                        <td> <input type="text" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]" disabled> </td>  
                                        <td> Rp<?php echo number_format($cart[$i]->price * $cart[$i]->quantity); ?>,- </td> 
                                </tr>

                                <?php 
                                    $index++;
                                } ?>

                                <tr style="font-size:14px">
                                    <td colspan="3" style="text-align:center; font-weight:bold">Subtotal
                                    </td>
                                    <td> <b>Rp<?php echo number_format($s); ?>,-<b> </td>
                                    
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
                            <p>Lama Penyewaan: <br><b><?php echo $lamasewa ?> hari</b>
                            
                            <?php $totalbayar = $s * $lamasewa ?>
                            <p>Total Pembayaran: <br><b style="font-size:20px">Rp<?php echo number_format($totalbayar) ?>,-</b>
                        </center>
                    </div>
                </div>
                <br>
                <p style="text-align: justify; width:15rem; font-size: 13px">Mohon mengajukan nomor pemesanan atau menunjukkan tampilan ini untuk memproses barang sesuai pesanan di tempat.
                <b>(Bisa juga menunjukkan halaman ini langsung atau diScreenshot).</b></p>
            </div>

        </div>
    <!-- </div> -->

        
        
        <br>
        <center><input type="button" value="Menu Utama" class="btn btn-primary mb-2" onclick="window.location.href='../index.php'"></input></center>
    </div>

    <?php
        $cart = unserialize(serialize($_SESSION['cart']));
        // $_SESSION['cart']=$cart;
        // $_SESSION['totalharga']=$totalharga;

        unset($_SESSION['cart']);
    ?>
    
</body>
<?php include 'support.php' ?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="../css/style.css">
    <title>Tambah Produk</title>
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
    <div class="jumbotron jumbotron-fluid alhamdulillah2">
        <div class="tulisan">
            <center>Tambah Produk</center>
            </div>
            <div class="containerform mt-5 pt-5">
                <form method="post" enctype="multipart/form-data" action="upload.php">
                    <div class="form-group">
                        <label for="nambar">Nama Barang</label>
                        <input type="text" class="form-control" name="namaproduk"  placeholder="Masukkan Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nambar">Kategori Barang</label>
                        <!-- <input type="select" class="form-control" name="namaproduk"  placeholder="Pilih Kategori Barang" required> -->
                        <select class="form-control" name="kategori"  placeholder="Pilih Kategori Barang" required>
                            <option value="hiking">Alat Hiking</option>
                            <option value="kemah">Alat Kemah</option>
                            <option value="pakaian">Pakaian Traveling</option>
                            <option value="hiking/kemah">Alat Hiking & Alat Kemah</option>
                            <option value="kemah/pakaian">Alat Kemah & Pakaian Traveling</option>
                            <option value="pakaian/hiking">Pakaian Traveling & Alat Hiking</option>
                            <option value="hiking/kemah/pakaian">Alat Hiking & Alat Kemah & Pakaian Traveling</option>
                            <!-- <option value="audi" selected>Audi</option> -->
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="jumlahbar">Jumlah Barang/Stok</label>
                        <input type="number" min=1 max=100 class="form-control" name="stok" placeholder="Masukkan Jumlah Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga / 24 Jam</label>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan harga" required>
                    </div>
                    <div class="form-group">
                        <label for=fotobarang>Foto Barang</label>
                        <input type="file" class="form-control" name="gambar" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div> 
        </div> 
    </div>
</body>
</html>
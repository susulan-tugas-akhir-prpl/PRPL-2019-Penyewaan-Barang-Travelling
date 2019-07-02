<html>
    <?php include 'support.php' ?>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/body.css">
    
    <!-- <link rel="stylesheet" href="css/footer.css"> -->

    <script type="text/javascript" src="js/script.js"></script>

    <head>
        <title>About Us</title>
        <div id="kepala1" class="shadow-sm py-1 sticky-top " >
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand a" href="index.php">Mlaku.co</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse sticky" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto pl-2">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item">
                            <a class="nav-link" href="pencariandatapesan.php">Search Order</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="categories/alatkemah.php">Alat Kemah</a>
                        <a class="dropdown-item" href="categories/alathiking.php">Alat Hiking</a>
                        <a class="dropdown-item" href="categories/pakaiantravelling.php">Pakaian Travelling</a>
                    </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                </ul>
                <!-- copas ini pak -->
                <a class="nav-link my-2 my-lg-0 ml-5" href="login.php">Sign in for Admin</a>
                <form class="form-inline my-2 my-lg-0" method="GET" action="pencarian.php">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" onkeyup="this.value = this.value.toLowerCase();"> 
            <!--      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>-->
                
                </form>
                <!-- sampai sini, ganti aja yang sebelumnya. -->
            </div>
            </nav>
        </div>
    </head>
    <body class="bg2">
    </br>
       <center>
        <div class="container">
            <div class="row justify-content-md-center"> 
            <div style="text-align:justify"><p class=" "><b style="font-size:25px">Mlaku.co</b> adalah website yang menyediakan barang-barang travel, mulai dari Alat Hiking, Alat Kemah, sampai Pakaian Traveling.
            Website ini diharapkan dapat mempermudah pelanggan dalam mencari barang-barang travel untuk disewa.</p></br></br></div>
            
                <div class="col product">
                    <div class="card-hidden" style="width: 14rem;">
                        <p><b>Web & Graphic Designer</b><p>
                        <?= "<img src='img/mata.png' class='card-img-top thumbnail'>" ?>
                        <div class="card-body">
                        <h5 class="card-title"><b>Fatkhulia Rizqianto Arifin</b></h5>
                        <p style="font-size:13px">Banyak yang memanggil saya ganteng. Saya tidak ganteng, saya hanya TAMPAN B|</p>
                        <p>E-Mail: fatkhulia1700018064@webmail.uad.ac.id</p>
                        </div>
                    </div>
                </div>

                <div class="col product">
                    <div class="card-hidden" style="width: 14rem;">
                        <p><b>Front-End Programmer</b></p>
                        <?= "<img src='img/telinga.png' class='card-img-top thumbnail'>" ?>
                        <div class="card-body">
                        <h5 class="card-title"><b>Lutfi Purba Arsianto</b></h5>
                        <p style="font-size:13px">Kuliah itu nomor 6, yang nomor 1 itu Ketuhanan Yang Maha Esa. #banggajadiorangIndonesia</p>
                        <p>E-Mail: lutfi1700018113@webmail.uad.ac.id</p>
                        </div>
                    </div>
                </div>

                <div class="col product">
                    <div class="card-hidden" style="width: 14rem;">
                        <p><b>Back-End Programmer</b></p>
                        <?= "<img src='img/mulut.png' class='card-img-top thumbnail'>" ?>
                        <div class="card-body">
                        <h5 class="card-title"><b>Panji Ragil Wibisono</b></h5>
                        <p style="font-size:13px">Usia dirahasiakan. Kuliah di Universitas Ahmad Dahlan Jurusan Teknik Informatika Angkatan Bersenjata :v</p>
                        <p>E-Mail: panji1700018094@webmail.uad.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </center>
    </body>

</html>



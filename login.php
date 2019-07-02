<?php include 'support.php' ?>

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/body.css">
<!-- <link rel="stylesheet" href="css/footer.css"> -->

<script type="text/javascript" src="js/script.js"></script>

<head>
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
                        <a class="dropdown-item" href="./categories/alatkemah.php">Alat Kemah</a>
                        <a class="dropdown-item" href="./categories/alathiking.php">Alat Hiking</a>
                        <a class="dropdown-item" href="./categories/pakaiantravelling.php">Pakaian Travelling</a>
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
    <div class="kotak_login" style="margin-top:0px">
		<p class="tulisan_login"><b>Silahkan login :)</b></p>
        <center><img src="./img/admin.png" alt="" style="height:200px"><center>
        </br>
		<form method="POST" action="process.php">
                    <label><b>Username:</b></label>
                    <input type="text" name="username" class="form_login" placeholder="Username" required oninvalid="this.setCustomValidity('Username wajib diisi!')" oninput="setCustomValidity('')">

                    <label><b>Password:<b></label>
                    <input type="password" name="password" class="form_login" placeholder="Password" required oninvalid="this.setCustomValidity('Password wajib diisi!')" oninput="setCustomValidity('')">
                    
                    <input type="submit" class="tombol_login" value="LOGIN">
                    <?php if(isset($_GET["failed"])) echo "Incorrect Username/Password!"; ?>
                </form>
		
	</div>

                
   
    

</body>
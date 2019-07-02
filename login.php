<head>
    <title>Login</title>
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
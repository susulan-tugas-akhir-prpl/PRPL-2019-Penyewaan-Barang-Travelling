<?php
session_start();
if (isset($_SESSION['session_username'])) {

    ?>
    <head>
        <title>ADMIN</title>
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
                </form>
                <!-- sampai sini, ganti aja yang sebelumnya. -->
            </div>
        </nav>
    </div>
    </head>

    <body>

       Welcome, Admin!

        


    </body>

<?php } ?>
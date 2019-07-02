<?php include 'support.php' ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/body.css">
    <script type="text/javascript" src="../js/script.js"></script>

    <title>Lihat Barang</title>
    <div id="kepala1" class="shadow-sm py-1 sticky-top ">
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
            <h3 class="mr-auto">Data Barang</h3>
            <a href="tambahproduk.php" class=" ml-auto"><button class="btn btn-primary">Tambah Barang</button></a>
        </div>
        <div class="row justify-content-md-center">
            <div class="lebarcanvas" style="width: 100%; margin: 10px 0px">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga/24 Jam</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Load file koneksi.php
                        include "../dbconnect.php";

                        $query = "SELECT i.id_bar as 'id_bar', i.nama_bar as 'nama_bar', i.stok as 'stok', i.harga as 'harga', i.kategori as 'kategori', f.nama_foto as 'nama_foto' FROM itemproduk i,fotoproduk f WHERE f.id_foto=i.id_foto";

                        // $query = "SELECT * FROM fotoproduk"; // Tampilkan semua data gambar
                        $sql = mysqli_query($konek, $query); // Eksekusi/Jalankan query dari variabel $query
                        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                echo "<tr>";
                                echo "<td>" . $data['nama_bar'] . "</td>";
                                echo "<td>" . $data['stok'] . "</td>";
                                echo "<td>Rp" . number_format($data['harga']) . ",-</td>";
                                echo "<td>" . $data['kategori'] . "</td>";
                                echo "<td><img src='../img/images/" . $data['nama_foto'] . "' width='100' height='100'></td>";
                                echo "<td><a href='calon.php?id_bar=" . $data['id_bar'] . "'>Edit</a></td>";
                                // echo "<td>".$data['nama_foto']."</td>";
                                // echo "<td>".$data['ukuran']."</td>";
                                // echo "<td>".$data['tipe']."</td>";
                                echo "</tr>";
                            }
                        } else { // Jika data tidak ada
                            echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
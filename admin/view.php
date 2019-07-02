<?php include 'support.php' ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lihat Barang</title>
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

    <h3 >Data Barang</h3>
    <a href="tambahproduk.php"><button >Tambah Barang</button></a>
    <table class="table">
        <thead>
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
</body>
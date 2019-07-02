<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lihat Pemesanan</title>
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
    <h3 class="mr-auto">Data Pemesanan</h3>

    <div>    
        <table class="table">
            <thead >
                <tr>
                    <th>Nomor Pemesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            // Load file koneksi.php
            include "../dbconnect.php";

            $query = "SELECT d.no_pemesanan as 'nopes', p.nama_pelanggan as 'napel', d.tanggal_pesan as 'tglpsn' FROM detailpemesanan d, pemesanan p WHERE p.no_pemesanan=d.no_pemesanan";

            // $query = "SELECT * FROM fotoproduk"; // Tampilkan semua data gambar
            $sql = mysqli_query($konek, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                echo "<tr>";
                echo "<td>".$data['nopes']."</td>";
                echo "<td>".$data['napel']."</td>";
                
                $newtgl=date("d-m-Y", strtotime($data['tglpsn']));
                                
                echo "<td>".$newtgl."</td>";
                echo "<td><a href='detailpesanan.php?nomorpemesanan=".$data['nopes']."'>Detail</a></td>";
                echo "</tr>";
                }
            }else{ // Jika data tidak ada
                echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
            }?>
        </tbody>
        </table>
  </div>
</table>
</body>
</html>
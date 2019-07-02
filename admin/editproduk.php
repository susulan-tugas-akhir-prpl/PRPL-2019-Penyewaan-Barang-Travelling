<?php
session_start();
?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit Produk</title>
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
    <hr>
    <h3>Edit Barang</h3>
    <hr>
    <?php
    // Load file koneksi.php
    include "../dbconnect.php";
    $id_bar = $_GET['id_bar'];

    $query = "SELECT i.id_bar as 'id_bar', i.nama_bar as 'nama_bar', i.stok as 'stok', i.harga as 'harga', f.nama_foto as 'nama_foto' FROM itemproduk i,fotoproduk f WHERE f.id_foto=i.id_foto AND i.id_bar='$id_bar'";

    // $query = "SELECT * FROM fotoproduk"; // Tampilkan semua data gambar
    $sql = mysqli_query($konek, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        $data = mysqli_fetch_array($sql); // Ambil semua data dari hasil eksekusi $sql
        ?>
        <form method="POST" action="ubah.php" enctype="multipart/form-data">
            Nama Barang:
            <input type='text' value='<?= $data['nama_bar'] ?>' placeholder='Masukkan Nama Barang' name='nabar' required> <br>

            Kategori Barang:
            <div>
                <!-- <label for="nambar">Kategori Barang</label> -->
                <!-- <input type="select" class="form-control" name="namaproduk"  placeholder="Pilih Kategori Barang" required> -->
                <select name="kategori" placeholder="Pilih Kategori Barang" required>
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

            Stok Barang:
            <input type='number' min=0 max=100 value='<?= $data['stok'] ?>' placeholder='Masukkan Stok Barang' name='stok' required> <br>
            Harga / 24 Jam (Rp):
            <input type='text' value='<?= $data['harga'] ?>' placeholder='Masukkan Harga Barang' name='harga' required> <br>
            <input type='text' name='nagam' value='<?= $data['nama_foto'] ?>' hidden>

            Foto Barang:

            <input type='file' name='gambar' required><br>

            <td><button>Submit</button></td>
            <!-- // echo "<td>".$data['nama_foto']."</td>";
                        // echo "<td>".$data['ukuran']."</td>";
                        // echo "<td>".$data['tipe']."</td>"; -->

        <?php
    } else { // Jika data tidak ada
        echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
    }

    $_SESSION['id_bar'] = $id_bar;
    ?>
    </form>

</body>

</html>
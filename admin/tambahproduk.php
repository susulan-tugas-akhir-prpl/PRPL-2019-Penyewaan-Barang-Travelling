<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tambah Produk</title>
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
    <center>Tambah Produk</center>
    <div>
        <form method="post" enctype="multipart/form-data" action="upload.php">
            
            <label for="nambar">Nama Barang</label>
            <input type="text" name="namaproduk"  placeholder="Masukkan Nama Barang" required>
        
        
            <label for="nambar">Kategori Barang</label>
            <select name="kategori"  placeholder="Pilih Kategori Barang" required>
                <option value="hiking">Alat Hiking</option>
                <option value="kemah">Alat Kemah</option>
                <option value="pakaian">Pakaian Traveling</option>
                <option value="hiking/kemah">Alat Hiking & Alat Kemah</option>
                <option value="kemah/pakaian">Alat Kemah & Pakaian Traveling</option>
                <option value="pakaian/hiking">Pakaian Traveling & Alat Hiking</option>
                <option value="hiking/kemah/pakaian">Alat Hiking & Alat Kemah & Pakaian Traveling</option>
                <!-- <option value="audi" selected>Audi</option> -->
            </select>                   
        
            <label for="jumlahbar">Jumlah Barang/Stok</label>
            <input type="number" min=1 max=100 name="stok" placeholder="Masukkan Jumlah Barang" required>                  
        
            <label for="harga">Harga / 24 Jam</label>
            <input type="text" name="harga" placeholder="Masukkan harga" required>
                    
            <label for=fotobarang>Foto Barang</label>
            <input type="file" name="gambar" required>

            <button type="submit">Tambah</button>
        </form>
    </div> 
</body>
</html>
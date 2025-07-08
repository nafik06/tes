<?php
include 'koneksi.php';

//ambil data dari database
$query = "SELECT * FROM votingdesain";
$result = mysqli_query($koneksi, $query);
$no = 1;

// Tangkap status dari URL
$status = isset($_GET['status']) ? $_GET['status'] : '';
$message = '';
if ($status == 'sukses') {
    $message = '<div class="alert success">Data berhasil disimpan!</div>';
} elseif ($status == 'gagal') {
    $message = '<div class="alert error">Gagal menyimpan data!</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTING</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="judul">
        <h1>PILIH DESAIN FAVORITMU</h1>
    </div>
    <hr>
    <br>

    <form action="tambah.php" method="POST">



        <div class="masukan-data">
            <label for="nama">nama kamu :</label>
            <input type="text" id="nama" name="nama" placeholder="masukan nama kamu" class="form-control" required>
            <br><br>
        </div>
        <div class="masukan-data">
            <label for="logo">pilih desain logo :</label>
            <input type="number" id="logo" name="logo" placeholder="masukan nomor pilihanmu" class="form-control" required>
            <br><br>
        </div>
        
        <div class="masukan-data">
            <label for="kaos">pilih desain kaos :</label>
            <input type="number" id="kaos" name="kaos" placeholder="masukan nomor pilihanmu" class="form-control" required>
        </div>
        <br><br>
    </form>
    <button type="submit" class="tombol">Voting</button>
    <br>
    <br>
    <hr>
    <br>
    <h1>LOGO</h1>
    <!-- input data -->
    <div class="kontrol-kartu">
        <!-- pilihan desain logo -->
        <div class="kartu">
            <img src="desain logo/logo 1.jpg" alt="logo1">
            <h2>desain 1</h2>
        </div>
        <div class="kartu">
            <img src="desain logo/logo2.jpg" alt="logo2">
            <h2>desain 2</h2>
        </div>
        <div class="kartu">
            <img src="desain logo/logo 1.jpg" alt="logo1">
            <h2>desain 3</h2>
        </div>
        <div class="kartu">
            <img src="desain logo/logo2.jpg" alt="logo2">
            <h2>desain 4</h2>
        </div>
        <div class="kartu">
            <img src="desain logo/logo 1.jpg" alt="logo1">
            <h2>desain 5</h2>
        </div>
        <div class="kartu">
            <img src="desain logo/logo2.jpg" alt="logo2">
            <h2>desain 6</h2>
        </div>
    </div>

    <!-- pilihan desain logo -->

    <!-- pilihan desain kaos -->

    <br>
    <hr>
    <br>
    <h1>KAOS</h1>
    <div class="kontrol-kartu">
        <div class="kartu">
            <img src="desain kaos/kaos1.jpg" alt="">
            <h2>desain 1</h2>
        </div>
        <div class="kartu">
            <img src="desain kaos/kaos2.jpg" alt="">
            <h2>desain 2</h2>
        </div>
        <div class="kartu">
            <img src="desain kaos/kaos3.png" alt="">
            <br><br><br><br><br>
            <h2>desain 3</h2>
        </div>
        <div class="kartu">
            <img src="desain kaos/kaos1.jpg" alt="">
            <h2>desain 4</h2>
        </div>
        <div class="kartu">
            <img src="desain kaos/kaos2.jpg" alt="">
            <h2>desain 5</h2>
        </div>
        <div class="kartu">
            <img src="desain kaos/kaos3.png" alt="">
            <br><br><br><br><br>
            <h2>desain 6</h2>
        </div>

    </div>
    <!-- pilihan desain kaos -->
    <br>
    <hr>

    <h1>HASIL VOTING</h1>
    <br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Logo</th>
            <th>Kaos</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>


            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['logo']); ?></td>
                <td><?php echo htmlspecialchars($row['kaos']); ?></td>
                <td>
                    <div class="hapus">
                        <a href="hapus.php?id=<?php echo $row['id']; ?>"
                            class="delete-btn"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>

    <footer>
        <br>
        <p> copyright &copy;2025 Designed by <span class="desain">Nafik</span></p>
        <br>
    </footer>
</body>

</html>
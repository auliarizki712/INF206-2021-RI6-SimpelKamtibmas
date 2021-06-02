<?php
error_reporting(0);
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}

require 'function.php';

if (isset($_POST['tombolcari'])) {
    $cari = $_POST['cari'];
    $_SESSION['cari'] = $cari;
}
else {
    $cari = $_SESSION['cari'];
}

$total = mysqli_query($conn, "SELECT * FROM laporan  WHERE id LIKE '%$cari%' OR catatan LIKE '%$cari%' OR nik LIKE '%$cari%' OR nama LIKE '%$cari%' OR lokasi LIKE '%$cari%' ORDER BY id DESC");

//pagination
$jumlahDataPerhalaman = 3;
$jumlahData = mysqli_num_rows($total);
$jumlahHalaman = ceil ($jumlahData/$jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
$jumlahLink = 2;

if ($halamanAktif > $jumlahLink) {
    $startNumber = $halamanAktif - $jumlahLink;
}else {
    $startNumber = 1;
}

if ($halamanAktif < ($jumlahHalaman - $jumlahLink)) {
    $endNumber = $halamanAktif + $jumlahLink;
}else {
    $endNumber = $jumlahHalaman;
}

$result = mysqli_query($conn, "SELECT * FROM laporan  WHERE id LIKE '%$cari%' OR catatan LIKE '%$cari%' OR nik LIKE '%$cari%' OR nama LIKE '%$cari%' OR lokasi LIKE '%$cari%' ORDER BY id DESC LIMIT $awalData, $jumlahDataPerhalaman");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Laporan</title>
        <link rel="stylesheet" type="text/css" href="LihatLaporan.css">
    </head>
    <body>
        <div class="proc">
            <img class="logo" src="http://1.bp.blogspot.com/-q7gvbJopJ08/T_0QhKkn-HI/AAAAAAAAAXU/tsn3rERff8I/s1600/Logo+Kota+Banda+Aceh.png" alt="gambar icon">
            <h3>Daftar Laporan</h3>
            <a  href="logout.php"><button class="logout-btn">Logout</button></a>
            
            <form action="LihatLaporan.php" method="post">
                <input type="text" name="cari" class="cari">
                <button type="submit" name="tombolcari" class="tombolcari">Cari Laporan</button>
            </form>

            <form action="" method="post">    
                
                    <?php $i=1;?>
                    <?php while ($row = mysqli_fetch_assoc($result)) :?>
                        <p class="laporan" style='text-align:left; margin-bottom:10px; border:2px'>
                            No. laporan : <?= $row["id"];?><br><br>
                            <img src="images/<?= $row["gambar"];?>" class = "gambar"><br>
                            Lokasi       : <br> <?= $row["lokasi"];?><br><br>
                            Catatan      : <br> <?= $row["catatan"];?><br><br>
                            NIK Pelapor  : <br> <?= $row["nik"];?><br><br>
                            Nama Pelapor : <br> <?= $row["nama"];?>
                        </p>
                    <?php $i++;?> 
                    <?php endwhile;?>
            </form>
            <br>
            <?php if($halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif - 1;?>">&laquo;</a>
            <?php endif;?>

            <?php for($i = $startNumber; $i <= $endNumber; $i++) : ?>
                <?php if($i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i;?>" style="font-weight:bold; color:white; background-color:red;"><?= $i?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i;?>"><?= $i?></a>
                <?php endif; ?>
            <?php endfor;?>

            <?php if($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1;?>">&raquo;</a>
            <?php endif;?>
        </div>
        </script>
    </body>
</html>
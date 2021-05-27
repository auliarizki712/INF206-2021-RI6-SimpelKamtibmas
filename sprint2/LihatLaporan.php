<?php
    $conn = mysqli_connect("localhost", "root", "", "projek_rpl");
    $result = mysqli_query($conn, "SELECT * FROM laporan");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Laporan</title>
        <link rel="stylesheet" type="text/css" href="LihatLaporan.css">
    </head>
    <body>
        <div class="proc">
            <img src="http://1.bp.blogspot.com/-q7gvbJopJ08/T_0QhKkn-HI/AAAAAAAAAXU/tsn3rERff8I/s1600/Logo+Kota+Banda+Aceh.png" alt="gambar icon">
            <h3>Daftar Laporan</h3>
            <form action="" method="post">    
                <table border="10" cellspacing="10">
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Lokasi</th>
                        <th>Catatan</th>
                        <th>NIK</th>
                        <th>Nama</th>
                    </tr>
                    <?php $i=1;?>
                    <?php while ($row = mysqli_fetch_assoc($result)) :?>
                    <tr>
                        <td><?= $row["id"];?></td>
                        <td><img src="images/<?= $row["gambar"];?>" width="50px"></td>
                        <td><?= $row["lokasi"];?></td>
                        <td><?= $row["catatan"];?></td>
                        <td><?= $row["nik"];?></td>
                        <td><?= $row["nama"];?></td>
                    </tr>
                    <?php $i++;?>
                    <?php endwhile;?>
            </form>
        </div>
        </script>
    </body>
</html>
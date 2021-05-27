<?php  
require 'function.php';
?>


<!DOCTYPE html>
<html>

    <head>
        <title>BUAT LAPORAN</title>
        <link rel="stylesheet" type="text/css" href="uploadlaporancss.css">
    </head>

    <body>

        <div class="profilpen">

            <img src="http://1.bp.blogspot.com/-q7gvbJopJ08/T_0QhKkn-HI/AAAAAAAAAXU/tsn3rERff8I/s1600/Logo+Kota+Banda+Aceh.png" alt="gambar icon">
            <h3>SISTEM PELAPORAN PELANGGARAN KAMTIBMAS</h3>
            <h5>Masukkan Data yang diminta untuk membuat laporan</h5>

            <form action="" method="post" enctype="multipart/form-data">

                <?php  
                //cek apakah tombol submit sudah ditekan atau belum
                if(isset ($_POST["kirim"])) {

                //cek apakah data berhasil ditambahkan
                if (tambah ($_POST) > 0) {
                    echo "<script>
                            alert('Berhasil mengirimkan laporan !!')
                            </script>";
                } else {
                    echo "<script>
                            alert('Gagal membuat laporan, kesalahan dalam input data')
                    </script>";
                    }

                }
                ?>

                <br>

                <label for="lokasi">Lokasi Kejadian</label>
                <input type="text" name="lokasi" class="lokasi-box" placeholder="Masukkan Lokasi" id="lokasi" required>

                <br>

                <label for="catatan">Catatan Kejadian</label>
                <textarea name="catatan" class="ctt-box" placeholder="Masukkan catatan kejadian" id="catatan" required></textarea>
     
                <br>

                <label for="nik">NIK Pelapor</label>
                <input name="nik" type="number" class="nik-box" placeholder="Masukkan NIK anda" id="nik" required>
 
                <br>

                <label for="nama">Nama Pelapor</label>
                <input name="nama" type="text" class="nama-box" placeholder="Masukkan Nama anda" id="nama" required>
                
                <br>


                <label>Masukkan Foto Bukti</label>
                <input class="img-box" type="file" name="gambar">
                <button type="submit" name="kirim" class="kirim-btn">Kirim</button>

                <p>*NIK dan Nama yang digunakan untuk pertanggung jawaban jika laporan yang dibuat fiktif</p>                  
            </form>
        </div>
        
    </body>
</html>

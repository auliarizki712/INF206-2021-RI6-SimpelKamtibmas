<?php 
//koneksi ke database
$conn = mysqli_connect("localhost","root","","project");



//function untuk input data
function tambah($laporan) {
	global $conn;

	$lokasi = $laporan["lokasi"];
    $catatan = $laporan["catatan"];
    $nik = $laporan["nik"];
    $nama = $laporan["nama"];

    $foto = upload();
    if( !$foto) {
    	return false;
    }

    $query = "INSERT INTO laporan VALUES
                ('','$lokasi', '$catatan','$nik','$nama','$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}



function upload() {
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada foto yang di upload
	if( $error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu');
			</script>";
		return false;
	}

	//cek upload yang di upload user (hanya gambar)
	$allowExt = ['jpg','jpeg', 'png'];
	$extFoto = explode('.', $namaFile);
	$extFoto = strtolower(end($extFoto));


	if( !in_array($extFoto, $allowExt) ) {
		echo "<script>
			alert('Upload file dengan ekstensi jpg, jpeg, atau png');
			</script>";
	}



	//generate nama foto baru untuk menagtasi duplikat nama file
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $extFoto;




	//cek jika ukuran terlalu besar
	if($ukuranFile > 419430400) {
		echo "<script>
			alert('Ukuran file yang anda upload terlalu besar');
			</script>";
		return false;
	}

	//lolos pengecekan, upload gambar

	move_uploaded_file($tmpName, 'images/'.$namaFileBaru);

	return $namaFileBaru;



}



?>
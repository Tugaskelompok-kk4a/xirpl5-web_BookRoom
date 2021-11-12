<?php
//include file koneksi.php
include('koneksi.php');
 
//jika benar mendapatkan GET id dari URL
if(isset($_GET['judulbuku'])){
	//membuat variabel $judulbuku yang menyimpan nilai dari $_GET['judulbuku']
	$judulbuku = $_GET['judulbuku'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM transaksi") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi judulbuku=$judulbuku
		$del = mysqli_query($koneksi, "DELETE FROM transaksi ") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="home_pegawai.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="home_pegawai.php";</script>';
		}
	}else{
		echo '<script>alert("judulbuku tidak ditemukan di database."); document.location="homepegawai.php";</script>';
	}
}else{
	echo '<script>alert("judulbuku tidak ditemukan di database."); document.location="homepegawai.php";</script>';
}
 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>BookRoom</title>
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
        <a class="navbar-brand" href="#">BookRoom</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home_pegawai.php">Home <span class="sr-only">(current)</span></a>
            </li>

          
      
    </nav>

    <!--akhir navbar-->
 <!--content-->
 <div class="container">
      <div class="row">
        <div class ="col-lg-12 mt-2">
          <div class="jumbotron jumbotron-fluid">
          <h1 align="center">Data Buku</h1>
            <div class="container"><Style background :purple ></Style>
            </div>
          </div>
        </div>
      </div>
<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>

<a href="insertbuku.php" type="button" class="btn btn-primary ms-3 md-3">Tambah Data Buku</a>

<form action="databuku.php" method="post">

</form>
<?php 
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
	echo '<br><b class="ms-3">Hasil pencarian : '.$cari.'</b><br>';
}
?>
<br>
    <table class="table">
    <thead></thead>
    <tr>
        <td>ID Buku</td>
        <td>Judul</td>
        <td>Penulis</td>
        <td>Tahun Terbit</td>
        <td>Jenis Buku</td>
        <td>Status</td>
        <td>Pengaturan</td>
    </tr>
    </thead>

    <?php 
    if(isset($_POST['cari'])){
		$cari = $_POST['cari'];
		$data = mysqli_query($koneksi, "select * from buku where judul_buku like '%".$cari."%'");				
	}else{
		$data = mysqli_query($koneksi, "select * from buku");		
	}
    while($row = mysqli_fetch_assoc($data)):?>
    <tbody>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['judulbuku'];?></td>
        <td><?php echo $row['penulis'];?></td>
        <td><?php echo $row['thn_terbit'];?></td>
        <td><?php echo $row['jenisbuku'];?></td>
        <td><?php echo $row['Status'];?></td>
        <td><a type="button" class="btn btn-primary" href="updatebuku.php?id=<?php echo $row['id']; ?>">Ubah</a>
        <a type="button" class="btn btn-primary" href="deletebuku.php?id=<?php echo $row['id']; ?>">Hapus</a>
        </td>
    </tr>
    </tbody>
    <?php endwhile;?>
    </table>

     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
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
              <a class="nav-link" href="home_pengguna.php">Home <span class="sr-only">(current)</span></a>
            </li>

          
      
    </nav>
<!DOCTYPE html>
<html>
<head>
	<title>BookRoom</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	
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

<form action="home_pengguna.php" method="post">
<table>
    <tr>
        <td><input class="ms-3 mt-3 form-control" type="text" name="cari" size="40" placeholder="Masukkan kata kunci judul buku..."></td>
        <td><button type="submit" class="mt-3 ms-4 btn btn-primary" >Cari Data</button></td>
    </tr>
</table>
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
        <td>Aksi</td>
    </tr>
    </thead>

    <?php 
    if(isset($_POST['cari'])){
		$cari = $_POST['cari'];
		$connect = mysqli_query($koneksi, "select * from buku where judulbuku like '%".$cari."%'");				
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
        <td><a type="button" class="btn btn-primary" href="transaksipengguna.php?id=<?php echo $row['id']; ?>">Pilih Ini</a>
        </td>
    </tr>
    </tbody>
    <?php endwhile;?>
    </table>

     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     

</body>
</html>
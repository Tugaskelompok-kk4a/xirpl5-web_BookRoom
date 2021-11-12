
<?php 

include "koneksi.php";

$id = $_GET['id'];

if( isset($_POST["submit"])){
    $judulbuku = $_POST["judulbuku"];
    $penulis = $_POST["penulis"];
    $thn_terbit = $_POST["thn_terbit"];
    $jenisbuku = $_POST["jenisbuku"];
    $Status = $_POST["Status"];
    

    mysqli_query($koneksi, "update buku set judulbuku='$judulbuku', penulis='$penulis', thn_terbit='$thn_terbit', jenisbuku='$jenisbuku', Status ='$Status'where id='$id'");

    if( mysqli_affected_rows($koneksi) > 0){
        echo "<script>alert('Berhasil Ubah Data');
        document.location.href = 'databuku.php';</script>";
    } else{
        echo "<script>alert('Gagal Ubah Data')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update Data Buku</title>
</head>
<body>
    <h1 align="center">Update Data Buku</h1>
<form action="" method="post">
    <table align="center">
    <?php 
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "select * from buku where id='$id'");
    while($row = mysqli_fetch_assoc($result)):?>
    <tr>
         <td><label for="judulbuku" class="form-label mt-4">Judul Buku</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="judulbuku" name="judulbuku" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="penulis" class="form-label mt-4">Penulis</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="penulis" name="penulis" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="thn_terbit" class="form-label mt-4">Tahun Terbit</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="thn_terbit" name="thn_terbit" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="jenisbuku" class="form-label mt-4">Jenis Buku</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="jenisbuku" name="jenisbuku" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="Status" class="form-label mt-4">Status Buku</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="Status" name="Status" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><button type="submit" class="btn btn-primary mt-3 pr-3 pl-3" style="margin-left: 15rem;" name="submit">Simpan</button></td>
    </tr>
</table>
<?php endwhile; ?>
</form>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
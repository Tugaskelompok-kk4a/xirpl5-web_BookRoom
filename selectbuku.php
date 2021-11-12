<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "db_pengguna");
 $query = "SELECT * FROM buku WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Judul Buku</label></td>  
            <td width="70%">'.$row["judulbuku"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Penulis</label></td>  
            <td width="70%">'.$row["penulis"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Tahun Terbit</label></td>  
            <td width="70%">'.$row["thn_terbit"].'</td>  
        </tr>
       
        <tr>  
            <td width="30%"><label>Status</label></td>  
            <td width="70%">'.$row["Status"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>
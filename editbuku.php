<script>
$('#update_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#ejudulbuku').val() == "")  
  {  
   alert("Mohon Isi judulbuku ");  
  }  
  else if($('#epenulis').val() == '')  
  {  
   alert("Mohon Isi penulis");  
  }  
  
  else 
  {  
   $.ajax({  
    url:"updatebuku.php",  
    method:"POST",  
    data:$('#update_form').serialize(),  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){  
     $('#update_form')[0].reset();  
     $('#editModal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
</script>
<?php 
if(isset($_POST["employee_id"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "db_pengguna");
 $query = "SELECT * FROM buku WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
     $output .= '
         <form method="post" id="update_form">
     <label>judulbuku</label>
     <input type="hidden" name="id" id="id" value="'.$_POST["employee_id"].'" class="form-control" />
     <input type="text" name="judulbuku" id="judulbuku" value="'.$row['judulbuku'].'" class="form-control" />
     <br />
     <label>penulis</label>
     <input type="text" name="penulis" id="penulis" value="'.$row['penulis'].'" class="form-control" />
     <br />
     <label>thn_terbit</label>
     <input type="text" name="thn_terbit" id="thn_terbit" value="'.$row['thn_terbit'].'" class="form-control" />
     <br />
     <label>Jenis Buku</label>
     <select name="jenisbuku" id="jenisbuku" class="form-control">';
     if($row['jenisbuku']=="Fantasi"){
      $output .= '<option value="Fantasi" selected>Fantasi</option>  
      <option value="Romantis">Romantis</option>
      <option value="Aksi">Aksi</option>
      <option value="Petualangan">Petualangan</option>
      <option value="Fiksi">Fiksi</option>
      <option value="Nonfiksi">Nonfiksi</option>';
     }elseif($row['jenisbuku']==""){
        $output .= '<option value="Fiksi">Fiksi</option>  
      <option value="Romantis" selected>Romantis</option>
      <option value="Aksi"selected>Aksi</option>
      <option value="Petualangan"selected>Petualangan</option>
      <option value="Fantasi"selected>Fantasi</option>
      <option value="Nonfiksi"selected>Nonfiksi</option>
      ';
     }else{
        $output .= '<option value="Nonfiksi">Nonfiksi</option>  
      <option value="Romantis">Romantis</option>
      <option value="Aksi">Aksi</option>
      <option value="Petualangan">Petualangan</option>
      <option value="Fiksi">Fiksi</option>
      <option value="Fantasi">Fantasi</option>
      ';
     }
				
     $output .= '</select>
     <br />
     <label>Status</label>
     <select name="Status" id="Status" class="form-control">';
     if($row['Status']=="Ada"){
      $output .= '<option value="Ada" selected>Ada</option>  
      <option value="Tidak Ada">Tidak Ada</option>';
     }elseif($row['Status']=="Tidak Ada"){
        $output .= '<option value="Ada">Ada</option>  
      <option value="Tidak Ada" selected>Tidak Ada</option>';
     }else{
        $output .= '<option value="Ada">Ada</option>  
      <option value="Tidak Ada">Tidak Ada</option>';
     }
     $output .= '</select>
     <br />    
     <input type="submit" name="update" id="update" value="Update" class="btn btn-info" />
 
    </form>
     ';
    echo $output;
}
?>
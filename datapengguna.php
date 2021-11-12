
<?php  
//index.php
$connect = mysqli_connect("localhost", "root", "", "db_pengguna");
$query = "SELECT * FROM pengguna ORDER BY id DESC";
$result = mysqli_query($connect, $query);
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Data Pengguna </title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body >
 <head>
  
  <div class="container" style="width:700px;"> 
   <h3 align="center">Data Pengguna</h3>  
   <br />  
   <div class="table-responsive">
    <div alig="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info">Tambah Daftar Pengguna</button>
    </div>
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="55%">Nama Pengguna</th>  
       <th width="15%">Lihat Detail</th>
       <th width="15%">Edit</th>
       <th width="15%">Hapus</th>
      </tr>
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
       <td><?php echo $row["nama"]; ?></td>
       <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
         <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td> 
        <td><input type="button" name="delete" value="Hapus" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs hapus_data" /></td> 
       
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div> 
  </div>
 </body>  
</html>  
 
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Input Data Pengguna</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Nama Pengguna</label>
     <input type="text" name="nama" id="nama" class="form-control" />
     <br />
     <label>Alamat Pengguna</label>
     <textarea name="alamat" id="alamat" class="form-control"></textarea>
     <br />
     <label>Jenis Kelamin</label>
     <select name="gender" id="gender" class="form-control">
      <option value="Laki-laki">Laki-laki</option>  
      <option value="Perempuan">Perempuan</option>
     </select>
     <br />  
     <label>Umur</label>
     <input type="text" name="umur" id="umur" class="form-control" />
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
 
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Detail Data Pengguna</h4>
   </div>
   <div class="modal-body" id="detail_pengguna">
     
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
 
<div id="editModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Data Pengguna</h4>
   </div>
   <div class="modal-body" id="form_edit">
     
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
<script>  
$(document).ready(function(){
// Begin Aksi Insert
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#nama').val() == "")  
  {  
   alert("Mohon Isi Nama ");  
  }  
  else if($('#alamat').val() == '')  
  {  
   alert("Mohon Isi Alamat");  
  }  
  
  else 
  {  
   $.ajax({  
    url:"insertpengguna.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
//END Aksi Insert
 
//Begin Tampil Detail Pengguna
 $(document).on('click', '.view_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"selectpengguna.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#detail_pengguna').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
//End Tampil Detail Pengguna
  
//Begin Tampil Form Edit
  $(document).on('click', '.edit_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"editpengguna.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#form_edit').html(data);
    $('#editModal').modal('show');
   }
  });
 });
//End Tampil Form Edit
 
//Begin Aksi Delete Data
 $(document).on('click', '.hapus_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"deletepengguna.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
   $('#employee_table').html(data);  
   }
  });
 });
}); 
//End Aksi Delete Data
 </script>
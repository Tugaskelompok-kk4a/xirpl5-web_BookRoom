<?php
$gambar = $_GET['url'];
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Halaman Background</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <style type="text/css">
         html,body{height: 100%;}
         .bg-utama{
         background-image: url(<?php echo $gambar; ?>);
         background-size: cover;
         background-position: center;
         text-align: center;
         height: 100%;
         width: 100%;
         display: table;
         vertical-align: middle;
         }
         h1,p{color: white;}
         .konten-ditengah {
         display: table-cell;
         vertical-align: middle;
         }
      </style>
   </head>
   <body>
      <div class="bg-utama">
      <div class="konten-ditengah">
            <h1>Ini adalah Judul</h1>
            <p>Ini adalah paragraf teks.</p>
         </div>
      </div>
   </body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
       .plus a{border-radius:4px;  background-color:blue; color:white;}
        </style>
  <body>
        
   
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a href="list.php"class="nav-link active" aria-current="page">Table</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Mahasiswa</a>
          
        </li>
        
    
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<?php
include("koneksi.php");
$tampil=mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
$data=mysqli_fetch_array($tampil);


?>

<?php
include('template/inputisi.php');
?>
<?php
if (isset($_POST['kirim'])) {
  $nim =$_GET['nim'];
   $nama_mhs =$_POST['nama_mhs'];
   $tgl_lahir =$_POST['tgl_lahir'];
   $alamat =$_POST['alamat'];
   $prodi_id =$_POST['prodi_id'];
   $foto = $_FILES['foto']['name'];
    $dir = "foto/";
    $file_tmp = $_FILES['foto']['tmp_name'];
  

 
    move_uploaded_file($file_tmp, $dir.$foto);
    $update = mysqli_query($koneksi, "UPDATE mahasiswa SET  nama_mhs='$nama_mhs', prodi_id='$prodi_id', tgl_lahir='$tgl_lahir', alamat='$alamat', foto='$foto' WHERE nim='$nim'");


if ($update) {
    echo"<script>alert('Data berhasil di edit');window.location.href='list.php'</script>";
    
    
} else {
    echo "Maaf, data gagal diubah.";
}
}
?>
   




  









































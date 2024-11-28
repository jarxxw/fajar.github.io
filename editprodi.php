<?php
include('template/head.php');

?>
<?php
include("koneksi.php");
$tampil=mysqli_query($koneksi,"SELECT * 
FROM mahasiswa WHERE nim='$_GET[nim]'");
$data=mysqli_fetch_array($tampil);
?>
<form method="POST" action="">
<div class="container">

 <div class="mb-3">
  
    <label class="form-label">NAMA</label>
    <input type="text" class="form-control" name="nama_mhs" value="<?php echo $data['nama_mhs']; ?>">
  </div>
  
 
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">PILIH PRODI</label>
  <select class="form-select" name="prodi_id" value="<?php echo $data['prodi_id'];?>" >
  <option></option>
    <?php
     include("koneksi.php");
     $key = mysqli_query($koneksi, "SELECT * FROM prodi");
     while($prodi=mysqli_fetch_array($key))
     {
      echo '<option value="' . $prodi['id'] . '" ' . $selected . '>' . $prodi['nama_prodi'] . '</option>';    
     }
     ?>
      </select>
      <br>
      <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
      <br> 
     
      
    
    </div>
    </form>
    
     
    <?php
     include("koneksi.php");
     if (isset($_POST['kirim'])) {
        $up=mysqli_query($koneksi,"UPDATE mahasiswa SET nama_mhs='$_POST[nama_mhs]', prodi_id='$_POST[prodi_id]' WHERE nim='$_GET[nim]'");

        if ($up) {
            
            echo"<script>
                  alert('Data Berhasil di Edit');
                  window.location.href='prodi.php'
                </script>";
                
            
        }
        else{
            echo"error";
        }
     }
    ?>
    
    <?php
    include('template/foot.php');
    ?>



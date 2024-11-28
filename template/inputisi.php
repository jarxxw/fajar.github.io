<div class="container mt-4">
<h1>INPUT TABEL</h1>

<form method="POST" enctype="multipart/form-data" >
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NIM</label>
    <input type="number" name="nim"class="form-control" value="<?php echo $data ['nim']; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAMA</label>
    <input type="text" name="nama_mhs"class="form-control"value="<?php echo $data ['nama_mhs']; ?>"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">TANGGAL LAHIR</label>
    <input type="date" name="tgl_lahir"class="form-control"value="<?php echo $data ['tgl_lahir']; ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">ALAMAT</label>
    <input type="text" class="form-control" name="alamat"value="<?php echo $data ['alamat']; ?>">
  </div>
  
 
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">PILIH PRODI</label>
  <select class="form-select" name="prodi_id" ?>">
  <option></option>
    <?php
     include("koneksi.php");
     $key = mysqli_query($koneksi, "SELECT * FROM prodi");
     while($prodi=mysqli_fetch_array($key))
     {
      $selected = ($data['prodi_id'] == $prodi['id']) ? 'selected' : '';
    echo '<option value="'.$prodi['id'].'">'.$prodi['nama_prodi'].'</option>';
    
     }
     ?>

      </select>
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">FOTO</label>
    <?php if($data['foto']) 
    { ?>
     <img src="foto/<?php echo $data['foto']; ?>" width="100" height="100">
     <?php
     } 
     ?>
     </div>
    <input type="file"   class="form-control" name="foto">
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>



</form>
</div>
<?php
include("koneksi.php");
?>
<?php
include('template/head.php');
?>
<form method="post">
  <div class="container mt-4">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NIDN</label>
    <input type="number" name="nidn"class="form-control" autofocus>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAMA</label>
    <input type="text" name="nama"class="form-control" autofocus>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">JABATAN</label>
    <input type="text" name="jabatan"class="form-control" autofocus>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
    <input type="text" name="alamat"class="form-control" autofocus>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NO TELEPON</label>
    <input type="number" name="no_telepon"class="form-control" autofocus>
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">JENIS KELAMIN</label>
  <select class="form-select" name="jenis_kelamin">
  <option>LAKI-LAKI</option>
  <option>PEREMPUAN</option>
</select>
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">STATUS</label>
  <select class="form-select" name="status">
  <option>AKTIV</option>
  <option>TIDAK AKTIV</option>
  </select>
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">GELAR</label>
  <select class="form-select" name="gelar">
  <option>S1</option>
  <option>S2</option>
  <option>S3</option>
  </select>

  
</div>
<button name="kirim" class="btn btn-primary">SUBMIT</button>
</div>


</form>
<?php
if (isset($_POST['kirim'])) {
  # code...
  $kirim=mysqli_query($koneksi,"INSERT INTO dosen SET nidn='$_POST[nidn]', nama='$_POST[nama]', jabatan='$_POST[jabatan]', alamat='$_POST[alamat]', no_telepon='$_POST[no_telepon]', jenis_kelamin='$_POST[jenis_kelamin]', gelar='$_POST[gelar]', status ='$_POST[status]'");
if ($kirim) {
  # code...
  echo"<script>alert('Data berhasil di input');window.location.href='dosen.php'</script>";
}
}

?>
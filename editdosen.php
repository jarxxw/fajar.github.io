<?php
include("koneksi.php");
include('template/head.php');
?>
<?php
$tamp=mysqli_query($koneksi,"SELECT * FROM dosen where nidn='$_GET[nidn]' ");
$d=mysqli_fetch_array($tamp);
?>
<form method="post">
  <div class="container mt-4">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NIDN</label>
    <input type="number" name="nidn"class="form-control" autofocus>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAMA</label>
    <input type="text" name="nama"class="form-control"  value="<?php echo $d['nama'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">JABATAN</label>
    <input type="text" name="jabatan"class="form-control" value="<?php echo $d['jabatan'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ALAMAT</label>
    <input type="text" name="alamat"class="form-control" value="<?php echo $d['alamat'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NO TELEPON</label>
    <input type="number" name="no_telepon"class="form-control" value="<?php echo $d['no_telepon'];?>">
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">JENIS KELAMIN</label>
  <select class="form-select" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin'];?>">
  <option>LAKI-LAKI</option>
  <option>PEREMPUAN</option>
</select>
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">STATUS</label>
  <select class="form-select" name="status"value="<?php echo $d['status'];?>" >
  <option>AKTIV</option>
  <option>TIDAK AKTIV</option>
  </select>
</div>
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">GELAR</label>
  <select class="form-select" name="gelar" value="<?php echo $d['gelar'];?>">
  <option>S1</option>
  <option>S2</option>
  <option>S3</option>
  </select>

  <button type="submit" name="kirim" class="btn btn-primary">SUBMIT</button>

</div>
</div>
</form>
<?php
if (isset($_POST['kirim'])) {
    $update=mysqli_query($koneksi,"UPDATE dosen SET nama='$_POST[nama]', jabatan='$_POST[jabatan]', alamat='$_POST[alamat]', no_telepon='$_POST[no_telepon]', jenis_kelamin='$_POST[jenis_kelamin]', gelar='$_POST[gelar]', status ='$_POST[status]' WHERE nidn='$_GET[nidn]'");
    if ($update) {
        echo "<script>
        alert('Data berhasil di edit');
        window.location.href = 'dosen.php';
      </script>";    }
       else {
        echo "error";
    }
}

?>
<?php
include('template/head.php');
?>
<?php
include("koneksi.php");
$tampil=mysqli_query($koneksi,"SELECT * FROM user WHERE email='$_GET[email]'");
$data=(mysqli_fetch_array($tampil));
?>
<div class="container">
<form method="post" enctype="multipart/form-data" >
<div class="mb-3">
    <h1>EDIT AKUN</h1>
    <label for="exampleInputEmail1" class="form-label">EMAIL</label>
    <input type="email" name="email"class="form-control" value="<?php echo $data['email']?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">PASSWORD</label>
    <input type="password" name="password"class="form-control" velue="<?php echo $data['password']?>"> 
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">PILIH ROLE</label>
  <select class="form-select" name="role" value="<?php echo $data['role']?>">
    <option></option>
  <option value="superadmin">super admin</option>
  <option value="admin">admin</option>
  <option value="user">user</option>
      </select>
      
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
</form> 
<?php
if (isset($_POST['kirim'])) {
    $EDIT=mysqli_query($koneksi,"UPDATE user SET email='$_POST[email]', password='$_POST[password]', role='$_POST[role]' WHERE email='$_GET[email]'");
    if ($EDIT) {
        # code...
        echo"<script>alert('Data berhasil di edit');window.location.href='tabeluser.php'</script>";
    }
    else
    {
        echo"error";
    }
    
}

?>
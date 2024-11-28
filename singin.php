<?php
include("koneksi.php");
?>
<?php
include('template/head.php');
?>
<div class="container">
<form method="post" enctype="multipart/form-data" >
<div class="mb-3">
    <h1>BUAT AKUN</h1>
    <label for="exampleInputEmail1" class="form-label">EMAIL</label>
    <input type="email" name="email"class="form-control" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">PASSWORD</label>
    <input type="password" name="password"class="form-control"> 
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">PILIH ROLE</label>
  <select class="form-select" name="role">
    <option></option>
  <option value="superadmin">super admin</option>
  <option value="admin">admin</option>
  <option value="user">user</option>


    

      </select>
      
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>

  
</form>
</div>
<?php
if (isset($_POST['kirim'])) {
    $login=mysqli_query($koneksi,"INSERT INTO user SET email='$_POST[email]', password='$_POST[password]', role='$_POST[role]' ");
    if($login)
    {
       echo"anda berhasil buat akun";
    }else
    {
      echo"email anda sudah terdaftar";
    }
    
}

?>
 
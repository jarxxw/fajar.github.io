<?php
include("koneksi.php");
$hap=mysqli_query($koneksi,"DELETE FROM user WHERE email='$_GET[email]'");
if ($hap) {
echo"<script>alert('Data berhasil di hapus');window.location.href='tabeluser.php'</script>";
}
else
{
    echo"error";
}
?>
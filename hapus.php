<?php
include("koneksi.php");

    $hapus=mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE nim =$_GET[nim]");
    if($hapus)
    {
        echo"<script>
        alert('Data berhasil di hapus');window.location.href='list.php'</script>";

    }else{
        echo"SYSTEM ERROR";
    }
?>

<?php
include("koneksi.php");
$HAPUS=mysqli_query($koneksi,"DELETE FROM dosen WHERE nidn='$_GET[nidn]'");
if ($HAPUS) {
    # code...  
    echo "<script>
            alert('Data berhasil di hapus');
            window.location.href = 'dosen.php';
          </script>";


}else{
    echo"error";
}
?>
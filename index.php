<?php
session_start();
if (!isset($_SESSION['masuk'])) 
{
    header("Location: login.php");
    exit();
}
?>
<?php
include('template/head.php');
?>
<?php
include('template/input.php');
?>
<?php
include('template/foot.php');
?>
<?php
include "koneksi.php";
if (isset($_POST['kirim'])) {
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id'];
    $foto = $_FILES['foto']['name'];
    $dir = "foto/";
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, $dir . $foto);
    
    $input = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, prodi_id, foto) VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat', '$prodi_id', '$foto')");
    
    if ($input) {
        echo "<script>
        alert('Data berhasil di tambah');
        window.location.href='list.php'
        </script>";
    } else {
        echo "<script>alert('Input data salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>tambah</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR (YEAR-MONTH-DATE)</td>
                <td><input type="DATE" name="tgllahir"></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                
                <td><input type="submit" name="kirim"></td>
                <td><input type="reset" ></td>
            </tr>
            <tr>
                <td><a href="list.php">klik disini untuk melihat tabel</a></td>
                
                
            </tr>
            

        </table>
    </form>

    

    
    
</body>
</html>

<?php
include "koneksi.php";
if(isset($_POST['kirim'])){
   mysqli_query($koneksi,"INSERT INTO mahasiswa SET
 nim ='$_POST[nim]',
nama_mhs ='$_POST[nama]',
tgl_lahir ='$_POST[tgllahir]',
alamat ='$_POST[alamat]'");
}


?>

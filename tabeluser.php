<?php
include('template/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .mrg{padding-left:30px}
</style>
<body>
    <div class="mrg">
        <h1>TABLE USER</h1>
<button id="export-pdf" class="btn btn-primary mt-2">Export to PDF</button>
    </div>
    <div class="container mt-4" >
    <table class="table table-bordered mx-auto" id="tabel-list">
        <tr>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>PASSWORD</th>
            <th>AKSI</th>
        </tr>
        <?php
        include("koneksi.php");
        $tampil ="SELECT * FROM user ";
        $select=mysqli_query($koneksi,$tampil);
        while ($data=mysqli_fetch_array($select)) {        
        ?>
        <tr>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['role']?></td>
            <td><?php echo $data['password']?></td>
            <td><a href="hapususer.php?email=<?php echo $data['email']?>">HAPUS</a></td>
            <td><a href="edituser.php?email=<?php echo $data['email']?>">EDIT</a></td>
        </tr>
        <?php
        }
        ?>
         <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabel-list').DataTable({
                searching: true // Aktifkan fitur pencarian
            });
        });
    </script>
        <script>
    $(document).ready(function () {
        $('#tabel-list').DataTable({
            searching: true // Aktifkan fitur pencarian
        });

        $('#export-pdf').click(function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape', 'mm', [300, 210]);


            doc.autoTable({ 
                html: '#tabel-list',
                theme: 'striped',
                headStyles: { fillColor: [52, 73, 94] },
                bodyStyles: { fillColor: [245, 245, 245] }
            });

            doc.save('data_user.pdf');
        });
    });
</script>


</table>
</div>
</body>
</html>
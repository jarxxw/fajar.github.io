<?php
include("koneksi.php");
?>
<?php
include('template/head.php');
?>
<style>
    .mrg{padding-left:30px;}
</style>
    <div class="mrg">
        <H1>TABLE PRODI</H1>
    <button id="export-pdf" class="btn btn-primary mt-2">Export to PDF</button>
    </div>
<div class="container">
<table id="tabel-list"  class="table table-bordered mx-auto">
<thead>
    <tr>
        <th>NO</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>JEANJANG</td>
        <th>PRODI</td>
        <th>KETERANGAN</th>
        <th>AKSI</th>
    </tr>
    
</thead>
<tbody>
    <?php
    $tampil=mysqli_query($koneksi,"SELECT * FROM mahasiswa m JOIN prodi p ON m.prodi_id = p.id ORDER BY p.nama_prodi ASC");
    $no=1;
    while ($data=mysqli_fetch_array($tampil)) {
        
        ?>
        <tr>
         <td><?php echo  $no++; ?></td>
         <td><?php echo $data['nim'] ?> </td>
        <td><?php echo $data['nama_mhs']?></td>
        <td><?php echo $data['jenjang']?></td>
        <td><?php echo $data['nama_prodi']?></td>
        <td><?php echo $data['keterangan']?></td>
        <td><a href="hapus.php?nim=<?php echo $data['nim']?>"class="btn btn-primary">HAPUS</a>
        <a href="editprodi.php?nim=<?php echo $data['nim']?>" class="btn btn-primary">EDIT</a></td>
        
        </tr>

    <?php    
    }

    ?>
    </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js">
        
    </script>
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

            doc.save('data_prodi.pdf');
        });
    });
</script>
</script>


    <?php
    include('template/foot.php');
    ?>
<?php
include("koneksi.php");
include("template/head.php");
?>
<style>
    .mrg{padding-left:30px;}
    table{border-color: black;}
</style>
<div class="mrg">
    <h1>TABLE DOSEN</h1>
    <button onclick="window.location.href='inputdeosen.php'" class="btn btn-primary"> Tambah Data</button>
    <button id="export-pdf" class="btn btn-primary mt-2">Export to PDF</button>
</div>
<div class="container text-center mt-4">
<table id="tabel-list" class="table table-bordered mx-auto">
    <thead>
        <tr>
            <th>NO</th>
            <th>NIDN</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th>GELAR</th>
            <th>ALAMAT</th>
            <th>NO TELEPON</th>
            <th>JENIS KELAMIN</th>
            <th>STATUS</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $NO = 1;
        $TAMPIL = mysqli_query($koneksi, "SELECT * FROM dosen");
        while ($det = mysqli_fetch_array($TAMPIL)) {
        ?>
        <tr>
            <td><?php echo $NO++; ?></td>
            <td><?php echo $det['nidn']; ?></td>
            <td><?php echo $det['nama']; ?></td>
            <td><?php echo $det['jabatan']; ?></td>
            <td><?php echo $det['gelar']; ?></td>
            <td><?php echo $det['alamat']; ?></td>
            <td><?php echo $det['no_telepon']; ?></td>
            <td><?php echo $det['jenis_kelamin']; ?></td>
            <td><?php echo $det['status']; ?></td>
            <td>
                <a href="hapusdosen.php?nidn=<?php echo $det['nidn']; ?>" class="btn btn-danger">HAPUS</a>
                <a href="editdosen.php?nidn=<?php echo $det['nidn']; ?>" class="btn btn-primary">EDIT</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
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

            doc.save('data_dosen.pdf');
        });
    });
</script>

<?php
include("template/foot.php");
?>

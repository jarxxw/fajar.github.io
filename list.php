<?php
include('template/head.php');
?>
<style>
    .marg{padding-left:30px;gap: 10px;}
    
    </style>
    <div class="marg">
    <h1>TABLE DATA MAHASISWA</h1>
    <button id="export-pdf" class="btn btn-primary mt-4">Export to PDF</button>
    </div>
    <div class="container ">
    <table id="tabel-list" class="table table-bordered mx-auto">
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA MAHASISWA</th>
                <th>TANGGAL LAHIR</th>
                <th>ALAMAT</th>
                <th>PRODI</th>
                <th>GAMBAR</th>
                <th>KETERANGAN</th>
                <th>AKSI</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        include "koneksi.php";
        
        $tampil = mysqli_query($koneksi,"SELECT * FROM mahasiswa m JOIN prodi p ON m.prodi_id = p.id");
        while ($data=mysqli_fetch_array($tampil)) {
        ?>
        
        <tr>
            <td><?php echo $data['nim']?></td>
            <td><?php echo $data['nama_mhs']?></td>
            <td><?php echo $data['tgl_lahir']?></td>
            <td><?php echo $data['alamat']?></td>
            <td><?php echo $data['nama_prodi']?></td>
            <td><img src="foto/<?=$data['foto']?>" class="image-fuild" width="150px"></td>
            <td><?php echo $data['keterangan']?></td>
            <td>
                <a href="hapus.php?nim=<?php echo $data['nim']?>" class="btn btn-danger btn-sm">HAPUS</a>
                <a href="edit.php?nim=<?php echo $data['nim']?>" class="btn btn-primary btn-sm">EDIT</a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <button onclick="window.location.href='index.php'" class="btn btn-primary" data-bs-theme="dark">Klik disini untuk nambah data</button>

    </div>

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

            doc.save('data_mahasiswa.pdf');
        });
    });
</script>


<?php
include('template/foot.php');
?>

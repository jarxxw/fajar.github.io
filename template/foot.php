<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and other head elements -->
</head>
<body>
    <!-- Your body content -->

    <div align="center" class="bg-primary text-white py-2 mt-2">
        Copyright &copy; <?= date('Y')?> by Teknik Komputer
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        
   
    $(document).ready(function () {
        $('#tabel-list').DataTable({
            searching: true // Mengaktifkan fitur pencarian
        });
    });
    


   
</body>
</html>

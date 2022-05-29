<!DOCTYPE html>
<html lang="en">

<head>
    
<?= $this->include('template/head') ?>

</head>

<body id="page-top">
<!-- source chart-->
<script src="/dhasa/canvasjs/canvasjs.min.js"></script>
<!-- source chart-->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('template/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <?= $this->renderSection('content'); ?>

            <!-- Footer -->
            <?= $this->include('template/footer') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?= $this->include('template/modal') ?>
    <!-- Akhir Logout Modal-->
    <!-- group javascript-->
    <?= $this->include('template/javascript') ?>
    <script>
        function previewImg() {
            const file = document.querySelector('#file');
            const imgPreview = document.querySelector('.img-preview');
            const fileKate = new FileReader();
            fileKate.readAsDataURL(file.files[0]);

            fileKate.onload = function(e){
                imgPreview.src = e.target.result;
            }
            
        }

       
        
        
        

    </script>
    <!-- akhir group javascript-->
</body>

</html>
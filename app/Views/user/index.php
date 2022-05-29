<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('dashboard/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">KIS APBD</h1> -->
                    <div class="card-body">
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kepsertaan KIS APBD</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="datauser" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>username</th>
                                            <th>email</th>
                                            <th>role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<script type="text/javascript">
    function tampildatauser(){
        $('#datauser').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
            url: "<?= site_url('user/index'); ?>",
            type: 'POST'
        },
        columns: [
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'name', name: 'name'}
        ]
        });
    }

    $(document).ready(function(){
        tampildatauser()
    });

</script>

<?= $this->endSection(); ?>
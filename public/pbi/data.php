<?php include_once('../_header.php');?>
    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Data Pasien</small>
            <div class="pull-right">
                <a href="" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                
            </div>
        </h4>
        <div class="table-responsive">   
            <table class="table table-striped table-bordered table-hover" id="pasien">
                <thead>
                    <tr>
                        <th>Nama</th> 
                        <th>Nik</th>
                        <th>Nomor Kartu</th>
                        <th>Keterangan</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                
            </table>
        </div> 
        <script>
            $(document).ready(function() {
                $('#pasien').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "pasien_data.php",
                
                dom: 'Bfrtip',
                buttons:[{
                    //{
                    //   extend:'pdf',
                    //   orientation:'potrait',
                    //   pageSize:'Legal',
                    //   title:'Data Pasien',
                    //   download: 'open' 
                    //},
                    extend: 'collection',
                    className: 'exportButton',
                    text: 'Data Export',
                    buttons: ['copy','excel','csv','pdf','print'],
                    exportOptions: {
                    modifer: {
                        page: 'all',
                        search: 'none'}
                     }
                    //'pdf','csv','excel','print','copy'
                }],
                columnDefs : [
                    {
                        "searchable":false,
                        "orderable":false,
                        "targets":4,
                        "render": function(data,type,row){
                            var btn="<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a>  <a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                            return btn;
                        }
                    }
                    ]
                } );
             } );
        </script>
    </div>
    
<?php include_once('../_footer.php');?>
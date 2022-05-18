<?= $this->extend('admin_templete/layout') ?>
<?= $this->section('css') ?>
<!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?=base_url('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Designation</h1>
    </div>
    

    <?php $validation = \Config\Services::validation(); ?>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12">
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- <?php if($users): ?>
                    <?php foreach($users as $key => $user): ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo ($user->f_name.' '.$user->l_name); ?></td>
                        <td><?php echo $user->note; ?></td>
                        <td><?php echo ($user->status == "1" ? 'On' : 'Off'); ?></td>
                        <td>
                            <form action="<?php echo base_url('users/delete/'.$user->id);?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                                <a href="<?php echo base_url('users/edit/'.$user->id);?>" class="btn btn-warning"><i class="fas fa-edit fa-sm"></i></a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash fa-sm"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?> -->
                    
                </tbody>
            </table>
        </div>

    
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <!-- DataTables  & Plugins -->
<script src="<?=base_url('/assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/jszip/jszip.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/pdfmake/pdfmake.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/pdfmake/vfs_fonts.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-buttons/js/buttons.html5.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-buttons/js/buttons.print.min.js');?>"></script>
<script src="<?=base_url('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js');?>"></script>

<script>
//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });

$(document).ready(function() {
        $('#example1').DataTable({ 
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            // lengthMenu: [[ 10, 30, -1], [ 10, 30, "All"]], // page length options
            bProcessing: true,
            serverSide: true,
            scrollY: "400px",
            scrollCollapse: true,
            ajax: {
                url: "<?php echo base_url('users/ajax-datatable')?>", // json datasource
                type: "post",
                data: {
                // key1: value1 - in case if we want send data with request
                }
            },
            columns: [
                { data: "id" },
                { data: "name" },
                { data: "note" },
                { data: "status" },
                { data: "action" },
                
            ],
            columnDefs: [
                { orderable: true, targets: [3] }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<?= $this->endSection() ?>
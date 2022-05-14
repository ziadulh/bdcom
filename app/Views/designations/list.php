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

                    <?php if($designations): ?>
                    <?php foreach($designations as $key => $designation): ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $designation['name']; ?></td>
                        <td><?php echo $designation['description']; ?></td>
                        <td><?php echo ($designation['status'] == "1" ? 'On' : 'Off'); ?></td>
                        <td>
                            <form action="<?php echo base_url('designations/delete/'.$designation['id']);?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                                <a href="<?php echo base_url('designations/edit/'.$designation['id']);?>" class="btn btn-warning"><i class="fas fa-edit fa-sm"></i></a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash fa-sm"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<?= $this->endSection() ?>
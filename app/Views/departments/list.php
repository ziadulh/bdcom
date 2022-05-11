<?= $this->extend('admin_templete/layout') ?>
<?= $this->section('css') ?>
<link href="<?=base_url('/assets/vendo/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Department</h1>
    </div>
    

    <?php $validation = \Config\Services::validation(); ?>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
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

                    <?php if($departments): ?>
                    <?php foreach($departments as $key => $department): ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $department['name']; ?></td>
                        <td><?php echo $department['description']; ?></td>
                        <td><?php echo ($department['status'] == "1" ? 'On' : 'Off'); ?></td>
                        <td>
                            <form action="<?php echo base_url('departments/delete/'.$department['id']);?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                                <a href="<?php echo base_url('departments/edit/'.$department['id']);?>" class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
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
    <!-- Page level plugins -->
    <script src="<?=base_url('/assets/vendo/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?=base_url('/assets/vendo/datatables/dataTables.bootstrap4.min.js');?>"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Blirtp',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
    </script>


<?= $this->endSection() ?>
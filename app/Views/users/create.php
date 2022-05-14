<?= $this->extend('admin_templete/layout') ?>

<?= $this->section('content') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <?php $validation = \Config\Services::validation(); ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('users/store') ?>" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="f_name">First Name</label>
                            <input type="text" class="form-control form-control-sm" id="f_name" placeholder="Enter FirstName" name="f_name" value="<?= set_value('f_name') ?>" >
                            <span class="text-danger"><?= $error = $validation->getError('f_name'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Last Name</label>
                            <input type="text" class="form-control form-control-sm" id="l_name" placeholder="Enter FirstName" name="l_name" value="<?= set_value('l_name') ?>" >
                            <span class="text-danger"><?= $error = $validation->getError('l_name'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control form-control-sm" id="email" placeholder="Enter FirstName" name="email" value="<?= set_value('email') ?>" >
                            <span class="text-danger"><?= $error = $validation->getError('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control form-control-sm" id="phone" placeholder="Enter FirstName" name="phone" value="<?= set_value('phone') ?>" >
                            <span class="text-danger"><?= $error = $validation->getError('phone'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control form-control-sm" name="department">
                                <option value="" >Select Department</option>
                                <?php
                                foreach($departments as $department)
                                {
                                    echo '<option value="'.$department["id"].'" '.(set_value('department') == $department["id"] ? 'selected' : '').'>'.$department["name"].'</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?= $error = $validation->getError('department'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="designation">Department</label>
                            <select class="form-control form-control-sm" name="designation">
                                <option value="" >Select Designation</option>
                                <?php
                                foreach($designations as $designation)
                                {
                                    echo '<option value="'.$designation["id"].'"'.(set_value('designation') == $designation["id"] ? 'selected' : '').'>'.$designation["name"].'</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?= $error = $validation->getError('designation'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" id="note" placeholder="Enter note" name="note"><?php echo set_value("note")?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control form-control-sm" id="password" placeholder="Enter FirstName" name="password" value="<?= set_value('password') ?>" >
                            <span class="text-danger"><?= $error = $validation->getError('password'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control form-control-sm" name="status">
                                <option value="1" <?= set_value('status') == '1' ? 'selected' : '' ?> >On</option>
                                <option value="0" <?= set_value('status') == '0' ? 'selected' : '' ?>>Off</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
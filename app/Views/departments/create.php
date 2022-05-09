<?= $this->extend('admin_templete/layout') ?>

<?= $this->section('content') ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Department</h1>
    </div>
    

    <!-- Content Row -->
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
    <form action="<?= base_url('departments/store') ?>" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control form-control-sm" id="name" placeholder="Enter Name" name="name">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" placeholder="Enter Description" name="description"></textarea>
        </div>
        <div class="form-group">
            <select class="form-control form-control-sm" name="status">
                <option value="1">On</option>
                <option value="0">Off</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    
    </div>
<?= $this->endSection() ?>
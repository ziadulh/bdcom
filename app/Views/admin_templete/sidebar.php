<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<?php $uri = service('uri'); ?>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo ($uri->getSegment(1)=='departments' ? 'active' : '') ?> ">
    <a class="nav-link <?php echo ($uri->getSegment(1)=='departments' ? '' : 'collapsed') ?>" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="<?php echo ($uri->getSegment(1)=='departments' ? 'true' : 'false') ?>" aria-controls="collapseOne">
        <!-- <i class="fas fa-fw fa-cog"></i> -->
        <i class="far fa-building"></i>
        <span>Department</span>
    </a>
    <div id="collapseOne" class="collapse <?php echo ($uri->getSegment(1)=='departments' ? 'show' : '') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Department:</h6>
            <a class="collapse-item" href="<?= base_url('departments') ?>">List</a>
            <a class="collapse-item" href="<?= base_url('departments/create') ?>">Add</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo ($uri->getSegment(1)=='designations' ? 'active' : '') ?>">
    <a class="nav-link <?php echo ($uri->getSegment(1)=='designations' ? 'collapsed' : '') ?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="<?php echo ($uri->getSegment(1)=='designations' ? 'true' : 'false') ?>" aria-controls="collapseTwo">
        <!-- <i class="fas fa-fw fa-cog"></i> -->
        <i class="far fa-building"></i>
        <span>Designation</span>
    </a>
    <div id="collapseTwo" class="collapse <?php echo ($uri->getSegment(1)=='designations' ? 'show' : '') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Designation:</h6>
            <a class="collapse-item" href="<?= base_url('designations') ?>">List</a>
            <a class="collapse-item" href="<?= base_url('designations/create') ?>">Add</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
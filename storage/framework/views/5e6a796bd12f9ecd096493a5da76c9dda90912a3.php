<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php if(auth()->user()->role=='Patient'): ?>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/patient/home')); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-band-aid"></i>
        </div>
        <div class="sidebar-brand-text mx-2">VacciNation</div>
    </a>
    <?php elseif(auth()->user()->role=='HealthcareAdmin'): ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/admin-healthcare/home')); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-band-aid"></i>
                </div>
                <div class="sidebar-brand-text mx-2">VacciNation</div>
            </a>
    <?php elseif(auth()->user()->role=='SuperAdmin'): ?>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/super-admin/home')); ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-band-aid"></i>
            </div>
            <div class="sidebar-brand-text mx-2">VacciNation</div>
        </a>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php if(auth()->user()->role=='SuperAdmin'): ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php echo e(Request::is('super-admin/home') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(url('/super-admin/home')); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Super Admin Menus
        </div>

        <!-- Nav Item -->
        <li class="nav-item <?php echo e(Request::is('add-healthcare')  ? 'active' : ''); ?>">
            <a class="nav-link " href="<?php echo e(route('add-healthcare.index')); ?>">
                <i class="fas fa-hospital-alt"></i>
                <span>Add Healthcare Centre</span></a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item <?php echo e(Request::is('add-vaccine')  ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('add-vaccine.index')); ?>">
                <i class="fas fa-file-medical"></i>
                <span>Add New Vaccine</span></a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item <?php echo e(Request::is('register-adminhc')  ? 'active' : ''); ?>">
            <a class="nav-link " href="<?php echo e(route('register-adminhc.index')); ?>">
                <i class="fas fa-hospital-user"></i>
                <span>Register Healthcare Admin</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-file-medical-alt"></i>
                <span>View Vaccination History</span></a>
        </li>

    <?php elseif(auth()->user()->role=="HealthcareAdmin"): ?>
        <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo e(Request::is('admin-healthcare/home')  ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('/admin-healthcare/home')); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Healthcare Administrator Menus
            </div>

            <!-- Nav Item -->
            <li class="nav-item <?php echo e(Request::is('record-batch')  ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('record-batch.index')); ?>">
                    <i class="fas fa-file-medical"></i>
                    <span>Record Vaccine Batch</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file-alt"></i>
                    <span>View Vaccination Information</span></a>
            </li>
    <?php elseif(auth()->user()->role=="Patient"): ?>
        <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo e(Request::is('patient/home')  ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('/patient/home')); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Patient Menus
            </div>

            <li class="nav-item <?php echo e(Request::is('appointment-vaccination')  ? 'active' : ''); ?> " >
                <a class="nav-link active" href="<?php echo e(route('appointment-vaccination.index')); ?>">
                    <i class="fas fa-file-medical"></i>
                    <span>Request Vaccination Appointment</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item <?php echo e(Request::is('')  ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('patient-status', Auth::user()->id)); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>View Vaccination Status</span></a>
            </li>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-file-alt"></i>
                    <span>View Vaccination Queue</span></a>
            </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<?php /**PATH C:\xampp\htdocs\vaccination\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>
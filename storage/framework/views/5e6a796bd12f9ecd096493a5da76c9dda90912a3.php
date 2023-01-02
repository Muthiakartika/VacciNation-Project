<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="<?php echo e(asset('admin/img/admin-logo3.png')); ?>" class="img-fluid icon-circle" alt="VacciNation">
        </div>
        <div class="sidebar-brand-text mx-2 ">
            <span>VacciNation</span>
        </div>
    </a>

        <?php if(auth()->user()->role=='SuperAdmin'): ?>
                <!-- Nav Item - Dashboard -->
                    <li class="nav-item <?php echo e(Request::is('super-admin/home') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('super-admin.home')); ?>" class="nav-link ">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <!-- Nav Item -->
                    <li class="nav-item <?php echo e(Request::is('healthcare') ||Request::is('healthcare/*') ? 'active' : ''); ?>">
                        <a class="nav-link "
                           href="<?php echo e(route('healthcare.index')); ?>">
                            <i class="fas fa-hospital-alt"></i>
                            <span><?php echo e(__('add-healthcare')); ?></span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item <?php echo e(Request::is('vaccine') ||Request::is('vaccine/*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('vaccine.index')); ?>">
                            <i class="fas fa-file-medical"></i>
                            <span><?php echo e(__('add-vaccine')); ?></span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item <?php echo e(Request::is('admin-healthcare') ||Request::is('admin-healthcare/*') ? 'active' : ''); ?>">
                        <a class="nav-link " href="<?php echo e(route('admin-healthcare.index')); ?>">
                            <i class="fas fa-hospital-user"></i>
                            <span><?php echo e(__('regis-healthcare')); ?></span></a>
                    </li>

                    <!-- Nav Item - Tables -->
                    <li class="nav-item <?php echo e(Request::is('vaccination-history')  ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('vaccinationHistory.index')); ?>">
                            <i class="fas fa-file-medical-alt"></i>
                            <span><?php echo e(__('vaccine-history')); ?></span></a>
                    </li>
        <?php elseif(auth()->user()->role == 'HealthcareAdmin'): ?>
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item <?php echo e(Request::is('healthcare-admin/home')  ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('healthcare-admin.home')); ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item -->
                    <li class="nav-item <?php echo e(Request::is('batches')  ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('batches.index')); ?>">
                            <i class="fas fa-file-medical"></i>
                            <span><?php echo e(__('record-vaccine')); ?></span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item <?php echo e(Request::is('manage-vaccination') || Request::is('confirm-vaccinations/*')
                      || Request::is('reject-vaccinations/*') || Request::is('administered-vaccinations/*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('manage-vaccination.index')); ?>">
                            <i class="fas fa-file-alt"></i>
                            <span><?php echo e(__('vaccine-info')); ?></span></a>
                    </li>

        <?php elseif(auth()->user()->role=='Patient'): ?>
                <!-- Nav Item - Dashboard -->
                    <li class="nav-item <?php echo e(Request::is('patient/home')  ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('patient.home')); ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item <?php echo e(Request::is('vaccinations')  ? 'active' : ''); ?> " >
                        <a class="nav-link active" href="<?php echo e(route('vaccinations.index')); ?>">
                            <i class="fas fa-file-medical"></i>
                            <span><?php echo e(__('request-vaccination')); ?></span></a>
                    </li>

    
                    <li class="nav-item <?php echo e(Request::is('')  ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('vaccination-status.show', Auth::user()->id)); ?>">
                            <i class="fas fa-file-alt"></i>
                            <span><?php echo e(__('view-status')); ?></span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item <?php echo e(Request::is('')  ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('queues.index')); ?>">
                            <i class="fas fa-file-alt"></i>
                            <span><?php echo e(__('view-queue')); ?></span></a>
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
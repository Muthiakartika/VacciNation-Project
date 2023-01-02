<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">


    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle" src="<?php echo e(asset('admin/img/'.app()->getLocale().'.png')); ?>" alt="Flag">
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="userDropdown">
            <?php if(app()->getLocale()=='id'): ?>
                <a class="dropdown-item" href="<?php echo e(url('locale/en')); ?>">
                    <?php echo e(__('english')); ?>

                </a>
            <?php endif; ?>

            <?php if(app()->getLocale()=='en'): ?>
                <a class="dropdown-item"  href="<?php echo e(url('locale/id')); ?>">
                    <?php echo e(__('indonesian')); ?>

                </a>
            <?php endif; ?>
        </div>
    </li>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(auth()->user()->name); ?></span>

            <!--Users Profile-->
            <?php if(\Illuminate\Support\Facades\Auth::user()->profile_img): ?>
                <img class="img-profile rounded-circle"
                     src="<?php echo e(asset('storage/'.Auth::user()->profile_img)); ?>">
            <?php else: ?>
                <img class="img-profile rounded-circle" src="<?php echo e(asset('admin/img/favicon2.png')); ?>" alt="...">
            <?php endif; ?>
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="userDropdown">
            <?php if(\Illuminate\Support\Facades\Auth::user()->role == 'HealthcareAdmin'): ?>
                <a class="dropdown-item" href="<?php echo e(route('admin-healthcare.reset-index')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-light-200"></i>
                    <?php echo e(__('manage profile')); ?>

                </a>
            <?php elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Patient'): ?>
                <a class="dropdown-item" href="<?php echo e(route('patient-bio.index')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-light-200"></i>
                    <?php echo e(__('manage profile')); ?>

                </a>
            <?php elseif(\Illuminate\Support\Facades\Auth::user()->role == 'SuperAdmin'): ?>
                <a class="dropdown-item" href="<?php echo e(route('super-admins.index')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-light-200"></i>
                    <?php echo e(__('manage profile')); ?>

                </a>
            <?php endif; ?>




            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-light-200"></i>
                <?php echo e(__('logout')); ?>

            </a>
        </div>
    </li>
</ul>
<?php /**PATH C:\xampp\htdocs\vaccination\resources\views/layouts/header.blade.php ENDPATH**/ ?>
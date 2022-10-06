<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination Appointment</h1>
        <p class="mb-4">

        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif(session()->has('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?></p>

        <!-- Topbar Search -->
        <div class="mb-4">
            <form class="d-none d-sm-inline-block form-inline mr-5 ml-md-6 my-6 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-white  " placeholder="Search for..."
                           aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form><br>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Healthcare Recommendation</h6>
                    </div>


                        <img src="https://source.unsplash.com/1200x400?hospital" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title h3 mb-2 text-gray-600">Healthcare Centre</h3>
                            <h6 class="card-text h6 mb-2 text-gray-500">Address</h6>
                            <h6 class="card-text h6 mb-2 text-gray-500">Phone Number</h6>
                            <p class="card-text text-gray-500"><small class="text-muted">Operational Day</small></p>
                            <a href="#" class=" btn btn-sm btn-success">choose</a>
                        </div>

                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Healthcare Centre Data</h6>
                    </div>
                    <?php $__currentLoopData = $healthcare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datahc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-4">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        
                                        <?php if($datahc->img): ?>
                                            <img src="<?php echo e(asset('storage/'.$datahc->img)); ?>"
                                                 class="img-fluid rounded-start" alt="...">
                                        <?php else: ?>
                                            <img src="https://source.unsplash.com/300x200?hospital"
                                                 class="img-fluid rounded-start" alt="...">
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title h3 mb-2 text-gray-600"><?php echo e($datahc["centreName"]); ?></h3>
                                            <h6 class="card-text h6 mb-2 text-gray-500"><?php echo e($datahc["address"]); ?></h6>
                                            <h6 class="card-text h6 mb-2 text-gray-500"><?php echo e($datahc["phone"]); ?></h6>
                                            <p class="card-text text-gray-500">
                                                <small class="text-muted"><?php echo e($datahc["optDay"]); ?></small></p>
                                            <a href="<?php echo e(route('vaccine-appointment',$datahc->centreName)); ?>"
                                               class="btn btn-success">choose</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/vaccination/index.blade.php ENDPATH**/ ?>
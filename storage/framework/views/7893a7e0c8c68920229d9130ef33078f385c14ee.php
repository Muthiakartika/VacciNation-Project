<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination Appointment</h1>
        <p class="mb-4">

        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e($message); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif($message = Session::get('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e($message); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?> </p>

        <!-- Topbar Search -->
        <div class="mb-4 justify-content-center">
            <form class="d-none d-sm-inline-block form-inline mr-5 ml-md-6 my-6 my-md-0 mw-100 navbar-search"
                  action="<?php echo e(route('vaccinations.index')); ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-white  " placeholder="Search hospital.." name="search"
                           value="<?php echo e(request('search')); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Healthcare Recommendation</h6>
                    </div>


                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $__currentLoopData = $loc_healthcare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide => $datahc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($slide == 0 ? 'active' : ''); ?>">
                                    <img class="d-block w-100"  id="image-carousel" src="<?php echo e(asset('storage/'.$datahc->img)); ?>"  alt="Healthcare Centre">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="font-weight-bolder" style="color: #ffc107" ><?php echo e($datahc->centreName); ?></h3>
                                        <a href="<?php echo e(route('vaccination.create',$datahc->centreName)); ?>"
                                           class="btn btn-md btn-success" onclick="return confirm('Do you want to choose this Healthcare ? ')">Choose healthcare</a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>



            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Healthcare Centre Data</h6>
                    </div>

                    
                    <?php if($healthcare->count() > 0): ?>
                        <?php $__currentLoopData = $healthcare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datahc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-4">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        
                                        <?php if($datahc->img): ?>
                                            <img src="<?php echo e(asset('storage/'.$datahc->img)); ?>"
                                                 class="img-fluid" id="img-src" alt="Healthcare Centre">
                                        <?php else: ?>
                                            <img src="https://source.unsplash.com/280x216?hospital"
                                                 class="img-fluid" alt="Healthcare Centre">
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title h3 mb-2 text-gray-600"><?php echo e($datahc->centreName); ?></h3>
                                            <h6 class="card-text h6 mb-2 text-gray-500"><?php echo e($datahc["address"]); ?></h6>
                                            <h6 class="card-text h6 mb-2 text-gray-500"><?php echo e($datahc["phone"]); ?></h6>
                                            <p class="card-text text-gray-500">
                                                <small class="text-muted"><?php echo e($datahc["optDay"]); ?></small></p>
                                            <a href="<?php echo e(route('vaccination.create',$datahc->centreName)); ?>"
                                               class="btn btn-success">choose</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="card mb-4">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-text mb-2 text-black">Healthcare centre doesn't found</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/vaccination/index.blade.php ENDPATH**/ ?>
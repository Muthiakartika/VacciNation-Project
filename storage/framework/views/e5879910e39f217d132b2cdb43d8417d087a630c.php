<?php $__env->startSection('content'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Super Admin Dashboard</h1>
                <br>
            </div>
            <!-- Content Row -->
            <div class="row">

                <?php
                    $dataHealthcare = DB::table('healthcares')->count();
                    $dataPatient = DB::table('users')->where('role', 'Patient')->count();
                ?>
                <!-- Healthcares Data -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Healthcare Centre</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">

                                        <?php echo e($dataHealthcare); ?>


                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Data -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-auto py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Patient</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo e($dataPatient); ?>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Illustrations -->
                <div class="col-lg-12 mb-4">


                    <div class="card shadow mb-4">



                        <div class="card-body">





                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                     src="<?php echo e(asset('sb-admin/img/undraw_doctors_hwty.svg')); ?>" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/superadmin/superadmin-home.blade.php ENDPATH**/ ?>
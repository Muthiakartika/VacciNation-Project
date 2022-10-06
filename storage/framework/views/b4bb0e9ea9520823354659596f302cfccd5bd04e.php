<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Patient Dashboard</h1>
            <br>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-success">Hello Mr/Mrs.<?php echo e(auth()->user()->name); ?></h5>
                    </div>
                    <div class="card-body">
                        <br>
                        <br>
                        <div class="text-center">
                            <img class="img-fluid px-2 px-sm-3 mt-2 mb-3" style="width: 25rem;"
                                 src="<?php echo e(asset('sb-admin/img/undraw_medical_care_movn.svg')); ?>" alt="Patient">
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/patient/patient-home.blade.php ENDPATH**/ ?>
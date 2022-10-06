<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Healthcare Administrator Table</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Healthcare Administrator Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="<?php echo e(route('register-adminhc.create')); ?>" class="btn btn-outline-success">Register Healthcare Administrator</a>
                    <br>
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Healthcare Centre</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Healthcare Centre</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $healthcareAdmin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataadmin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($dataadmin->centreName); ?></td>
                                <td><?php echo e($dataadmin->name); ?></td>
                                <td><?php echo e($dataadmin->email); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/superadmin/index.blade.php ENDPATH**/ ?>
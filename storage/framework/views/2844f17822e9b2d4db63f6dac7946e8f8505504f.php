<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Healthcare Centre Table</h1>
        <p class="mb-4">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Data Healthcare Centre</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="<?php echo e(route('add-healthcare.create')); ?>" class="btn btn-outline-success">Add New Healthcare Centre</a>
                    <br>
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Operational Day</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Operational Day</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $healthcare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datahc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($datahc->centreName); ?></td>
                                <td><?php echo e($datahc->address); ?></td>
                                <td><?php echo e($datahc->phone); ?></td>
                                <td><?php echo e($datahc->optDay); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/healthcare/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Add New Healthcare Centre</h1>

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
        <?php endif; ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-6">
                    <a href="<?php echo e(route('healthcare.create')); ?>" class="btn btn-success">Add New Healthcare Centre</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
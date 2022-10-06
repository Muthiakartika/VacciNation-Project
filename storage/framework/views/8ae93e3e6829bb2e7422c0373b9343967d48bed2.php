<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccines Table</h1>
        <p class="mb-4">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Vaccines</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="<?php echo e(route('add-vaccine.create')); ?>" class="btn btn-outline-success">Add New Vaccine</a>
                        <br>
                        <br>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Manufacturer</th>
                                <th>Vaccine Name</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Manufacturer</th>
                                <th>Vaccine Name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $vaccine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataVaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($dataVaccine->manufacturer); ?></td>
                                    <td><?php echo e($dataVaccine->vaccineName); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo $vaccine->links(); ?>

                    </div>
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/vaccine/index.blade.php ENDPATH**/ ?>
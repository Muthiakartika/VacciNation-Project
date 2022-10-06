<?php $__env->startSection('content'); ?>

    <?php
        $vaccineDose = DB::table('vaccinations')->where('vaccinations.vaccineDose', 'Pending');
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Patient Vaccination Status</h1>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Patient Vaccination Status Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Vaccine Dose</th>
                            <th>Vaccine</th>
                            <th>Appointment</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Centre Name</th>
                            <th>Address</th>
                            <th>Vaccine Dose</th>
                            <th>Vaccine</th>
                            <th>Appointment</th>
                            <th>Status</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataVaccination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($dataVaccination->vaccineDose == "1 Dose"): ?>
                                <tr>
                                    <td><?php echo e($dataVaccination->name); ?></td>
                                    <td><?php echo e($dataVaccination->batchNo); ?></td>
                                    <td><?php echo e($dataVaccination->centreName); ?></td>
                                    <td><?php echo e($dataVaccination->address); ?></td>
                                    <td><?php echo e($dataVaccination->vaccineDose); ?></td>
                                    <td><?php echo e($dataVaccination->vaccineName); ?></td>
                                    <td><?php echo e($dataVaccination->appointmentDate); ?></td>


                                    <?php if($dataVaccination->status == 'Pending'): ?>
                                        <td><p class="btn btn-warning btn-sm">Pending</p></td>
                                    <?php elseif($dataVaccination->status == 'Confirm'): ?>
                                        <td><p class="btn btn-success btn-sm">Confirm</p></td>
                                    <?php endif; ?>
                                </tr>

                            <?php endif; ?>
                            <?php if($dataVaccination->vaccineDose == "2 Dose"): ?>
                                <tr>
                                    <td><?php echo e($dataVaccination->name); ?></td>
                                    <td><?php echo e($dataVaccination->batchNo); ?></td>
                                    <td><?php echo e($dataVaccination->centreName); ?></td>
                                    <td><?php echo e($dataVaccination->address); ?></td>
                                    <td><?php echo e($dataVaccination->vaccineDose); ?></td>
                                    <td><?php echo e($dataVaccination->vaccineName); ?></td>
                                    <td><?php echo e($dataVaccination->appointmentDate); ?></td>


                                    <?php if($dataVaccination->status == 'Pending'): ?>
                                        <td><p class="btn btn-warning btn-sm">Pending</p></td>
                                    <?php elseif($dataVaccination->status == 'Confirm'): ?>
                                        <td><p class="btn btn-success btn-sm">Confirm</p></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endif; ?>
                            <?php if($dataVaccination->vaccineDose == "Booster"): ?>
                                <tr>
                                    <td><?php echo e($dataVaccination->name); ?></td>
                                    <td><?php echo e($dataVaccination->batchNo); ?></td>
                                    <td><?php echo e($dataVaccination->centreName); ?></td>
                                    <td><?php echo e($dataVaccination->address); ?></td>
                                    <td><?php echo e($dataVaccination->vaccineDose); ?></td>
                                    <td><?php echo e($dataVaccination->vaccineName); ?></td>
                                    <td><?php echo e($dataVaccination->appointmentDate); ?></td>


                                    <?php if($dataVaccination->status == 'Pending'): ?>
                                        <td><p class="btn btn-warning btn-sm">Pending</p></td>
                                    <?php elseif($dataVaccination->status == 'Confirm'): ?>
                                        <td><p class="btn btn-success btn-sm">Confirm</p></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/vaccination/view-vaccination-status.blade.php ENDPATH**/ ?>
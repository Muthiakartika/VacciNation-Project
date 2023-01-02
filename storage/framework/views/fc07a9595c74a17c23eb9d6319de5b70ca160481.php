<?php $__env->startSection('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vaccination Form</h1>

        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e($message); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Available Vaccine Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Manufacturer</th>
                            <th>Vaccine</th>
                            <th>Exp Date</th>
                            <th>Qty</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataVaccination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($dataVaccination->batchNo); ?></td>
                                <td><?php echo e($dataVaccination->manufacturer); ?></td>
                                <td><?php echo e($dataVaccination->vaccineName); ?></td>
                                <td><?php echo e($dataVaccination->expiryDate); ?></td>
                                <td><?php echo e($dataVaccination->qtyAvailable); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tr>
                            <th>Batch</th>
                            <th>Manufacturer</th>
                            <th>Vaccine</th>
                            <th>Exp Date</th>
                            <th>Qty</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Form Input</h6>
            </div>
            <div class="card-body">

                <form method="POST" action="<?php echo e(route('vaccinations.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="patientName" value="<?php echo e(auth()->user()->name); ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">
                    </div>

                    <div class="form-group">
                        <label for="vaccineDose">Vaccine Dose <span class="text-danger">*</span></label>
                        <select type="text" class="form-control  <?php $__errorArgs = ['vaccineDose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="vaccineDose" onchange="showDiv(this)">
                            <option value="#" disabled selected>Vaccine Dose</option>
                            <option value="1 Dose" >First Dose</option>
                            <option value="2 Dose" >Second Dose</option>
                            <option value="Booster" >Booster</option>
                        </select>
                        <?php $__errorArgs = ['vaccineDose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label>Batch No<span class="text-danger">*</span></label>
                        <input class="form-control <?php $__errorArgs = ['batchNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " type="text" name="batchNo">
                        <?php $__errorArgs = ['batchNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label>Appointment Date<span class="text-danger">*</span></label>
                        <input class="form-control <?php $__errorArgs = ['appointmentDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               type="date" name="appointmentDate">
                        <?php $__errorArgs = ['appointmentDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo e(route('vaccinations.index')); ?>">Back</a>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/vaccination/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <?php if(auth()->user()->role == 'admin'): ?>
                    <a href="<?php echo e(url('admin.routes')); ?>">Admin</a>
                <?php else: ?>
                    <div class=”panel-heading”>Normal User</div>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vaccination\resources\views/home.blade.php ENDPATH**/ ?>
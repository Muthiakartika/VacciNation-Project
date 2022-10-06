<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('sb-admin/img/favicon.png')); ?>" type="img/png">
    <title>VacciNation - Super Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('sb-admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('sb-admin/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('sb-admin/vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Topbar -->
            <?php echo $__env->yieldContent('content'); ?>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('sb-admin/vendor/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('sb-admin/vendor/jquery-easing/jquery.easing.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('sb-admin/js/sb-admin-2.js')); ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo e(asset('sb-admin/vendor/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('sb-admin/vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo e(asset('sb-admin/js/demo/datatables-demo.js')); ?>"></script>

<!-- Date -->
<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("expiryDate")[0].setAttribute('min', today);
</script>

<!-- Date -->
<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("appointmentDate")[0].setAttribute('min', today);
</script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\vaccination\resources\views/layouts/app.blade.php ENDPATH**/ ?>
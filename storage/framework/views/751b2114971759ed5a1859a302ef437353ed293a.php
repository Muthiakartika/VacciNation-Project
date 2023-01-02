<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('sb-admin/img/favicon.png')); ?>" type="img/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('auth.name', 'VacciNation')); ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('sb-admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('sb-admin/css/sb-admin-2.css')); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-success">

<?php echo $__env->yieldContent('content'); ?>;

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('sb-admin/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('sb-admin/js/sb-admin-2.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\vaccination\resources\views/layouts/auth.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Otrixcommerce Laravel')); ?></title>
        <!-- Favicon -->
        <link href="<?php echo e(asset('assets')); ?>/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- Icons -->
        <link href="<?php echo e(asset('assets')); ?>/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="<?php echo e(asset('assets')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="<?php echo e(asset('assets')); ?>/css/otrixweb.css?v=1.0.0" rel="stylesheet">

        <!-- css -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/menu.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/proctuct.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/home.css"> -->

    </head>
    <body class="<?php echo e($class ?? ''); ?>">

            <?php echo $__env->yieldContent('content'); ?>

        <script src="<?php echo e(asset('assets')); ?>/vendor/jquery/dist/jquery.min.js"></script>
        <!-- <script src="<?php echo e(asset('assets')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->

        <?php echo $__env->yieldPushContent('js'); ?>

        <!-- Argon JS -->
        <script src="<?php echo e(asset('assets')); ?>/js/otrixweb.js?v=1.0.0"></script>
        <!-- <script type="text/javascript" src="<?php echo e(asset('frontend')); ?>/js/jquery.js"></script> -->

    </body>
</html>
<?php /**PATH /home/u298273519/domains/vidhyarthigeethavali.com/public_html/uesi/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>
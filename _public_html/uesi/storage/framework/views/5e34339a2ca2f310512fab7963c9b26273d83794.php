<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Vidhyarthi Geethavali</title>
        <!-- Favicon -->
        <link href="<?php echo e(asset('assets')); ?>/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="<?php echo e(asset('assets')); ?>/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="<?php echo e(asset('assets')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- otrixweb CSS -->
        <link type="text/css" href="<?php echo e(asset('assets')); ?>/css/otrixweb.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="<?php echo e($class ?? ''); ?>" style="background:#f7f7f7">

       <div class="main-content" style="background:#f7f7f7">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <script src="<?php echo e(asset('assets')); ?>/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo e(asset('assets')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <?php echo $__env->yieldPushContent('js'); ?>

        <!-- otrixweb JS -->
        <script src="<?php echo e(asset('assets')); ?>/js/otrixweb.js?v=1.0.0"></script>
    </body>
</html>
<?php /**PATH /home/u298273519/domains/vidhyarthigeethavali.com/public_html/uesi/resources/views/auth/layouts/app.blade.php ENDPATH**/ ?>
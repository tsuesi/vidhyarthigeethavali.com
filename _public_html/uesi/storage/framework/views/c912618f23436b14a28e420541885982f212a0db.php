<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Otrixweb Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('uploads')); ?>/store/<?php echo e(config('settingConfig.config_icon_image')); ?>" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/otrixweb.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('custom')); ?>/css/custom.css" type="text/css">
    <style>
        .global-alert-message {
            margin-left: 10px;
            width: 100%;
            margin-bottom: 0px !important;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
<?php if(auth()->guard()->check()): ?>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
<?php endif; ?>
<!-- Sidenav -->
<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
<?php echo $__env->make('admin.layouts.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Header -->
    <!-- Header -->
<?php echo $__env->yieldContent('content'); ?>
</div>
<!-- Argon Scripts -->

<script src="<?php echo e(asset('assets')); ?>/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo e(asset('assets')); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>

    $("#languageTab a[data-toggle=tab]").on("click", function(e) {
      var idx = $(this).index('a[data-toggle="tab"]');
      $('#languageTab a').removeClass('text-primary font-weight-bold text-lg')
      $(this).addClass('text-primary font-weight-bold text-lg')
    });

    const datePickerFormat = "<?php echo e(config('constant.date_format')['date_format_js']); ?>"

    $('ul.navbar-nav li.nav-item div ul li').each(function(ind,val){
            if($(this).find('a').attr('href') == $(location).attr('href'))
            {
                $(this).parents('div.collapse').addClass('show');
                $(this).parents('div.collapse').siblings('a.nav-link').addClass('active');
                $(this).parents('div.collapse').siblings('a.nav-link').attr('aria-expanded',true);
                $(this).parents('ul.nav').siblings('a.nav-link').addClass('active');
                $(this).parents('ul.nav').siblings('a.nav-link').attr('aria-expanded',true);
                $(this).addClass('current_sidebar_link');
                // $(this).parent('a.nav-link').addClass('active');
            }
    })
</script>
<?php echo $__env->yieldPushContent('js'); ?>
<!-- Core -->
<script src="<?php echo e(asset('assets')); ?>/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo e(asset('assets')); ?>/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo e(asset('assets')); ?>/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo e(asset('assets')); ?>/js/otrixweb.js?v=1.2.0"></script>
<script src="<?php echo e(asset('custom')); ?>/custom.js"></script>

</body>

</html>
<?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>
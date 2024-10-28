<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="baseURL" content="<?php echo e(url('/')); ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                <!-- Favicon -->
        <link href="<?php echo e(asset('assets')); ?>/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- css -->
        <?php echo $__env->yieldPushContent('css'); ?>
        <link href="<?php echo e(asset('frontend')); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/retronotify.css">

        <?php echo $__env->make('frontend.layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    </head>
    <body class="<?php echo e($class ?? ''); ?>">
          <?php echo $__env->yieldContent('content'); ?>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="<?php echo e(asset('frontend')); ?>/js/retronotify.js"></script>
            <script type="text/javascript">
              $( document ).ready(function() {
                <?php if(Session::has('commonError')) { ?>
                      new RetroNotify({
                        style: 'white',
                        animate: 'slideTopRight',
                        contentHeader: '<i class="fa fa-info"></i> Error',
                        contentText: '<?php echo \Session::get('commonError'); ?>',
                        closeDelay: 2500
                      });

                <?php  } ?>
                <?php if(Session::has('commonSuccess')) { ?>
                      new RetroNotify({
                        style: 'green',
                        animate: 'slideTopRight',
                        contentHeader: '<i class="fa fa-check"></i> Success',
                        contentText: '<?php echo \Session::get('commonSuccess'); ?>',
                        closeDelay: 2500
                      });
                <?php  } ?>
              });
            </script>
          <?php echo $__env->yieldPushContent('js'); ?>
    </body>
</html>
<?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/installation/app.blade.php ENDPATH**/ ?>
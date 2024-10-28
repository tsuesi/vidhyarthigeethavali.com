

<?php $__env->startSection('content'); ?>
<!--	START BANNER  -->
    <div class="header bg-default py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white"><?php echo e(__('Welcome to Otrixcommerce.')); ?></h1>
                        <a href="<?php echo e(url('/admin/login')); ?>">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', ['class' => 'bg-white'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/frontend/welcome.blade.php ENDPATH**/ ?>
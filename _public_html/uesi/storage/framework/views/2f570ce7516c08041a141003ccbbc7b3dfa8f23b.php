
<link href="<?php echo e(asset('frontend')); ?>/css/select2.min.css" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">SMS Marketing</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('manufacturer')); ?>">SMS Marketing</a></li>
                                <li class="breadcrumb-item">Add</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-left">
                     <?php if(!empty($AlertMsg)): ?>
                        <div class="alert alert-danger"> <?php echo e($AlertMsg); ?></div>
                    <?php endif; ?>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <h3 class="mb-0"><?php echo e(__('Add')); ?></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('smsmarketing.send')); ?>" enctype="multipart/form-data" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('post'); ?>

                                <h6 class="heading-small text-muted mb-4"><?php echo e(__('Send SMS')); ?></h6>

                                <?php if(session('status')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(session('status')); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <div class="pl-lg-4 row">
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-control-label" for="status"><?php echo e(__('Mobile Number')); ?></label>
                                                <select name="telephone_arr[]" id="select_emailIds" class="db-store-multiple topstoreselect" required="required"
                                                multiple="multiple">
                                                    <option value="1">All</option>
                                                    
                                                    <?php $__currentLoopData = $telephonesRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->telephone); ?>"><?php echo e($value->telephone); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="input-title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="title" id="input-title" class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title', '')); ?>" autofocus>

                                        <?php if($errors->has('title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>


                                    <div class="col-md-6 form-group<?php echo e($errors->has('textmessege') ? ' has-danger' : ''); ?>">
                                        <label class="form-control-label" for="input-textmessege"><?php echo e(__('Text Messege')); ?></label>
                                        <input type="text" name="textmessege" id="textmessege" value="<?php echo e(old('textmessege', '')); ?>" placeholder="<?php echo e(__('Enter textmessege')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('textmessege') ? ' is-invalid' : ''); ?>" autofocus>
                                        <?php if($errors->has('textmessege')): ?>
                                            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('textmessege')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>

                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Send')); ?></button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('frontend')); ?>/js/select2.min.js" ></script>
<script>
  $('#select_emailIds').select2();
</script>
<script src="//cdn.ckeditor.com/4.4.7/standard-all/ckeditor.js"></script>
<script src="http://cdn.ckeditor.com/4.4.7/standard-all/adapters/jquery.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/smsMarketing/add.blade.php ENDPATH**/ ?>
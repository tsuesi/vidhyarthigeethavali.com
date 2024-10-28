<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-country">Role</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('role')); ?>">Role</a></li>
                                <li class="breadcrumb-item">Add</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('role.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
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
                            <h3 class="mb-0"><?php echo e(__('Edit')); ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('role.update',$data->id)); ?>"  autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Edit Role')); ?></h6>

                            <div class="pl-lg-4 row">
                                <div class="col-md-4 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"  value="<?php echo e(old('name', $data->name)); ?>" autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>














                            </div>

                            <?php $__currentLoopData = config('permissions_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pl-lg-4 row">
                                    <div class="col-md-2 form-group">
                                        <label class="form-control-label" for="<?php echo e($key); ?>"><?php echo e($key); ?></label>
                                    </div>

                                    <?php $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $customValue = setPermissionValue($key,$key1)
                                        ?>
                                        <div class="col-md-2 form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="permissions[]"  value="<?php echo e("$key.$key1"); ?>" <?php echo e(in_array($customValue,$permissions) ? 'checked' : ''); ?>> <?php echo e($val1); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="pl-lg-4 row">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    <a href="<?php echo e(route('role')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>
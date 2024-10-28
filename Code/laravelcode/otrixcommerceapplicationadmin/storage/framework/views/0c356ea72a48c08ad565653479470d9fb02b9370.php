<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class = "container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-country">Coupon</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('coupon')); ?>">Coupon</a></li>
                                <li class="breadcrumb-item">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('coupon.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
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
                        <form method="post" action="<?php echo e(route('coupon.update',['id' => $data->id])); ?>"  autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Edit Coupon ')); ?></h6>

                            <div class="pl-lg-4 row">
                                <div class="col-md-4 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $data->name)); ?>" autofocus required>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('code') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="code"><?php echo e(__('Code')); ?></label>
                                    <input type="text" name="code" id="code" class="form-control form-control-alternative<?php echo e($errors->has('code') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Code')); ?>" value="<?php echo e(old('code', $data->code)); ?>" autofocus required>

                                    <?php if($errors->has('code')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('code')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('discount') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="discount"><?php echo e(__('Discount')); ?></label>
                                    <input type="text" name="discount" id="discount" class="form-control form-control-alternative<?php echo e($errors->has('discount') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Discount')); ?>" value="<?php echo e(old('discount', $data->discount)); ?>" autofocus required>

                                    <?php if($errors->has('discount')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('discount')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('type') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="type"><?php echo e(__('Type')); ?></label>
                                    <select class="form-control" name="type">
                                        <?php $__currentLoopData = config('constant.tax_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($key); ?> <?php echo e($data->type == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('type')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('type')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('start_date') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="type"><?php echo e(__('Start Date')); ?></label>
                                    <input  name="start_date" id="start_date" class="form-control datepicker" placeholder="Select Start date" type="text" value="<?php echo e(old('start_date', $data->start_date)); ?>" autofocus  required>
                                    <?php if($errors->has('start_date')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('start_date')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('end_date') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="type"><?php echo e(__('End Date')); ?></label>
                                    <input  name="end_date" id="end_date" class="form-control datepicker" placeholder="Select End date" type="text" value="<?php echo e(old('end_date', $data->end_date)); ?>" autofocus  required>
                                    <?php if($errors->has('end_date')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('end_date')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="status"><?php echo e(__('Status')); ?></label>
                                    <select class="form-control" name="status">
                                        <?php $__currentLoopData = config('constant.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($key); ?>><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('status')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="pl-lg-4 row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    <a href="<?php echo e(route('coupon')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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
    <script src="<?php echo e(asset('assets')); ?>/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: datePickerFormat,
            startDate: '-3d'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u554892978/domains/otrixcommerce.in/public_html/development/resources/views/admin/coupon/edit.blade.php ENDPATH**/ ?>
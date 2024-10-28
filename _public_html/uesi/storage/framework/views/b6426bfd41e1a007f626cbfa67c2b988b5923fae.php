<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-country">Customer</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('customer')); ?>">Customer</a></li>
                                <li class="breadcrumb-item">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('customer.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
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
                        <form method="post" action="<?php echo e(route('customer.update',['id' => $data->id])); ?>"  autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Add Customer ')); ?></h6>

                            <div class="pl-lg-4 row">
                                <div class="col-md-4 form-group<?php echo e($errors->has('firstname') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="firstname"><?php echo e(__('First Name')); ?></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control form-control-alternative<?php echo e($errors->has('firstname') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('First Name')); ?>" value="<?php echo e(old('firstname', $data->firstname)); ?>" autofocus>

                                    <?php if($errors->has('firstname')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('firstname')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('lastname') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="lastname"><?php echo e(__('Last Name')); ?></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control form-control-alternative<?php echo e($errors->has('lastname') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Last Name')); ?>" value="<?php echo e(old('lastname', $data->lastname)); ?>" autofocus>

                                    <?php if($errors->has('lastname')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('lastname')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="email"><?php echo e(__('Email')); ?></label>
                                    <input type="text" name="email" id="email" class="form-control form-control-alternative<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email', $data->email)); ?>" autofocus>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>


                                <div class="col-md-4 form-group<?php echo e($errors->has('telephone') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="telephone"><?php echo e(__('Mobile Number')); ?></label>
                                    <input type="text" name="telephone" id="telephone" class="form-control form-control-alternative<?php echo e($errors->has('telephone') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Mobile Number')); ?>" value="<?php echo e(old('telephone', $data->telephone)); ?>" autofocus>

                                    <?php if($errors->has('telephone')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('telephone')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>























                                <div class="col-md-4 form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="status"><?php echo e(__('Status')); ?></label>
                                    <select class="form-control" name="status">
                                        <?php $__currentLoopData = config('constant.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($key); ?>  <?php echo e($data->status == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
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
                                    <a href="<?php echo e(route('customer')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/customer/edit.blade.php ENDPATH**/ ?>
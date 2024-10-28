<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-country">Permission</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('role')); ?>">Permission</a></li>
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
                            <h3 class="mb-0"><?php echo e(__('Add')); ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('permission.store')); ?>"  autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Add Permission ')); ?></h6>

                            <?php if(session('status')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('status')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="pl-lg-4 row">

                              <div class="col-md-6 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                  <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?>* <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="right" title="Name must be same as route name for example pages add route name is pages.add then permission name pages.add if pages list route name is pages then permission name pages">
?</button></label>
                                  <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', '')); ?>" autofocus required>

                                  <?php if($errors->has('name')): ?>
                                      <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('name')); ?></strong>
                                  </span>
                                  <?php endif; ?>
                              </div>

                              <div class="col-md-6 form-group<?php echo e($errors->has('meta_title') ? ' has-danger' : ''); ?>">
                                  <label class="form-control-label" for="input-name"><?php echo e(__('Display Name')); ?>* <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="right" title="Displa name you can enter anything you want in display name. For example pages list enter  Pages List Permission">
?</button></label>
                                  <input type="text" name="display_name" id="display_name" class="form-control form-control-alternative<?php echo e($errors->has('display_name	') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Display Name')); ?>" value="<?php echo e(old('display_name	', '')); ?>" required>

                                  <?php if($errors->has('display_name	')): ?>
                                      <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('display_name')); ?></strong>
                                  </span>
                                  <?php endif; ?>
                              </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    <a href="<?php echo e(route('permission')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/permission/add.blade.php ENDPATH**/ ?>
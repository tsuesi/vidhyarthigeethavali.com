
<?php $__env->startSection('content'); ?>
  <div class="container pt-5">
      <div class="d-flex justify-content-center mt-5">
        <div class="card p-3">
          <div class="card-body install-card-body h-100 w-100 z-3 position-relative">
            <center>
              <img src="<?php echo e(asset('frontend')); ?>/images/logo.png" alt="" height="50">
            </center>
            <h1 class="my-3 text-center">Otrixweb - Ecommerce Website Installation</h1>
            <p class="text-center">Fill form witth admin panel credentials and website name</p>
            <ol class="list-group rounded-2">

              <form method="post" action="<?php echo e(route('configuresystem')); ?>"  autocomplete="off">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('post'); ?>

                  <div class="pl-lg-4 row">
                      <div class="col-md-6 form-group<?php echo e($errors->has('db_host') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label my-3" for="input-name"><?php echo e(__('App Name')); ?></label>
                          <input type="text" name="app_name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('app_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('App Name')); ?>" value="<?php echo e(old('app_name', '')); ?>" autofocus>
                          <?php if($errors->has('app_name')): ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($errors->first('app_name')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                      <div class="col-md-6 form-group<?php echo e($errors->has('admin_name') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label my-3" for="input-name"><?php echo e(__('Admin Name')); ?></label>
                          <input type="text" name="admin_name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('admin_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Admin Name')); ?>" value="<?php echo e(old('admin_name', '')); ?>" autofocus>
                          <?php if($errors->has('admin_name')): ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($errors->first('admin_name')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                    </div>
                    <div class="pl-lg-4 row">
                        <div class="col-md-6 form-group<?php echo e($errors->has('admin_email') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label my-3" for="input-name"><?php echo e(__('Admin Email')); ?></label>
                            <input type="text" name="admin_email" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('admin_email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Admin Email')); ?>" value="<?php echo e(old('admin_email', '')); ?>" autofocus>
                            <?php if($errors->has('admin_email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('admin_email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 form-group<?php echo e($errors->has('admin_password') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label my-3" for="input-name"><?php echo e(__('Admin Password')); ?></label>
                            <input type="password" name="admin_password" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('admin_password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Admin Password')); ?>" value="<?php echo e(old('admin_password', '')); ?>" autofocus>
                            <?php if($errors->has('admin_password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('admin_password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                      </div>


                <center>
                  <button type="submit" class="btn btn-small btn-success my-3">
                    Configure System
                  </button>
                </center>
              </form>
            </ol>
          </div>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installation.app', ['class' => 'bg-white'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/installation/systemconfig.blade.php ENDPATH**/ ?>
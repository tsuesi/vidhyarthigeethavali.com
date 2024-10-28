
<?php $__env->startSection('content'); ?>
  <div class="container pt-5">
      <div class="d-flex justify-content-center mt-5">
        <div class="card p-3">
          <div class="card-body install-card-body h-100 w-100 z-3 position-relative">
            <center>
              <img src="<?php echo e(asset('frontend')); ?>/images/logo.png" alt="" height="50">
            </center>
            <h1 class="my-3 text-center">Otrixweb - Ecommerce Website Installation</h1>
            <p class="text-center">Fill form with valid database credentials</p>
            <ol class="list-group rounded-2">

              <form method="post" action="<?php echo e(route('db.store')); ?>"  autocomplete="off">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('post'); ?>

                  <div class="pl-lg-4 row">
                      <div class="col-md-6 form-group<?php echo e($errors->has('db_host') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label my-3" for="input-name"><?php echo e(__('Database Host')); ?></label>
                          <input type="text" name="db_host" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('db_host') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Database Host')); ?>" value="<?php echo e(old('db_host', '')); ?>" autofocus>
                          <?php if($errors->has('db_host')): ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($errors->first('db_host')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                      <div class="col-md-6 form-group<?php echo e($errors->has('db_name') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label my-3" for="input-name"><?php echo e(__('Database Name')); ?></label>
                          <input type="text" name="db_name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('db_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Database Name')); ?>" value="<?php echo e(old('db_host', '')); ?>" autofocus>
                          <?php if($errors->has('db_name')): ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($errors->first('db_name')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                    </div>
                    <div class="pl-lg-4 row">
                        <div class="col-md-6 form-group<?php echo e($errors->has('db_username') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label my-3" for="input-name"><?php echo e(__('Database Username')); ?></label>
                            <input type="text" name="db_username" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('db_host') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Database Username')); ?>" value="<?php echo e(old('db_username', '')); ?>" autofocus>
                            <?php if($errors->has('db_username')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('db_username')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 form-group<?php echo e($errors->has('db_password') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label my-3" for="input-name"><?php echo e(__('Database Password')); ?></label>
                            <input type="password" name="db_password" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('db_name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Database Password')); ?>" value="<?php echo e(old('db_password', '')); ?>" autofocus>
                            <?php if($errors->has('db_password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('db_password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                      </div>


                <center>
                  <button type="submit" class="btn btn-small btn-success my-3">
                    Configure Database
                  </button>
                </center>
              </form>
            </ol>
          </div>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installation.app', ['class' => 'bg-white'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/installation/dbsetup.blade.php ENDPATH**/ ?>
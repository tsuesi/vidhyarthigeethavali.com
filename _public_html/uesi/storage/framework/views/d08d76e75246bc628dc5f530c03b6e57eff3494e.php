<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-black d-inline-block mb-country">Page</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('pages')); ?>">Page</a></li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </nav>
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
                        <form method="post" action="<?php echo e(route('pages.update',['id' => $data->id])); ?>"  autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Edit Page ')); ?></h6>

                            <div class="pl-lg-4 row">
                                  <div class="col-md-6 form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                                      <label class="form-control-label" for="input-name"><?php echo e(__('Title')); ?></label>
                                      <input type="text" name="title" id="input-title" class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title', $data->title)); ?>" autofocus required>

                                      <?php if($errors->has('title')): ?>
                                          <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($errors->first('title')); ?></strong>
                                          </span>
                                      <?php endif; ?>
                                  </div>

                                  <div class="col-md-6 form-group<?php echo e($errors->has('heading') ? ' has-danger' : ''); ?>">
                                      <label class="form-control-label" for="address_format"><?php echo e(__('Heading')); ?></label>
                                      <input type="text" name="heading" id="address_format" class="form-control form-control-alternative<?php echo e($errors->has('heading') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Heading')); ?>" value="<?php echo e(old('heading', $data->heading)); ?>" required>

                                      <?php if($errors->has('heading')): ?>
                                          <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($errors->first('heading')); ?></strong>
                                          </span>
                                      <?php endif; ?>
                                  </div>
                              </div>

                              <div class="pl-lg-4 row">
                                <div class="col-md-12">
                                  <textarea class="ckeditor form-control" name="description" value="<?php echo e(old('description',  $data->description)); ?>"><?php echo $data->description; ?></textarea>
                                  <?php if($errors->has('description')): ?>
                                      <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($errors->first('description')); ?></strong>
                                      </span>
                                  <?php endif; ?>
                                </div>
                              </div>

                            </div>

                            <div class="pl-lg-4 row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    <a href="<?php echo e(route('pages')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/pages/edit.blade.php ENDPATH**/ ?>
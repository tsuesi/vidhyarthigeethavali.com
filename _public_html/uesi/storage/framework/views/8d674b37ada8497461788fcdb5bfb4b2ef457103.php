<?php $__env->startSection('content'); ?>
<?php ?>

    <div class="header bg-primary pb-1">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">Category</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('category')); ?>">Category</a></li>
                                <li class="breadcrumb-item">Add</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('category.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
      <div class="align-items-center d-flex flex-wrap gap-5 justify-content-between mb-2 pb-1">
          <h4><i class="icofont-plugin"></i> Add New Category</h4>
      </div>
      <form method="post" class="row" action="<?php echo e(route('category.store')); ?>" enctype="multipart/form-data" autocomplete="off">
          <?php echo csrf_field(); ?>
          <?php echo method_field('post'); ?>
          <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="card mb-30">
                <div class="card-header bg-white border-bottom2">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4>Category Information</h4>
                    </div>
                </div>
                <div class="card-body">
                  <ul class="language nav nav-tabs  mb-5" id="languageTab" role="tablist">
                    <?php $__currentLoopData = getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="nav-item">
                        <a class="nav-link  <?php if($key == 0): ?> text-primary font-weight-bold text-lg active <?php endif; ?>" id="language-tab<?php echo e($language->id); ?>" data-toggle="tab" href="#language<?php echo e($language->id); ?>" role="tab" aria-controls="<?php echo e($language->language_name); ?>" aria-selected="true"><?php echo e($language->language_name); ?></a>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  <div class="tab-content tab-validate" style="margin-top:20px;">
                    <?php $__currentLoopData = getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="tab-pane <?php if($key == 0): ?> active <?php endif; ?>" id="language<?php echo e($language->id); ?>">
                        <h4 class="ml-3 mb-3 text-info"> Enter data in <?php echo e($language->language_name); ?> </h4>
                        <div class="pl-lg-4 row">

                            <div class="col-md-6 form-group<?php echo e($errors->has('multilanguage.*.name') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                <input type="text" name="multilanguage[<?php echo e($language->id); ?>][name]" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('multilanguage.*.name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Enter Name')); ?>" value="<?php echo e(old('name', '')); ?>" autofocus>
                                <?php if($errors->has('multilanguage.*.name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('multilanguage.*.name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('meta_title') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-name"><?php echo e(__('Meta Title')); ?></label>
                                <input type="text" name="multilanguage[<?php echo e($language->id); ?>][meta_title]" id="meta_title" class="form-control form-control-alternative<?php echo e($errors->has('meta_title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Title')); ?>" value="<?php echo e(old('meta_title', '')); ?>" autofocus>

                                <?php if($errors->has('meta_title')): ?>
                                    <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('meta_title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('meta_keyword') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-name"><?php echo e(__('Meta Keyword')); ?></label>
                                <input type="text" name="multilanguage[<?php echo e($language->id); ?>][meta_keyword]" id="meta_keyword" class="form-control form-control-alternative<?php echo e($errors->has('meta_keyword') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Keyword')); ?>" value="<?php echo e(old('meta_keyword', '')); ?>" autofocus>

                                <?php if($errors->has('meta_keyword')): ?>
                                    <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('meta_keyword')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('meta_description') ? ' has-danger' : ''); ?>">
                                <label class="form-control-label" for="input-name"><?php echo e(__('Meta Description')); ?></label>
                                <textarea name="multilanguage[<?php echo e($language->id); ?>][meta_description]" id="meta_description" class="form-control form-control-alternative<?php echo e($errors->has('meta_description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Description')); ?>" value="<?php echo e(old('meta_description', '')); ?>" rows="3"></textarea>
                                <?php if($errors->has('meta_description')): ?>
                                    <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('meta_description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
              <div class="card mb-30">
                  <div class="card-header bg-white border-bottom2">
                      <div class="d-sm-flex justify-content-between align-items-center">
                          <h4>Category Data</h4>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="pl-lg-4 row">
                        <div class="col-md-6 form-group<?php echo e($errors->has('parent_id') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label" for="parent_id"><?php echo e(__('Parent Category')); ?></label>
                          <select class="form-control" name="parent_id">
                              <option value="0">Select</option>
                              <?php $__currentLoopData = $parentCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          <?php if($errors->has('parent_id')): ?>
                              <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($errors->first('parent_id')); ?></strong>
                          </span>
                          <?php endif; ?>
                      </div>


                      <div class="col-md-6 form-group<?php echo e($errors->has('sort_order') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label" for="input-name"><?php echo e(__('Sort Order')); ?></label>
                          <input type="number" min="1" name="sort_order" id="sort_order" value="<?php echo e(old('sort_order', '')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('sort_order') ? ' is-invalid' : ''); ?>" autofocus>
                          <?php if($errors->has('sort_order')): ?>
                              <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($errors->first('sort_order')); ?></strong>
                          </span>
                          <?php endif; ?>
                      </div>

                      <div class="col-md-6 form-group<?php echo e($errors->has('image') ? ' has-danger' : ''); ?>">
                          <label class="form-control-label" for="input-email"><?php echo e(__('Image')); ?></label>
                          <input type="file" name="image" id="input-email" class="form-control form-control-alternative<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('image', '')); ?>" required>

                          <?php if($errors->has('image')): ?>
                              <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($errors->first('image')); ?></strong>
                          </span>
                          <?php endif; ?>
                      </div>

                      <div class="col-md-6 form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
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
                  </div>
                </div>
              </div>

              <div class="bottom-btn bg-white  d-flex align-items-center justify-content-sm-end gap-10 flex-wrap justify-content-center">
                <button type="submit" name="status" value="1" class="btn btn-success" tabindex="4">
                    Save Category
                </button>
              </div>
            </form>
          </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<!-- JavaScript -->
<script type="text/javascript" src="<?php echo e(asset('frontend')); ?>/js/alertify.min.js" ></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend')); ?>/css/alertify.min.css">
<!-- Default theme -->
<link href="<?php echo e(asset('frontend')); ?>/css/default.min.css" rel="stylesheet">

<script type="text/javascript">
let next  =false;
$('.btnNext').click(function() {
  var tabIdx = $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').attr('data-id');
  if(tabIdx == 2) {
    var productName = $("[name='name']").val();
    if(productName == '') {
      alertify.alert('Required', 'Name Required', function(){  });
      next = false;
    }
    else {
      next = true
    }
  }

  if(next) {
    $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').trigger('click');
  }

  if(tabIdx  > 2) {
    $('#btnPrev').removeClass('d-none')
  }
});


$(".nav-tabs a[data-toggle=tab]").on("click", function(e) {
  var idx = $(this).index('a[data-toggle="tab"]');

  if(idx == 1) {
    var productName = $("[name='name']").val();
    if(productName == '') {
        alertify.alert('Required', 'Name Required', function(){  });
        return false;
    }
  }

  if(idx == 1) {
    var productName = $("[name='name']").val();
    if(productName == '') {
      $('.alert').alert()
    }
  }

  if(idx  > 0) {
    $('#btnPrev').removeClass('d-none')
  }
  if(idx  == 0) {
    $('#btnPrev').addClass('d-none')
  }
    if(idx == 6) {
      $('#btnNxt').addClass('d-none');
      $('#btnSave').removeClass('d-none');
    }
  else {
    $('#btnNxt').removeClass('d-none');
    $('#btnSave').addClass('d-none');
  }
});




</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/category/add.blade.php ENDPATH**/ ?>
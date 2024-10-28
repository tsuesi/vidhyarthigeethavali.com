

<?php $__env->startSection('content'); ?>
<?php ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">Notification</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href=<?php echo e(route('dashboard')); ?>><i class="fas fa-home"></i></a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        
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
                          <h4>Send Global Notification</h4>
                        </div>
                        <div class="card-body">

                          <form method="post" action="<?php echo e(route('notifications.store')); ?>" enctype="multipart/form-data" autocomplete="off">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('post'); ?>
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
                                      <label class="form-control-label" for="input-name"><?php echo e(__('Title')); ?></label>
                                      <input type="text"  name="name" id="name" value="<?php echo e(old('name','')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" autofocus required>
                                      <?php if($errors->has('name')): ?>
                                          <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($errors->first('name')); ?></strong>
                                      </span>
                                      <?php endif; ?>
                                  </div>
                                  <div class="col-md-6 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                  </div>
                                  <div class="col-md-12 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                      <label class="form-control-label" for="input-name"><?php echo e(__('Body')); ?></label>
                                      <textarea name="body" rows="8" cols="80" class="form-control" required></textarea>
                                  </div>

                                  <div class="col-md-6 form-group<?php echo e($errors->has('link') ? ' has-danger' : ''); ?>">
                                      <label class="form-control-label" for="input-link"><?php echo e(__('Notification Link')); ?></label>
                                      <input type="text" placeholder="product-11"  name="link" id="link" value="<?php echo e(old('link','')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" autofocus required>
                                      <?php if($errors->has('link')): ?>
                                          <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($errors->first('link')); ?></strong>
                                      </span>
                                      <?php endif; ?>
                                      <small class="text-warning"><i class="fa fas-help"></i> Redirect user when notification click example to redirect user product page you can write (product-1) here 1 is product id,same thing apple for category navigate to category then (category-1) also you can navigate to brand using (brand-1).</small>
                                      <br>
                                      <small class="text-warning">If you don't want to navigate anywhare then leave it blank</small>
                                  </div>

                                  <div class="col-md-6 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                      <label class="form-control-label" for="input-name"><?php echo e(__('Notification Image')); ?></label>
                                      <input type="file"  name="image" class="form-control form-control-alternative<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" autofocus >

                                  </div>



                                  <div class="col-md-6 form-group<?php echo e($errors->has('comission') ? ' has-danger' : ''); ?>">

                                  </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Submit')); ?></button>
                                </div>

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

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/notification/index.blade.php ENDPATH**/ ?>
<?php $__env->startPrepend('styles'); ?>
  <link href="<?php echo e(asset('frontend')); ?>/css/select2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<?php $__env->stopPrepend(); ?>
<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-3">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0"> Deals Of The Day</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('category')); ?>"> Deals Of The Day</a></li>
                                <li class="breadcrumb-item">List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row  ">
            <div class="col">
                <div class="card">
                  <form method="post" id="data-form" action="<?php echo e(route('trending_dod.store')); ?>" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>
                    <div class="col-md-10  mt-3 ml-8 form-group<?php echo e($errors->has('product_id') ? ' has-danger' : ''); ?>">
                      <label class="form-control-label" for="parent_id"><?php echo e(__('Add Product To Deals Of The Day')); ?></label>
                      <select class="form-control selectpicker " multiple data-live-search="true" name="product_id[]" >
                          <?php $__currentLoopData = $data['pluckProducts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value=<?php echo e($key); ?> <?php echo e(in_array($key,$data['pluckDODProducts']) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg mb-3"><i class="fa fa-plus"></i> <?php echo e(__('Add Selected Products To Deals Of The Day')); ?></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

    <!-- Page content -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col">
                <div class="card">

                    <!-- Card header -->

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                          <thead class="thead-dark">
                          <tr>
                              <th scope="col" class="sort" data-sort="name">Image</th>
                              <th scope="col" class="sort" data-sort="name">Name</th>
                              <th scope="col" class="sort" data-sort="parent_id">Price</th>
                              <th scope="col" class="sort" data-sort="status">Special Price</th>
                          </tr>
                          </thead>
                          <tbody class="list">
                          <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                              <tr>
                                <td>
                                  <?php if($value->productDetails && $value->productDetails->image): ?>
                                    <img src="<?php echo e(asset('/uploads/product').'/'.$value->productDetails->image); ?>"  alt="<?php echo e($value->productDescription->name); ?>"  class="img-thumbnail img-fluid" style=" width: 60px;height: 60px;">
                                  <?php else: ?>
                                    <img src="<?php echo e(asset('/assets/img/default.png')); ?>"  alt="<?php echo e($value->productDescription->name); ?>"  class="img-thumbnail img-fluid" style=" width: 60px;height: 60px;">
                                  <?php endif; ?>
                                </td>

                                  <td class="budget"><?php echo e($value->productDescription  != null ? $value->productDescription->name : ''); ?></td>
                                  <td class="budget">$<?php echo e($value->productDetails->price); ?></td>
                                  <td class="budget">$<?php echo e($value->productSpecial ? $value->productSpecial->price : 0); ?></td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <tr>
                                  <td colspan="10" class="budget">
                                      No Record Found
                                  </td>
                              </tr>
                          <?php endif; ?>
                          </tbody>


                        </table>
                    </div>
                    <!-- Card footer -->

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="<?php echo e(asset('frontend')); ?>/js/select2.min.js" ></script>

    <script>
     $( document ).ready(function() {
        $('selectpicker').selectpicker();
    });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/dealoftheday/index.blade.php ENDPATH**/ ?>
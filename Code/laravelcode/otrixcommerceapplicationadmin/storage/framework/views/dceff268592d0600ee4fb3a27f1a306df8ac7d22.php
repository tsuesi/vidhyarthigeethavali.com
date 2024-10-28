
<?php $__env->startPrepend('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<?php $__env->stopPrepend(); ?>
<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-3">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0"> Homepage Category</h6>
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


    <div class="container-fluid">
        <div class="row  ">
            <div class="col">
                <div class="card">
                  <form method="post" id="data-form" action="<?php echo e(route('homepage-category.store')); ?>" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>
                    <div class="col-md-10  mt-3 ml-8 form-group<?php echo e($errors->has('product_id') ? ' has-danger' : ''); ?>">
                      <label class="form-control-label" for="parent_id"><?php echo e(__('Add Category To Homepage')); ?></label>
                      <select class="form-control selectpicker " multiple data-live-search="true" name="category_id[]" >
                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->categoryDescription): ?>
                              <option value=<?php echo e($value->category_id); ?> <?php echo e(in_array($value->category_id ,$homepagecatpluck) ? 'selected' : ''); ?> ><?php echo e($value->categoryDescription->name); ?></option>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg mb-3"><i class="fa fa-plus"></i> <?php echo e(__('Add Selected Category To Homepage')); ?></button>
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
                              <th scope="col" class="sort" data-sort="name" width="40%">Image</th>
                              <th scope="col" class="sort" data-sort="name" width="40%">Category Name</th>
                              <th scope="col" class="sort" data-sort="name" width="20%">Sort Order</th>
                          </tr>
                          </thead>
                          <tbody class="list">


                          <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                              <tr>
                                <td>
                                  <?php if($value && $value->image): ?>
                                    <img src="<?php echo e(asset('/uploads/category').'/'.$value->image); ?>"  alt="lol"  class="img-thumbnail img-fluid" style=" width: 60px;height: 60px;">
                                  <?php else: ?>
                                    <img src="<?php echo e(asset('/assets/img/default.png')); ?>"  alt="<?php echo e('None'); ?>"  class="img-thumbnail img-fluid" style=" width: 60px;height: 60px;">
                                  <?php endif; ?>
                                </td>

                                  <td class="budget"><?php echo e($value->name); ?></td>
                                  <td><input type="number" onkeyup="updateCategorySortOrder(this.value,'<?php echo e($value->id); ?>')" class="form-control" value="<?php echo e($value->sort_order); ?>"  id="cat<?php echo e($value->id); ?>"> </td>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
     $( document ).ready(function() {
        $('selectpicker').selectpicker();
    });

    function updateCategorySortOrder(order,id) {
      $.ajax({
      url: "<?php echo e(route('homepageCategory.sort_order')); ?>",
      type: 'post',
      data:{'_token':'<?php echo e(csrf_token()); ?>','id':id,'order':order },
      dataType: 'json',
      success: function(response) {

        }
      });
    }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/homecat/homecategory.blade.php ENDPATH**/ ?>
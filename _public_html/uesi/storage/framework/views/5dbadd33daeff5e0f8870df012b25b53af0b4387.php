<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-country">Options</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('product-option')); ?>">Options</a></li>
                                <li class="breadcrumb-item">Add</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('product-option.add')); ?>" class="btn btn-sm btn-neutral">New</a>
                        
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
                        <form method="post" action="<?php echo e(route('product-option.store')); ?>"  autocomplete="off" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Add Options ')); ?></h6>

                            <div class="pl-lg-4 row">
                                <div class="col-md-4 form-group<?php echo e($errors->has('multilanguage.*.name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>

                                    <?php $__currentLoopData = getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><?php echo e($language->language_name); ?> </span>
                                        </div>
                                        <input type="text" name="multilanguage[<?php echo e($language->id); ?>][name]" class="form-control form-control-alternative<?php echo e($errors->has('multilanguage.*.name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(_('Name')); ?>" aria-label="Name" aria-describedby="basic-addon1">
                                        <?php if($errors->has('multilanguage.*.name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('multilanguage.*.name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                      </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </div>

                                <div class="col-md-4 form-group<?php echo e($errors->has('type') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="status"><?php echo e(__('Type')); ?></label>
                                    <select class="form-control type" name="type">
                                        <?php $__currentLoopData = config('constant.product_option'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup label=<?php echo e($key); ?>>
                                                <?php $__currentLoopData = config('constant.product_option')[$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('type')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('type')); ?></strong>
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
                                    <a href="<?php echo e(route('product-option')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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
    <script>
        var typeForOptionValue = ['Select','Radio','Checkbox']
        var counter = 1;

        $(document).on('change','.type',function(){

            if(typeForOptionValue.includes($(this).val())) {
                $('.row_value_tbl').show()
                $(".row_value_tbl input").prop('required',true);
            } else {
                $('.row_value_tbl').hide()
                $(".row_value_tbl input").prop('required',false);
            }
        })


        $(document).on('click', '#addRowButton', function() {
            $('#tbl').append(`<tr class="tr_clone">
            <td><input type="text" name="option_value[name][]" id=name${counter} class="form-control form-control-alternative" required></td>
            <td><input type="file" name="option_value[image][]" id=image${counter} class="form-control form-control-alternative" required></td>
            <td class="budget"> <input type="number" min="1" name="option_value[sort_order][]" id=sort_order${counter} class="form-control form-control-alternative" required></td>
            <td>
                <button class="btn btn-danger" id="DeleteButton" ><icon class="fa fa-minus" /></button>
            </td>
        </tr>`);

            counter += 1;
        });

        $("#tbl").on("click", "#DeleteButton", function() {
            $(this).closest("tr").remove();
            counter -= 1;
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u298273519/domains/vidhyarthigeethavali.com/public_html/uesi/resources/views/admin/product_option/add.blade.php ENDPATH**/ ?>
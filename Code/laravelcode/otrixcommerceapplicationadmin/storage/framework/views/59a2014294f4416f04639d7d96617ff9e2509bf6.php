<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">Banner</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('banner')); ?>">Banner</a></li>
                                <li class="breadcrumb-item">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('banner.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
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
                        <form method="post" action="<?php echo e(route('banner.update',['id' => $data->id])); ?>" enctype="multipart/form-data" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>

                            <h6 class="heading-small text-muted mb-4"><?php echo e(__('Edit Banner ')); ?></h6>

                            <div class="pl-lg-4 row">
                                <div class="col-md-6 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $data->name)); ?>" autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="status"><?php echo e(__('Status')); ?></label>
                                    <select class="form-control" name="status">
                                        <?php $__currentLoopData = config('constant.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($key); ?> <?php echo e($data->status == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
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

                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="tbl">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Title</th>
                                            <th scope="col" class="sort" data-sort="parent_id">Link</th>
                                            <th scope="col" class="sort" data-sort="status">Image</th>
                                            <th scope="col" class="sort" data-sort="status">Sort Order</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        <?php $__empty_1 = true; $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                            <tr class="tr_clone">
                                                <td class="budget">
                                                    <input type="hidden" name="ids[]" value="<?php echo e($value->id); ?>">
                                                    <input type="text" name="title[]" id="title<?php echo e($key); ?>" class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title', $value->title)); ?>"  autofocus>
                                                </td>
                                                <td class="budget"><input type="text" name="link[]" id="link<?php echo e($key); ?>" class="form-control form-control-alternative<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Link')); ?>" value="<?php echo e(old('link', $value->link)); ?>"  autofocus></td>
                                                <td>
                                                    <input type="file" name="image[]" id="image<?php echo e($key); ?>" class="form-control form-control-alternative<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('image', '')); ?>" >
                                                    <a target="_blank" href="<?php echo e(url(config('constant.file_path.banner')."/$value->image")); ?>">View Image</a>
                                                </td>
                                                <td class="budget"> <input type="number" min="1" name="sort_order[]" id="sort_order<?php echo e($key); ?>" value="<?php echo e(old('sort_order', $value->sort_order)); ?>" class="form-control form-control-alternative<?php echo e($errors->has('sort_order') ? ' is-invalid' : ''); ?>" required autofocus></td>
                                                <td>
                                                    <button class="btn btn-danger" id="DeleteButton" ><icon class="fa fa-minus" /></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr class="tr_clone">
                                                <td class="budget"><input type="text" name="title[]" id="title0" class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title', '')); ?>" required autofocus></td>
                                                <td class="budget"><input type="text" name="link[]" id="link0" class="form-control form-control-alternative<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Link')); ?>" value="<?php echo e(old('link', '')); ?>" required autofocus></td>
                                                <td><input type="file" name="image[]" id="image0" class="form-control form-control-alternative<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('image', '')); ?>" required></td>
                                                <td class="budget"> <input type="number" min="1" name="sort_order[]" id="sort_order0" value="<?php echo e(old('sort_order', '')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('sort_order') ? ' is-invalid' : ''); ?>" required autofocus></td>
                                                <td>
                                                    <button class="btn btn-danger" id="DeleteButton" ><icon class="fa fa-minus" /></button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td style="text-align:right" colspan="5">
                                                <button type="button" class="btn btn-primary " id="addRowButton" ><icon class="fa fa-plus" /></button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                                    <a href="<?php echo e(route('banner')); ?>" type="button" class="btn btn-danger mt-4"><?php echo e(__('Cancel')); ?></a>
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
        var counter = 1;
        $(document).on('click', '#addRowButton', function() {
            $('#tbl').append(`<tr class="tr_clone">
            <td class="budget"><input type="text" name="title[]" id=title${counter} class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>"  autofocus></td>
            <td class="budget"><input type="text" name="link[]" id=link${counter} class="form-control form-control-alternative<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Link')); ?>"   autofocus></td>
            <td><input type="file" name="image[]" id=image${counter} class="form-control form-control-alternative<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" required></td>
            <td class="budget"> <input type="number" min="1" name="sort_order[]" id=sort_order${counter} class="form-control form-control-alternative<?php echo e($errors->has('sort_order') ? ' is-invalid' : ''); ?>" required autofocus></td>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u554892978/domains/otrixcommerce.in/public_html/development/resources/views/admin/banner/edit.blade.php ENDPATH**/ ?>
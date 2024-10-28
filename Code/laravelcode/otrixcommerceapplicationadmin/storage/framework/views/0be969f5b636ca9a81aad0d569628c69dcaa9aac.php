    <div class="col-md-12 form-group<?php echo e($errors->has('category_id') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="category_id"><?php echo e(__('Category')); ?>*</label>
        <select class="form-control" name="category_id" >
            <option value="">Select</option>
            <?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php if($errors->has('category_id')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('category_id')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="col-md-12 form-group<?php echo e($errors->has('manufacturer_id') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="manufacturer_id"><?php echo e(__('Manufacturer')); ?></label>
        <select class="form-control" name="manufacturer_id">
            <option value="">Select</option>
            <?php $__currentLoopData = $data['manufacturer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('manufacturer_id')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('manufacturer_id')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="col-md-12 form-group<?php echo e($errors->has('related_id') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="status"><?php echo e(__('Related Products')); ?></label>
        <select  class="form-control selectpicker" multiple data-live-search="true" name="related_id[]">
            <?php $__currentLoopData = $data['pluckProducts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value=<?php echo e($value->id); ?>><?php echo e($value->productDescription->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php if($errors->has('related_id')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('related_id')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
<?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/admin/product/tabs/links.blade.php ENDPATH**/ ?>
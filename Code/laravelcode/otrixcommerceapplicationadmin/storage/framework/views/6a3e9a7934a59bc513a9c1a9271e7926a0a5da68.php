<div class="tab-pane " id="tab-data">
  <div class="row">
    <div class="col-md-6 form-group<?php echo e($errors->has('model') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="model"><?php echo e(__('Model')); ?>*</label>
        <input type="text" name="model" id="model" class="form-control form-control-alternative<?php echo e($errors->has('model') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Model')); ?>" value="<?php echo e(old('model', '')); ?>" autofocus required>

        <?php if($errors->has('model')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('model')); ?></strong>
            </span>
        <?php endif; ?>
    </div>

    <div class="col-md-6 form-group<?php echo e($errors->has('price') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="price"><?php echo e(__('Price')); ?>*</label>
        <input type="number" name="price" id="price" class="form-control form-control-alternative<?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Price')); ?>" value="<?php echo e(old('price', '')); ?>"  required>
        <?php if($errors->has('price')): ?>
            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('price')); ?></strong>
                                        </span>
        <?php endif; ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 form-group<?php echo e($errors->has('quantity') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="input-name"><?php echo e(__('Quantity')); ?>*</label>
        <input type="number" min="1" name="quantity" id="quantity" value="<?php echo e(old('quantity', '')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('quantity') ? ' is-invalid' : ''); ?>" required>
        <?php if($errors->has('quantity')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('quantity')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="col-md-6 form-group<?php echo e($errors->has('sku') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="input-name"><?php echo e(__('SKU')); ?></label>
        <input type="text" name="sku" id="sku" value="<?php echo e(old('sku', '')); ?>" class="form-control form-control-alternative<?php echo e($errors->has('sku') ? ' is-invalid' : ''); ?>" >
        <?php if($errors->has('sku')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('sku')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="col-md-6 form-group <?php echo e($errors->has('tax_rate_id') ? ' has-danger' : ''); ?>">
        <label class="form-control-label" for="tax_rate_id"><?php echo e(__('Tax Rate')); ?></label>
        <select class="form-control <?php echo e($errors->has('tax_rate_id') ? ' has-danger' : ''); ?>" name="tax_rate_id">
            <option value="">Select </option>
            <?php $__currentLoopData = $data['tax_rate']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('tax_rate_id')): ?>
            <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('tax_rate_id')); ?></strong>
                                        </span>
        <?php endif; ?>
    </div>

  </div>

        <h3>Product Dimension</h3><br>
        <div class="row">
            <div class="col-md-6 form-group<?php echo e($errors->has('length') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="length"><?php echo e(__('Length')); ?></label>
                <input type="text" name="length" id="length" class="form-control form-control-alternative<?php echo e($errors->has('length') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Length')); ?>" value="<?php echo e(old('length', '')); ?>" >

                <?php if($errors->has('length')): ?>
                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('length')); ?></strong>
                                                    </span>
                <?php endif; ?>
            </div>

            <div class="col-md-6 form-group<?php echo e($errors->has('width') ? ' has-danger' : ''); ?>">
                <label class="form-control-label" for="width"><?php echo e(__('Width')); ?></label>
                <input type="text" name="width" id="width" class="form-control form-control-alternative<?php echo e($errors->has('width') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Width')); ?>" value="<?php echo e(old('width', '')); ?>" >

                <?php if($errors->has('width')): ?>
                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('width')); ?></strong>
                                                    </span>
                <?php endif; ?>
            </div>


        </div>


    <div class="row">
      <div class="col-md-6 form-group<?php echo e($errors->has('height') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="height"><?php echo e(__('Height')); ?></label>
          <input type="text" name="height" id="height" class="form-control form-control-alternative<?php echo e($errors->has('height') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Height')); ?>" value="<?php echo e(old('height', '')); ?>" >

          <?php if($errors->has('height')): ?>
              <span class="invalid-feedback" role="alert">
                                                  <strong><?php echo e($errors->first('height')); ?></strong>
                                              </span>
          <?php endif; ?>
      </div>
      <div class="col-md-6  form-group<?php echo e($errors->has('date_available') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="date_available"><?php echo e(__('Available Date')); ?></label>
          <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
              </div>
              <input name="date_available" class="form-control datepicker <?php echo e($errors->has('date_available') ? ' is-invalid' : ''); ?>" placeholder="Select date" type="text" value="<?php echo e(old('date_available', '')); ?>"  >
              <?php if($errors->has('date_available')): ?>
                  <span class="invalid-feedback" role="alert">
                                                      <strong><?php echo e($errors->first('date_available')); ?></strong>
                                                  </span>
              <?php endif; ?>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 form-group<?php echo e($errors->has('weight_class_id') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="weight_class_id"><?php echo e(__('Weight Class')); ?></label>
          <select class="form-control" name="weight_class_id">
              <option value="">Select</option>
              <?php $__currentLoopData = $data['weight_class']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <?php if($errors->has('weight_class_id')): ?>
              <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($errors->first('weight_class_id')); ?></strong>
                                          </span>
          <?php endif; ?>
      </div>

      <div class="col-md-6 form-group<?php echo e($errors->has('weight') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="weight"><?php echo e(__('Weight')); ?></label>
          <input type="text" name="weight" id="weight" class="form-control form-control-alternative<?php echo e($errors->has('weight') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Weight')); ?>" value="<?php echo e(old('weight', '')); ?>" >

          <?php if($errors->has('weight')): ?>
              <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($errors->first('weight')); ?></strong>
                                          </span>
          <?php endif; ?>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6 form-group<?php echo e($errors->has('stock_status_id') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="stock_status_id"><?php echo e(__('Stock Status')); ?></label>
          <select class="form-control" name="stock_status_id">
              <option value="">Select</option>
              <?php $__currentLoopData = $data['stock_status']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <?php if($errors->has('stock_status_id')): ?>
              <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($errors->first('stock_status_id')); ?></strong>
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
    <div class="row">
      <div class="col-md-6 form-group<?php echo e($errors->has('sort_order') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Sort Order')); ?></label>
          <input type="number" min="1" name="sort_order" id="sort_order" value="<?php echo e(old('sort_order', 1)); ?>" class="form-control form-control-alternative<?php echo e($errors->has('sort_order') ? ' is-invalid' : ''); ?>" >
          <?php if($errors->has('sort_order')): ?>
              <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($errors->first('sort_order')); ?></strong>
                                          </span>
          <?php endif; ?>
      </div>
    </div>

</div>
<?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/product/tabs/data.blade.php ENDPATH**/ ?>
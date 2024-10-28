<div class="tab-pane active" id="tab-general">
    <ul class="language nav nav-tabs  mb-5" id="languageTab" role="tablist">
      <?php $__currentLoopData = $data['data']->productMultipleDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
          <a class="nav-link  <?php if($key == 0): ?> text-primary font-weight-bold text-lg active <?php endif; ?>" id="language-tab<?php echo e($language->id); ?>" data-toggle="tab" href="#language<?php echo e($language->id); ?>" role="tab" aria-controls="<?php echo e($language->language_name); ?>" aria-selected="true"><?php echo e($language->language_name); ?></a>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="tab-content tab-validate" style="margin-top:20px;">
      <?php $__currentLoopData = $data['data']->productMultipleDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="tab-pane <?php if($key == 0): ?> active <?php endif; ?>" id="language<?php echo e($language->language_id); ?>">

        <h4 class="ml-3 mb-3 text-info"> Enter data in <?php echo e($language->language_name); ?> </h4>

        <div class="col-md-12 form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-name"><?php echo e(__('Product Name')); ?>*</label>
            <input type="text" name="multilanguage[<?php echo e($language->id); ?>][name]"  class="form-control productName form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $language->name )); ?>" autofocus>

            <?php if($errors->has('name')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="col-md-12 form-group<?php echo e($errors->has('short_description') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-name"><?php echo e(__('Product Short Description')); ?></label>
            <textarea name="multilanguage[<?php echo e($language->id); ?>][short_description]"  class="form-control" placeholder="<?php echo e(__('Product Short Description')); ?>" value="<?php echo e(old('short_description','')); ?>"><?php echo old('short_description',$language->short_description); ?></textarea>
            <?php if($errors->has('short_description')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('short_description')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="col-md-12 form-group<?php echo e($errors->has('product_description') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-name"><?php echo e(__('Product Description')); ?></label>
            <textarea name="multilanguage[<?php echo e($language->id); ?>][description]"  class="ckeditor<?php echo e($language->id); ?> form-control" placeholder="<?php echo e(__('Product Description')); ?>" value="<?php echo e(old('description',$language->description )); ?>"><?php echo $language->description; ?></textarea>
            <?php if($errors->has('description')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('description')); ?></strong>
                </span>
            <?php endif; ?>
        </div>



      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-12 form-group<?php echo e($errors->has('main_image') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-maiin"><?php echo e(__('Image')); ?></label>
            <input type="file" name="main_image" id="input-maiin" class="form-control form-control-alternative<?php echo e($errors->has('main_image') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('main_image', '')); ?>" >
            <a target="_blank" href="<?php echo e(url(config('constant.file_path.product')."/$product->image")); ?>">View Image</a>

            <?php if($errors->has('main_image')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('main_image')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

  </div>
</div>
<?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/product/tabs/edit_tabs/general.blade.php ENDPATH**/ ?>
<div class="tab-pane active" id="tab-general">
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

      <div class="col-md-12 form-group<?php echo e($errors->has('multilanguage.*.name') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Product Name')); ?>*</label>
          <input type="text"  name="multilanguage[<?php echo e($language->id); ?>][name]"  class="form-control  productName<?php echo e($language->id); ?> form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', '')); ?>" autofocus required  onkeyup="onProductNameChange('<?php echo e($language->id); ?>')">
          <?php if($errors->has('multilanguage.*.name')): ?>
              <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('multilanguage.*.name')); ?></strong>
              </span>
          <?php endif; ?>
      </div>

      <div class="chatGPTButton<?php echo e($language->id); ?> mx-3 mb-4 d-none">
        <button class="btn-chatgpt btn btn-md btn-dark" onclick="getContentFromChatGPT('<?php echo e($language->id); ?>')"><i class="fas fa-robot"></i>  Get Content From ChatGPT</button>
      </div>

      <div class="col-md-12 form-group<?php echo e($errors->has('short_description') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Product Short Description')); ?></label>
          <textarea name="multilanguage[<?php echo e($language->id); ?>][short_description]"  class="form-control short_description<?php echo e($language->id); ?>" placeholder="<?php echo e(__('Product Short Description')); ?>" value="<?php echo e(old('short_description','')); ?>"><?php echo old('short_description',''); ?></textarea>
          <?php if($errors->has('short_description')): ?>
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('short_description')); ?></strong>
              </span>
          <?php endif; ?>
      </div>

      <div class="col-md-12 form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Product Description')); ?></label>
          <textarea name="multilanguage[<?php echo e($language->id); ?>][description]"  id="editor<?php echo e($language->id); ?>"  class="ckeditor<?php echo e($language->id); ?> form-control" placeholder="<?php echo e(__('Product Description')); ?>" value="<?php echo e(old('description','')); ?>"><?php echo old('description',''); ?></textarea>
          <?php if($errors->has('description')): ?>
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('description')); ?></strong>
              </span>
          <?php endif; ?>
      </div>

    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

  <div class="col-md-12 form-group<?php echo e($errors->has('main_image') ? ' has-danger' : ''); ?>">
      <label class="form-control-label" for="input-email"><?php echo e(__('Image')); ?></label>
      <input type="file" name="main_image" id="input-email" class="form-control form-control-alternative<?php echo e($errors->has('main_image') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('main_image', '')); ?>" >

      <?php if($errors->has('main_image')): ?>
          <span class="invalid-feedback" role="alert">
              <strong><?php echo e($errors->first('main_image')); ?></strong>
          </span>
      <?php endif; ?>
  </div>




</div>
<?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/product/tabs/general.blade.php ENDPATH**/ ?>
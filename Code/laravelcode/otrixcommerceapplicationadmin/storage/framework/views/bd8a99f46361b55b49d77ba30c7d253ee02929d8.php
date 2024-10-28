  <ul class="language nav nav-tabs  mb-5" id="seolanguageTab" role="tablist">
    <?php $__currentLoopData = getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="nav-item">
        <a class="nav-link  <?php if($key == 0): ?> text-primary font-weight-bold text-lg active <?php endif; ?>" id="seolanguage-tab<?php echo e($language->id); ?>" data-toggle="tab" href="#seolanguage<?php echo e($language->id); ?>" role="tab" aria-controls="<?php echo e($language->language_name); ?>" aria-selected="true"><?php echo e($language->language_name); ?></a>
       </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <div class="tab-content tab-validate my-3" >
   <?php $__currentLoopData = getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="tab-pane <?php if($key == 0): ?> active <?php endif; ?>" id="seolanguage<?php echo e($language->id); ?>">
      <div class="chatGPTButton<?php echo e($language->id); ?> mx-3 mb-4 d-none">
        <button class="btn-chatgpt btn btn-md btn-dark" onclick="getSeoContentFromChatGPT('<?php echo e($language->id); ?>')"><i class="fas fa-robot"></i>  Get Seo Content From ChatGPT</button>
      </div>
      <div class="col-md-12 form-group<?php echo e($errors->has('multilanguage.*.meta_title') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Meta Title')); ?></label>
          <input type="text"  name="multilanguage[<?php echo e($language->id); ?>][meta_title]"  class="form-control meta_title<?php echo e($language->id); ?>  form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Title')); ?>" value="<?php echo e(old('meta_title', '')); ?>" autofocus >
          <?php if($errors->has('multilanguage.*.meta_title')): ?>
              <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('multilanguage.*.meta_title')); ?></strong>
              </span>
          <?php endif; ?>
      </div>

      <div class="col-md-12 form-group<?php echo e($errors->has('multilanguage.*.meta_keyword') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Meta Keyword')); ?></label>
          <input type="text"  name="multilanguage[<?php echo e($language->id); ?>][meta_keyword]"  class="form-control meta_keyword<?php echo e($language->id); ?>  form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Keyword')); ?>" value="<?php echo e(old('meta_keyword', '')); ?>" autofocus >
          <?php if($errors->has('multilanguage.*.meta_keyword')): ?>
              <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('multilanguage.*.meta_keyword')); ?></strong>
              </span>
          <?php endif; ?>
      </div>

      <div class="col-md-12 form-group<?php echo e($errors->has('meta_description') ? ' has-danger' : ''); ?>">
          <label class="form-control-label" for="input-name"><?php echo e(__('Meta Description')); ?></label>
          <textarea name="multilanguage[<?php echo e($language->id); ?>][meta_description]"  class="meta_description<?php echo e($language->id); ?> form-control" placeholder="<?php echo e(__('Meta Description')); ?>" value="<?php echo e(old('meta_description','')); ?>"><?php echo old('meta_description',''); ?></textarea>
          <?php if($errors->has('meta_description')): ?>
              <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('meta_description')); ?></strong>
              </span>
          <?php endif; ?>
      </div>



    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/product/tabs/productseo.blade.php ENDPATH**/ ?>
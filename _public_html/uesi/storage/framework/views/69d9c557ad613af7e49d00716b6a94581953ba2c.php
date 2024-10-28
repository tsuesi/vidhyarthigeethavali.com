<div class="tab-pane active" id="tab-general">
    <ul class="language nav nav-tabs  mb-5" id="languageTab" role="tablist">
      <?php $__currentLoopData = $data['data']->productMultipleDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
          <a class="nav-link  <?php if($key == 0): ?> text-primary font-weight-bold text-lg active <?php endif; ?>" id="language-tab<?php echo e($language->id); ?>" data-toggle="tab" href="#language<?php echo e($language->id); ?>" role="tab" aria-controls="<?php echo e($language->language_name); ?>" aria-selected="true"><?php echo e($language->language_name); ?></a>
        </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div class="tab-content tab-validate my-3" >
      <?php $__currentLoopData = $data['data']->productMultipleDescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="tab-pane <?php if($key == 0): ?> active <?php endif; ?>" id="language<?php echo e($language->language_id); ?>">

        <h4 class="ml-3 mb-3 text-info"> Enter data in <?php echo e($language->language_name); ?> </h4>

        <div class="col-md-12 form-group<?php echo e($errors->has('multilanguage.*.meta_title') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-name"><?php echo e(__('Meta Title')); ?></label>
            <input type="text"  name="multilanguage[<?php echo e($language->id); ?>][meta_title]"  class="form-control productName form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Title')); ?>" value="<?php echo e(old('meta_title', $language->meta_title)); ?>" autofocus >
            <?php if($errors->has('multilanguage.*.meta_title')): ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('multilanguage.*.meta_title')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="col-md-12 form-group<?php echo e($errors->has('multilanguage.*.meta_keyword') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-name"><?php echo e(__('Meta Keyword')); ?></label>
            <input type="text"  name="multilanguage[<?php echo e($language->id); ?>][meta_keyword]"  class="form-control productName form-control-alternative<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Meta Keyword')); ?>" value="<?php echo e(old('meta_keyword', $language->meta_keyword)); ?>" autofocus >
            <?php if($errors->has('multilanguage.*.meta_keyword')): ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('multilanguage.*.meta_keyword')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

        <div class="col-md-12 form-group<?php echo e($errors->has('meta_description') ? ' has-danger' : ''); ?>">
            <label class="form-control-label" for="input-name"><?php echo e(__('Meta Description')); ?></label>
            <textarea name="multilanguage[<?php echo e($language->id); ?>][meta_description]"  class=" form-control" placeholder="<?php echo e(__('Meta Description')); ?>" value="<?php echo e(old('meta_description','')); ?>"><?php echo old('meta_description',$language->meta_description); ?></textarea>
            <?php if($errors->has('meta_description')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('meta_description')); ?></strong>
                </span>
            <?php endif; ?>
        </div>

      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  </div>
</div>
<?php /**PATH /home/u298273519/domains/vidhyarthigeethavali.com/public_html/uesi/resources/views/admin/product/tabs/edit_tabs/productseo.blade.php ENDPATH**/ ?>
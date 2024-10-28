<div class="tab-pane" id="tab-image">
    <div class="pl-lg-4 row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="config_store_image"><?php echo e(__('Store Logo')); ?></label>
                <input type="file" name="config_store_image"  id="config_store_image" value="<?php echo e(old('config_store_image', '')); ?>" class="form-control" />
                <?php
                    $configStoreImage = \App\Models\Setting::setInputValue($data,'config_store_image')
                ?>

                <?php if($configStoreImage): ?>
                    <a target="_blank" href="<?php echo e(url(config('constant.file_path.store')."/$configStoreImage")); ?>">View Image</a>
                <?php endif; ?>

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="config_icon_image"><?php echo e(__('Favicon Icon')); ?></label>
                <input type="file" name="config_icon_image"  id="config_icon_image" value="<?php echo e(old('config_icon_image', '')); ?>" class="form-control" />
                <?php
                    $configIconImage = \App\Models\Setting::setInputValue($data,'config_icon_image')
                ?>

                <?php if($configIconImage): ?>
                    <a target="_blank" href="<?php echo e(url(config('constant.file_path.store')."/$configIconImage")); ?>">View Image</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/setting/edit_tabs/image.blade.php ENDPATH**/ ?>
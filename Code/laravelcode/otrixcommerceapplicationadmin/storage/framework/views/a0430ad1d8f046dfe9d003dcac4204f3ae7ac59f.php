<?php $__env->startPrepend('styles'); ?>
<?php $__env->stopPrepend(); ?>
<div class="tab-pane " id="tab-attribute">
    <div class="pl-lg-4 row">
        <div class="table-responsive">
            <table class="table align-items-center table-flush" id="counter_attribute_tbl">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="sort" data-sort="price">Name</th>
                    <th scope="col" class="sort" data-sort="quantity">Text</th>
                </tr>
                </thead>
                <tbody class="list">
                <tr class="tr_attribute_clone">
                    <td>
                        <select class="form-control select2" name="attributesArray[0][attribute_id]">
                            <?php $__currentLoopData = $data['attributeArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <optgroup label="<?php echo e($value->ProductAttributeGroupDescription->name); ?>">
                                <?php $__currentLoopData = $value->relationAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=<?php echo e($value1->id); ?>><?php echo e($value1->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="attributesArray[0][text]" id="attribute_text_0"  rows="4"></textarea>
                    </td>
                    <td>
                        <button class="btn  btn-danger" type="button" id="DeleteAttributeButton" ><icon class="fa fa-minus" /></button>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td style="text-align:right" colspan="5">
                        <button type="button" class="btn btn-primary addRowButton"  ><icon class="fa fa-plus" /></button>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php /**PATH G:\php\www\otrixcommercelaravelapp\resources\views/admin/product/tabs/attribute.blade.php ENDPATH**/ ?>
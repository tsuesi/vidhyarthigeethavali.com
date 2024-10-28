  <input type="hidden" name="optionPost" id="optionPost" value="">
   <div class="row">
      <div class="col-md-3 mb-3 ">
        <select class="form-control" name="option[type][]" onchange="setOption(this)">
            <option value="">Select Option</option>
            <?php $__currentLoopData = $data['product_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($value->id); ?>" data-label="<?php echo e($value->productoptionDescription->name); ?>"><?php echo e($value->productoptionDescription->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>

        <div class="col-md-9 mb-2 " >
          <div class="table-responsive ">
          <?php $__currentLoopData = $data['product_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <table class="table align-items-center table-option table-flush d-none optionTable<?php echo e($value->id); ?>" data-optionID="<?php echo e($value->id); ?>" data-optionType="<?php echo e($value->type); ?>" id="counter_option_tb1<?php echo e($value->id); ?>" >
                  <thead>
                    <tr class="tr_option_clone">
                        <th>Label</th>
                        <th>Price</th>
                        <?php if($value->type == 'Color'): ?>
                          <th>Color Value</th>
                       <?php endif; ?>
                        <th></th>
                      </tr>
                  </thead>
                   <tbody class="list" >
                        <tr>
                          <td><input type="text" placeholder="Enter Label" name="option[<?php echo e($value->id); ?>][label][]" class="form-control" type="text" /></td>
                          <td><input type="number"   name="option[<?php echo e($value->id); ?>][price][]" class="form-control" type="text" placeholder="Enter Price" /></td>
                            <?php if($value->type == 'Color'): ?>
                              <td><input type="text"   name="option[<?php echo e($value->id); ?>][color_code][]" class="form-control" type="text" placeholder="Enter Color Name or Code" /></td>
                            <?php endif; ?>
                          <td>
                            <button class="btn btn-danger" type="button" id="DeleteOptionButton" ><icon class="fa fa-minus" /> </button>
                          </td>
                         </tr>

                </tr>
              </tbody>
            <tfoot>
              <tr>
                <td style="text-align:left" colspan="2">
                    <button type="button" class="btn btn-secondary addRowButton" id="addRowButton" ><icon class="fa fa-plus" /> Add Raw</button>
                </td>
            </tr>
            </tfoot>
        </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </div>
    </div>
<?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/admin/product/tabs/option.blade.php ENDPATH**/ ?>
<div class="tab-pane" id="tab-option">
  <input type="hidden" name="optionPost" id="optionPost" value="<?php echo e($data['optionCommaSeprate']); ?>">

  <div class="row">

      <div class="col-md-3 mb-4 ">
        <div class="appendTab mb-3 mt-3 ">
          <?php $i = 0; $activeOption = 0; ?>
            <?php $__currentLoopData = $data['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <button type="button" onclick="optionClick('<?php echo e($option->id); ?>')" class="btn <?php if($i == 0): ?> btn-primary <?php endif; ?>  mb-3" id="btn<?php echo e($option->id); ?>" >
                <span style="margin-right:10px;" onclick="removeOption('<?php echo e($option->id); ?>')"> <i class="fas fa-minus-square"></i>
               </span> <?php echo e($option->productoptionDescription->name); ?></button>
             </br>
             <?php if($i == 0): ?>
              <?php    $activeOption = $option->id; ?>
             <?php endif; ?>
             <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <select class="form-control" name="option[type][]" onchange="setOption(this)">
            <option value="">Select Option</option>
            <?php $__currentLoopData = $data['product_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($values->id); ?>" data-label="<?php echo e($values->name); ?>"><?php echo e($values->productoptionDescription->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

      </div>

        <div class="col-md-9 mb-4 " >
         <div class="table-responsive ">
          <?php $__currentLoopData = $data['product_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <table class="table align-items-center table-option table-flush <?php if($value->id != $activeOption): ?>  d-none   <?php endif; ?> optionTable<?php echo e($value->id); ?>" data-optionID="<?php echo e($value->id); ?>" data-optionType="<?php echo e($value->type); ?>" id="counter_option_tb1<?php echo e($value->id); ?>" >
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
                       <?php $__empty_1 = true; $__currentLoopData = $data['productOptions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$optionValues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($value->id == $optionValues->option_id): ?>
                          <tr>
                            <td><input type="text" placeholder="Enter Label" name="option[<?php echo e($optionValues->option_id); ?>][label][]" class="form-control" type="text" value="<?php echo e($optionValues->label); ?>" /></td>
                            <td><input type="number"   name="option[<?php echo e($optionValues->option_id); ?>][price][]" class="form-control" type="text" placeholder="Enter Price" value="<?php echo e($optionValues->price); ?>" /></td>
                            <?php if($value->type == 'Color'): ?>
                              <td><input type="text"   name="option[<?php echo e($optionValues->option_id); ?>][color_code][]" class="form-control" value="<?php echo e($optionValues->color_code); ?>" type="text" placeholder="Enter Color Name or Code" /></td>
                            <?php endif; ?>
                            <td>
                              <button class="btn btn-danger" type="button" id="DeleteOptionButton" ><icon class="fa fa-minus" /> </button>
                            </td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                          <td><input type="text" placeholder="Enter Label" name="option[<?php echo e($value->id); ?>][label][]" class="form-control" type="text" /></td>
                          <td><input type="number"   name="option[<?php echo e($value->id); ?>][price][]" class="form-control" type="text" placeholder="Enter Price" /></td>
                          <?php if($value->type == 'Color'): ?>
                            <td><input type="text"   name="option[<?php echo e($value->id); ?>][color_code][]" class="form-control" type="text" placeholder="Enter Color Name or Code" /></td>
                          <?php endif; ?>
                          <td>
                            <button class="btn btn-danger" type="button" type="button" id="DeleteOptionButton" ><icon class="fa fa-minus" /> </button>
                          </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                     <tfoot>
                       <tr>
                         <td style="text-align:left" colspan="2">
                           <button type="button" class="btn btn-secondary addRowButton"  ><icon class="fa fa-plus" /> Add Raw</button>
                         </td>
                       </tr>
                     </tfoot>
                   </table>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>

       </div>
    </div>
  </div>
<?php /**PATH /home/u554892978/domains/otrixcommerce.in/public_html/development/resources/views/admin/product/tabs/edit_tabs/option.blade.php ENDPATH**/ ?>
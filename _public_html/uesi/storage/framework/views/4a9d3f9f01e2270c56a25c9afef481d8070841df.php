<?php

$product = $data['data'];
$attributeCount=count($data['attributeIds']);
?>



<?php $__env->startPrepend('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link href="<?php echo e(asset('frontend')); ?>/css/select2.min.css" rel="stylesheet">
<?php $__env->stopPrepend(); ?>
<?php $__env->startSection('content'); ?>

    <div class="header bg-primary pb-1">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">Product</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('product')); ?>">Product</a></li>
                                <li class="breadcrumb-item">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo e(route('product.add')); ?>" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
      <div class="align-items-center d-flex flex-wrap gap-5 justify-content-between mb-2 pb-1">
          <h4><i class="icofont-plugin"></i> Edit Product</h4>
      </div>
      <form method="post" class="row" action="<?php echo e(route('product.update',['id' => $product->id])); ?>" enctype="multipart/form-data" autocomplete="off">
          <?php echo csrf_field(); ?>
          <?php echo method_field('post'); ?>

          <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="card mb-30">
                <div class="card-header bg-white border-bottom2">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4>Product Information</h4>
                    </div>
                </div>
                <div class="card-body">
                        <?php echo $__env->make('admin.product.tabs.edit_tabs.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
              </div>
                <div class="card mb-30">
                    <div class="card-header bg-white border-bottom2">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4>Product Options</h4>
                        </div>
                    </div>
                    <div class="card-body">
                          <?php echo $__env->make('admin.product.tabs.edit_tabs.option', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                  </div>

                  <div class="card mb-30">
                      <div class="card-header bg-white border-bottom2">
                          <div class="d-sm-flex justify-content-between align-items-center">
                              <h4>Product Additional Images</h4>
                          </div>
                      </div>
                      <div class="card-body">
                          <?php echo $__env->make('admin.product.tabs.edit_tabs.image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      </div>
                  </div>

                  <div class="card mb-30">
                      <div class="card-header bg-white border-bottom2">
                          <div class="d-sm-flex justify-content-between align-items-center">
                              <h4>Product Attribute</h4>
                          </div>
                      </div>
                      <div class="card-body">
                              <?php echo $__env->make('admin.product.tabs.edit_tabs.attribute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      </div>
                  </div>

                  <div class="card mb-30">
                      <div class="card-header bg-white border-bottom2">
                          <div class="d-sm-flex justify-content-between align-items-center">
                              <h4>Product Seo</h4>
                          </div>
                      </div>
                      <div class="card-body">
                              <?php echo $__env->make('admin.product.tabs.edit_tabs.productseo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      </div>
                  </div>

            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
              <div class="card mb-30">
                  <div class="card-header bg-white border-bottom2">
                      <div class="d-sm-flex justify-content-between align-items-center">
                          <h4>Product Links</h4>
                      </div>
                  </div>
                  <div class="card-body">
                    <?php echo $__env->make('admin.product.tabs.edit_tabs.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                </div>

              <div class="card mb-30">
                  <div class="card-header bg-white border-bottom2">
                      <div class="d-sm-flex justify-content-between align-items-center">
                          <h4>Price & Shipping</h4>
                      </div>
                  </div>
                  <div class="card-body">
                          <?php echo $__env->make('admin.product.tabs.edit_tabs.data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                </div>

                <div class="card mb-30">
                    <div class="card-header bg-white border-bottom2">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4>Product Special Discount</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.product.tabs.special', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                  </div>
              </div>

              <div class="bottom-btn bg-white  d-flex align-items-center justify-content-sm-end gap-10 flex-wrap justify-content-center">
                <button type="submit" name="status" value="1" class="btn btn-success" tabindex="4">
                    Update Product
                </button>
              </div>

        </form>
     </div>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets')); ?>/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <!-- Select2 JS -->
    <script src="<?php echo e(asset('frontend')); ?>/js/select2.min.js" ></script>
    <script src="//cdn.ckeditor.com/4.4.7/standard-all/ckeditor.js"></script>
    <script src="http://cdn.ckeditor.com/4.4.7/standard-all/adapters/jquery.js"></script>

    <script>
    $(document).ready(function () {
        <?php foreach (getLanguages() as $key=>$language) { ?>
          $('.ckeditor<?php echo $language->id ?>').ckeditor();
        <?php    } ?>
    });
        $('.btnNext').click(function(){
          $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').trigger('click');
          var tabIdx = $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').attr('data-id')
          if(tabIdx  > 2) {
            $('#btnPrev').removeClass('d-none')
          }
        });

        $('.btnPrevious').click(function(){
          $('.nav-tabs > .nav-item > .active').parent().prev('li').find('a').trigger('click');
          var tabIdx = $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').attr('data-id');
          if(tabIdx  == 2) {
            $('#btnPrev').addClass('d-none')
          }
        });

        $(".nav-tabs a[data-toggle=tab]").on("click", function(e) {
          var idx = $(this).index('a[data-toggle="tab"]');
          if(idx  > 0) {
            $('#btnPrev').removeClass('d-none')
          }
          if(idx  == 0) {
            $('#btnPrev').addClass('d-none')
          }
          if(idx == 6) {
            $('#btnNxt').addClass('d-none');
            $('#btnSave').removeClass('d-none');
          }
          else {
            $('#btnNxt').removeClass('d-none');
            $('#btnSave').addClass('d-none');
          }

        });

        $('.datepicker').datepicker({
            format: datePickerFormat,
            startDate: '-3d'
        });

        $('selectpicker').selectpicker();

        // Initialize select2
        $(".select2").select2();
        // var counter = 1;
        // $(document).on('click', '#addRowButton', function() {
        //     $('#tbl').append(`<tr class="tr_clone">
        //     <td><input type="file" name="product_image[image][]" id=image${counter} class="form-control form-control-alternative<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" required></td>
        //     <td class="budget"> <input type="number" min="1" name="product_image[sort_order_image][]" id=sort_order_image${counter} class="form-control form-control-alternative<?php echo e($errors->has('sort_order_image') ? ' is-invalid' : ''); ?>" required autofocus></td>
        //     <td>
        //         <button class="btn btn-danger" type="button" id="DeleteButton" ><icon class="fa fa-minus" /></button>
        //     </td>
        // </tr>`);
        //     counter += 1;
        // });
        //
        // $("#tbl").on("click", "#DeleteButton", function() {
        //     $(this).closest("tr").remove();
        //     counter -= 1;
        // });


        // Attribute Product
        var counter_attribute = "<?php echo e($attributeCount); ?>";
        function appendToAttributeTable(tableId) {
            $(`#${tableId}`).append(`<tr class="tr_attribute_clone">
                                        <td><select class="form-control select2" name="attributesArray[${counter_attribute}][attribute_id]">
                                                <?php $__currentLoopData = $data['attributeArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <optgroup label="<?php echo e($value->ProductAttributeGroupDescription->name); ?>">
                                                        <?php $__currentLoopData = $value->relationAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value=<?php echo e($value1->id); ?>><?php echo e($value1->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </optgroup>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select></td>
                                        <td><textarea class="form-control" name="attributesArray[${counter_attribute}][text]" id="attribute_text_${counter_attribute}"  rows="4"></textarea></td>
                                        <td><button class="btn btn-danger" type="button" id="DeleteAttributeButton" ><icon class="fa fa-minus" /></button></td>
                                        </tr>`);

            counter_attribute += 1;
            $(".select2").select2();
        }


        $("#counter_attribute_tbl2").on("click", "#DeleteAttributeButton", function() {
            $(this).closest("tr").remove();
            counter_attribute -= 1;
        });

        var counter = 1;
        function appendToImageTable(tableId) {
            $(`#${tableId}`).append(`<tr class="tr_clone">
            <td><input type="file" name="product_image[image][]" id=image${counter} class="form-control form-control-alternative<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" required></td>
            <td class="budget"> <input type="number" min="1" name="product_image[sort_order_image][]" id=sort_order_image${counter} class="form-control form-control-alternative<?php echo e($errors->has('sort_order_image') ? ' is-invalid' : ''); ?>" required autofocus></td>
            <td>
                <button class="btn btn-danger" type="button" id="DeleteButton" ><icon class="fa fa-minus" /></button>
            </td>
        </tr>`);
            counter += 1;
        }

        $("#tbl").on("click", "#DeleteButton", function() {
            $(this).closest("tr").remove();
            counter -= 1;
        });

        // Option Product
        var counter_option = 1;

        function appendToOptionTable(tableId,optionID,optionType) {

          let renderHTML = '<tr class="tr_option_clone"><td><input type="text" placeholder="Enter Label" name="option['+optionID+'][label][]" class="form-control" type="text" /></td>';
          renderHTML += '<td><input type="number"   name="option['+optionID+'][price][]" class="form-control" type="text" placeholder="Enter Price" /></td>';
          if(optionType == 'Color') {
              renderHTML += '<td><input type="text" placeholder="Enter Color Name or Code" name="option['+optionID+'][color_code][]" class="form-control" type="text" /></td>';
          }
          renderHTML += '<td><button class="btn btn-danger" type="button" type="button" id="DeleteOptionButton" ><icon class="fa fa-minus" /></button>  </td></tr>'

            $('#counter_option_tb1'+ optionID).append(renderHTML);

            counter_option += 1;

            $('.datepicker').datepicker({
                format: datePickerFormat,
                startDate: '-3d'
            });
        }

        $(document).on('click', '#DeleteOptionButton', function() {
          let tableId = $(this).closest('table').attr('id');
          $(this).closest("tr").remove();
          counter_option -= 1;
        });

        $(document).on('click', '.addRowButton', function() {

            let tableId = $(this).closest('table').attr('id');
            let optionID = $(this).closest('table').attr('data-optionID');
            let optionType = $(this).closest('table').attr('data-optionType');

            if(tableId == 'counter_option_tb1'+optionID) {
              appendToOptionTable(tableId,optionID,optionType)
            }
            if(tableId == 'counter_attribute_tbl2') {
                appendToAttributeTable(tableId)
            }
            if(tableId == 'tbl') {
                appendToImageTable(tableId)
            }

        });


        var optionArr = [];

        //add dynamic tab1$(document).ready(function() {
        function setOption(val) {
            let oldDataArr = [<?php echo '"'.implode('","',$data['optionIDArr']).'"' ?>];

            if(oldDataArr != '') {
                optionArr = oldDataArr;
            }


          if($(val).val() != '') {
            var addOption = false;
            if(optionArr.length == 0) {
              addOption = true;
              optionArr.push($(val).val())

            }
            else {
              if(!optionArr.includes($(val).val())) {
                addOption = true;
                optionArr.push($(val).val())
              }
            }

            filterArr = optionArr.filter(function (value, index, array) {
                return array.indexOf(value) === index;
            });
            let postID = filterArr.join(",");
            $('#optionPost').val(postID)
            if(addOption) {
              $(".appendTab button").each(function(){
                $(this).removeClass("btn-primary");
              });

              $(".table-option").each(function(){
                $(this).addClass("d-none");
              });
              $('.appendTab').append('<button type="button" onclick="optionClick(' +$(val).val()+')" class="btn btn-primary" id="btn'+$(val).val()+'" ><span style="margin-right:10px;" onclick="removeOption('+$(val).val()+')"> <i class="fas fa-minus-square"></i> </span> '+$(val).find('option:selected').text()+'</button></br>')
              $('.optionTable'+$(val).val()).removeClass('d-none');
              $('.optionTable'+$(val).val()).show();
            }
          }

        }

        function optionClick(id) {
          $(".appendTab button").each(function(){
            $(this).removeClass("btn-primary");
          });
          $(".table-option").each(function(){
            $(this).addClass("d-none");
          });
          $('#btn'+id).addClass('btn-primary');
          $('.optionTable'+id).removeClass('d-none');

        }

        function removeOption(id) {
            $('.optionTable'+id+' > tbody').find("tr:gt(0)").empty();
            $('.optionTable'+id).hide();
            optionArr = optionArr.filter((value)=>value!=id);
            let postID = optionArr.join(",");
            $('#btn'+id).remove();
            $('#optionPost').val(postID)

        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u298273519/domains/vidhyarthigeethavali.com/public_html/uesi/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>
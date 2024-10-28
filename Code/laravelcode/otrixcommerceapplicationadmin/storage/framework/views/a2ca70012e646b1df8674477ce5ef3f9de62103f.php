
<?php $__env->startSection('content'); ?>
  <div class="container pt-5">
      <div class="d-flex justify-content-center mt-5">
        <div class="card p-3">
          <div class="card-body install-card-body h-100 w-100 z-3 position-relative">
            <center>
              <img src="<?php echo e(asset('frontend')); ?>/images/logo.png" alt="" height="50">
            </center>
            <h1 class="my-3 text-center">Otrixweb - Ecommerce Website Installation</h1>
            <p class="text-center">Review the items that have a red mark on it.
If everything is green, you are good to go to the next step.</p>
          <ul class="list-group rounded-2">
                      <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                          Php version 8.0

                          <?php
                              $phpVersion = number_format((float)phpversion(), 2, '.', '');
                          ?>
                          <?php if($phpVersion >= 8.0): ?>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                  <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                              </svg>
                          <?php else: ?>
                              <i class="fa fa-close"></i>
                          <?php endif; ?>
                      </li>
                      <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                          Curl Enabled
                          <?php if($permission['curl_enabled']): ?>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                  <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                              </svg>
                          <?php else: ?>
                            <i class="fa fa-close"></i>
                          <?php endif; ?>
                      </li>
                      <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                          .env File Permission

                          <?php if($permission['db_file_write_perm']): ?>
                              <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                  <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                              </svg>
                          <?php else: ?>
                            <i class="fa fa-close"></i>
                          <?php endif; ?>
                      </li>
                      
                  </ul>
                  <center>
                    <?php if($permission['curl_enabled'] == 1 && $permission['db_file_write_perm'] == 1 && $permission['routes_file_write_perm'] == 1 && $phpVersion >= 8.0): ?>
                    <a href="<?php echo e(route('database.setup')); ?>" class="btn btn-small btn-success my-3">
                      Database Setup <i class="fa fa-arrow-right"></i>
                    </a>
                    <?php endif; ?>
                  </center>
          </div>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installation.app', ['class' => 'bg-white'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/installation/checkingpermission.blade.php ENDPATH**/ ?>
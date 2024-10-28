
<?php $__env->startSection('content'); ?>
  <div class="container pt-5">
      <div class="d-flex justify-content-center mt-5">
        <div class="card p-3">
          <div class="card-body install-card-body h-100 w-100 z-3 position-relative">
            <center>
              <img src="<?php echo e(asset('frontend')); ?>/images/logo.png" alt="" height="50">
            </center>
            <h1 class="my-3 text-center">Otrixweb - Ecommerce Website Installation</h1>
            <p class="text-center">Make sure this is ready before proceeding</p>
            <ol class="list-group rounded-2">

                <li class="list-group-item fs-12 fw-600 d-flex align-items-center" style="line-height: 18px; color: #666; gap: 7px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                        <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                    </svg>
                    Database Name
                </li>
                <li class="list-group-item fs-12 fw-600 d-flex align-items-center" style="line-height: 18px; color: #666; gap: 7px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                        <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                    </svg>
                    Database Username
                </li>
                <li class="list-group-item fs-12 fw-600 d-flex align-items-center" style="line-height: 18px; color: #666; gap: 7px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                        <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                    </svg>
                    Database Password
                </li>
                <li class="list-group-item fs-12 fw-600 d-flex align-items-center" style="line-height: 18px; color: #666; gap: 7px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                        <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                    </svg>
                    Database Hostname
                </li>
                <small class="my-5">
                  During the installation process, we will check if the files that are needed to be written (.env file) have write permission. We will also check if curl are enabled on your server or not.
                </small>
                <center>
                  <a href="<?php echo e(route('checking-permission')); ?>" class="btn btn-small btn-success my-3">
                    Start Installation
                  </a>
                </center>

            </ol>
          </div>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installation.app', ['class' => 'bg-white'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/installation/index.blade.php ENDPATH**/ ?>
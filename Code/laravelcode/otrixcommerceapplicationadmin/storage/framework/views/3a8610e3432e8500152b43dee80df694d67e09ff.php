<?php if(Session::get('locale') == 'ar'): ?>
<style >
  body{direction: rtl;}

</style>
<?php endif; ?>
<style>
.header-top {
  background:<?php echo e(config('settingConfig.config_web_bg')); ?>;
}
[class*="button-"] {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
[class*="button-"]:hover {
    color: <?php echo e(config('settingConfig.config_web_bg')); ?>;
}
.add-to-cart {
    border: 1px solid <?php echo e(config('settingConfig.config_web_bg')); ?>;
    color: <?php echo e(config('settingConfig.config_web_bg')); ?>;
}
.add-to-cart:before{background: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
.subscribe-wrapper {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .btn-subscribe:hover {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .product .price .offer {
    color: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .search-container .submit {
    background: url('<?php echo e(asset("frontend")); ?>/images/search-icon.svg')no-repeat top 16px right 17px <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .quantity-wrap .add-to-cart {
      background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .quantity-wrap .add-to-cart:hover {
    color:  <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .descirp-tab ul.tabs li.active {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .submitbtn {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
    border: 1px solid <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .submitbtn:hover {
    color: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .price-wrap .price span {
    color: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .button-gray {
    background: #F8F8F8 !important;
    border-color: #F8F8F8 !important;
    color: #121533 !important;
  }
  .coupon_input .btn-subscribe {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .coupon_input .btn-subscribe:hover {
    border-color:<?php echo e(config('settingConfig.config_web_bg')); ?>;
    color:<?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .button-gray:hover {
    color: #fff !important;
  }
  .button-gray:before {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .swal2-styled.swal2-confirm {
    background-color: <?php echo e(config('settingConfig.config_web_bg')); ?> !important;
  }
  .info-wrap {
    background: <?php echo e(config('settingConfig.config_web_bg')); ?>;
  }
  .fa-home {color: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
  .check-label .checkmark:after {background: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
  .check-label input:checked ~ .checkmark {border-color: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
  .page-item.active .page-link {display: flex;align-items: center;justify-content: center;width: 50px; height: 50px;background-color: <?php echo e(config('settingConfig.config_web_bg')); ?>;border-color: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
  .pagination li a:hover, .pagination li a.current-page {background: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
  .js_product_thumbslider li.slick-current .product_thumbitem {border-color: <?php echo e(config('settingConfig.config_web_bg')); ?>;}
  .fa-star {color: <?php echo e(config('settingConfig.config_web_bg')); ?>}
  .scrollTop {background: <?php echo e(config('settingConfig.config_web_bg')); ?> }
  .fa-star-half-o {color: <?php echo e(config('settingConfig.config_web_bg')); ?>}
   a:hover{color: <?php echo e(config('settingConfig.config_web_bg')); ?>}};
  
</style>
<?php /**PATH G:\php\www\otrixcommercelaravelapplicationadmin\resources\views/frontend/layouts/style.blade.php ENDPATH**/ ?>
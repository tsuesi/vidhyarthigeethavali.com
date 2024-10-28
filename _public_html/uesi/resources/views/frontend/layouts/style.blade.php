@if(Session::get('locale') == 'ar')
<style >
  body{direction: rtl;}

</style>
@endif
<style>
.header-top {
  background:{{config('settingConfig.config_web_bg')}};
}
[class*="button-"] {
    background: {{config('settingConfig.config_web_bg')}};
  }
[class*="button-"]:hover {
    color: {{config('settingConfig.config_web_bg')}};
}
.add-to-cart {
    border: 1px solid {{config('settingConfig.config_web_bg')}};
    color: {{config('settingConfig.config_web_bg')}};
}
.add-to-cart:before{background: {{config('settingConfig.config_web_bg')}};}
.subscribe-wrapper {
    background: {{config('settingConfig.config_web_bg')}};
  }
  .btn-subscribe:hover {
    background: {{config('settingConfig.config_web_bg')}};
  }
  .product .price .offer {
    color: {{config('settingConfig.config_web_bg')}};
  }
  .search-container .submit {
    background: url('{{asset("frontend")}}/images/search-icon.svg')no-repeat top 16px right 17px {{config('settingConfig.config_web_bg')}};
  }
  .quantity-wrap .add-to-cart {
      background: {{config('settingConfig.config_web_bg')}};
  }
  .quantity-wrap .add-to-cart:hover {
    color:  {{config('settingConfig.config_web_bg')}};
  }
  .descirp-tab ul.tabs li.active {
    background: {{config('settingConfig.config_web_bg')}};
  }
  .submitbtn {
    background: {{config('settingConfig.config_web_bg')}};
    border: 1px solid {{config('settingConfig.config_web_bg')}};
  }
  .submitbtn:hover {
    color: {{config('settingConfig.config_web_bg')}};
  }
  .price-wrap .price span {
    color: {{config('settingConfig.config_web_bg')}};
  }
  .button-gray {
    background: #F8F8F8 !important;
    border-color: #F8F8F8 !important;
    color: #121533 !important;
  }
  .coupon_input .btn-subscribe {
    background: {{config('settingConfig.config_web_bg')}};
  }
  .coupon_input .btn-subscribe:hover {
    border-color:{{config('settingConfig.config_web_bg')}};
    color:{{config('settingConfig.config_web_bg')}};
  }
  .button-gray:hover {
    color: #fff !important;
  }
  .button-gray:before {
    background: {{config('settingConfig.config_web_bg')}};
  }
  .swal2-styled.swal2-confirm {
    background-color: {{config('settingConfig.config_web_bg')}} !important;
  }
  .info-wrap {
    background: {{config('settingConfig.config_web_bg')}};
  }
  .fa-home {color: {{config('settingConfig.config_web_bg')}};}
  .check-label .checkmark:after {background: {{config('settingConfig.config_web_bg')}};}
  .check-label input:checked ~ .checkmark {border-color: {{config('settingConfig.config_web_bg')}};}
  .page-item.active .page-link {display: flex;align-items: center;justify-content: center;width: 50px; height: 50px;background-color: {{config('settingConfig.config_web_bg')}};border-color: {{config('settingConfig.config_web_bg')}};}
  .pagination li a:hover, .pagination li a.current-page {background: {{config('settingConfig.config_web_bg')}};}
  .js_product_thumbslider li.slick-current .product_thumbitem {border-color: {{config('settingConfig.config_web_bg')}};}
  .fa-star {color: {{config('settingConfig.config_web_bg')}}}
  .scrollTop {background: {{config('settingConfig.config_web_bg')}} }
  .fa-star-half-o {color: {{config('settingConfig.config_web_bg')}}}
   a:hover{color: {{config('settingConfig.config_web_bg')}}}};
  
</style>

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(asset('uploads')); ?>/store/<?php echo e(config('settingConfig.config_store_image')); ?>" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link <?php if(Request::is('admin/dashboard')): ?> active <?php endif; ?>" href="<?php echo e(route('dashboard')); ?>">
                            <i class="ni ni-tv-2"></i> <?php echo e(__('Dashboard')); ?>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-catelog" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fa fa-list-alt fa-lg"></i>
                            <span class="nav-link-text" > <?php echo e(__('Catalog')); ?> </span>
                        </a>
                        <ul class="nav nav-sm flex-column">
                            <div class="collapse" id="navbar-catelog">
                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-category" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-tasks fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Categories')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-category">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('category.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('category')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-products" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                        <i class="fas fa-box fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Products')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-products">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('product.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('product')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-coupon" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-percent"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Coupon')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-coupon">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('coupon.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('coupon')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#navbar-product-option" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fa fa-list-alt fa-lg"></i>
                                      <span class="nav-link-text" style="color: #f4645f;">
                                      <?php echo e(__('Options')); ?>

                                  </span>
                                  </a>
                                  <ul class="nav nav-sm flex-column">
                                      <div class="collapse" id="navbar-product-option">
                                          <li class="nav-item">
                                              <a class="nav-link" href="<?php echo e(route('product-option.add')); ?>">
                                                  <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" href="<?php echo e(route('product-option')); ?>">
                                                  <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                              </a>
                                          </li>
                                      </div>
                                  </ul>
                              </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-manufacturer" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                        <i class="fas fa-industry fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Manufacturers')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-manufacturer">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('manufacturer.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('manufacturer')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-product-attribute-group" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-th fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Attribute Group')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-product-attribute-group">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('product-attribute-group.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('product-attribute-group')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-product-attribute" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-th fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Product Attribute')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-product-attribute">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('product-attribute.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('product-attribute')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-review" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                    <i class="fas fa-star"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Reviews')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-review">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('review')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>
                            </div>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-system" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-laptop fa-lg"></i>
                            <span class="nav-link-text" > <?php echo e(__('System')); ?> </span>
                        </a>
                        <ul class="nav nav-sm flex-column">
                            <div class="collapse" id="navbar-system">

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-shipping-rate" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-shipping-fast"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Shipping')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-shipping-rate">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('shipping.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('shipping')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-length-class" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                        <i class="fas fa-ruler-vertical fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Length Class')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-length-class">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('length-class.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('length-class')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-weight-class" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-weight fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Weight Class')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-weight-class">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('weight-class.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('weight-class')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-order-status" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                        <i class="fas fa-tag fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Order Status')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-order-status">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('order-status.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('order-status')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-stock-status" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                        <i class="fas fa-cubes fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Stock Status')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-stock-status">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('stock-status.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('stock-status')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-country" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-globe-asia fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Countries')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-country">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('country.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('country')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-tax-rate" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                      <i class="fas fa-percentage fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Tax Rate')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-tax-rate">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('tax-rate.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('tax-rate')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#navbar-language-class" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                        <i class="fas fa-language fa-lg"></i>
                                        <span class="nav-link-text" >
                                        <?php echo e(__('Language')); ?>

                                    </span>
                                    </a>
                                    <ul class="nav nav-sm flex-column">
                                        <div class="collapse" id="navbar-language-class">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('language.add')); ?>">
                                                    <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(route('language')); ?>">
                                                    <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </li>


                            </div>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-ai" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-robot fa-lg"></i>
                            <span class="nav-link-text" > <?php echo e(__('AI Section')); ?> </span>
                        </a>
                        <div class="collapse" id="navbar-ai">
                         <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-minus fa-lg"></i> <?php echo e(__('Image Similarity (Coming soon)')); ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                      <a class="nav-link" href="<?php echo e(route('get.AI-chatGPT')); ?>">
                                          <i class="fa fa-minus fa-lg"></i> <?php echo e(__('ChatGPT')); ?>

                                      </a>
                                  </li>
                              </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-customer" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-user-tie fa-lg"></i>
                            <span class="nav-link-text" >
                                <?php echo e(__('Customer')); ?>

                            </span>
                        </a>

                        <div class="collapse" id="navbar-customer">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('customer.add')); ?>">
                                        <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('customer')); ?>">
                                        <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-sales" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-sort-amount-up-alt fa-lg"></i>
                            <span class="nav-link-text" > <?php echo e(__('Sales')); ?> </span>
                        </a>
                        <ul class="nav nav-sm flex-column">
                            <div class="collapse" id="navbar-sales">
                                <li class="nav-item">
                                  <a class="nav-link" href="<?php echo e(route('order')); ?>">
                                      <i class="fa fa-minus"></i> <?php echo e(__('Orders')); ?>

                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">
                                      <i class="fa fa-minus"></i> <?php echo e(__('Selling Reports (coming soon)')); ?>

                                  </a>
                                </li>
                            </div>
                        </ul>
                    </li>


                    <li class="nav-item">
                      <a class="nav-link" href="#navbar-notification" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                          <i class="fas fa-bullhorn fa-lg"></i>
                          <span class="nav-link-text" >
                              <?php echo e(__('Marketing')); ?>

                          </span>
                      </a>

                      <div class="collapse" id="navbar-notification">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('newslatter.add')); ?>">
                                    <i class="fa fa-envelope fa-lg"></i> <?php echo e(__('Email Marketing')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('smsmarketing.add')); ?>">
                                    <i class="fa fa-sms fa-lg"></i> <?php echo e(__('Sms Marketing')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('notifications')); ?>">
                                    <i class="fa fa-bell fa-lg"></i> <?php echo e(__('Send Notification')); ?>

                                </a>
                            </li>
                          </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fa fa-users fa-lg"></i>
                            <span class="nav-link-text" ><?php echo e(__('User')); ?></span>
                        </a>
                        <div class="collapse" id="navbar-user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('user.add')); ?>">
                                        <i class="fa fa-plus fa-lg"></i>  <?php echo e(__('Add')); ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('user')); ?>">
                                      <i class="fa fa-list-alt fa-lg"></i>   <?php echo e(__('List')); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#navbar-cms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                              <i class="fa fa-edit fa-lg"></i>
                              <span class="nav-link-text" ><?php echo e(__('CMS')); ?></span>
                          </a>
                          <div class="collapse" id="navbar-cms">
                              <ul class="nav nav-sm flex-column">
                                  <li class="nav-item">
                                      <a class="nav-link" href="<?php echo e(route('pages')); ?>">
                                          <i class="fa fa-list fa-lg"></i>  <?php echo e(__('Manage CMS')); ?>

                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="<?php echo e(route('trending_dod')); ?>">
                                          <i class="fab fa-ideal"></i>  <?php echo e(__('Deals Of The Day')); ?>

                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="<?php echo e(route('homepage_category')); ?>">
                                          <i class="fas  fa-box"></i>  <?php echo e(__('Homepage Category')); ?>

                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="<?php echo e(route('featured-product')); ?>">
                                          <i class="fas fa-bolt"></i>  <?php echo e(__('Featured Products')); ?>

                                      </a>
                                  </li>
                              </ul>
                          </div>

                      </li>

              <li class="nav-item">
                  <a class="nav-link" href="#navbar-role-permission" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                      <i class="fas fa-user-secret fa-lg"></i>
                      <span class="nav-link-text" > <?php echo e(__('Roles & Permissions')); ?> </span>
                  </a>
                  <ul class="nav nav-sm flex-column">
                      <div class="collapse" id="navbar-role-permission">
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-role" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="fas fa-user fa-lg"></i>
                                <span class="nav-link-text" >
                                <?php echo e(__('Role')); ?>

                            </span>
                            </a>
                            <ul class="nav nav-sm flex-column">
                                <div class="collapse" id="navbar-role">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('role.add')); ?>">
                                            <i class="fa fa-plus fa-lg"></i> <?php echo e(__('Add')); ?>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('role')); ?>">
                                            <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-permission" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                              <i class="fas fa-hand-rock fa-lg"></i>
                                <span class="nav-link-text" >
                                <?php echo e(__('Permission')); ?>

                            </span>
                            </a>
                            <ul class="nav nav-sm flex-column">
                                <div class="collapse" id="navbar-permission">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('permission')); ?>">
                                            <i class="fa fa-list-alt fa-lg"></i> <?php echo e(__('List')); ?>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        </div>
                      </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#navbar-Support" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-headset fa-lg"></i>
                            <span class="nav-link-text" > <?php echo e(__('Support')); ?> </span>
                        </a>

                        <div class="collapse" id="navbar-Support">
                          <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('contact-us')); ?>">
                                        <i class="fas fa-pen "></i> <?php echo e(__('Contact Us')); ?>

                                    </a>
                                </li>
                              </ul>
                      </div>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-designs" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-fill-drip fa-lg"></i>
                            <span class="nav-link-text" > <?php echo e(__('Appearance')); ?> </span>
                        </a>
                        <div class="collapse" id="navbar-designs">
                         <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('banner')); ?>">
                                        <i class="fa fa-minus fa-lg"></i> <?php echo e(__('Banners & Sliders')); ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                      <a class="nav-link" href="#">
                                          <i class="fa fa-minus fa-lg"></i> <?php echo e(__('Themes (coming soon)')); ?>

                                      </a>
                                  </li>
                              </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fa fa-cog fa-lg"></i>
                            <span class="nav-link-text" ><?php echo e(__('Settings')); ?></span>
                        </a>
                        <div class="collapse" id="navbar-settings">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('setting.general')); ?>">
                                        <i class="fa fa-minus fa-lg"></i>  <?php echo e(__('General Setting')); ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('setting.email')); ?>">
                                        <i class="fa fa-minus fa-lg"></i>  <?php echo e(__('Email Setting')); ?>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('setting.socialmedia')); ?>">
                                        <i class="fa fa-minus fa-lg"></i>  <?php echo e(__('Social Media Setting')); ?>

                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('setting.seo')); ?>">
                                        <i class="fa fa-minus fa-lg"></i>  <?php echo e(__('Seo Setting')); ?>

                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH /home/picklmsc/uesi.picklms.com/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>
<section>
    <i class="material-icons showHideNav navShow hide">chevron_right</i>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="animated sidebar">
        <i class="material-icons showHideNav navHide">chevron_left</i>
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo e(asset('adminbsb/images/user.png')); ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
                <div class="email"><?php echo e(Auth::user()->email); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        
                        <li><a href="<?php echo e(url('logout')); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <a href="#" class="hide btn menuIcon">
            <i class="material-icons hideLeftMenu">keyboard_arrow_left</i>
            <i class="hide material-icons showLeftMenu">keyboard_arrow_right</i>
        </a>
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">
                    MAIN NAVIGATION
                </li>
                <li <?php if($controller == "dashboard"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/dashboard')); ?>">
                        <i class="material-icons">home</i>
                        <span><?php echo e(trans('adminbsb.dashboard')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "user"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/user')); ?>">
                        <i class="material-icons">person</i>
                        <span><?php echo e(trans('adminbsb.user')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "supplier"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/supplier')); ?>">
                        <i class="material-icons">person_pin</i>
                        <span><?php echo e(trans('adminbsb.supplier')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "category"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/category')); ?>">
                        <i class="material-icons">view_module</i>
                        <span><?php echo e(trans('adminbsb.category')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "product"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/product')); ?>">
                        <i class="material-icons">list</i>
                        <span><?php echo e(trans('adminbsb.product')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "order"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/order')); ?>">
                        <i class="material-icons">shopping_basket</i>
                        <span><?php echo e(trans('adminbsb.order')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "contact"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/contact')); ?>">
                        <i class="material-icons">contacts</i>
                        <span><?php echo e(trans('adminbsb.contact')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "subscribe"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/subscribe')); ?>">
                        <i class="material-icons">mail</i>
                        <span><?php echo e(trans('adminbsb.subscribe')); ?></span>
                    </a>
                </li>
                <li <?php if($controller == "setting"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/setting')); ?>">
                        <i class="material-icons">settings</i>
                        <span><?php echo e(trans('adminbsb.setting')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 - 2019 <a href="javascript:void(0);">Design by FeelsyncSystem Co.</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
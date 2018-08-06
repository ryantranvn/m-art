<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo e(asset('adminbsb/images/user.png')); ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                <div class="email">john.doe@example.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="separator" class="divider"></li>
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
                
                

                <li class="header">LABELS</li>
                <li <?php if($controller == "category"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('admin/category')); ?>">
                        <i class="material-icons">donut_large</i>
                        <span><?php echo e(trans('adminbsb.category')); ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    
    <!-- #END# Right Sidebar -->
</section>
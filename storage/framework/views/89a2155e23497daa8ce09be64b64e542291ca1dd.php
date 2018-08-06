<?php $__env->startSection('content'); ?>
<div class="wrapper-content account-page">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('website.partials.breadcrumb', [
                'breadcrumbs' => [
                    ['text' => 'My Account', 'link' => '']
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="row page-dashboard">
            <div id="column_left" class="col-sm-3 col-xs-12 left-aside">
                <div class="employer-sidebar">
                    <div class="employer-nav bg-white m-b-15">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation" <?php if($action == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo e(url('/my-account')); ?>">Account information</a></li>
                            <li role="presentation" <?php if($action == 'password'): ?>class="active"<?php endif; ?>><a href="<?php echo e(url('/my-account/password')); ?>">Change password</a></li>
                            <li role="presentation" <?php if($action == 'orders'): ?>class="active"<?php endif; ?>><a href="<?php echo e(url('/my-account/orders')); ?>">Orders</a></li>
                            <li role="presentation"><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="content" class="col-sm-9 col-xs-12 right-aside">
                <?php echo $__env->make('website.partials.reply', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php if($action == 'index'): ?>
                    <div class="account-setting">
                        <h1 class="block-title">Account Setting</h1>
                        <?php echo $__env->make('website.partials.my_account_setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php elseif($action == 'password'): ?>
                    <div class="change-password bg-white">
                        <h1 class="block-title">Change Password</h1>
                        <?php echo $__env->make('website.partials.my_account_password', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php elseif($action == 'orders'): ?>
                    <div class="employer-list-job bg-white">
                    <h1 class="block-title">Orders History</h1>
                    <?php echo $__env->make('website.partials.my_account_orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
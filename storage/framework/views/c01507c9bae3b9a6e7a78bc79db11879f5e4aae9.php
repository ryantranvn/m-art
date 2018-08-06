<?php $__env->startSection('search'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
    <div class="wrapper-content container">
        <div class="row">
            <section class="block-error-page">
                <div class="block-404 text-center">
                    <div class="img-thumbnail">
                        <img src="<?php echo e(asset(WEBSITE_URL.'/images/warning-error.png')); ?>" width="400" height="359">
                    </div>
                    <h1>The page you requested cannot be found!</h1>
                    <p>The page you requested cannot be found.<br />We apologize for this inconvenience.</p>

                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
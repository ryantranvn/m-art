<?php $__env->startSection('content'); ?>
    <div class="wrapper-content container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </nav>
            <section class="block-error-page">
                <div class="block-404 text-center">
                    <div class="img-thumbnail">
                        <img src="<?php echo e(asset(WEBSITE_URL.'/images/warning-error.png')); ?>" width="400" height="359">
                    </div>
                    <h1>The page you requested cannot be found!</h1>
                    <p>The page you requested cannot be found.<br />We apologize for this inconvenience.</p>

                    <div class="buttons-set text-center">
                        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary"><span>Continue <i class="glyphicon glyphicon-menu-right"></i></span></a>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <?php echo $__env->make('adminbsb.partials.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header bg-<?php echo e(THEME_COLOR); ?>">
                        <?php echo $__env->make('adminbsb.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo $__env->make('adminbsb.partials.reply', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                <?php echo $__env->yieldContent('action'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <?php echo $__env->make('adminbsb.partials.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if($action == 'index' && !isset($noSearch)): ?>
        
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header bg-<?php echo e(THEME_COLOR); ?>">
                        <h2 class="title" role="button" data-toggle="collapse" href="#collapseSearch" aria-expanded="false" aria-controls="collapseExample">
                            <?php echo e(trans('adminbsb.search_title')); ?>

                        </h2>
                        <a class="btnCollapse">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </div>
                    <div class="body collapse" id="collapseSearch">
                        <?php echo $__env->yieldContent('search'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if(!isset($noBox)): ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header bg-<?php echo e(THEME_COLOR); ?>">
                        <h2 class="title" role="button" data-toggle="collapse" href="#collapseMainBox" aria-expanded="false" aria-controls="collapseExample">
                            <?php if($action == 'index'): ?>
                                <?php echo e(trans('adminbsb.list_title')); ?>

                            <?php elseif($action == 'show'): ?>
                                <?php echo e(trans('adminbsb.show_title')); ?>

                            <?php elseif($action == 'create'): ?>
                                <?php echo e(trans('adminbsb.create_title')); ?>

                            <?php elseif($action == 'edit'): ?>
                                <?php echo e(trans('adminbsb.edit_title')); ?>

                            <?php endif; ?>
                        </h2>
                        <a class="btnCollapse">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </div>
                    <div class="body collapse in" id="collapseMainBox">
                        <?php if($action == 'index'): ?>
                            <?php echo $__env->make('adminbsb.partials.top_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                        <?php echo $__env->make('adminbsb.partials.reply', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->yieldContent('action'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('out_content'); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
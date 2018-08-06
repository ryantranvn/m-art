<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.category_name')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($category->name); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.category_desc')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($category->description); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.category_order')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($category->order); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.category_status')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e(getStatusText('category', $category->status)); ?></div>
            </div>

            <div class="row">
                <div class="col-sm-12 align-right">
                    <a href="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>" class="btn bg-grey"><?php echo e(trans('adminbsb.btn_back')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
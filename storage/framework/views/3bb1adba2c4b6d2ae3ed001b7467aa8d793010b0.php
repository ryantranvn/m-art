<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.restaurant_name')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($user->name); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.email')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($user->email); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.address')); ?> : </div>
                <div class="col-sm-8 align-left font-bold">
                    <?php echo e($user->address); ?>

                    <?php if($user->district_id !== null): ?> - <?php echo e($user->district_type); ?> <?php echo e($user->district_name); ?> <?php endif; ?>
                    <?php if($user->province_id !== null): ?>- <?php echo e($user->province_name); ?> <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.category_status')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e(getStatusText('category', $user->status)); ?></div>
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
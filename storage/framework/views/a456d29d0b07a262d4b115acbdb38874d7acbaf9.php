<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.supplier_name')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($supplier->name); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.picture')); ?> : </div>
                <div class="col-sm-3 align-left font-bold">
                    <img src="<?php echo e(url('/storage'.$supplier->thumbnail)); ?>" class="img-responsive thumbnail" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.supplier_desc')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($supplier->description); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.supplier_introduction')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e($supplier->introduction); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.location')); ?> : </div>
                <div class="col-sm-8 align-left font-bold">
                    <?php if(isset($supplier->province)): ?> <?php echo e($supplier->province->name); ?> <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 align-right"><?php echo e(trans('adminbsb.supplier_status')); ?> : </div>
                <div class="col-sm-8 align-left font-bold"><?php echo e(getStatusText('supplier', $supplier->status)); ?></div>
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
<div class="table-responsive-sm">
    <?php if($orders->count() == 0): ?>
        <?php echo e(trans('adminbsb.no_data')); ?>

    <?php else: ?>
    <table class="table table-bordered data-responsive table-list-responsive hasDetailRow tableOrder">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Day of purchase</th>
                <th class="text-center"><?php echo e(trans('adminbsb.order_code')); ?></th>
                <th class="text-center">Total</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="align-center details-control" data-id="<?php echo e($order->order_id); ?>" data-status="<?php echo e($order->status); ?>"></td>
                <?php ($arrCreatedDatetime = separateDatetime($order->created_at)); ?>
                <td class="text-center"><?php echo e($arrCreatedDatetime[0]); ?></td>
                <td class="text-center"><?php echo e($order->order_id); ?></td>
                <td class="text-right"><?php echo e($order->total); ?> ₫</td>
                <td class="text-center"><?php echo e(getStatusText('order', $order->status)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row">
        <?php echo e($orders->appends(request()->query())->links('adminbsb.partials.pagination')); ?>

    </div>
    <?php endif; ?>
</div>
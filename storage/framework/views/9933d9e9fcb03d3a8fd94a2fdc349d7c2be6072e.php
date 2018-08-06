<?php $__env->startSection('search'); ?>
    <form id="frmSearchOrder" class="searchForm" method="get" action="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>">
        <?php ($searchRequire = "searchOrder"); ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.customer_name')); ?></label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control <?php echo e($searchRequire); ?>" name="customer_name" value="<?php echo e($searchValues['customer_name']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.product_status')); ?></label>
                <?php echo $__env->make('adminbsb.partials.search_status', ['statusOf' => 'order', 'searchValue' => $searchValues['status']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>" class="btn btn-primary waves-effect m-r-10"><?php echo e(trans('adminbsb.btn_show_all')); ?></a>
                <a href="#" class="btn bg-deep-orange waves-effect m-r-10 btnResetSearch"><?php echo e(trans('adminbsb.btn_reset')); ?></a>
                <button class="btn btn-success waves-effect" type="submit"><?php echo e(trans('adminbsb.btn_search')); ?></button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <?php if($orders->count() == 0): ?>
                <?php echo e(trans('adminbsb.no_data')); ?>

            <?php else: ?>
                <table class="table table-striped table-bordered tableResize hasDetailRow tableOrder">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="customer_name" class="sorting"><?php echo e(trans('adminbsb.customer_name')); ?></th>
                        <th data-sort="subtotal" class="sorting"><?php echo e(trans('adminbsb.order_subtotal')); ?></th>
                        <th data-sort="tax" class="sorting"><?php echo e(trans('adminbsb.tax')); ?></th>
                        <th data-sort="delivery" class="sorting"><?php echo e(trans('adminbsb.delivery')); ?></th>
                        <th data-sort="total" class="sorting"><?php echo e(trans('adminbsb.total')); ?></th>
                        <th data-sort="status" class="sorting" style="width: 100px"><?php echo e(trans('adminbsb.order_status')); ?></th>
                        <th data-sort="created_at" class="sorting"><?php echo e(trans('adminbsb.created_at')); ?></th>
                        <th data-sort="updated_at" class="sorting"><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th data-sort="updated_by" class="sorting"><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(trans('adminbsb.customer_name')); ?></th>
                        <th><?php echo e(trans('adminbsb.order_subtotal')); ?></th>
                        <th><?php echo e(trans('adminbsb.tax')); ?></th>
                        <th><?php echo e(trans('adminbsb.delivery')); ?></th>
                        <th><?php echo e(trans('adminbsb.total')); ?></th>
                        <th><?php echo e(trans('adminbsb.order_status')); ?></th>
                        <th><?php echo e(trans('adminbsb.created_at')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-center details-control" data-id="<?php echo e($order->order_id); ?>" data-note="<?php echo e($order->note); ?>"></td>
                            <td class="align-center"><?php echo e($order->customer_name); ?></td>
                            <td class="align-center"><span class="currencyPositive"><?php echo e($order->subtotal); ?></span></td>
                            <td class="align-center"><span class="currencyPositive"><?php echo e($order->tax); ?></span></td>
                            <td class="align-center"><span class="currencyPositive"><?php echo e($order->delivery); ?></span></td>
                            <td class="align-center"><span class="currencyPositive"><?php echo e($order->total); ?></span></td>
                            <td class="align-center">
                                <?php echo $__env->make('adminbsb.partials.button_status', ['statusOf' => 'order', 'status' => $order->status, 'id' => $order->order_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </td>
                            <?php ($arrCreatedDatetime = separateDatetime($order->created_at)); ?>
                            <td class="align-center"><?php echo e($arrCreatedDatetime[0]); ?><br/><?php echo e($arrCreatedDatetime[1]); ?></td>
                            <?php ($arrUpdatedDatetime = separateDatetime($order->updated_at)); ?>
                            <td class="align-center"><?php echo e($arrUpdatedDatetime[0]); ?><br/><?php echo e($arrUpdatedDatetime[1]); ?></td>
                            <td class="align-center">
                                <?php ($userId = $order->updated_by == 0 ? $order->created_by : $order->updated_by); ?>
                                <?php echo e(getUser($userId)->name); ?>

                            </td>
                            
                                
                                
                                
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <?php echo e($orders->appends(request()->query())->links('adminbsb.partials.pagination')); ?>

                    <?php echo $__env->make('adminbsb.partials.frm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('adminbsb.partials.modal', ['module' => 'order'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
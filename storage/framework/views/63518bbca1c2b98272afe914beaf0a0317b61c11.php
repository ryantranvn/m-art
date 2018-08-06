<?php $__env->startSection('search'); ?>
    <form id="frmSearchSupplier" class="searchForm" method="get" action="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>">
        <?php ($searchRequire = "searchSupplier"); ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.supplier_name')); ?></label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control <?php echo e($searchRequire); ?>" name="name" value="<?php echo e($searchValues['name']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.user_status')); ?></label>
                <?php echo $__env->make('adminbsb.partials.search_status', ['statusOf' => 'user', 'searchValue' => $searchValues['status']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.location')); ?></label>
                <?php echo $__env->make('adminbsb.partials.select_province', ['provinceId' => $searchValues['province_id']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <?php if($suppliers->count() == 0): ?>
                <?php echo e(trans('adminbsb.no_data')); ?>

            <?php else: ?>
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th><?php echo e(trans('adminbsb.picture')); ?></th>
                        <th data-sort="name" class="sorting"><?php echo e(trans('adminbsb.user_name')); ?></th>
                        <th data-sort="location_id" class="sorting"><?php echo e(trans('adminbsb.location')); ?></th>
                        <th data-sort="status" class="sorting" style="width: 100px"><?php echo e(trans('adminbsb.user_status')); ?></th>
                        <th data-sort="updated_at" class="sorting"><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th data-sort="updated_by" class="sorting"><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(trans('adminbsb.picture')); ?></th>
                        <th><?php echo e(trans('adminbsb.user_name')); ?></th>
                        <th><?php echo e(trans('adminbsb.location')); ?></th>
                        <th><?php echo e(trans('adminbsb.user_status')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-center"><?php echo e($loop->iteration); ?></td>
                            <td class="align-center">
                                <?php if($supplier->thumbnail != null && $supplier->thumbnail != ""): ?>
                                <img src="<?php echo e(url('/storage'.$supplier->thumbnail)); ?>" class="img-responsive thumbnailInTable" />
                                <?php else: ?>
                                <img src="<?php echo e(asset(BULK_SYSTEM_THEME.'/images/default.jpg')); ?>" class="img-responsive thumbnailInTable" />
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($supplier->name); ?></td>
                            <td class="align-center">
                                <?php if(isset($supplier->province_id)): ?> <?php echo e($supplier->province_name); ?> <?php endif; ?>
                            </td>
                            <td class="align-center">
                                <?php echo $__env->make('adminbsb.partials.button_status', ['statusOf' => 'supplier', 'status' => $supplier->status, 'id' => $supplier->supplier_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </td>
                            <?php ($arrDatetime = separateDatetime($supplier->updated_at)); ?>
                            <td class="align-center"><?php echo e($arrDatetime[0]); ?><br/><?php echo e($arrDatetime[1]); ?></td>
                            <td class="align-center">
                                <?php ($supplierId = $supplier->updated_by == 0 ? $supplier->created_by : $supplier->updated_by); ?>
                                <?php echo e(getUser($supplierId)->name); ?>

                            </td>
                            <td class="align-center">
                                <a class="btn btn-xs btn-info waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$supplier->supplier_id)); ?>"><?php echo e(trans('adminbsb.btn_view')); ?></a>
                                <a class="btn btn-xs btn-warning waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$supplier->supplier_id.'/edit')); ?>"><?php echo e(trans('adminbsb.btn_edit')); ?></a>
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$supplier->supplier_id)); ?>"><?php echo e(trans('adminbsb.btn_delete')); ?></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <?php echo e($suppliers->appends(request()->query())->links('adminbsb.partials.pagination')); ?>


                    <?php echo $__env->make('adminbsb.partials.frm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('adminbsb.partials.modal', ['module' => 'supplier'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
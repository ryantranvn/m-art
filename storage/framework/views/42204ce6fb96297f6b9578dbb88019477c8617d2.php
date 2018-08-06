<?php $__env->startSection('search'); ?>
    <form id="frmSearchProduct" class="searchForm" method="get" action="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>">
        <?php ($searchRequire = "searchProduct"); ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.product_name')); ?></label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control <?php echo e($searchRequire); ?>" name="name" value="<?php echo e($searchValues['name']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.product_status')); ?></label>
                <?php echo $__env->make('adminbsb.partials.search_status', ['statusOf' => 'product', 'searchValue' => $searchValues['status']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.supplier')); ?></label>
                <?php echo $__env->make('adminbsb.partials.select_supplier', ['supplierId' => $searchValues['supplier_id'], 'forSearch' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.location')); ?></label>
                <?php echo $__env->make('adminbsb.partials.select_province', ['provinceId' => $searchValues['province_id'], 'forSearch' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.category')); ?></label><span class="requireSign">(*)</span>
                <?php echo $__env->make('adminbsb.partials.select_category', ['categoryId' => $searchValues['category_id'], 'forSearch' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <?php if($products->count() == 0): ?>
                <?php echo e(trans('adminbsb.no_data')); ?>

            <?php else: ?>
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="category" class="sorting"><?php echo e(trans('adminbsb.category')); ?></th>
                        <th><?php echo e(trans('adminbsb.picture')); ?></th>
                        <th data-sort="name" class="sorting"><?php echo e(trans('adminbsb.product_name')); ?></th>
                        <th data-sort="price" class="sorting"><?php echo e(trans('adminbsb.product_price')); ?></th>
                        <th data-sort="supplier" class="sorting"><?php echo e(trans('adminbsb.supplier')); ?></th>
                        <th data-sort="location" class="sorting"><?php echo e(trans('adminbsb.location')); ?></th>
                        <th data-sort="status" class="sorting" style="width: 100px"><?php echo e(trans('adminbsb.product_status')); ?></th>
                        <th data-sort="updated_at" class="sorting"><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th data-sort="updated_by" class="sorting"><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(trans('adminbsb.category')); ?></th>
                        <th><?php echo e(trans('adminbsb.picture')); ?></th>
                        <th><?php echo e(trans('adminbsb.product_name')); ?></th>
                        <th><?php echo e(trans('adminbsb.product_price')); ?></th>
                        <th><?php echo e(trans('adminbsb.supplier')); ?></th>
                        <th><?php echo e(trans('adminbsb.location')); ?></th>
                        <th><?php echo e(trans('adminbsb.product_status')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-center"><?php echo e($loop->iteration); ?></td>
                            <td class="align-center"><?php echo e($product->category_name); ?></td>
                            <td class="align-center">
                                <?php if($product->thumbnail != null && $product->thumbnail != ""): ?>
                                    <img src="<?php echo e(url('/storage'.$product->thumbnail)); ?>" class="img-responsive thumbnailInTable" />
                                <?php else: ?>
                                    <img src="<?php echo e(asset(BULK_SYSTEM_THEME.'/images/default.jpg')); ?>" class="img-responsive thumbnailInTable" />
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($product->name); ?></td>
                            <td class="align-center currencyPositive"><?php echo e($product->price); ?></td>
                            <td class="align-center"><?php echo e($product->supplier_name); ?></td>
                            <td class="align-center"><?php echo e($product->province_name); ?></td>
                            <td class="align-center">
                                <?php echo $__env->make('adminbsb.partials.button_status', ['statusOf' => 'product', 'status' => $product->status, 'id' => $product->product_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </td>
                            <?php ($arrDatetime = separateDatetime($product->updated_at)); ?>
                            <td class="align-center"><?php echo e($arrDatetime[0]); ?><br/><?php echo e($arrDatetime[1]); ?></td>
                            <td class="align-center">
                                <?php ($userId = $product->updated_by == 0 ? $product->created_by : $product->updated_by); ?>
                                <?php echo e(getUser($userId)->name); ?>

                            </td>
                            <td class="align-center">
                                <a class="btn btn-xs btn-info waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$product->product_id)); ?>"><?php echo e(trans('adminbsb.btn_view')); ?></a>
                                <a class="btn btn-xs btn-warning waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$product->product_id.'/edit')); ?>"><?php echo e(trans('adminbsb.btn_edit')); ?></a>
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$product->product_id)); ?>"><?php echo e(trans('adminbsb.btn_delete')); ?></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <?php echo e($products->appends(request()->query())->links('adminbsb.partials.pagination')); ?>


                    <?php echo $__env->make('adminbsb.partials.frm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('adminbsb.partials.modal', ['module' => 'product'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
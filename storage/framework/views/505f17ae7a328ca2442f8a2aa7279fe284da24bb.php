<?php $__env->startSection('search'); ?>
    <form id="frmSearchCategory" class="searchForm" method="get" action="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>">
        <?php ($searchRequire = "searchCategory"); ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.category_name')); ?></label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control <?php echo e($searchRequire); ?>" name="category_name" value="<?php echo e($searchValues['category_name']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                    <label class="form-label"><?php echo e(trans('adminbsb.category_status')); ?></label>
                    <?php echo $__env->make('adminbsb.partials.search_status', ['statusOf' => 'category', 'searchValue' => $searchValues['status']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        <?php if($categories->count() == 0): ?>
            <?php echo e(trans('adminbsb.no_data')); ?>

        <?php else: ?>
        <table class="table table-striped table-bordered tableResize">
            <thead>
            <tr>
                <th style="width: 50px">#</th>
                <th><?php echo e(trans('adminbsb.category_picture')); ?></th>
                <th data-sort="name" class="sorting"><?php echo e(trans('adminbsb.category_name')); ?></th>
                <th data-sort="description" class="sorting"><?php echo e(trans('adminbsb.category_desc')); ?></th>
                <th data-sort="order" class="sorting" style="width: 80px"><?php echo e(trans('adminbsb.category_order')); ?></th>
                <th data-sort="status" class="sorting" style="width: 100px"><?php echo e(trans('adminbsb.category_status')); ?></th>
                <th><?php echo e(trans('adminbsb.action')); ?></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th><?php echo e(trans('adminbsb.category_picture')); ?></th>
                <th><?php echo e(trans('adminbsb.category_name')); ?></th>
                <th><?php echo e(trans('adminbsb.category_desc')); ?></th>
                <th><?php echo e(trans('adminbsb.category_order')); ?></th>
                <th><?php echo e(trans('adminbsb.category_status')); ?></th>
                <th><?php echo e(trans('adminbsb.action')); ?></th>
            </tr>
            </tfoot>
            <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="align-center"><?php echo e($loop->iteration); ?></td>
                <td class="align-center">
                    <?php if($category->picture != null && $category->picture != ""): ?>
                        <img src="<?php echo e(url('/storage'.$category->picture)); ?>" class="img-responsive thumbnailInTable" />
                    <?php else: ?>
                        <img src="<?php echo e(asset(BULK_SYSTEM_THEME.'/images/default.jpg')); ?>" class="img-responsive thumbnailInTable" />
                    <?php endif; ?>
                </td>
                <td><?php echo e($category->name); ?></td>
                <td><?php echo e(str_limit($category->description, STRING_LIMIT_IN_TABLE)); ?></td>
                <td class="align-center editInline" data-table="categories" data-field="order" data-field-id="category_id" data-id="<?php echo e($category->category_id); ?>"><?php echo e($category->order); ?></td>
                <td class="align-center">
                    <?php echo $__env->make('adminbsb.partials.button_status', ['statusOf' => 'category', 'status' => $category->status, 'id' => $category->category_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </td>
                <td class="align-center">
                    <a class="btn btn-xs btn-info waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$category->category_id)); ?>"><?php echo e(trans('adminbsb.btn_view')); ?></a>
                    <a class="btn btn-xs btn-warning waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$category->category_id.'/edit')); ?>"><?php echo e(trans('adminbsb.btn_edit')); ?></a>
                    <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$category->category_id)); ?>"><?php echo e(trans('adminbsb.btn_delete')); ?></button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="row">
            <?php echo e($categories->appends(request()->query())->links('adminbsb.partials.pagination')); ?>


            <?php echo $__env->make('adminbsb.partials.frm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('adminbsb.partials.modal', ['module' => 'category'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('search'); ?>
    <form id="frmSearchUser" class="searchForm" method="get" action="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>">
        <?php ($searchRequire = "searchUser"); ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.restaurant_name')); ?></label>
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
                <label class="form-label"><?php echo e(trans('adminbsb.email')); ?></label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control <?php echo e($searchRequire); ?>" name="email" value="<?php echo e($searchValues['email']); ?>">
                        </div>
                    </div>
                </div>
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
            <?php if($users->count() == 0): ?>
                <?php echo e(trans('adminbsb.no_data')); ?>

            <?php else: ?>
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="name" class="sorting"><?php echo e(trans('adminbsb.user_name')); ?></th>
                        <th data-sort="email" class="sorting"><?php echo e(trans('adminbsb.email')); ?></th>
                        <th data-sort="address" class="sorting"><?php echo e(trans('adminbsb.address')); ?></th>
                        <th data-sort="status" class="sorting" style="width: 100px"><?php echo e(trans('adminbsb.user_status')); ?></th>
                        <th data-sort="updated_at" class="sorting"><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th data-sort="updated_by" class="sorting"><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(trans('adminbsb.user_name')); ?></th>
                        <th><?php echo e(trans('adminbsb.email')); ?></th>
                        <th><?php echo e(trans('adminbsb.address')); ?></th>
                        <th><?php echo e(trans('adminbsb.user_status')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php echo e($user->address); ?>

                                <?php if(isset($user->district)): ?> - <?php echo e($user->district->type); ?> <?php echo e($user->district->name); ?> <?php endif; ?>
                                <?php if(isset($user->province)): ?> - <?php echo e($user->province->name); ?> <?php endif; ?>
                            </td>
                            <td class="align-center">
                                <?php echo $__env->make('adminbsb.partials.button_status', ['statusOf' => 'user', 'status' => $user->status, 'id' => $user->user_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </td>
                            <?php ($arrDatetime = separateDatetime($user->updated_at)); ?>
                            <td class="align-center"><?php echo e($arrDatetime[0]); ?><br/><?php echo e($arrDatetime[1]); ?></td>
                            <td class="align-center">
                                <?php ($userId = $user->updated_by == 0 ? $user->created_by : $user->updated_by); ?>
                                <?php echo e(getUser($userId)->name); ?>

                            </td>
                            <td class="align-center">
                                <a class="btn btn-xs btn-info waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$user->user_id)); ?>"><?php echo e(trans('adminbsb.btn_view')); ?></a>
                                <a class="btn btn-xs btn-warning waves-effect" href="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$user->user_id.'/edit')); ?>"><?php echo e(trans('adminbsb.btn_edit')); ?></a>
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$user->user_id)); ?>"><?php echo e(trans('adminbsb.btn_delete')); ?></button>
                                <a class="btn btn-xs bg-indigo waves-effect btnChangePassword" data-id="<?php echo e($user->user_id); ?>" href="#"><?php echo e(trans('adminbsb.btn_change_password')); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <?php echo e($users->appends(request()->query())->links('adminbsb.partials.pagination')); ?>


                    <?php echo $__env->make('adminbsb.partials.frm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('adminbsb.partials.modal', ['module' => 'user'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
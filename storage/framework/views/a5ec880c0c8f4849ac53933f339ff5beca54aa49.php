<?php $__env->startSection('search'); ?>
    <form id="frmSearchContact" class="searchForm" method="get" action="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>">
        <?php ($searchRequire = "searchContact"); ?>

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label"><?php echo e(trans('adminbsb.contact_name')); ?></label>
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
                <?php echo $__env->make('adminbsb.partials.search_status', ['statusOf' => 'contact', 'searchValue' => $searchValues['status']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <?php if($contacts->count() == 0): ?>
                <?php echo e(trans('adminbsb.no_data')); ?>

            <?php else: ?>
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="name" class="sorting"><?php echo e(trans('adminbsb.contact_name')); ?></th>
                        <th data-sort="email" class="sorting"><?php echo e(trans('adminbsb.email')); ?></th>
                        <th data-sort="phone" class="sorting"><?php echo e(trans('adminbsb.phone')); ?></th>
                        <th data-sort="status" class="sorting" style="width: 100px"><?php echo e(trans('adminbsb.contact_status')); ?></th>
                        <th data-sort="updated_at" class="sorting"><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th data-sort="updated_by" class="sorting"><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(trans('adminbsb.contact_name')); ?></th>
                        <th><?php echo e(trans('adminbsb.email')); ?></th>
                        <th><?php echo e(trans('adminbsb.phone')); ?></th>
                        <th><?php echo e(trans('adminbsb.contact_status')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_at')); ?></th>
                        <th><?php echo e(trans('adminbsb.last_updated_by')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($contact->name); ?></td>
                            <td class="align-center"><?php echo e($contact->email); ?></td>
                            <td class="align-center"><?php echo e($contact->phone); ?></td>
                            <td class="align-center">
                                <?php echo $__env->make('adminbsb.partials.button_status', ['statusOf' => 'contact', 'status' => $contact->status, 'id' => $contact->contact_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </td>
                            <?php ($arrDatetime = separateDatetime($contact->updated_at)); ?>
                            <td class="align-center"><?php echo e($arrDatetime[0]); ?><br/><?php echo e($arrDatetime[1]); ?></td>
                            <td class="align-center">
                                <?php if($contact->updated_by != null): ?>
                                <?php echo e(getUser($contact->updated_by)->name); ?>

                                <?php endif; ?>
                            </td>
                            <td class="align-center">
                                
                                
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="<?php echo e(url(BULK_SYSTEM.'/'.$controller.'/'.$contact->contact_id)); ?>"><?php echo e(trans('adminbsb.btn_delete')); ?></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                    <?php echo e($contacts->appends(request()->query())->links('adminbsb.partials.pagination')); ?>


                    <?php echo $__env->make('adminbsb.partials.frm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('adminbsb.partials.modal', ['module' => 'contact'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
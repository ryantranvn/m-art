<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="name" class="sorting"><?php echo e(trans('adminbsb.setting')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(trans('adminbsb.setting')); ?></th>
                        <th><?php echo e(trans('adminbsb.action')); ?></th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td class="align-center">1</td>
                            <td></td>
                            <td class="align-center">

                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
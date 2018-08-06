<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <?php echo $__env->make('adminbsb.partials.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="card">
                    <div class="header">
                        <?php echo $__env->make('adminbsb.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="body">
                        <?php echo $__env->make('adminbsb.category.top_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <table class="table table-striped table-bordered tableResize">
                            <thead>
                            <tr>
                                <th data-sort="index" class="sorting">#</th>
                                <th data-sort="name" class="sorting">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($province->name); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <?php echo e($provinces->appends(request()->query())->links('adminbsb.partials.pagination')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
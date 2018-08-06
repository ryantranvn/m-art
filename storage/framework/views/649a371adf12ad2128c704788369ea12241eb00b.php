<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset(BULK_SYSTEM_THEME.'/plugins/tinymce/tinymce.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <form id="frmSupplier" action="<?php echo e(url('/'.BULK_SYSTEM.'/'.$controller)); ?>" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>


                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label"><?php echo e(trans('adminbsb.supplier_name')); ?> <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control limit limit255" value="<?php echo e(old('name')); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <label class="form-label"><?php echo e(trans('adminbsb.supplier_status')); ?></label>
                        <?php echo $__env->make('adminbsb.partials.switch_status', ['module' => 'supplier', 'switchStatus' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            
                            <div class="row">
                                <label class="form-label"><?php echo e(trans('adminbsb.location')); ?></label><span class="requireSign">(*)</span>
                                <?php echo $__env->make('adminbsb.partials.select_province', ['provinceId' => old('province_id')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            
                            <div class="row">
                                <label class="form-label"><?php echo e(trans('adminbsb.supplier_desc')); ?></label>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="description" class="form-control limit limit1024 tinyEditor"><?php echo e(old('category_desc')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        
                        <div class="col-sm-5">
                            <label class="form-label"><?php echo e(trans('adminbsb.picture')); ?></label>
                            <?php echo $__env->make('adminbsb.partials.select_picture', ['picture' => old('picture')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label"><?php echo e(trans('adminbsb.supplier_introduction')); ?></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="introduction" class="form-control tinyEditor"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 align-right">
                        <div class="col-sm-12">
                            <a href="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>" class="btn bg-grey"><?php echo e(trans('adminbsb.btn_cancel')); ?></a>
                            <button type="submit" class="btn btn-success m-l-10 btnSubmit"><?php echo e(trans('adminbsb.btn_submit')); ?></button>
                        </div>
                    </div>
                </div>

            </form>
            
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
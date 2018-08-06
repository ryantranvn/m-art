<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <form id="frmUser" action="<?php echo e(url('/'.BULK_SYSTEM.'/'.$controller)); ?>" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>


                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label"><?php echo e(trans('adminbsb.restaurant_name')); ?> <span class="requireSign">(*)</span></label>
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
                        <label class="form-label"><?php echo e(trans('adminbsb.user_status')); ?></label>
                        <?php echo $__env->make('adminbsb.partials.switch_status', ['module' => 'user', 'switchStatus' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label"><?php echo e(trans('adminbsb.email')); ?> <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.password')); ?> <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.password_confirmation')); ?> <span class="requireSign">(*)</span></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password_confirmation" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" style="opacity: 0;">s</label>
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon bg-blue btnGeneratePassword"><?php echo e(trans('adminbsb.generate_password')); ?></span>
                                <div class="form-line">
                                    <input type="text" name="password_auto" class="form-control align-center text-uppercase" readonly autocomplete="off" />
                                </div>
                                <span class="input-group-addon hide btnClearAutoPassword"><i class="material-icons">close</i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.province')); ?></label>
                        <?php echo $__env->make('adminbsb.partials.select_province', ['groupLocation' => 'createUser', 'provinceId' => old('province_id')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.district')); ?></label>
                        <?php echo $__env->make('adminbsb.partials.select_district', ['groupLocation' => 'createUser', 'provinceId' => old('province_id'), 'districtId' => old('dictrict_id')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.address')); ?></label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="address" class="form-control limit limit255" value="<?php echo e(old('address')); ?>" />
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
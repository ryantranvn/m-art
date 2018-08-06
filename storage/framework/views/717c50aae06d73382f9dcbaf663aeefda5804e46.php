<form id="frmUser" action="<?php echo e(url('/update-user-setting')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="userId" value="<?php echo e($user->user_id); ?>" />

    <div class="form-group">
        <label class="form-label"><?php echo e(trans('adminbsb.restaurant_name')); ?> <span class="requireSign">(*)</span></label>
        <input type="text" name="name" class="form-control limit limit255" value="<?php echo e($user->name); ?>" />
    </div>
    <div class="form-group">
        <label class="form-label"><?php echo e(trans('adminbsb.email')); ?> <span class="requireSign">(*)</span></label>
        <input type="text" name="email" class="form-control" value="<?php echo e($user->email); ?>" autocomplete="off" />
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label"><?php echo e(trans('adminbsb.province')); ?></label>
                    <?php echo $__env->make('website.partials.select_province', ['groupLocation' => 'updateUserSetting', 'provinceId' => $user->province_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label"><?php echo e(trans('adminbsb.district')); ?></label>
                    <?php echo $__env->make('website.partials.select_district', ['groupLocation' => 'updateUserSetting', 'provinceId' => $user->province_id, 'districtId' => $user->district_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label"><?php echo e(trans('adminbsb.address')); ?></label>
        <input type="text" name="address" class="form-control limit limit255" value="<?php echo e($user->address); ?>" />
    </div>
    <div class="buttons-set">
        <button type="submit" class="btn btn-primary"><?php echo e(trans('adminbsb.btn_save')); ?></button>
    </div>
</form>
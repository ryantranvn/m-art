<form id="frmChangePassword" action="<?php echo e(url('/update-password')); ?>" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
    <?php echo e(csrf_field()); ?>

    <input type="text" class="hidden" name="userId" value="<?php echo e($user->user_id); ?>" />

    <p class="align-center"><?php echo e(trans('adminbsb.ask_change_password')); ?></p>
    <div class="row">
        <div class="col-sm-6">
            <label class="form-label"><?php echo e(trans('adminbsb.old_password')); ?> <span class="requireSign">(*)</span></label>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" name="old_password" id="old_password" class="form-control" value="" autocomplete="off" />
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <label class="form-label"><?php echo e(trans('adminbsb.new_password')); ?> <span class="requireSign">(*)</span></label>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label class="form-label"><?php echo e(trans('adminbsb.new_password_confirmation')); ?> <span class="requireSign">(*)</span></label>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-line">
                        <input type="password" name="password_confirmation" class="form-control" value="" autocomplete="off" />
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <div class="input-group input-group-sm">
                <span class="input-group-addon bg-blue btnGeneratePassword"><?php echo e(trans('adminbsb.generate_password')); ?></span>
                <div class="form-line">
                    <input type="text" name="password_auto" class="form-control align-center text-uppercase" readonly autocomplete="off" />
                </div>
                <span class="input-group-addon hide btnClearAutoPassword"><i class="material-icons">clear</i></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12" style="text-align: right; margin-top: 10px;">
            <button type="submit" class="btn btn-primary"><?php echo e(trans('adminbsb.btn_save')); ?></button>
        </div>
    </div>
</form>
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"><?php echo e(BULK_SYSTEM_NAME); ?></h4>
            </div>
            <div class="modal-body align-center">
                
                <form id="frmStatus" action="<?php echo e(url(API_URL.'/update-status-'.$module)); ?>" method="POST"  class="form-horizontal frmModal hide" role="form" novalidate="novalidate">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="hiddenInput" name="id" />
                    <input type="text" class="hiddenInput" name="status" />
                    <div class="row">
                        <p class="align-center"><?php echo e(trans('adminbsb.modal_ask_change_status')); ?></p>
                        <?php ($arrStatus = arrStatus($module)); ?>
                        <?php $__currentLoopData = $arrStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="#" class="btn <?php echo e($status['color']); ?> m-r-10" data-status="<?php echo e($status['value']); ?>"><?php echo e($status['text']); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </form>

                <?php if($module == 'user'): ?>
                
                <form id="frmChangePassword" action="<?php echo e(url(API_URL.'/update-password')); ?>" method="POST"  class="form-horizontal frmModal hide" role="form" novalidate="novalidate">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="hiddenInput" name="id" />

                    <p class="align-center"><?php echo e(trans('adminbsb.modal_ask_change_password')); ?></p>
                    <div class="row">
                        <div class="col-sm-12 align-left">
                            <label class="form-label"><?php echo e(trans('adminbsb.password')); ?> <span class="requireSign">(*)</span></label>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 align-left">
                            <label class="form-label"><?php echo e(trans('adminbsb.password_confirmation')); ?> <span class="requireSign">(*)</span></label>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password_confirmation" class="form-control" value="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 align-left">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon bg-blue btnGeneratePassword"><?php echo e(trans('adminbsb.generate_password')); ?></span>
                                <div class="form-line">
                                    <input type="text" name="password_auto" class="form-control align-center text-uppercase" readonly autocomplete="off" />
                                </div>
                                <span class="input-group-addon hide btnClearAutoPassword"><i class="material-icons">close</i></span>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo e(trans('adminbsb.btn_close')); ?></button>
                <?php if($module == 'user'): ?>
                    <button type="button" class="btn btn-success waves-effect btnModalSubmit"><?php echo e(trans('adminbsb.btn_submit')); ?></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
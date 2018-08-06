<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <form id="frmProduct" action="<?php echo e(url('/'.BULK_SYSTEM.'/'.$controller)); ?>" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>


                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label"><?php echo e(trans('adminbsb.supplier')); ?></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="client" class="form-control selectpicker show-tick" data-title="<?php echo e(trans('adminbsb.choose_supplier')); ?>" data-live-search="true" data-size="5">
                                    <option value="1">Supplier 1</option>
                                    <option value="2">Supplier 2</option>
                                    <option value="3">Supplier 3</option>
                                    <option value="4">Supplier 4</option>
                                </select>
                                <input type="text" name="supplier_id" class="hiddenInput" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label class="form-label"><?php echo e(trans('adminbsb.product_name')); ?></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="product_name" class="form-control limit limit255" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.product_price')); ?></label>
                        <div class="col-sm-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">VND</span>
                                <div class="form-line">
                                    <input type="text" name="product_price" class="form-control align-right font-bold currencyPositive" value="0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo $__env->make('adminbsb.partials.select_category', ['categoryId' => ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
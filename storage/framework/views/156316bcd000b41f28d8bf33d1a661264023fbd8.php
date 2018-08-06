<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset(BULK_SYSTEM_THEME.'/plugins/tinymce/tinymce.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action'); ?>
    <div class="row">
        <div class="col-sm-12">
            <form id="frmProduct" action="<?php echo e(url('/'.BULK_SYSTEM.'/'.$controller.'/'.$product->product_id)); ?>" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PATCH')); ?>


                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.supplier')); ?></label><span class="requireSign">(*)</span>
                        <?php echo $__env->make('adminbsb.partials.select_supplier', ['supplierId' => $product->supplier_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.location')); ?></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="province_name" class="form-control" value="<?php echo e($product->province_name); ?>" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.category')); ?></label><span class="requireSign">(*)</span>
                        <?php echo $__env->make('adminbsb.partials.select_category', ['categoryId' => $product->category_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label class="form-label"><?php echo e(trans('adminbsb.product_name')); ?></label><span class="requireSign">(*)</span>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control limit limit255" value="<?php echo e($product->name); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label"><?php echo e(trans('adminbsb.product_price')); ?></label><span class="requireSign">(*)</span>
                        <div class="col-sm-12">
                            <div class="form-group input-group input-group-sm">
                                <div class="form-line">
                                    <input type="text" name="price" class="form-control align-right font-bold currencyPositive" value="<?php echo e($product->price); ?>" />
                                </div>
                                <span class="input-group-addon">VND</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label class="form-label"><?php echo e(trans('adminbsb.product_desc')); ?></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="small_description" class="form-control limit limit1024" rows="6"><?php echo e($product->small_description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <label class="form-label"><?php echo e(trans('adminbsb.product_status')); ?></label>
                                <?php echo $__env->make('adminbsb.partials.switch_status', ['module' => 'product', 'switchStatus' => $product->status], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-12">
                                <label class="form-label"><?php echo e(trans('adminbsb.product_recommend')); ?></label>
                                <?php echo $__env->make('adminbsb.partials.switch_recommend', ['module' => 'recommend_product', 'switchStatus' => $product->recommend], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label"><?php echo e(trans('adminbsb.picture')); ?></label>
                        <?php echo $__env->make('adminbsb.partials.select_picture_multi', ['pictures' => old('pictures')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label"><?php echo e(trans('adminbsb.product_desc')); ?></label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="description" class="form-control tinyEditor" rows="6"><?php echo e($product->description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 align-right">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <a href="<?php echo e(url(BULK_SYSTEM.'/'.$controller)); ?>" class="btn bg-grey"><?php echo e(trans('adminbsb.btn_cancel')); ?></a>
                                <button type="submit" class="btn btn-success m-l-10 btnSubmit"><?php echo e(trans('adminbsb.btn_submit')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminbsb.partials.sub_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-12">
    <div class="form-group">
        <select name="supplier_id" class="form-control selectpicker show-tick <?php if(!empty($forSearch)): ?> forSearch <?php endif; ?>" data-title="<?php echo e(trans('adminbsb.choose_supplier')); ?>" data-live-search="true" data-size="5">
            <?php $__currentLoopData = getSuppliers(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($supplier->supplier_id); ?>" data-location-id="<?php echo e($supplier->province_id); ?>" <?php if(!empty($supplierId) && $supplierId==$supplier->supplier_id): ?> selected <?php endif; ?>><?php echo e($supplier->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
        <select name="province_id" address-group="<?php if(!empty($groupLocation)): ?> $groupLocation <?php endif; ?>" class="form-control selectpicker province_id show-tick" data-live-search="true" data-size="5" data-title="<?php echo e(trans('adminbsb.choose_province')); ?>">
            <?php $__currentLoopData = getProvince(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($province->province_id); ?>" <?php if(!empty($provinceId) && $provinceId == $province->province_id): ?> selected <?php endif; ?>>
                    <?php echo e($province->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
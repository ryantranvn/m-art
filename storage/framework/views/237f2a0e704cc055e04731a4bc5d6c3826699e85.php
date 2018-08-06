<div class="col-sm-12">
    <div class="form-group">
        <select name="district_id" address-group="<?php if(!empty($groupLocation)): ?> $groupLocation <?php endif; ?>" class="form-control selectpicker district_id show-tick" data-live-search="true" data-size="5" data-title="<?php echo e(trans('adminbsb.choose_district')); ?>">
            <?php if(isset($provinceId)): ?>
                <?php $__currentLoopData = getDistrict($provinceId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($district->district_id); ?>" <?php if(!empty($districtId) && $districtId == $district->district_id): ?> selected <?php endif; ?>>
                        <?php echo e($district->type); ?>&nbsp;<?php echo e($district->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
</div>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4">
            <?php echo $__env->make('adminbsb.partials.select_province', ['provinceId' => $searchValues['province_id'], 'forSearch' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="form-group">
                <select name="province" address-group="location" class="form-control selectpicker province show-tick" data-live-search="true" data-size="5" data-title="<?php echo e(trans('adminbsb.choose_province')); ?>">
                    <?php $__currentLoopData = getProvince(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($province->province_id); ?>" <?php if($provinceId == $province->province_id): ?> selected <?php endif; ?>>
                            <?php echo e($province->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <select name="district" address-group="location" class="form-control selectpicker district show-tick" data-live-search="true" data-size="5" data-title="<?php echo e(trans('adminbsb.choose_district')); ?>">
                    <?php if(isset($provinceId)): ?>
                        <?php $__currentLoopData = getDistrict($provinceId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($district->district_id); ?>" <?php if($districtId == $district->district_id): ?> selected <?php endif; ?>>
                                <?php echo e($district->type); ?>&nbsp;<?php echo e($district->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="address" class="form-control limit limit255" placeholder="<?php echo e(trans('adminbsb.address')); ?>" <?php if(isset($provinceId)): ?> value="<?php echo e($address); ?>" <?php endif; ?>/>
                </div>
            </div>
        </div>
    </div>
</div>
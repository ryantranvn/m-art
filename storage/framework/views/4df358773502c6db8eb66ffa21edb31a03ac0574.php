<div class="col-sm-12">
    <div class="form-group">
        <select name="category_id" class="form-control selectpicker show-tick" data-title="<?php echo e(trans('adminbsb.choose_category')); ?>" data-live-search="true" data-size="5">
            <?php $__currentLoopData = getCategories(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->category_id); ?>" <?php if(!empty($categoryId) && $categoryId==$category->category_id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
    </div>
</div>
<?php if(count($categories)>0): ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="img-thumbnail">
                <a href="<?php echo e(url($category[0]->slug)); ?>" class="img-thumb" style="background-image: url('<?php echo e(asset('/storage'.$category[0]->picture)); ?>');">
                    <h3><?php echo e($category[0]->name); ?></h3>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="img-thumbnail">
                        <a href="<?php echo e(url($category[1]->slug)); ?>" class="img-thumb" style="background-image: url('<?php echo e(asset('/storage'.$category[1]->picture)); ?>');">
                            <h3><?php echo e($category[1]->name); ?></h3>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="img-thumbnail">
                        <a href="<?php echo e(url($category[2]->slug)); ?>" class="img-thumb" style="background-image: url('<?php echo e(asset('/storage'.$category[2]->picture)); ?>');">
                            <h3><?php echo e($category[2]->name); ?></h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="img-thumbnail">
                <a href="<?php echo e(url($category[3]->slug)); ?>" class="img-thumb" style="background-image: url('<?php echo e(asset('/storage'.$category[3]->picture)); ?>');">
                    <h3><?php echo e($category[3]->name); ?></h3>
                </a>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="img-thumbnail">
                <a href="<?php echo e(url($category[4]->slug)); ?>" class="img-thumb" style="background-image: url('<?php echo e(asset('/storage'.$category[4]->picture)); ?>');">
                    <h3><?php echo e($category[4]->name); ?></h3>
                </a>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="img-thumbnail">
                <a href="<?php echo e(url($category[5]->slug)); ?>" class="img-thumb" style="background-image: url('<?php echo e(asset('/storage'.$category[5]->picture)); ?>');">
                    <h3><?php echo e($category[5]->name); ?></h3>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
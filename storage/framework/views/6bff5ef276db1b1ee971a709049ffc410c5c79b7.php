<div class="col-sm-12 noMarginBottom">
    <div class="row">
        <div class="col-sm-6 noMarginBottom thumbnailContainer">
            <div class="thumbnailWrap">
                <a href="#" class="thumbnailFrame">
                    <?php if($picture != null && $picture != ""): ?>
                        <img src="<?php echo e(url('/storage'.$picture)); ?>" class="img-responsive thumbnail" />
                    <?php else: ?>
                        <img src="<?php echo e(asset(BULK_SYSTEM_THEME.'/images/default.jpg')); ?>" class="img-responsive thumbnail" />
                    <?php endif; ?>
                    <input type="text" name="picture" class="inputPicture hiddenInput" value="<?php echo e($picture); ?>" readonly />
                </a>
                <i class="material-icons col-red delThumbnail <?php if($picture == null || $picture == ""): ?> hide <?php endif; ?>">clear</i>
            </div>
        </div>
    </div>
</div>

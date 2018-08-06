<div class="m-t-10 switch text-uppercase">
    <label>
        <span class="switchOff"><?php echo e(getStatusText($module, 0)); ?></span>
        <input type="checkbox" name="status" <?php if($switchStatus == 1): ?> checked <?php endif; ?> />
        <span class="lever switch-col-blue"></span>
        <span class="switchOn"><?php echo e(getStatusText($module, 1)); ?></span>
    </label>
</div>

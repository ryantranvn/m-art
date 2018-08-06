<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo e(asset('website/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo e(asset('website/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

<?php echo $__env->yieldContent('js'); ?>

<script src="<?php echo e(asset('website/js/website.min.js')); ?>"></script>
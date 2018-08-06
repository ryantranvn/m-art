<footer>
    <div class="footer-wrapper">
        <div class="container">
            <?php echo $__env->make('website.partials.subscribe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('website.partials.nav_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <address class="text-center">
            2018 ©  <strong>BULK LTD.</strong> All rights reserved.
        </address>
    </div>
</footer>
<?php echo $__env->make('website.partials.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(Session::has('success')): ?>
    <div class="modalContent"><?php echo e(Session::get('success')); ?></div>
<?php endif; ?>
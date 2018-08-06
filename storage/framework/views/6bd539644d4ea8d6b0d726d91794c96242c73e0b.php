<form id="frmDelete" action="" method="POST"  class="form-horizontal" role="form" novalidate="novalidate">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('DELETE')); ?>

</form>
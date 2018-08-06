<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset(BULK_SYSTEM_THEME.'/images/favicon.png')); ?>" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <?php echo $__env->make('adminbsb.partials.css_links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('adminbsb.partials.pass_to_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <body class="theme-red ls-closed">
        <?php echo $__env->make('adminbsb.partials.page_loader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('adminbsb.partials.search_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('adminbsb.partials.top_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('adminbsb.partials.left_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('adminbsb.partials.js_source', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>

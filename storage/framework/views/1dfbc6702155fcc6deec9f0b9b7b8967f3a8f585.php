<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="Tân Nhật Quang Electric">
    <meta name="keywords" content="tân nhật quang">
    <meta name="author" content="Ryan">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="shortcut icon" href="<?php echo e(asset('website/images/favicon.ico')); ?>" />
    <?php echo $__env->make('website.partials.css_links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="<?php echo e(asset('website/plugins/jquery/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <![endif]-->
    <?php echo $__env->make('website.partials.pass_to_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
    <?php echo $__env->make('website.partials.wrap_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.partials.wrap_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(empty($removeNavigation)): ?>
        <?php echo $__env->make('website.partials.wrap_navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php if(empty($removeBanner)): ?>
        <?php echo $__env->make('website.partials.wrap_banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php if(empty($removeHotline)): ?>
        <?php echo $__env->make('website.partials.wrap_hotline', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <div id="gotoTop"></div>
    <?php echo $__env->make('website.partials.wrap_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.partials.page_loader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.partials.js_source', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
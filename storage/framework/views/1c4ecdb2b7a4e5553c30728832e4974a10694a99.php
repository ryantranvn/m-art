<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo e(config('app.name', 'Laravel')); ?></title>
<meta http-equiv="Expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="cache-control" content="no-cache, no-store" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="shortcut icon" href="<?php echo e(asset(WEBSITE_URL.'/images/favicon.ico')); ?>" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="description" content="Bulk" />
<meta name="keywords" content="Bulk" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<?php echo $__env->make('website.partials.css_links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset(WEBSITE_URL.'/js/jquery/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset(WEBSITE_URL.'/js/plugins/bootstrap/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset(WEBSITE_URL.'/js/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset(WEBSITE_URL.'/js/plugins/jquery-validation/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset(WEBSITE_URL.'/js/plugins/jquery-validation/additional-methods.js')); ?>"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<![endif]-->
<?php echo $__env->make('website.partials.pass_to_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<?php if($controller=='home'): ?>
    <?php if($action=='index'): ?>
        <?php ($controller = 'home'); ?>
    <?php else: ?>
        <?php ($controller = 'error'); ?>
    <?php endif; ?>
<?php endif; ?>
<body class="<?php echo e($controller); ?>-page">
<header id="header">
    <?php echo $__env->make('website.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</header>
<div class="page-wrapper">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('website.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('website.partials.page_loader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('website.partials.js_source', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
<div id="wrap_search" class="container-fluid">
    <div class="container">
        <div class="row">
            <div id="wrap_logo" class="col col-xs-5 col-sm-3 pull-left">
                <a class="link_logo" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('website/images/logo.png')); ?>" alt="<?php echo e(IMG_ALT); ?>" />
                </a>
            </div>
            <div id="wrap_frmSearch" class="col col-xs-9 col-sm-9 pull-right hidden-xs">
                <form id="frmSearch" action="<?php echo e(url($controller.'/search')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" name="product_search" class="form-control" placeholder="Tìm kiếm sản phẩm">
                    <span class="btn input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

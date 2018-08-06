<div class="header container">
    <div class="row">
        <div class="col-sm-4 logo">
            <h1 class="colorOrange"><a href="<?php echo e(url('/')); ?>">BULK</a></h1>
        </div>
        <div class="col-sm-8">
            <div class="main-header">
                <nav class="navbar">
                    <ul class="nav nav-pills pull-left">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/')); ?>">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/category')); ?>">CATEGORIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/about')); ?>">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/contact')); ?>">CONTACT US</a>
                        </li>
                        <?php if(Auth::check()): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span> My Account</a>
                                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                    <ul>
                                        <li><a class="dropdown-item" href="<?php echo e(url('/my-account')); ?>">My Account</a></li>
                                        <li><a class="dropdown-item" href="#">Order History</a></li>
                                        <li><a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/login')); ?>"><span class="icon-lock-closed"></span> Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class="top-header">
                <div class="block-header-search">
                    <form id="frmSearch" action="<?php echo e(url('/search?product=')); ?>" method="GET">
                        <div class="form-group">
                            <input type="text" name="search" placeholder="Search by product name and producer's name,..." class="form-control" />
                            <button type="submit" class="btn btn-primary btn-search"><span class="icon-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mini-cart">
    <a href="<?php echo e(url('/cart')); ?>" class="mini-cart-link">
        <span class="total">
            <?php if(Session::has('cart') && Session::get('cart.totalItems')>0): ?>
                <?php echo e(Session::get('cart.totalItems')); ?>

            <?php else: ?>
                0
            <?php endif; ?>
        </span>
        <span class="icon-shopping-basket"></span>
    </a>
    <div class="add-to-cart-success" style="display: none;">
        <span class="close"><i class="glyphicon glyphicon-remove"></i></span>
        <div class="alert alert-success" role="alert">
            <i class="glyphicon glyphicon-ok"></i>Thêm vào giỏ hàng thành công!
        </div>
        <a href="<?php echo e(url('/cart')); ?>" class="btn btn-primary">Xem giỏ hàng và thanh toán</a>
    </div>
</div>
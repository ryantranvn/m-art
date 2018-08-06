<div id="wrap_navigation" class="container-fluid hidden-xs">
    <div class="container">
        <div class="row">
            <!-- nav Sanpham -->
            <div id="nav_sanpham" class="col col-sm-3">
                <a href="#">Sản phẩm <i class="fa fa-caret-down"></i></a>
            </div>
            <div id="nav_others" class="col col-sm-7">
                <ul class="nav navbar-nav">
                    <li <?php if(!empty($activeNav) && $activeNav=="gioithieu"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('/gioi-thieu')); ?>">Giới thiệu</a>
                    </li>
                    <li <?php if(!empty($activeNav) && $activeNav=="banggia"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('/bang-gia')); ?>">Bảng giá</a>
                    </li>
                    <li <?php if(!empty($activeNav) && $activeNav=="tintuc"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('/tin-tuc')); ?>">Tin tức</a>
                    </li>
                    <li <?php if(!empty($activeNav) && $activeNav=="lienhe"): ?> class="active" <?php endif; ?>>
                    <a href="<?php echo e(url('/lien-he')); ?>">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div id="wrap_cart" class="col col-sm-2 text-right">
                Giỏ hàng
                <span id="cart_number">
                    <?
                    if (isset($session_cart) && isset($session_cart['total_item'])) {
                        if ($session_cart['total_item']<=99) {
                            echo $session_cart['total_item'];
                        }
                        else {
                            echo "99<plus>+</plus>";
                        }
                    } else {
                        echo "0";
                    }
                    ?>
                </span>
                <a class="link_full" href="gio-hang"></a>
            </div>
        </div>
    </div>
    <? if (isset($categories) && count($categories)>0) { ?>
    <div id="nav_sanpham_popover">
        <div class="item">
            <p class="nav_parent">
                <a href="san-pham?cat=sp">Tất cả</a>
            </p>
        </div>
        <? foreach ($categories as $category) { ?>
        <div class="item">
            <p class="nav_parent">
                <a href="san-pham/<?=$category['url']?>?cat=sp"><?=$category['name']?></a>
            </p>
            <? if (count($category['sub'])>0) { ?>
            <? foreach ($category['sub'] as $sub) { ?>
            <p class="nav_child">
                <a href="san-pham/<?=$sub['url']?>?cat=sp&sub=<?=$category['url']?>"><?=$sub['name']?></a>
            </p>
            <? } ?>
            <? } ?>
        </div>
        <? } ?>
    </div>
    <div id="nav_sanpham_bg"></div>
    <? } ?>
</div>


<div id="wrap_footer" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col col-sm-6 text_left">
                <a class="link_logo" href="">
                    <img src="<?php echo e(asset('website/images/logo.png')); ?>" />
                </a>
                <ul class="nav navbar-nav hidden-xs">
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
            <div class="col col-sm-6 text_right">
                <p class="company_name">Công Ty TNHH TM NHẬT QUANG</p>
                <p class="company_address">
                    12 Hoàng Diệu, Phường 2, Tp Cà Mau, Việt Nam<br/>
                    Phone : +84 7803 515 555 | +84 7806 515 555</br/>
                    Fax : +84 7806 251 022</br/>
                    Email : dntntannhatquang@gmail.com
                </p>
            </div>
        </div>
    </div>
</div>

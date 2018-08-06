<?php $__env->startSection('content'); ?>
<div class="wrapper-content cms-page about-wrapper">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('website.partials.breadcrumb', [
                'breadcrumbs' => [
                    ['text' => 'About us', 'link' => '']
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="about-content">
                <div class="block-title text-center">
                    <h3 class="orange">Welcome To Bulk Food</h3>
                    <h2>A LITTLE STORY ABOUT US</h2>
                </div>
                <div class="row page_content_wrapper">
                    <div class="col-sm-6 col-xs-12">
                        <div class="img-thumbnail">
                            <img src="http://themegoodsthemes-pzbycso8wng.stackpathdns.com/capella/demo/wp-content/uploads/2014/07/chef.jpg" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <h2>WE ARE SPECIALIZED IN <br>SPICY MODERN FUSION FOOD</h2>
                        <div class="page_caption_desc" style="margin-top:10px;margin-bottom:20px;">The Art of Cooking</div>
                        <hr class="thick" style="margin-bottom:30px;">

                        <p>Curabitur pulvinar dui viverra liberlobortis in dictum velit luctus. Donec imperdiet tincidunt interdum. Duultricies condimentum interdum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>

                        Morbi leo risus, porta ac consectetur ac, vesti bulum at eros. Aenean lacinia bibendum nulla
                        sed consec us eget urna mollis ornare vel euleo. Nullam id dolor id nibh ultricies vehicula
                        ut id elit. Cum sociis natoque penatibus et magnis dis parturient monte siculus mus.Maecenas
                        sed diam eget risus varius blandit sit amet non magna.<p></p>

                        <p>Curabitur pulvinar dui viverra liberlobortis in dictum velit luctus. Donec imperdiet tincidunt interdum. Duultricies condimentum interdum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
                        <p class="text-right">
                            <img src="http://themegoodsthemes-pzbycso8wng.stackpathdns.com/capella/demo/wp-content/uploads/2014/07/signature2.png" style="width: auto;" alt="" />
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-choose space-padding-tb-45">
        <div class="container">
            <div class="block-title text-center">
                <h2>Why Choose Us?</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-sm-4 text-right">
                    <div class="items">
                        <div class="icon">
                            <img src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/icon-about1.png" alt="icon">
                        </div>
                        <div class="text">
                            <h3>Always Fresh</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                    <!--End items-->
                    <div class="items">
                        <div class="icon">
                            <img src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/icon-about2.png" alt="icon">
                        </div>
                        <div class="text">
                            <h3>Always Fresh </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                    <!--End items-->
                    <div class="items">
                        <div class="icon">
                            <img src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/icon-about3.png" alt="icon">
                        </div>
                        <div class="text">
                            <h3>Always Fresh </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                    <!--End items-->
                </div>
                <div class="col-md-4 col-sm-4">
                    <img class="img-responsive" src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/images-choose1.jpg" alt="banner">
                </div>
                <div class="col-md-4 text-left col-sm-4">
                    <div class="items">
                        <div class="icon">
                            <img src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/icon-about4.png" alt="icon">
                        </div>
                        <div class="text">
                            <h3>Always Fresh</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                    <!--End items-->
                    <div class="items">
                        <div class="icon">
                            <img src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/icon-about5.png" alt="icon">
                        </div>
                        <div class="text">
                            <h3>Always Fresh</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                    <!--End items-->
                    <div class="items">
                        <div class="icon">
                            <img src="http://mobilewebs.net/mojoomla/demo/opencart/freshfood3/image/catalog/images/icon-about6.png" alt="icon">
                        </div>
                        <div class="text">
                            <h3>Always Fresh</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                    <!--End items-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
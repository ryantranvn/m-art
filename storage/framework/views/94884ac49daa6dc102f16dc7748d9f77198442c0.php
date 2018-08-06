<?php $__env->startSection('content'); ?>
<div class="wrapper-content contact-page" style="padding-bottom: 0;">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('website.partials.breadcrumb', [
                'breadcrumbs' => [
                    ['text' => 'Contact us', 'link' => '']
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="block-contact">
                <div class="block-title">
                    <h2><span>We look forward to hearing from you!</span></h2>
                    <p>We are here to answer any questions that you may have about our services. Reach out to us and we’ll respond as soon as we can.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="company-information">
                            <h2 class="company-name">BULK Co.ltd</h2>
                            <p><span class="icon-map-marker"></span> 123 Ocean Building, District 1, HCM</p>
                            <p><span class="icon-phone-square"></span> +028 800 555 7777</p>
                            <p><span class="icon-envelope-o"></span> info@bulk.vn</p>
                            <div class="box-social">
                                <ul>
                                    <li><a href="#"><span class="icon-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter-square"></span></a></li>
                                    <li><a href="#"><span class="icon-google-plus-square"></span></a></li>
                                    <li><a href="#"><span class="icon-pinterest-square"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-dismissible" style="padding: 15px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="col-white" aria-hidden="true">×</span></button>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($errorMsg); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(Session::has('danger')): ?>
                            <div class="alert alert-danger alert-dismissible" style="padding: 15px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="col-white" aria-hidden="true">×</span></button>
                                <ul>
                                    <li><?php echo e(Session::get('danger')); ?></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form id="frmContact" action="<?php echo e(url('/'.$controller)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('POST')); ?>

                            <fieldset class="fieldset">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your name (*)" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email (*)" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Your phone" class="form-control positiveNumber" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" rows="5" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="buttons-set">
                                        <button type="submit" class="btn-primary btn">Send now</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d1333.3373413060372!2d106.69600008561434!3d10.788037801439645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x31752f34e8219ee3%3A0x94c1388aac1746ac!2zODggTeG6oWMgxJDEqW5oIENoaQ!3m2!1d10.7879952!2d106.69608869999999!5e0!3m2!1sen!2s!4v1532944216502" height="550" frameborder="0" style="width: 100%; margin-bottom: -5px; border:0;" allowfullscreen></iframe>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
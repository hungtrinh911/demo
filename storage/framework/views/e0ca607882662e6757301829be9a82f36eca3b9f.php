<?php $__env->startSection('title'); ?>
  <title><?php echo e($option->site_name); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
   <link rel="shortcut icon" href="<?php echo e(asset("$option->site_icon")); ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/bootstrap.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.carousel.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.theme.default.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/style.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/responsive.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/select2.css")); ?>"/>
  <link href="<?php echo e(asset("fontend/pagination/dist/pagination.css")); ?>" rel="stylesheet" type="text/css">
  <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="slider">
      <div class="container">
        <div class="owl-slider owl-theme owl-carousel">
          <?php $__currentLoopData = $slides_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item">
            <img src="<?php echo e(asset("$slide->image")); ?>" alt="slide 1"/>
            <div class="description">
              <h2><?php echo e($slide->title); ?></h2>
              <p><?php echo e($slide->content); ?></p>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <section class="introduce">
      <div class="container">
        <div class="introduce-wrap">
          <div class="row">
            <div class="col-xl-1"></div>
            <?php $__currentLoopData = $site_tourguides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_tourguide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-5 ">
              <div class="intro-item d-flex justify-content-start align-items-start">
                <div class="item-icon"><img class="img-fluid" src="<?php echo e(asset("$site_tourguide->image")); ?>" alt=""/></div>
                <div class="item-info">
                  <h2><?php echo e($site_tourguide->title); ?></h2>
                  <p><?php echo e($site_tourguide->content); ?></p><a class="seemore" href="<?php echo e(action('Fontend\GuidereviewController@index')); ?>"><?php echo e($multilang->seemore); ?></a>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </section>
    <section class="guide-profile">
   <!--     <div class="container">
        <div class="row no-gutters guild-wrap">
          <div class="col-xl-11 offset-xl-1">
            <div class="guide-profile d-lg-flex justify-content-lg-center align-items-lg-center">
              <div class="guide-title"> -->
      <div class="container">
        <input type="hidden" value="<?php echo e($guide_profile_background_image = $site_guide_profile[0]); ?>">
        <div class="row no-gutters guild-wrap" style="background-image:  url(<?php echo e(asset("$guide_profile_background_image")); ?>)  #fff left top no-repeat;">
          <div class="col-xl-11 offset-xl-1">
            <div class="guide-profile d-lg-flex justify-content-lg-center align-items-lg-center">
              <div class="guide-title">
                <h2><?php echo e($multilang->tourguide); ?></h2>
              </div>
              <div class="guide-info">
                <div class="row">
                  <?php for($i=1; $i< count($site_guide_profile);$i++ ): ?>
                   <div class="col-xl-5">
                    <div class="guide-item d-flex justify-content-start align-items-start"><img class="img-fluid" src="<?php echo e(asset("fontend/images/ico-check.png")); ?>" alt=""/>
                      <p><?php echo e($site_guide_profile[$i]); ?></p>
                    </div>
                  </div>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
          </div>
         <!--  <div class="col-xl-8 offset-xl-4">
            <div class="guide-slider owl-theme owl-carousel">
              <div class="item"><img src="images/sl-profile-1.jpg" alt="slide 1"/></div>
              <div class="item"><img src="images/sl-profile-2.jpg" alt="slide 2"/></div>
              <div class="item"><img src="images/sl-profile-3.jpg" alt="slide 3"/></div>
            </div>
          </div> -->
          <div class="col-xl-8 offset-xl-4">
          <div class="guide-slider owl-theme owl-carousel">
             <?php $__currentLoopData = $slides_guide_profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item"><img src="<?php echo e(asset("$slide")); ?>" alt="slide 1"/></div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main-course">
      <div class="container">
        <div class="course-inner row no-gutters">
          <div class="col-xl-11 offset-xl-1">
            <input type="hidden" value="<?php echo e($banner1 =$tc_banner1[0]->image); ?>">
            <input type="hidden" value="<?php echo e($banner3 =$tc_banner3[0]->image); ?>">
            <div class="course-wrap"><img class="img-fluid d-none d-lg-block" src="<?php echo e(asset("$banner1")); ?>" alt=""/>
              <div class="course-item d-sm-flex justify-content-start align-items-start"><img class="img-fluid" src="<?php echo e(asset("$banner3")); ?>" alt=""/>
                <div class="course-info">
                  <h2><?php echo e($multilang->trainingcourse); ?></h2>
                  <p><?php echo e($multilang->trainingcourse); ?></p><a class="seemore" href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($multilang->seemore); ?></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-11 offset-xl-1">
            <div class="course-inroduce d-md-flex justify-content-start align-items-start">
            <?php $__currentLoopData = $trainingcourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item">
                <h2><?php echo e($site_tc->title); ?></h2>
                <p><?php echo e($site_tc->excerpt); ?></p>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="blog">
      <div class="container">
        <div class="article-item">
          <div class="row">
            <?php $__currentLoopData = $site_job_search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-5"><a class="article-img" href="#"><img class="img-fluid" src="<?php echo e(asset("$site_js->image")); ?>" alt=""/></a></div>
            <div class="col-xl-5">
              <div class="article-info">
                <h2><?php echo e($multilang->jobopportunitysearch); ?></h2>
                <p class="category"><?php echo e($site_js->description); ?></p>
                <p class="description"><?php echo e($site_js->content); ?></p><a class="seemore" href="#"><?php echo e($multilang->seemore); ?></a>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </section>
    <section class="information">
      <div class="container">
        <div class="informaton-wrap">
          <div class="row">
            <div class="col-lg-6 col-xl-5 offset-xl-1">
              <div class="about-us">
                <h2><?php echo e($multilang->aboutus); ?></h2>
                <p class="description"><?php echo e($option->site_description); ?></p>
                <div class="info-number d-md-flex justify-content-between align-items-center">
                <?php $__currentLoopData = $site_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item">
                    <h3><?php echo e($site_number->number); ?></h3>
                    <p><?php echo e($site_number->word); ?></p>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <div class="col-xl-5">
              <div class="faqs">
                <h2><?php echo e($multilang->faqs); ?></h2>
                <div class="accordion" id="accordionExample">
                  <?php for($i=100; $i< 103; $i++): ?>
                  <input type="hidden" value="<?php echo e($j =$i-100); ?>">
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#<?php echo e($i); ?>" aria-expanded="false" aria-controls="collapseTwo"><?php echo e($site_faqs[$j]->title); ?></button>
                      </h5>
                    </div>
                    <div class="collapse" id="<?php echo e($i); ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body"><?php echo e($site_faqs[$j]->content); ?></div>
                    </div>
                  </div>
                  <?php endfor; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="guide-review">
      <div class="container">
        <div class="guide-wrap"  style="background-image: url(<?php echo e(asset("fontend/images/bg-require.jpg")); ?>);" >
          <div class="row">
            <div class="col-xl-4 offset-xl-2">
              <div class="guide-info">
                <?php for($i=200;$i< 201 ;$i++): ?>
                    <input type="hidden" value="<?php echo e($j =$i-100); ?>">
                      <h2><?php echo e($site_contact_us[0]); ?></h2>
                      <p class="description"><?php echo e($site_contact_us[1]); ?></p>
                      <ul class="list-unstyled">
                        <li><?php echo e($site_contact_us[2]); ?></li>
                        <li><?php echo e($site_contact_us[3]); ?></li>
                        <li><?php echo e($site_contact_us[4]); ?></li>
                      </ul>
                <?php endfor; ?>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="guide-img"><img class="img-fluid" src="images/banner-require.png" alt=""/></div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script src="<?php echo e(asset("fontend/js/jquery191.min.js")); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/popper.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/bootstrap.min.js")); ?>"></script>

<script src="<?php echo e(asset("fontend/js/owl.carousel.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("fontend/js/main.js")); ?>" type="text/javascript"></script>
 <script src="<?php echo e(asset("fontend/js/menu.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("fontend/js/select2.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("fontend/js/pagination.js")); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset("backend/assets/js/detect.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/fastclick.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.slimscroll.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.blockUI.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/waves.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/wow.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.nicescroll.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.scrollTo.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/sweet-alert2/sweetalert2.min.js")); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
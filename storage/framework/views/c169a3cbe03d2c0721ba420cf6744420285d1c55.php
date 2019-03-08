<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('title'); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="home-page">
<header>
    <div class="container">
        <div class="d-none d-xl-block">
          <div class="d-flex justify-content-between align-items-center" id="header">
            <div class="col-xl-1">
          <input type="hidden" value="<?php echo e($img = $option->site_icon); ?>">
          <h1 class="logo"><a href="<?php echo e(action('Fontend\IndexController@index')); ?>"><img class="img-fluid" src="<?php echo e(asset("$img")); ?>" alt="logo"/></a></h1>
        </div>
        <div class="col-xl-11">
          <div class="d-flex justify-content-between align-items-center">
            <ul class="nav">
              <li><a href="<?php echo e(action('Fontend\IndexController@index')); ?>"><?php echo e($multilang->home); ?></a></li>
              <li  class=""><a href="<?php echo e(action('Fontend\GuidereviewController@index')); ?>"><?php echo e($multilang->tourguide); ?></a></li>
              <li class="level-2"><a href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($multilang->trainingcourse); ?></a>
                <ul class="list-unstyled">
                <?php $__currentLoopData = $tc_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($tc->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </li>              
              <li class="level-2"><a href="<?php echo e(action('Fontend\JobSearchController@index')); ?>"><?php echo e($multilang->jobsearch); ?></a>
              </li>
               <li class=""><a href="<?php echo e(action('Fontend\TravelBlogController@index')); ?>"><?php echo e($multilang->blog); ?></a></li>
              <li><a href="<?php echo e(action('Fontend\FaqsController@index')); ?>"><?php echo e($multilang->faqs); ?></a></li>
              <li><a href="<?php echo e(action('Fontend\AboutUsController@index')); ?>"><?php echo e($multilang->aboutus); ?></a></li>
            </ul>
            <ul class="login list-unstyled d-flex justify-content-between align-items-center">
             <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if(\App\Helper::currentLocale() !== $item->locale): ?>
             <li class="active">
              <a href="?lang=<?php echo e($item->locale); ?>"><img src="<?php echo e($item->flag); ?>"/></a>
            </li>
             <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="d-block d-xl-none">
          <div id="mobile-header">
            <h1 class="logo"><a href="#"><img class="img-fluid" src="<?php echo e(asset("$img")); ?>" alt="logo"/></a></h1><a class="mobile-toggle-btn" href="#javacsript:void(0);"><span></span><span></span><span></span></a>
            <ul class="mobile-nav list-unstyled" style="display: none">
              <li><a href="<?php echo e(action('Fontend\IndexController@index')); ?>"><?php echo e($multilang->home); ?></a></li>
              <li  class=""><a href="<?php echo e(action('Fontend\GuidereviewController@index')); ?>"><?php echo e($multilang->tourguide); ?></a></li>
              <li class="sub-menu"><a href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($multilang->trainingcourse); ?></a>
                <ul class="list-unstyled" style="display: none">
                  <li class="sub-menu">
                    <ul class="list-unstyled" style="display: none">
                      <?php $__currentLoopData = $tc_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($tc->name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="level-2"><a href="<?php echo e(action('Fontend\JobSearchController@index')); ?>"><?php echo e($multilang->jobsearch); ?></a>
              </li>
               <li class=""><a href="<?php echo e(action('Fontend\TravelBlogController@index')); ?>"><?php echo e($multilang->blog); ?></a></li>
              <li><a href="<?php echo e(action('Fontend\FaqsController@index')); ?>"><?php echo e($multilang->faqs); ?></a></li>
              <li><a href="<?php echo e(action('Fontend\AboutUsController@index')); ?>"><?php echo e($multilang->aboutus); ?></a></li>
              <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(\App\Helper::currentLocale() !== $item->locale): ?>
             <li class="sign-in">
              <a href="?lang=<?php echo e($item->locale); ?>"><img src="<?php echo e($item->flag); ?>"/></a>
            </li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>

<!--           <div class="d-block d-xl-none">
          <div id="mobile-header">
            <h1 class="logo"><a href="#"><img class="img-fluid" src="<?php echo e(asset("$img")); ?>" alt="logo"/></a></h1><a class="mobile-toggle-btn" href="javacsript:void(0);"><span></span><span></span><span></span></a>
            <ul class="mobile-nav list-unstyled" style="display: none">
              <li><a href="<?php echo e(action('Fontend\IndexController@index')); ?>"><?php echo e($multilang->home); ?></a></li>
              <li  class=""><a href="<?php echo e(action('Fontend\GuidereviewController@index')); ?>"><?php echo e($multilang->tourguide); ?></a></li>
              <li class="sub-menu"><a href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($multilang->trainingcourse); ?></a>
                <ul class="list-unstyled" style="display: none">
                  <li class="sub-menu">
                    <ul class="list-unstyled" style="display: none">
                      <?php $__currentLoopData = $tc_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(action('Fontend\TrainingCourseController@index')); ?>"><?php echo e($tc->name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="level-2"><a href="<?php echo e(action('Fontend\JobSearchController@index')); ?>"><?php echo e($multilang->jobsearch); ?></a>
              </li>
               <li class=""><a href="<?php echo e(action('Fontend\TravelBlogController@index')); ?>"><?php echo e($multilang->blog); ?></a></li>
              <li><a href="<?php echo e(action('Fontend\FaqsController@index')); ?>"><?php echo e($multilang->faqs); ?></a></li>
              <li><a href="<?php echo e(action('Fontend\AboutUsController@index')); ?>"><?php echo e($multilang->aboutus); ?></a></li>
            </ul>
            <ul class="login list-unstyled d-flex justify-content-between align-items-center">
            <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(\App\Helper::currentLocale() !== $item->locale): ?>
             <li class="active">
              <a href="?lang=<?php echo e($item->locale); ?>"><img src="<?php echo e($item->flag); ?>"/></a>
            </li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div> -->
    </div>
  </header>
   <?php echo $__env->yieldContent('content'); ?>
</section>
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 offset-xl-2">
            <div class="address">
              <h2><?php echo e($multilang->aboutus); ?></h2>
              <p class="desciption"><?php echo e($option->site_description); ?></p>
              <ul class="list-unstyled">
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="<?php echo e(asset("fontend/images/f-location.png")); ?>"/></div>
                  <div class="text">
                    <h4><?php echo e($multilang->address); ?></h4>
                    <p><?php echo e($option->site_address); ?></p>
                  </div>
                </li>
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="<?php echo e(asset("fontend/images/f-phone.png")); ?>"/></div>
                  <div class="text">
                    <h4><?php echo e($multilang->mobile); ?></h4>
                    <p><?php echo e($option->site_telephone); ?></p>
                  </div>
                </li>
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="<?php echo e(asset("fontend/images/f-mail.png")); ?>"/></div>
                  <div class="text">
                    <h4><?php echo e($multilang->email); ?></h4>
                    <p><?php echo e($option->site_email); ?></p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-4 offset-xl-1">
            <div class="contact">
              <h2><?php echo e($multilang->contactus); ?></h2>

              <form method="post" class="contact-form"
              action="<?php echo e(action('Fontend\IndexController@addContactUs')); ?>">
             <?php echo e(csrf_field()); ?>

                <input class="form-control" type="text" name="contact_name" id="contact_name" placeholder="<?php echo e($multilang->name); ?>" value="" >
                <input class="form-control" type="mail" name="contact_email" id="contact_email" placeholder="<?php echo e($multilang->email); ?>" >
                <input class="form-control" type="text" name="contact_phone" id="contact_phone" placeholder="<?php echo e($multilang->phone); ?>">
                <textarea class="form-control" row="3" name="contact_content" id="contact_content" placeholder="Message"><?php echo e(old('contact_content')); ?></textarea>
                <button class="btn-submit" type="submit">submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
<section class="bottom-bar">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 offset-xl-2">

        <div class="copyright"> <?php echo e(\App\Option::get('site_copyright')); ?></div>
      </div>
      <div class="col-xl-4 offset-xl-1 align-items-center">
        <ul class="social list-unstyled d-flex justify-content-center align-items-center">
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="<?php echo e(asset("fontend/images/s-facebook.png")); ?>" alt=""/></a></li>
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="<?php echo e(asset("fontend/images/s-twiter.png")); ?>" alt=""/></a></li>
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="<?php echo e(asset("fontend/images/s-google.png")); ?>" alt=""/></a></li>
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="<?php echo e(asset("fontend/images/s-dribble.png")); ?>" alt=""/></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- END wrapper -->
<?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo e(\App\Option::get('site_name')); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset("$option->site_icon")); ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset("fontend/css/bootstrap.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.carousel.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.theme.default.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("fontend/css/style.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("fontend/css/responsive.css")); ?>"/>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="d-flex justify-content-between align-items-center" id="header">
          <div class="col-xl-1">
            <input type="hidden" value="<?php echo e($img = \App\Option::get('site_icon')); ?>">
            <h1 class="logo"><a href="#"><img class="img-fluid" src="<?php echo e(asset("$img")); ?>" alt="logo"/></a></h1>
          </div>
          <div class="col-xl-11">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile Guide</a></li>
                <li><a href="#">training Courses</a></li>
                <li><a href="#">Job Search Opportunity</a></li>
                <li><a href="#">Travel Blogs</a></li>
                <li><a href="#">FAQS</a></li>
                <li><a href="">About Us</a></li>
              </ul>
              <ul class="login list-unstyled d-flex justify-content-between align-items-center">
                <li><a href="#">Sign in</a></li>
                <li class="register"><a href="">Sign up</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
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
                  <p><?php echo e($site_tourguide->content); ?></p><a class="seemore" href="#">SEE MORE</a>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>
      </div>
    </section>
    <section class="guide-profile">
      <div class="container">
        <div class="row no-gutters guild-wrap">
          <div class="col-xl-11 offset-xl-1">
            <div class="guide-profile d-flex justify-content-center align-items-center">
              <div class="guide-title">
                <h2>Guide Profile</h2>
              </div>
              <div class="guide-info">
                <div class="row">
                    <?php $__currentLoopData = $site_guide_profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_gp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-xl-5">
                    <div class="guide-item d-flex justify-content-start align-items-start"><img class="img-fluid" src="<?php echo e(asset("fontend/images/ico-check.png")); ?>" alt=""/>
                      <p><?php echo e($site_gp); ?></p>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 offset-xl-4">
          <div class="guide-slider owl-theme owl-carousel">
            <!--   <div class="item"><img src="<?php echo e(asset("fontend/images/sl-profile-1.jpg")); ?>" alt="slide 1"/></div>
            <div class="item"><img src="<?php echo e(asset("fontend/images/sl-profile-2.jpg")); ?>" alt="slide 2"/></div>
            <div class="item"><img src="<?php echo e(asset("fontend/images/sl-profile-3.jpg")); ?>" alt="slide 3"/></div> -->
             
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
            <div class="course-wrap"><img class="img-fluid" src="<?php echo e(asset("fontend/images/bg-course.jpg")); ?>" alt=""/>
              <div class="course-item d-flex justify-content-start align-items-start"><img class="img-fluid" src="<?php echo e(asset("fontend/images/img-course.jpg")); ?>" alt=""/>
                <div class="course-info">
                  <h2>Training courses</h2>
                  <p>Training courses</p><a class="seemore" href="#">SEE MORE</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-11 offset-xl-1">
            <div class="course-inroduce d-flex justify-content-start align-items-start">
            <?php $__currentLoopData = $site_training_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item">
                <h2><?php echo e($site_tc->title); ?></h2>
                <p><?php echo e($site_tc->content); ?></p>
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
            <div class="col-xl-5"><a class="article-img" href="#"><img class="img-fluid" src="<?php echo e(asset("fontend/images/banner-01.jpg")); ?>" alt=""/></a></div>
            <div class="col-xl-5">
              <div class="article-info">
                <?php $__currentLoopData = $site_job_search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2><?php echo e($site_js->title); ?></h2>
                <p class="category"><?php echo e($site_js->description); ?></p>
                <p class="description"><?php echo e($site_js->content); ?></p><a class="seemore" href="#">SEE MORE</a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="information">
      <div class="container">
        <div class="informaton-wrap">
          <div class="row">
            <div class="col-xl-5 offset-xl-1">
              <div class="about-us">
                <h2>ABOUT US</h2>
                <?php $__currentLoopData = $site_about_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="description"><?php echo e($site_about->content); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="info-number d-flex justify-content-between align-items-center">
                  <div class="item">
                    <h3>50+</h3>
                    <p>Hard Worker</p>
                  </div>
                  <div class="item">
                    <h3>200+</h3>
                    <p>Happy Customer</p>
                  </div>
                  <div class="item">
                    <h3>100+</h3>
                    <p>Projects Complete</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-5">
              <div class="faqs">
                <h2>FAQ</h2>
                <div class="accordion" id="accordionExample">
                 <?php $__currentLoopData = $site_faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site_faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php echo e($site_faq->title); ?></button>
                      </h5>
                    </div>
                    <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body"><?php echo e($site_faq->content); ?></div>
                    </div>
                  </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="guide-review">
      <div class="container">
        <div class="guide-wrap">
          <div class="row">
            <div class="col-xl-4 offset-xl-2">
              <div class="guide-info">
                <h2>Why guidereview?</h2>
                <p class="description"><?php echo e(\App\Option::get('site_description')); ?></p>
                <ul class="list-unstyled">
                  <li>Agriculture and mining businesses produce raw material</li>
                  <li>Organization and government regulation</li>
                  <li>Restructuring state enterprises</li>
                </ul><a class="readmore" href="#">READ MORE</a>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="guide-img"><img class="img-fluid" src="images/banner-require.png" alt=""/></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 offset-xl-2">
            <div class="address">
              <h2>contact us</h2>
              <p class="desciption">We provide you the best service and support comes register to receive service information</p>
              <ul class="list-unstyled">
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="<?php echo e(asset("fontend/images/f-location.png")); ?>"/></div>
                  <div class="text">
                    <h4>Address</h4>
                    <p><?php echo e(\App\Option::get('site_address')); ?></p>
                  </div>
                </li>
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="<?php echo e(asset("fontend/images/f-phone.png")); ?>"/></div>
                  <div class="text">
                    <h4>phone number</h4>
                    <p><?php echo e(\App\Option::get('site_telephone')); ?></p>
                  </div>
                </li>
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="<?php echo e(asset("fontend/images/f-mail.png")); ?>"/></div>
                  <div class="text">
                    <h4>email</h4>
                    <p><?php echo e(\App\Option::get('site_email')); ?></p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-4 offset-xl-1">
            <div class="contact">
              <h2>Get In Touch</h2>
              <form class="contact-form" action="#">
                <input class="form-control" type="text" placeholder="Your Name"/>
                <input class="form-control" type="mail" placeholder="Mail"/>
                <input class="form-control" type="number" placeholder="Phone"/>
                <textarea class="form-control" row="3" placeholder="Message"></textarea>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset("fontend/js/bootstrap.min.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("fontend/js/owl.carousel.min.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("fontend/js/main.js")); ?>" type="text/javascript"></script>
  </body>
</html>
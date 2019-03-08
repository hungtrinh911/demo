<?php $__env->startSection('title'); ?>
  <title><?php echo e($option->site_name); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
   <link rel="shortcut icon" href="<?php echo e(asset("$option->site_icon")); ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/bootstrap.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.carousel.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.theme.default.min.css")); ?>"/>
   <link rel="stylesheet" href="<?php echo e(asset("fontend/css/select2.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/style.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/responsive.css")); ?>"/>
  <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="training-course-search">
      <div class="container">
        <input type="hidden" value="<?php echo e($site_training_course_image_bg = $tc_banner1[0]->image); ?>">
        <div class="training-course-search-wrap"><img class="img-fluid" src="<?php echo e(asset("$site_training_course_image_bg")); ?>" alt=""/>
          <form class="training-course-search-form" method="post"
              action="<?php echo e(action('Fontend\TrainingCourseController@search')); ?>">
               <?php echo e(csrf_field()); ?>

            <h4>Guildereview</h4>
            <h2><?php echo e($multilang->trainingcourse); ?></h2>
            <div class="form-group d-flex">
              <input class="form-control" type="text" placeholder="<?php echo e($multilang->search); ?>" name="key_word" />
              <button type="submit"> <?php echo e($multilang->search); ?></button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="training-course">
      <div class="container">
        <div class="training-course-wrap">
          <div class="row">
            <div class="col-xl-11 offset-xl-1">
              <div class="training-course-list">
                <div class="training-course-heading">
                  <h2><?php echo e($multilang->diversecourses); ?></h2>
                  <p><?php echo e($multilang->subcourse); ?></p>
                </div>
                <div class="course-list d-flex">
                   <?php $__currentLoopData = $training_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item">
                    <div class="item-info clearfix">
                      <h3><?php echo e($item->title); ?></h3>
                      <p><?php echo e(($item->excerpt)); ?></p>
                      <a class="seemore" href="<?php echo e(action('Fontend\TrainingCourseController@detail',$item->id)); ?>"><?php echo e($multilang->seemore); ?></a>
                    </div>
                    <div class="item-img"><a href="<?php echo e(action('Fontend\TrainingCourseController@detail',$item->id)); ?>"><img class="img-fluid" src="<?php echo e(asset("$item->featured_img")); ?>" alt="<?php echo e($item->title); ?>"/></a></div>
                  </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="training-course-banner">
      <div class="container">
        <div class="training-course-banner-wrap">
          <div class="row">
            <input type="hidden" value="<?php echo e($site_training_course_image_sm = $tc_banner2[0]->image); ?>">
            <div class="col-xl-11 offset-xl-1"><a href="#"><img class="img-fluid" src="<?php echo e(asset("$site_training_course_image_sm ")); ?>" alt=""/></a></div>
          </div>
        </div>
      </div>
    </section>
    <section class="training-course-branch">
      <div class="container">
        <div class="training-course-branch-wrap">
          <div class="row">
            <div class="col-xl-6 offset-xl-1">
              <div class="branch-address">
                <div class="branch-heading">
                  <h2><?php echo e($multilang->branchclass); ?></h2>
                  <p><?php echo e($multilang->subbranch); ?></p>
                </div>
                <div class="branch-location">
                  <?php for($i=0;$i< count($site_multi_address);$i++): ?>
                   <div class="item">
                        <h3 class="location"><?php echo e($site_multi_address[$i]); ?></h3>
                        <p class="description"><?php echo e($multilang->branch_number); ?> <?php echo e($i+1); ?></p>
                  </div>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
            <div class="col-xl-5">
              <input type="hidden" value="<?php echo e($banner3 = $tc_banner3[0]->image); ?>">
              <div class="branch-banner-wrap"><a href="#"><img class="img-fluid" src="<?php echo e(asset("$banner3")); ?>" alt=""/></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <section id ="training-course-comment">
      <div class="container">
        <div class="training-course-comment-wrap">
          <div class="row">
            <div class="col-xl-11 offset-xl-1">
              <div class="training-course-comment">
                <div class="owl-comment-slider owl-theme owl-carousel">
                  <?php $__currentLoopData = $site_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item">
                    <div class="client-icon">
                      <div class="client-icon-img"><img src="<?php echo e(asset("$review->image")); ?>" alt="slide 1"/></div>
                    </div>
                    <div class="client-comment">
                      <h3><?php echo e($review->title); ?><small> - Student</small></h3>
                      <p>“<?php echo e($review->content); ?>”</p>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
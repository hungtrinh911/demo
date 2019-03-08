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
  <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="<?php echo e(asset("fontend/pagination/dist/pagination.css")); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section id="faqs-banner">
      <div class="container">
        <div class="faqs-banner-wrap">
          <h1 class="banner-title">FAQS</h1>
        </div>
      </div>
    </section>
    <!-- <section id="myteam">
      <div class="container">
        <div class="myteam-wrap">
          <div class="col-xl-11 offset-xl-1">
            <div class="about-myteam">
              <h2>GUIDEREVIEW ANSWER TEAM</h2>
              <div class="myteam-list">
                <div class="item">
                  <div class="item-img"><img class="img-fluid" src="images/avatar.png" alt=""/></div>
                  <div class="item-info">
                    <h4>ELIZABET OLSEN</h4>
                    <p class="position">Co - Founder</p>
                  </div>
                </div>
                <div class="item">
                  <div class="item-img"><img class="img-fluid" src="images/avatar.png" alt=""/></div>
                  <div class="item-info">
                    <h4>ELIZABET OLSEN</h4>
                    <p class="position">Co - Founder</p>
                  </div>
                </div>
                <div class="item">
                  <div class="item-img"><img class="img-fluid" src="images/avatar.png" alt=""/></div>
                  <div class="item-info">
                    <h4>ELIZABET OLSEN</h4>
                    <p class="position">Co - Founder</p>
                  </div>
                </div>
                <div class="item">
                  <div class="item-img"><img class="img-fluid" src="images/avatar.png" alt=""/></div>
                  <div class="item-info">
                    <h4>ELIZABET OLSEN</h4>
                    <p class="position">Co - Founder</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <section id="faqs-content">
      <div class="container">
        <div class="faqs-content">
          <div class="col-xl-6 offset-xl-2">
            <div class="faqs-content-title">
              <h3>FAQS</h3>
            </div>
            <div class="faqs">
              <div class="accordion" id="accordionExample">
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#<?php echo e($faq->id); ?>" aria-expanded="false" aria-controls="collapseTwo"><?php echo e($faq->question); ?></button>
                      </h5>
                    </div>
                    <div class="collapse" id="<?php echo e($faq->id); ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body"><?php echo e($faq->answer); ?></div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
 <script src="<?php echo e(asset("fontend/js/menu.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("fontend/js/owl.carousel.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("fontend/js/main.js")); ?>" type="text/javascript"></script>

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
<script src="<?php echo e(asset("fontend/pagination/src/pagination.js")); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
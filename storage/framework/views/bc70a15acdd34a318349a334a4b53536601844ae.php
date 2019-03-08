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
  <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    

    <section class="blog-detail-main">
      <div class="container">
        <div class="blog-detail-wrap">
          <div class="row">
            <div class="col-xl-9">
              <div class="js-title">
                <h2 class="h2-title"><?php echo e($multilang->news); ?></h2>
              </div>
              <div class="article-detail">
                <h1 class="article-title"><?php echo e($trainingcourse->title); ?></h1>
                <div class="article-detail-info"><span class="author"><?php echo e($trainingcourse->author_name); ?></span><span class="times"><?php echo e($trainingcourse->created_at); ?></span></div>
                <div class="article-detail-img"><img class="img-fluid" src="<?php echo e(("$trainingcourse->featured_img")); ?>" alt=""/></div>
                <div class="article-detail-content">
                  <?php echo $trainingcourse->content; ?>

                </div>
              </div>
              <div class="related-news">
                <div class="js-title">
                  <h2 class="h2-title"><?php echo e($multilang->relatednews); ?></h2>
                </div>
                <div class="related-news-list">
                  <?php $__currentLoopData = $related_trainingcourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item"><a href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$related->id)); ?>">
                      <div class="item-img"><img class="img-fluid" src="<?php echo e(("$related->featured_img")); ?>" alt=""/></div>
                      <div class="item-info">
                        <h3><?php echo e($related->title); ?></h3>
                      </div></a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="promotion-news">
                <div class="js-title">
                  <h2 class="h2-title"><?php echo e($multilang->promotionnews); ?></h2>
                </div>
                <div class="promotion-ads-item"><a href="#"></a></div>
                <div class="promotion-list">
                  <?php for($i =0 ;$i< count($travelleft_id);$i++): ?>
                  <input type="hidden" value="<?php echo e($travelleft_img = $travelleft_id[$i]->featured_img); ?>">
                  <input type="hidden" value="<?php echo e($travelleft_ids = $travelleft_id[$i]->id); ?>">
                  <div class="item"><a href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$travelleft_ids)); ?>">
                      <div class="item-img"><img class="img-fluid" src="<?php echo e(asset("$travelleft_img")); ?>" alt=""/></div>
                      <div class="item-info">
                        <h3 style=""><?php echo e($travelleft_id[$i]->title); ?></h3>
                      </div></a></div>
                  <?php endfor; ?>
                </div>
                <div class="promotion-ads-item"><a href="#"><img class="img-fluid" src="images/ads-blog-02.png" alt=""/></a></div>
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
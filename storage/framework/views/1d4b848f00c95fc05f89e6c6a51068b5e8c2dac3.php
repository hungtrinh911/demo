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
    <section class="job-search">
      <div class="container">
        <input type="hidden" value="<?php echo e($banner = $js_banner[0]->image); ?>">  
        <div class="job-search-wrap"><img class="img-fluid" src="<?php echo e(asset("$banner")); ?>" alt=""/>
          <form class="job-search-form" id="serch-form" method="post"
              action="<?php echo e(action('Fontend\JobSearchController@search')); ?>">
               <?php echo e(csrf_field()); ?>

            <div class="job-search-form-header">
              <h2><?php echo e($multilang->jobsearch); ?></h2>
              <h4><?php echo e($multilang->js_sub); ?></h4>
            </div>
            <div class="form-group d-flex">
              <div class="text-search">
                <input class="form-control" type="text" name="key_word" placeholder=""/>
              </div>
              <div class="select-job">
                <select class="form-control js-job-single select2-hidden-accessible" name="category">
                   <option value=""><?php echo e($multilang->category); ?></option>
                  <?php $__currentLoopData = $jobsearch_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jsc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($jsc->name); ?>"><?php echo e($jsc->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="select-place">
                <select class="form-control js-place-single select2-hidden-accessible" name="city">
                   <option value=""><?php echo e($multilang->city); ?></option>
                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($city->name); ?>" ><?php echo e($city->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="btn-action">
                <button type="submit"><?php echo e($multilang->search); ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="top-employer">
      <div class="container">
        <div class="top-employer-wrap">
          <div class="col-xl-12">
            <div class="js-title">
              <h2 class="h2-title"><?php echo e($multilang->js_employee); ?></h2>
            </div>
            <div class="top-employer-list">
              <?php $__currentLoopData = $hot_employer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item"><a class="top-employer-img" href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$employer->id)); ?>"><img class="img-fluid" src="<?php echo e(asset("$employer->featured_img")); ?>" alt=""/></a><a class="top-employer-name" href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$employer->id)); ?>"><?php echo e($employer->excerpt); ?></a></div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="job-collection">
      <div class="container">
        <div class="job-collection-wrap">
          <div class="row">
            <div class="col-xl-9">
              <div class="js-title">
                <h2 class="h2-title"><?php echo e($multilang->js_job); ?></h2>
              </div>
              <div class="new-jobs-list">
                <?php $__currentLoopData = $jobsearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                  <div class="job-info">
                    <div class="job-img"><a href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$js->id)); ?>"><img class="img-fluid" src="<?php echo e(asset("$js->featured_img")); ?>" alt=""/></a></div>
                    <div class="job-desc">
                     <h3><a href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$js->id)); ?>"><?php echo e($js->title); ?></a></h3>
                      <p class="company"><?php echo e($js->excerpt); ?></p>
                      <div class="desciption">
                        <p style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap; "><?php echo e(strip_tags($js->content)); ?></p>
                      </div>
                      <div class="tag-list"> 
                        <?php $__currentLoopData = \App\News::tags($js->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <a href="#"><?php echo e($item); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                  <div class="job-action">
                     <p class="location"><?php echo e(\App\News::tags_place($js->id)); ?></p>
                     <p class="times"><?php echo e($js->created_at); ?></p>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <nav aria-label="Page navigation example" style="padding-bottom: 10px">
                 <?php echo e($jobsearch->links()); ?>

               </nav>
            </div>
            

            </div>
            <div class="col-xl-3">
              <div class="ads-list">
                <div class="js-title">
                  <h2 class="h2-title"><?php echo e($multilang->salientcompany); ?></h2>
                </div>
                <div class="ads-list-item">
                  <?php if($randomjob != null): ?>
                    <?php $__currentLoopData = $randomjob; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(action('Fontend\JobSearchController@jobsearchdetail',$rd->id)); ?>"><img class="img-fluid" src="<?php echo e(asset("$rd->featured_img")); ?>" alt=""/></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
               
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
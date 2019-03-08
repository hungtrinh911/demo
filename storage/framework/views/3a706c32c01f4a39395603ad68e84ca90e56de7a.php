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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section class="slider">
    <div class="container">
      <div class="gr-slider owl-theme owl-carousel">
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
  <section class="search-form">
    <div class="container">
      <div class="search-form-wrap">
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <form class="d-flex justify-content-between align-items-center" id="serch-form" method="post"
              action="<?php echo e(action('Fontend\GuidereviewController@search')); ?>">
               <?php echo e(csrf_field()); ?>

              <div class="input-form">
                <input class="form-control" type="text" placeholder="ENTER TOURGUIDE..." id="key_word" name="key_word" />
              </div>
              <div class="select-provincial">
                <select class="form-control js-provincial-single select2-hidden-accessible" name="provincial">
                  <option value=""><?php echo e($multilang->city); ?></option>
                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($city->name); ?>"><?php echo e($city->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="select-language">
                <select class="form-control js-language-single select2-hidden-accessible" name="language">
                  <option value=""><?php echo e($multilang->language); ?></option>
                 <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($language->language); ?>"><?php echo e($language->language); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div>
             <button class="btn" type="submit">Search</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <section class="hot-tourguide">
  <div class="container">
    <div class="hot-tourguide-wrap">
      <div class="row">
        <div class="col-xl-6 offset-xl-3">
          <div class="tourguide-title">
            <h2><?php echo e($multilang->hot_tourguide); ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div class="tour-guider d-flex justify-content-between align-items-center">
            <?php $__currentLoopData = $tourguides_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" value="<?php echo e($img_cv = $hot->img_cv); ?>">
            <input type="hidden" value="<?php echo e($id = $hot->id); ?>">
            <div class="item"><a  href="<?php echo e(action('Fontend\GuidereviewController@detail',$id)); ?>"><img class="img-fluid" src="<?php echo e(asset("images/cv/$img_cv")); ?>"alt=""/></a>
              <div class="tour-guilder-info d-flex">
                <div class="logo"><img class="img-fluid" src="<?php echo e(asset("fontend/images/fake-logo.jpg")); ?>" alt=""/></div>
                <div class="info">
                  <h3><a style="color: white;" href="<?php echo e(action('Fontend\GuidereviewController@detail',$id)); ?>"><?php echo e($hot->name); ?></a></h3>
                  <p class="lang">
                   <?php if(\App\Language::getFlag($id) != null): ?>
                   <?php $__currentLoopData = \App\Language::getFlag($id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <img src=" <?php echo e(asset("$flag")); ?>" alt=""/>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                 </p>
                 <p class="rate">                         
                  <?php for( $i=0 ; $i < floor(\App\TourGuide::totalpoint($id)) ;$i++): ?>
                <span class="star"></span>
                <?php endfor; ?>
                <?php if(\App\TourGuide::totalpoint($id) > 0 && (\App\TourGuide::totalpoint($id))/floor(\App\TourGuide::totalpoint($id)) != 1  ): ?>
                <span class="half-star"></span>
                <?php endif; ?>
                <?php for($i=0;$i < floor(5- \App\TourGuide::totalpoint($id)) ;$i++): ?>
                  <span class="blank-star"></span>
                <?php endfor; ?>
                 </p>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
 <section class="list-tourguide">
      <div class="container">
        <div class="list-tourguide-wrap">
          <div class="row">
            <div class="col-xl-6 offset-xl-3">
              <div class="tourguide-title">
                 <h2><?php echo e($multilang->list_tourguide); ?></h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-10 offset-xl-1">
              <div class="list-guider d-flex flex-wrap justify-content-start align-items-center">
                <?php $__currentLoopData = $first_10_tourguide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $first): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" value="<?php echo e($img_cv = $first->img_cv); ?>">
            <input type="hidden" value="<?php echo e($id = $first->id); ?>">
            <div class="guider-item">
              <div class="guider-img"><img class="img-fluid" src="<?php echo e(asset("images/cv/$img_cv")); ?>"alt=""/></div>
              <div class="guider-info">
               <h3><?php echo e($first->name); ?></h3>
               <p class="license"><?php echo e($first->class); ?></p>
               <p class="rate">                         
                <?php for( $i=0 ; $i < floor(\App\TourGuide::totalpoint($id)) ;$i++): ?>
                <span class="star"></span>
                <?php endfor; ?>
                <?php if(\App\TourGuide::totalpoint($id) > 0 && (\App\TourGuide::totalpoint($id))/floor(\App\TourGuide::totalpoint($id)) != 1  ): ?>
                <span class="half-star"></span>
                <?php endif; ?>
                <?php for($i=0;$i < floor(5- \App\TourGuide::totalpoint($id)) ;$i++): ?>
                  <span class="blank-star"></span>
                <?php endfor; ?>
              </p>
              <p class="btn-action"><a class="btn" href="<?php echo e(action('Fontend\GuidereviewController@detail',$id)); ?>"><?php echo e($multilang->viewprofile); ?></a></p>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
          <div id="myDIV" style="display: none;">
          <div  class="list-guider d-flex flex-wrap justify-content-between  align-items-center">
          <?php $__currentLoopData = $more_tour_guide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $more): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="hidden" value="<?php echo e($img_cv = $more->img_cv); ?>">
          <input type="hidden" value="<?php echo e($id = $more->id); ?>">
          <div class="guider-item" >
            <div class="guider-img"><img class="img-fluid" src="<?php echo e(asset("images/cv/$img_cv")); ?>" alt=""/></div>
            <div class="guider-info">
             <h3><?php echo e($more->name); ?></h3>
             <p class="license"><?php echo e($more->class); ?></p>
             <p class="rate">                         
              <?php for( $i=0 ; $i < \App\TourGuide::totalpoint($id)-1 ;$i++): ?>
              <span class="star"></span>
              <?php endfor; ?>
              <?php if( is_int(\App\TourGuide::totalpoint($id)) == false && \App\TourGuide::totalpoint($id) > 0 ): ?>
              <span class="half-star"></span>
              <?php endif; ?>
              <?php for($i=0;$i < 5- \App\TourGuide::totalpoint($id) ;$i++): ?>
                <span class="blank-star"></span>
              <?php endfor; ?>
            </p>
            <p class="btn-action"><a class="btn" href="<?php echo e(action('Fontend\GuidereviewController@detail',$id)); ?>"><?php echo e($multilang->viewprofile); ?></a></p>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php if(empty($more_tour_guide) != false): ?>
               <button class="seeall" id="seeMore"  onclick="myFunction()"><?php echo e($multilang->seemore); ?></button>
      <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- <section class="list-tourguide">
  <div class="container">
    <div class="list-tourguide-wrap">
      <div class="row">
        <div class="col-xl-6 offset-xl-3">
          <div class="tourguide-title">
            <h2><?php echo e($multilang->list_tourguide); ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div class="list-guider d-flex flex-wrap justify-content-between align-items-center">
            <?php $__currentLoopData = $first_10_tourguide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $first): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" value="<?php echo e($img_cv = $first->img_cv); ?>">
            <input type="hidden" value="<?php echo e($id = $first->id); ?>">
            <div class="guider-item">
              <div class="guider-img"><img class="img-fluid" src="<?php echo e(asset("images/cv/$img_cv")); ?>"alt=""/></div>
              <div class="guider-info">
               <h3><?php echo e($first->name); ?></h3>
               <p class="license"><?php echo e($first->class); ?></p>
               <p class="rate">                         
                <?php for( $i=0 ; $i < \App\TourGuide::totalpoint($id) ;$i++): ?>
                <span class="star"></span>
                <?php endfor; ?>
                <?php if(\App\TourGuide::totalpoint($id) > 0 && (\App\TourGuide::totalpoint($id))/(\App\TourGuide::totalpoint($id)) != 1  ): ?>
                <span class="half-star"></span>
                <?php endif; ?>
                <?php for($i=0;$i < 5- \App\TourGuide::totalpoint($id) ;$i++): ?>
                  <span class="blank-star"></span>
                <?php endfor; ?>
              </p>
              <p class="btn-action"><a class="btn" href="<?php echo e(action('Fontend\GuidereviewController@detail',$id)); ?>">view profile</a><a class="btn" href="#">add</a></p>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div id="myDIV" style="display: none;">
          <div  class="list-guider d-flex flex-wrap justify-content-between  align-items-center">
          <?php $__currentLoopData = $more_tour_guide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $more): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="hidden" value="<?php echo e($img_cv = $more->img_cv); ?>">
          <input type="hidden" value="<?php echo e($id = $more->id); ?>">
          <div class="guider-item" >
            <div class="guider-img"><img class="img-fluid" src="<?php echo e(asset("images/cv/$img_cv")); ?>" alt=""/></div>
            <div class="guider-info">
             <h3><?php echo e($more->name); ?></h3>
             <p class="license"><?php echo e($more->class); ?></p>
             <p class="rate">                         
              <?php for( $i=0 ; $i < \App\TourGuide::totalpoint($id)-1 ;$i++): ?>
              <span class="star"></span>
              <?php endfor; ?>
              <?php if( is_int(\App\TourGuide::totalpoint($id)) == false && \App\TourGuide::totalpoint($id) > 0 ): ?>
              <span class="half-star"></span>
              <?php endif; ?>
              <?php for($i=0;$i < 5- \App\TourGuide::totalpoint($id) ;$i++): ?>
                <span class="blank-star"></span>
              <?php endfor; ?>
            </p>
            <p class="btn-action"><a class="btn" href="<?php echo e(action('Fontend\GuidereviewController@detail',$id)); ?>">view profile</a><a class="btn" href="#">add</a></p>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <button class="seeall" id="seeMore"  onclick="myFunction()"><?php echo e($multilang->seemore); ?></button>
            
    </div>
  </div>
</div>
</div>
</div>
</section> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/popper.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/bootstrap.min.js")); ?>"></script>

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
};

  // $(document).ready(function(){
  //   $("#seeMore").click(function(){
  //     $("div#seeAll").toggle();
  //   });
    
  // });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
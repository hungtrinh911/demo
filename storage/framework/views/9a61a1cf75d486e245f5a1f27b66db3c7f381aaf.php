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
    <section id="blog-slider">
      <div class="container">
        <div class="blog-slider owl-theme owl-carousel">
       
          <!-- <div class="item"><img class="img-fluid" src="images/blog-slide-1.png" alt="slide 1"/>
            <div class="description"><a href="#">TOP 10 DANH SÁCH NHỮNG JOB HOT TẠI THÀNH PHỐ HỒ CHÍ MINH</a>
              <p class="desc"><span class="author">Hoàng Đặng</span><span class="times">24/ 9/ 2018</span></p>
            </div>
          </div> -->
          <?php $__currentLoopData = $hotslide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item"><a href="<?php echo e(action('Fontend\TravelBlogController@detail',$item->id)); ?>"><img class="img-fluid" src="<?php echo e(asset("$item->featured_img")); ?>" alt="slide 1"/></a>
            <div class="description"><a href="<?php echo e(action('Fontend\TravelBlogController@detail',$item->id)); ?>"><?php echo e($item->title); ?></a>
            <p class="desc"><span class="author"><?php echo e($item->author_name); ?></span><span class="times"><?php echo e($item->created_at); ?></span></p>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <section id="blog-ads-banner">
      <div class="container">
        <input type="hidden" value="<?php echo e($banner_img =$tb_banner[0]->image); ?>">
        <div class="blog-banner"><a href="#"><img class="img-fluid" src="<?php echo e(asset("$banner_img")); ?>"/></a></div>
      </div>
    </section>
    <section class="blog-main">
      <div class="container">
        <div class="blog-main-wrap">
          <div class="row">
            <div class="col-xl-9">
              <div class="js-title">
                <h2 class="h2-title"><?php echo e($multilang->news); ?></h2>
              </div>
              
               <div class="data-container blog-list"></div>
                <div id="pagination-demo2"></div>
            
             
            </div>
            <div class="col-xl-3">
              <div class="promotion-news">
                <div class="js-title">
                  <h2 class="h2-title"><?php echo e($multilang->promotionnews); ?></h2>
                </div>
                <div class="promotion-list">
                  <?php $__currentLoopData = $travelleft_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item"><a href="<?php echo e(action('Fontend\TravelBlogController@detail',$item->id)); ?>">
                      <div class="item-img"><img class="img-fluid" src="<?php echo e(asset("$item->featured_img")); ?>" alt=""/></div>
                      <div class="item-info">
                        <h3 style=" "><?php echo e($item->title); ?></h3>
                       
                      </div></a></div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="<?php echo e(asset("backend/plugins/sweet-alert2/sweetalert2.min.js")); ?>"></script>
<script src="<?php echo e(asset("fontend/pagination/src/pagination.js")); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(function() {
  (function(name) {
    var container = $('#pagination-' + name);
    var data = <?php echo $travelblog; ?>;
    console.log(data);
    console.log(Array.isArray(data));
    container.pagination({
      dataSource: data,
      locator: 'item',
      totalNumber: 5,
      pageSize: 4,
      ajax: {
        beforeSend: function() {
          container.prev().html('Loading data from serve...');
        }
      },
      callback: function(response, pagination) {
        var dataHtml = ' ';

        $.each(response, function (index, item) {
          id = item.id;
          dataHtml += ' <div class="article"><div class="article-img"><a href="<?php echo e(action('Fontend\TravelBlogController@detail',array('id'=>''))); ?>/' + item.id + '"><img class="img-fluid" src="'+item.featured_img+'"alt=""/></a></div><div class="article-info"><h3><a href="<?php echo e(action('Fontend\TravelBlogController@detail',array('id'=>''))); ?>/' + item.id + '">'+item.title+'</a></h3> <div class="info"><span class="author">'+item.author_name+'</span><span class="times">'+item.created_at+'</span></div><div class="desciption"><p> <p style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap; ">'+item.excerpt+'</p></p></div></div></div></div>'

        });

      
      
        container.prev().html(dataHtml);
      }
    })
  })('demo2');
})
</script>
<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
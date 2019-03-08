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
    <section class="top-employer">
      <div class="container">
        <div class="top-employer-wrap">
        
        </div>
      </div>
    </section>
    <section class="job-collection">
      <div class="container">
        <div class="job-collection-wrap">
          <div class="row">
            <div class="col-xl-9">
              <div class="js-title">
                <h2 class="h2-title"><?php echo e($multilang->new_tc); ?></h2>
              </div>
               <div class="data-container"></div>
                <div id="pagination-demo2"></div>
                <?php if($searched == null): ?>
                 <h2><?php echo e($multilang->result); ?></h2>
                <?php endif; ?>
         
            </div>
            
        </div>
      </div>
    
    </div>
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
    var data = <?php echo $searched; ?>;
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
        var dataHtml = ' <div class="new-jobs-list"> ';

        $.each(response, function (index, item) {
          id=item.id;
          dataHtml += '<div class="item"><div class="job-info"><div class="job-img"><a href="<?php echo e(action('Fontend\TrainingCourseController@detail',array('id'=>''))); ?>/' + item.id + '"><img class="img-fluid" src="'+item.featured_img+'" alt=""/></a></div>  <div class="job-desc"><h3><a href="<?php echo e(action('Fontend\TrainingCourseController@detail',array('id'=>''))); ?>/' + item.id + '">'+item.title+'</a></h3><a href="<?php echo e(action('Fontend\TrainingCourseController@detail',array('id'=>''))); ?>/' + item.id + '"><p class="company">'+item.excerpt+'</p></a> <div class="desciption"><div style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap; ">'+item.description+'</div></div></div></div><div class="job-action"><p class="times">'+item.created_at+'</p></div></div>';

        });

        dataHtml += '</div>';
      
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
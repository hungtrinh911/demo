<?php $__env->startSection('title', 'Thêm Faqs'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/switchery/css/switchery.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/multiselect/css/multi-select.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/select2/css/select2.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css")); ?>"/>
<link rel="stylesheet"
href="<?php echo e(asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/jstree/style.css")); ?>"/>

<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/bootstrap.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/icons.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/style.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/custom.css")); ?>"/>

<script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

  <!-- Page-Title -->
  <div class="row">
    <div class="col-sm-12">

      <h4 class="page-title">Thêm Faqs</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(action('Backend\FaqsController@showFaqs')); ?>">Faqs</a></li>
          <li class="breadcrumb-item active">Thêm</li>
        </ol>

      </div>
    </div>

    <form method="post" class="form-add"
    action="<?php echo e(action('Backend\FaqsController@showAddForm')); ?>">
    <?php echo e(csrf_field()); ?>

      <div class="card-box">
        <div class="row">
           <div class="col-md-12"><?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
           <div class="col-md-10 row">
              <div class="col-md-5">
              <div class="form-group row">
                <label for="locale" class="col-12 col-form-label m-t-15">
                  Ngôn ngữ:
                  <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(\App\Helper::currentLocale() == $item->locale): ?>
                  <?php echo e($item->name); ?>

                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </label>

              </div>              
            </div>
            <div class="col-md-5">
              <div class=" form-group row m-t-20">
                <label for="locale_source_id" class="col-md-3 col-form-label">Bản dịch của</label>
                <select id="locale_source_id " name="locale_source_id" class="col-md-9 selectpicker show-tick form-control"
                data-style="btn-white">
                <?php $__currentLoopData = \App\FormSubmission::orphanList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($item->id); ?>"><?php echo e($item->question); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
           </div>
             <div class="col-md-10">
               <div class="form-group">
                <label>Câu hỏi</label>
                <div>
                  <textarea  class="form-control" id="question" name="question"></textarea>
                </div>
              </div>
            </div>


            <div class="col-md-10">
             <div class="form-group">
              <label>Trả lời</label>
              <div>
                <textarea  class="form-control" id="answer" name="answer"></textarea>
              </div>
            </div>
          </div>  

          <div class="col-md-10">
            <div class="form-group row">
              <label for="" class="col-2 col-form-label">Trạng thái</label>
              <div class="col-9 m-t-5"> 
                <label class="radio-inline">
                  <input type="radio" name="status" id="0" value="0" class="status">ẩn
                </label>
                <label class="radio-inline">
                  <input type="radio" name="status" id="1" value="1" class="status">hiện
                </label>
              </div>
            </div>
          <div class="form-group">
              <div>
                 <button type="submit" class="btn btn-primary waves-effect waves-light">
                    Lưu
                  </button>
              </div>
          </div>
          </div>

      </div>                
    </div>
  </form>

</div> <!-- container -->

<div id="modal-select-img" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel"
aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-full">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="full-width-modalLabel">Ảnh</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body">
      <iframe style="width:100%;" height="500px" frameborder="0"
      src="/backend/plugins/filemanager/dialog.php?type=1&field_id=featured_img&relative_url=1&multiple=0">
    </iframe>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
  var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo e(asset("backend/assets/js/jquery.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/popper.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/bootstrap.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/detect.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/fastclick.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.slimscroll.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.blockUI.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/waves.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/wow.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.nicescroll.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.scrollTo.min.js")); ?>"></script>

<script src="<?php echo e(asset("backend/plugins/jstree/jstree.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/switchery/js/switchery.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/multiselect/js/jquery.multi-select.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/select2/js/select2.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/tinymce/tinymce.min.js")); ?>"></script>

<script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>
<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript">
  $(document).ready(function () {
    $("#content").richer('#content');
    $('#title').slugify({target: '#slug'});

    $.ajax({
      url: '<?php echo e(action('Api\JobSearchController@treeCategory')); ?>', type: 'GET', dataType: 'JSON',
      data: {},
      success: function (data) {
        $('#checkTree').zenTree({
          data: data,
          target: '#categories'
        });
      }
    });
  });

  function responsive_filemanager_callback(field_id) {
    reloadImages(field_id, '/<?php echo e(env('UPLOAD_FOLDER')); ?>/');
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
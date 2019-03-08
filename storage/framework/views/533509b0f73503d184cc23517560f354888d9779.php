<?php $__env->startSection('title', 'Thêm About Us'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/switchery/css/switchery.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/multiselect/css/multi-select.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/select2/css/select2.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css")); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css")); ?>"/>
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

      <h4 class="page-title">Thêm About Us</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(action('Backend\AboutUsController@show')); ?>">About Us</a></li>
          <li class="breadcrumb-item active">Thêm</li>
        </ol>

      </div>
    </div>

    <form method="post" class="form-add"
    action="<?php echo e(action('Backend\AboutUsController@showAddForm')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="card-box">
      <div class="row">
          
        <div class="col-md-10"><?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
           <div class="col-md-10">
             <div class="form-group">
              <label>Nội dung</label>
             <div class="col-lg-12">
                <textarea id="content" name="value"></textarea>
              </div>
            </div>
          </div>
                

        <div class="form-group col-md-10">
          <div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
              Lưu
            </button>
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
        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/<?php echo e(env('UPLOAD_FOLDER')); ?>/');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
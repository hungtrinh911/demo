<?php $__env->startSection('title', 'Thêm TourGuide'); ?>
<?php $__env->startSection('css'); ?>
     <!--  <link href="backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
      <link href="backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
      <link href="backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
      <link href="backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
      <link href="backend/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->

      <link href="<?php echo e(asset("backend/assets/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/bootstrap-example.min.css")); ?>" type="text/css">
      <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/prettify.min.css")); ?>" type="text/css">
      <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/photo.css")); ?>" type="text/css">

      <link href="<?php echo e(asset("backend/assets/css/icons.css")); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(asset("backend/assets/css/style.css")); ?>" rel="stylesheet" type="text/css" />
       <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/photo.js")); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/prettify.min.js")); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/photo.js")); ?>"></script>
      <link href="<?php echo e(asset("backend/assets/css/bootstrap-multiselect.css")); ?>" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/bootstrap-multiselect.js")); ?>"></script>
      <script  src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  
          <!-- ============================================================== -->
          <!-- Start right Content here -->
                  <div class="container-fluid">

                      <!-- Page-Title -->
                      <div class="portlet">
                                  
                                  <div class="clearfix"></div>
                                    
                       <div class="portlet-body">
                      <div class="row">
                          
                              <div class="col-md-12">
                                    <form method="post" class="form-add" action="<?php echo e(action('Backend\TourGuideController@create')); ?>">
                                       <?php echo e(csrf_field()); ?>

                                  
                                      
                                     
                                      <div class="form-group">
                                          <div>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                  Submit
                                              </button>
                                              <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                  Cancel
                                              </button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                             </div><!-- container -->
                                  
                      </div>
                      <!-- end row -->
                    </div>
                  </div> <!-- container -->

             
       
              <footer class="footer text-right">
                  &copy; 2016 - 2018. All rights reserved.
              </footer>

        
      <!-- END wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <script>
          var resizefunc = [];
      </script>

      <!-- jQuery  -->
      <script src="<?php echo e(asset("backend/assets/js/jquery.min.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/popper.min.js")); ?>"></script><!-- Popper for Bootstrap -->
      <script src="<?php echo e(asset("backend/assets/js/bootstrap.min.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/detect.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/fastclick.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/jquery.slimscroll.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/jquery.blockUI.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/waves.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/wow.min.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/jquery.nicescroll.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/jquery.scrollTo.min.js")); ?>"></script>
     

       <script src="<?php echo e(asset("backend/plugins/moment/moment.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/plugins/timepicker/bootstrap-timepicker.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/plugins/clockpicker/js/bootstrap-clockpicker.min.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.js")); ?>"></script>
      
  
      <script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
      <script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>

      <script src="<?php echo e(asset("backend/assets/pages/jquery.form-pickers.init.js")); ?>"></script>
      <script type="text/javascript" src="<?php echo e(asset("backend/plugins/parsleyjs/parsley.min.js")); ?>"></script>
      
      <script type="text/javascript">
          console.log()
          $(document).ready(function() {
              $('form').parsley();
          });
      </script>
       <script type="text/javascript">
              $(document).ready(function() {
                  $('#language').multiselect();
              });
      </script>
      <script type="text/javascript">
        $(document).ready(function() {
        var brand = document.getElementById('logo-id-1');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('pic1').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('.img-preview-1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id-1").change(function() {
            readURL(this);
        });
    });
      </script>
      <script type="text/javascript">
        $(document).ready(function() {
        var brand = document.getElementById('logo-id-2');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('pic2').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('.img-preview-2').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id-2").change(function() {
            readURL(this);
        });
    });
      </script><script type="text/javascript">
        $(document).ready(function() {
        var brand = document.getElementById('logo-id-3');
        brand.className = 'attachment_upload';
        brand.onchange = function() {
            document.getElementById('pic3').value = this.value.substring(12);
        };

        // Source: http://stackoverflow.com/a/4459419/6396981
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('.img-preview-3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo-id-3").change(function() {
            readURL(this);
        });
    });
      </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
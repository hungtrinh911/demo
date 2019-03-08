<?php $__env->startSection('title', 'Danh Sách contact'); ?>
<?php $__env->startSection('css'); ?>
      <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/magnific-popup/css/magnific-popup.css")); ?>" />
      <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/jquery-datatables-editable/dataTables.bootstrap4.min.css")); ?>" />

      <link href="<?php echo e(asset("backend/assets/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
     
      <link href="<?php echo e(asset("backend/assets/css/icons.css")); ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(asset("backend/assets/css/style.css")); ?>" rel="stylesheet" type="text/css" />
   
      <script  src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
          <!-- ============================================================== -->
          <!-- Start right Content here -->
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                      <div class="col-sm-10">
                                        <h4 class="page-title">Danh sách contact</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo e(action('Backend\ContactUsController@index')); ?> ">contact</a></li>
                                            <li class="breadcrumb-item active">Danh sách</li>
                                        </ol>                                         
                                      </div>
                                    </div>
                                    <table class="table table-striped add-edit-table" id="datatable-editable">
                                        <thead>
                                        <tr>
                                            <th>Họ Tên</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="gradeX">
                                            <td><?php echo e($contact->name); ?></td>
                                            <td><?php echo e($contact->email); ?></td>
                                            <td><?php echo e($contact->phone); ?></td>
                                            <input type="hidden" name="" value="<?php echo e($id =$contact->id); ?>">
                                            <td class="actions">
                                               <a href="<?php echo e(action('Backend\ContactUsController@show',['id' =>$id])); ?>"  title="" data-original-title="Chi Tiết"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
                    </div> <!-- container -->


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
     

        <script src="<?php echo e(asset("backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js")); ?>"></script>
        <script src="<?php echo e(asset("backend/plugins/datatables/jquery.dataTables.min.js")); ?>"></script>
        <script src="<?php echo e(asset("backend/plugins/datatables/dataTables.bootstrap4.min.js")); ?>"></script>
        <script src="<?php echo e(asset("backend/plugins/tiny-editable/mindmup-editabletable.js")); ?>"></script>
        <script src="<?php echo e(asset("backend/plugins/tiny-editable/numeric-input-example.js")); ?>"></script>

        <!-- App js -->
        

        <script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
        <script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>

        <script src="<?php echo e(asset("backend/assets/pages/datatables.editable.init.js")); ?>"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title', 'Danh Sách aboutus'); ?>
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
                                        <h4 class="page-title">About Us</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">

                                                <a href="<?php echo e(action('Backend\AboutUsController@show')); ?> ">About Us</a></li>
                                            <li class="breadcrumb-item active">Danh sách</li>
                                        </ol>                                         
                                      </div>
                                      <div class="col-sm-2">
                                            <div class="m-b-30">   
                                              <?php if(count($aboutus) < 1 ): ?>
                                               <a href="<?php echo e(action('Backend\AboutUsController@showAddForm')); ?> " class="btn btn-default">Thêm Mới</a>
                                              <?php endif; ?>                       
                                            </div>
                                      </div>
                                    </div>
                                    <table class="table table-striped add-edit-table" id="datatable-editable">
                                        <thead>
                                        <tr>
                                            <th>Ngôn ngữ</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $aboutus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="gradeX">
                                            <td>
                                <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($about->locale == $item->locale): ?>
                                        <?php echo e($item->name); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                            <div style="display: none;"><?php echo e($key = $about->key); ?></div>
                                            <td class="actions">
                                               <a href="<?php echo e(action('Backend\AboutUsController@showEditForm',['key'=>$key])); ?>"  title="" data-original-title="Chi Tiết"><i class="fa fa-edit"></i></a>
                                              <!-- <a href="javascript:;"
                                                   class="on-default remove-rơ tẽt-danger grid-btn-delete"
                                                   dât-placement="top" title="" dât-original-title="Delete"
                                                   dât-toggle="modal" dât-target=".modal-delete"
                                                   dât-href="Ơ action('Backend\AboutUsController@destroy',ơ'key'=>$key]) Ư">
                                                    <i class="fa fa-trash-o"></i></a> -->
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
 <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Xóa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    Bạn đồng ý xóa?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    <form method="post" class="form-delete">
                       <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger waves-effect waves-light">Xóa</button>
                    </form>
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
           <script type="text/javascript">
        $(document).ready(function () {
           
            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });
        });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
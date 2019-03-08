<?php $__env->startSection('title', 'Thêm TourGuide'); ?>
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
                                      <div class="col-sm-8">
                                        <h4 class="page-title">Danh sách TourGuide</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo e(action('Backend\TourGuideController@index')); ?> ">Tour Guide</a></li>
                                            <li class="breadcrumb-item active">Danh sách</li>
                                        </ol>                                         
                                      </div>
                                        <div class="col-sm-1">
                                            <div class="m-b-30">
                                               <a href="<?php echo e(action('Backend\TourGuideController@create')); ?> " class="btn btn-default">Thêm Mới</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="m-b-30">
                                               <a href="<?php echo e(action('Backend\TourGuideController@createAccount')); ?> " class="btn btn-default">Tạo tài khoản</a>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped add-edit-table" id="datatable-editable">
                                        <thead>
                                        <tr>
                                            <th>Họ Tên</th>
                                            <th>Rank</th>
                                            <th>Trạng Thái</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $tourguides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tourguide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="gradeX">
                                            <td><?php echo e($tourguide->name); ?></td>
                                            <td><?php echo e($tourguide->class); ?></td>
                                            <?php if($tourguide->status == 0): ?>
                                            <td>tạm dừng</td>
                                            <?php endif; ?>
                                            <?php if($tourguide->status == 1): ?>
                                            <td>hoạt động</td>
                                            <?php endif; ?>
                                            <input type="hidden" name="" value="<?php echo e($id =$tourguide->id); ?>">
                                            <td class="actions">
                                                <a href="<?php echo e(action('Backend\TourGuideController@show_skill',['id' => $id])); ?>"  title="" data-original-title="Chi Tiết"><i class="fa fa-save"></i></a>
                                                <a href="<?php echo e(action('Backend\TourGuideController@edit',['id' => $id])); ?>"  title="" data-original-title="Sửa"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(action('Backend\TourGuideController@destroy',['id'=>$id])); ?>"  title="" data-original-title="Xóa"><i class="fa fa-trash-o"></i></a>

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

                        <button type="button" class="btn btn-danger waves-effect waves-light">Xóa</button>
                        <input type="hidden" id="ids" name="ids" value="">
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
             $(document).ready(function () {
              
                $('.form-delete').on('click', function () {
                    event.preventDefault();
                    console.log($(this).serialize());
                    $.ajax({
                        url: '<?php echo e(action('Api\UserController@delete')); ?>', type: 'POST', dataType: 'JSON',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                        },
                        data: $(this).serialize(),
                        success: function (data) {
                            console.log(data);
                            $table.bootstrapTable('refresh', {silent: true});
                        }
                    });
                });
             });
            function gridAction(value, row) {
            var actions = '';

            <?php if(Auth::user()->can('delete-tourguide')): ?>
                actions += '<a href="<?php echo e(action('Backend\TourGuideController@destroy', array('id'=>''))); ?>" class="on-default remove-row text-danger grid-btn-delete" data-id="' + row.id + '" data-toggle="modal" data-target=".modal-delete"><i data-id="' + row.id + '" class="fa fa-trash-o grid-btn-delete"></i></a> ';
            <?php endif; ?>
                return actions;
        }
        </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title', 'Chuyên mục TrainingCourse'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/switchery/css/switchery.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/multiselect/css/multi-select.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/select2/css/select2.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css")); ?>"/>
    <link rel="stylesheet"
          href="<?php echo e(asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css")); ?>"/>

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
                <div class="btn-group pull-right m-t-15">
                    <a href="<?php echo e(action('Backend\TrainingCourseController@category')); ?>" class="btn btn-default">
                        <i class="fa fa-plus"></i></a>
                </div>

                <h4 class="page-title">Chuyên mục TrainingCourse</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(action('Backend\TrainingCourseController@index')); ?>">TrainingCourse</a></li>
                    <li class="breadcrumb-item active">Chuyên mục</li>
                </ol>

            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-form">
                <div class="card-box">

                    <form method="post" class="form-add d-none"
                          action="<?php echo e(action('Backend\TrainingCourseController@addCategory')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="id" name="id" value="<?php echo e($term->id); ?>">

                        <div class="form-group">
                            <?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="form-group">
                            <label for="name">Tên<span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e($term->name); ?>">
                        </div>

                        <div class="form-group">
                            <label for="slug">Chuỗi đường dẫn tĩnh<span class="text-danger">*</span></label>
                            <input type="text" id="slug" name="slug" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e($term->slug); ?>">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Mục cha</label>
                            <select id="parent_id" name="parent_id" class="selectpicker show-tick"
                                    data-style="btn-white">
                                <?php $__currentLoopData = \App\NewsCategory::treeTrainingCourse('', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="locale_source_id">Bản dịch của</label>
                            <select id="locale_source_id" name="locale_source_id" class="selectpicker show-tick"
                                    data-style="btn-white">
                                <option value="0">----------</option>
                                <?php $__currentLoopData = \App\NewsCategory::orphanListTrainingCourse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Thêm</button>
                        </div>
                    </form>

                    <form method="post" class="form-edit d-none"
                          action="<?php echo e(action('Backend\TrainingCourseController@editCategory', array('id', $term->id))); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="id" name="id" value="<?php echo e($term->id); ?>">

                        <div class="form-group">
                            <?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="form-group">
                            <label for="name">Tên<span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e($term->name); ?>">
                        </div>

                        <div class="form-group">
                            <label for="slug">Chuỗi đường dẫn tĩnh<span class="text-danger">*</span></label>
                            <input type="text" id="slug" name="slug" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e($term->slug); ?>">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Mục cha</label>
                            <select id="parent_id" name="parent_id" class="selectpicker show-tick"
                                    data-style="btn-white">
                                <?php $__currentLoopData = \App\NewsCategory::treeTrainingCourse('', true, '---', request()->route('id')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php if($term->parent_id == $item->id): ?>)
                                            selected <?php endif; ?>><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="locale_source_id">Bản dịch của</label>
                            <select id="locale_source_id" name="locale_source_id" class="selectpicker show-tick"
                                    data-style="btn-white">
                                <option value="0">----------</option>
                                <?php $__currentLoopData = \App\NewsCategory::orphanListTrainingCourse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Cập nhật</button>
                        </div>
                    </form>

                </div> <!-- end card-box -->
            </div>
            <!-- end col -->

            <div class="col-lg-8 col-grid">
                <div class="card-box">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            
                            <th>Tên</th>
                            <th>Chuỗi tĩnh</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = \App\NewsCategory::treeTrainingCourse('', false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->slug); ?></td>
                                <td class="actions">
                                    <?php if(Auth::user()->can('edit-news_category')): ?>
                                        <a href="<?php echo e(action('Backend\TrainingCourseController@showEditCategoryForm', array('id'=>$item->id))); ?>"
                                           class="on-default edit-row text-primary" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="Edit"><i
                                                    class="fa fa-pencil"></i></a>
                                    <?php endif; ?>
                                    <?php if(Auth::user()->can('delete-news_category')): ?>
                                        <a href="javascript:;"
                                           class="on-default remove-row text-danger grid-btn-delete"
                                           data-placement="top" title="" data-original-title="Delete"
                                           data-toggle="modal" data-target=".modal-delete"
                                           data-href="<?php echo e(action('Backend\TrainingCourseController@deleteCategory', array('id'=>$item->id))); ?>">
                                            <i class="fa fa-trash-o"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- end row -->

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

    <script src="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/switchery/js/switchery.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/multiselect/js/jquery.multi-select.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/select2/js/select2.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js")); ?>"></script>

    <script src="<?php echo e(asset("backend/plugins/autocomplete/jquery.mockjax.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/autocomplete/jquery.autocomplete.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/autocomplete/countries.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/assets/pages/autocomplete.js")); ?>"></script>

    <script src="<?php echo e(asset("backend/assets/pages/jquery.form-advanced.init.js")); ?>"></script>

    <script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>
    <?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">
        $(document).ready(function () {
            <?php if((!Auth::user()->can('add-news_category') and !Auth::user()->can('edit-news_category'))): ?>
            $('.col-form').remove();
            $('.col-grid').removeClass('col-lg-8').addClass('col-lg-12');
            <?php endif; ?>

            <?php if(Auth::user()->can('add-news_category') and $term->id <= 0): ?>
            $('.form-add').removeClass('d-none');
            $('.form-edit').remove();
            <?php endif; ?>

            <?php if(Auth::user()->can('edit-news_category') and $term->id > 0): ?>
            $('.form-add').remove();
            $('.form-edit').removeClass('d-none');
            <?php endif; ?>

            $('#name').on('keyup change', function () {
                $('#slug').val(slugify($(this).val()));
            });

            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
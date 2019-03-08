<?php $__env->startSection('title', 'Cập nhật TrainingCourse'); ?>
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

                <h4 class="page-title">Cập nhật TrainingCourse</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(action('Backend\TrainingCourseController@index')); ?>">TrainingCourse</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>

            </div>
        </div>

        <form method="post" class="form-add"
              action="<?php echo e(action('Backend\TrainingCourseController@edit', array('id'=>$thing->id))); ?>">
              <?php echo e(csrf_field()); ?>

            <input type="hidden" id="id" name="id" value="<?php echo e($thing->id); ?>">
            <input type="hidden" id="categories" name="categories" value="<?php echo e($thing->categories); ?>">
             <div class="row">
                <div class="col-lg-9">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" id="title" name="title" value="<?php echo e($thing->title); ?>"
                                       parsley-trigger="change" required placeholder="Tiêu đề" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="slug" name="slug" value="<?php echo e($thing->slug); ?>"
                                       parsley-trigger="change" required placeholder="Chuỗi đường dẫn tĩnh"
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <textarea id="excerpt" name="excerpt" class="form-control" rows="3"
                                          placeholder="Tóm tắt"><?php echo e($thing->excerpt); ?></textarea>
                            </div>

                            <div class="col-lg-3">
                                <div class="tags-default tags-beside-textarea">
                                    <input type="text" id="tags" name="tags" value="<?php echo e($thing->tags); ?>"
                                           data-role="tagsinput"
                                           placeholder="thêm từ khóa"/>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row h-100">
                                    <div class="col-lg-4">
                                        <button type="button" id="btn-select-img"
                                                class="btn btn-default waves-effect waves-light w-100 h-50"
                                                data-toggle="modal" data-target="#modal-select-img">
                                            Ảnh
                                        </button>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="hidden" id="featured_img" name="featured_img"
                                               value="<?php echo e($thing->featured_img); ?>">
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="locale_source_id">Bản dịch của</label>
                                <select id="locale_source_id" name="locale_source_id" class="selectpicker show-tick"
                                        data-style="btn-white">
                                    <?php $__currentLoopData = \App\News::orphanListTrainingCourseEdit($thing->locale,true,'trainingcourse',$thing->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea id="content" name="content"><?php echo e($thing->content); ?></textarea>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="card-box">

                        <?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="form-group row">
                            <label for="locale" class="col-12 col-form-label">
                                Ngôn ngữ:
                                <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($thing->locale == $item->locale): ?>
                                        <?php echo e($item->name); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </label>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-6 col-form-label">Trạng thái</label>
                            <input type="checkbox" id="status" name="status" data-plugin="switchery"
                                   data-color="#f05050" data-size="small"
                                   <?php if($thing->status == 'publish'): ?> checked <?php endif; ?>/>
                        </div>
                         <div class="form-group">
                            <label for="status" class="col-6 col-form-label">Hot</label>
                            <input type="checkbox" id="hot" name="hot" data-plugin="switchery"
                                   data-color="#f05050" data-size="small"
                                   <?php if(old('status') == 'on'): ?> checked <?php endif; ?>/>
                        </div>
                        <div class="form-group">
                           
                                
                                    <h4 class="m-t-0 header-title">Chuyên mục</h4>
                                    <hr/>
                                    <div id="checkTree"></div>
                             
                            
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Cập nhật
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
                    <h4 class="modal-title" id="full-width-modalLabel">Chọn ảnh</h4>
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
                url: '<?php echo e(action('Api\TrainingCourseController@treeCategory')); ?>', type: 'GET', dataType: 'JSON',
                data: { locale: '<?php echo e($thing->locale); ?>' },
                success: function (data) {
                    $('#checkTree').zenTree({
                        data: data,
                        target: '#categories'
                    });
                }
            });

            reloadImages('featured_img', '');
        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/<?php echo e(env('UPLOAD_FOLDER')); ?>/');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
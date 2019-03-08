<?php $__env->startSection('title', 'Thêm user'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/bootstrap.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/plugins/jstree/style.css")); ?>"/>

    <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/icons.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/style.css")); ?>"/>
    <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    
                    <i class="fa fa-plus"></i></a>
                </div>

                <h4 class="page-title">Thêm user</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(action('Backend\TourGuideController@index')); ?>">Tour Guide</a></li>
                    <li class="breadcrumb-item active">Thêm user</li>
                </ol>
            </div>
        </div>
        <form method="post" class="form-add" action="<?php echo e(action('Backend\TourGuideController@createAccount')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">
                        
                        <div class="form-group">
                            <?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Username<span class="text-danger">*</span></label>
                            <input type="text" id="username" name="username" parsley-trigger="change" required
                                   placeholder="Tên phải trùng với tên TourGuide" class="form-control" value="<?php echo e(old('username')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="slug">Email<span class="text-danger">*</span></label>
                            <input type="text" id="email" name="email" parsley-trigger="change" required
                                   placeholder="Email phải trùng với email TourGuide" class="form-control" value="<?php echo e(old('email')); ?>">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Thêm</button>
                        </div>

                        <input type="hidden" value="" name="list-roles" class="js-list-permission"/>

                    </div> <!-- end card-box -->


                </div>
                <!-- end col -->

           

            </div>
        </form>
        <!-- end row -->

    </div> <!-- container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        var resizefunc = [];
    </script>

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

    <script src="<?php echo e(asset("backend/plugins/jstree/jstree.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-table/js/bootstrap-table.js")); ?>"></script>

    <script src="<?php echo e(asset("backend/assets/pages/jquery.bs-table.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/assets/pages/jquery.tree.js")); ?>"></script>

    <script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>

    <?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
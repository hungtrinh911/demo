<?php $__env->startSection('title', ' user'); ?>
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

                <h4 class="page-title">Sửa user</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(action('Backend\UserController@index')); ?>">Users</a></li>
                    <li class="breadcrumb-item active">Sửa user</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add"
              action="<?php echo e(action('Backend\UserController@edit', array('id'=>$user->id))); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">
                        <input type="hidden" id="id" name="id" value="<?php echo e($user->id); ?>">
                        <div class="form-group">
                            <?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="form-group">
                            <label for="name">Username<span class="text-danger">*</span></label>
                            <input type="text" id="username" name="username" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e($user->username); ?>">
                        </div>

                        <div class="form-group">
                            <label for="slug">Email<span class="text-danger">*</span></label>
                            <input type="text" id="email" name="email" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e($user->email); ?>">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Sửa</button>
                        </div>

                        <input type="hidden" value="" name="list-roles" class="js-list-permission"/>

                    </div> <!-- end card-box -->


                </div>
                <!-- end col -->

                <div class="col-lg-8 col-grid">
                    <div class="card-box">
                        
                        <h4 class="m-t-0 header-title">Danh sách roles</h4>
                        <hr>

                        <div id="checkTree"
                             class="jstree jstree-1 jstree-default jstree-checkbox-selection jstree-closed"
                             role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1"
                             aria-busy="false">
                            <ul class="jstree-container-ul jstree-children" role="group">

                                <?php $__currentLoopData = \App\Role::getAllApi(Auth::user()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li role="treeitem" aria-selected="false" aria-level="1"
                                        aria-labelledby="j1_1_anchor"
                                        aria-expanded="true" id="<?php echo e($item->id); ?>" class="jstree-node  jstree-open"><i
                                                class="jstree-icon jstree-ocl" role="presentation"></i><a
                                                class="jstree-anchor"
                                                href="#" tabindex="-1"
                                                id="j1_1_anchor-<?php echo e($item->id); ?>"><i
                                                    class="jstree-icon jstree-checkbox jstree-undetermined"
                                                    role="presentation"></i><i
                                                    class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom"
                                                    role="presentation"></i> <?php echo e($item->name); ?>

                                        </a>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

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

            var $table = $('#grid');

            $table.on('page-change.bs.table', function (e, number, size, search) {
                var offset = (number - 1) * size;
                $table.bootstrapTable('refresh', {
                    offset: offset,
                    limit: size,
                    search: search
                });
            });

            $('form').parsley();

            //$('#name').slugify({target: '#slug'});

            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });

            var role_list = [];
            $("#checkTree").bind("select_node.jstree", function (evt, data) {
                role_list = [];
                getPermissionList(evt, data);
            });

            $("#checkTree").on("deselect_node.jstree", function (evt, data) {
                console.log('unbind');
                role_list = [];
                getPermissionList(evt, data);
            });

            var getPermissionList = function (evt, data) {
                var selected = $('#checkTree').jstree("get_selected");
                var selected_arr = (selected + '').split(",");
                $.each(selected_arr, function (key, value) {
                    if (role_list.indexOf(value) < 0) {
                        role_list.push(value);
                    }
                });
                console.log(role_list.toString());
                $('.js-list-permission').val(role_list.toString());
            };

        });

        $("#checkTree")
            .bind("loaded.jstree", function (event, data) {
                <?php $__currentLoopData = $jsRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $node): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                $('#checkTree').jstree('select_node', <?php echo e($node); ?>);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
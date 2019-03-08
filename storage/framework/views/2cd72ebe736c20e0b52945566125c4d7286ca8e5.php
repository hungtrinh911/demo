<?php $__env->startSection('title', 'Thêm quyền'); ?>
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

                <h4 class="page-title">Thêm quyền</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(action('Backend\RoleController@index')); ?>">Quyền</a></li>
                    <li class="breadcrumb-item active">Thêm quyền</li>
                </ol>

            </div>
        </div>
        <form method="post" class="form-add" action="<?php echo e(action('Backend\RoleController@add')); ?>">
           <?php echo e(csrf_field()); ?>

        <div class="row">

                <div class="col-lg-4 col-form">
                    <div class="card-box">


                        

                        <div class="form-group">
                            <?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="form-group">
                            <label for="name">Tên<span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e(old('name')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="slug">Chuỗi đường dẫn tĩnh<span class="text-danger">*</span></label>
                            <input type="text" id="slug" name="slug" parsley-trigger="change" required
                                   placeholder="" class="form-control" value="<?php echo e(old('slug')); ?>">
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Thêm</button>
                        </div>


                        <input type="hidden" value="" name="list-permission" class="js-list-permission"/>


                    </div> <!-- end card-box -->


                </div>
                <!-- end col -->

                <div class="col-lg-8 col-grid">
                    <div class="card-box">
                        
                        <h4 class="m-t-0 header-title">Danh sách quyền</h4>
                        <hr>

                        <div id="checkTree"
                             class="jstree jstree-1 jstree-default jstree-checkbox-selection jstree-closed"
                             role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1"
                             aria-busy="false">
                            <ul class="jstree-container-ul jstree-children" role="group">

                                <?php $__currentLoopData = \App\Permission::getAll(true,0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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

                                        
                                        
                                        <?php if(array_key_exists('hasChild', (array)json_decode($item->metadata))): ?> {
                                        <ul role="group" class="jschildren">
                                            <?php ($childPermissions = \App\Permission::getAll(false,$item->id)); ?>
                                            <?php $__currentLoopData = $childPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li role="treeitem" data-jstree="{&quot;opened&quot;:true}"
                                                    aria-selected="false"
                                                    aria-level="2" aria-labelledby="j1_2_anchor" aria-expanded="true"
                                                    id="<?php echo e($subitem->id); ?>" class="jstree-node  jstree-open">
                                                    <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                                    <a class="jstree-anchor" href="#" tabindex="-1"
                                                       id="j1_2_anchor-<?php echo e($subitem->id); ?>">
                                                        <i class="jstree-icon jstree-checkbox jstree-undetermined"
                                                           role="presentation"></i>
                                                        <i class="jstree-icon jstree-themeicon fa fa-folder jstree-themeicon-custom"
                                                           role="presentation"></i><?php echo e($subitem->name); ?>

                                                    </a>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        }
                                        <?php endif; ?>

                                        
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

            $('#name').slugify({target: '#slug'});

            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });




            var permission_list = [];
            $("#checkTree").bind("select_node.jstree", function (evt, data) {
                permission_list = [];
                getPermissionList(evt, data);
            });

            $("#checkTree").on("deselect_node.jstree", function (evt, data) {
                console.log('unbind');
                permission_list = [];
                getPermissionList(evt, data);
            });

            var getPermissionList = function (evt, data) {
                var selected = $('#checkTree').jstree("get_selected");
                var selected_parent = data.instance.get_node().id;
               // console.log(selected_parent);
                var selected_arr = (selected + '').split(",");
                $.each(selected_arr, function (key, value) {
                    if (permission_list.indexOf(value) < 0) {
                        permission_list.push(value);
                        if (permission_list.indexOf(selected_parent) < 0) {
                            permission_list.push(selected_parent);
                        }
                    }
                });
                console.log(permission_list.toString());
                $('.js-list-permission').val(permission_list.toString());
            };


            // Hien thi tree sau khi them xong
            <?php if(Session::get('jstreePermission') != null): ?>

            <?php foreach(Session::get('jstreePermission') as $node): ?>
                $('.jstree').jstree(true).select_node('<?=$node?>');
            <?php endforeach ?>

            <?php endif; ?>

        });

        function gridAction(value, row) {
            var actions = '';
            <?php if(Auth::user()->can('edit-role')): ?>
                actions += '<a href="<?php echo e(action('Backend\RoleController@showEditForm', array('id'=>''))); ?>/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a> ';
            <?php endif; ?>
                    <?php if(Auth::user()->can('delete-role')): ?>
                actions += '<a href="javascript:;" class="on-default remove-row text-danger grid-btn-delete" data-id="' + row.id + '" data-toggle="modal" data-target=".modal-delete"><i data-id="' + row.id + '" class="fa fa-trash-o grid-btn-delete"></i></a> ';
            <?php endif; ?>
                return actions;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
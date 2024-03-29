<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiveReal</title>
    <link href="<?php echo e(asset("backend/assets/css/login/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset("backend/assets/css/login/icons.css")); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset("backend/assets/css/login/style.css")); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>

<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <div class="text-error"><span class="text-primary">4</span><i class="ti-face-sad text-pink"></i><span class="text-info">3</span></div>
        <h2 class="text-white">Forbidden</h2><br>
        <p class="text-muted">Bạn chưa được cấp quyền thực hiện chức năng này.</p>
        <br>
        <a class="btn btn-danger waves-effect waves-light" href="<?php echo e(URL::previous()); ?>">Quay lại</a>&nbsp;&nbsp;
    </div>
</div>


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

<script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>

</body>
</html>
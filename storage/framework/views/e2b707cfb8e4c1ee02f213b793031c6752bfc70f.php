	
	<?php $__env->startSection('title', 'Thêm user'); ?>
	<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="<?php echo e(asset("backend/plugins/timepicker/bootstrap-timepicker.min.css")); ?>" rel="stylesheet">
	<link href="<?php echo e(asset("backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")); ?>" rel="stylesheet">
	<link href="<?php echo e(asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css")); ?>" rel="stylesheet">
	      <!-- <link href="<?php echo e(asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker1.min.css")); ?>" rel="stylesheet">
	      	<link href="<?php echo e(asset("backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker2.min.css")); ?>" rel="stylesheet"> -->
	      	<link href="<?php echo e(asset("backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css")); ?>" rel="stylesheet">
	      	<link href="<?php echo e(asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.css")); ?>" rel="stylesheet">

	      	<link href="<?php echo e(asset("backend/assets/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
	      	<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/bootstrap-example.min.css")); ?>" type="text/css">
	      	<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/prettify.min.css")); ?>" type="text/css">
	      	<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/photo.css")); ?>" type="text/css">
	      	<link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/custom.css")); ?>" type="text/css">

	      	<link href="<?php echo e(asset("backend/assets/css/icons.css")); ?>" rel="stylesheet" type="text/css" />
	      	<link href="<?php echo e(asset("backend/assets/css/style.css")); ?>" rel="stylesheet" type="text/css" />

	      	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	      	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	      	<script type="text/javascript" src="<?php echo e(asset("backend/assets/js/photo.js")); ?>"></script>
	      	<script type="text/javascript" src="<?php echo e(asset("backend/assets/js/prettify.min.js")); ?>"></script>
	      	<script type="text/javascript" src="<?php echo e(asset("backend/assets/js/photo.js")); ?>"></script>
	      	<link href="<?php echo e(asset("backend/assets/css/bootstrap-multiselect.css")); ?>" rel="stylesheet" type="text/css" />
	      	<script type="text/javascript" src="<?php echo e(asset("backend/assets/js/bootstrap-multiselect.js")); ?>"></script>
	      	<script  src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
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
	      				<form method="post" class="form-add" action="<?php echo e(action('Backend\FreeTourGuideController@check')); ?>">
	      					<?php echo e(csrf_field()); ?>

	      					<div class="row">

	      						<div class="col-md-10 col-form">
	      							<div class="card-box">

	      								<div class="form-group">
	      									<?php echo $__env->make('backend.shared.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	      								</div>
	      								<div class="card-box">
	      									<div class="row">
	      										<div class="col-md-12">
	      											<div class="form-group">
	      												<label for="start" class="text-uppercase" style="color: dodgerblue" >Tìm Tour Guide không bận trong khoảng</label>
	      												<div>
	      													<div class="input-daterange input-group" id="date-range">
	      														<input type="text" class="form-control" name="start" id="start" value="<?php echo e(old('start')); ?>" />
	      														<input type="text" class="form-control" name="end"  id="end" value="<?php echo e(old('end')); ?>" />
	      													</div>
	      												</div>
	      											</div>  
	      											<div class="form-group text-right m-b-0">
	      												<button class="btn btn-primary waves-effect waves-light" type="submit">Tìm</button>
	      											</div>
	      										</div>
	      										<div class="col-md-12">
													<?php if($free != null): ?>
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
		      													<?php $__currentLoopData = $free; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tourguide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
													<?php endif; ?>
													<?php if($free == null): ?>
													<span class="text-uppercase">Mọi người đều bận hết rồi :D</span>
													<?php endif; ?>
	      										</div>
	      									</div>
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
	      <!-- <script src="<?php echo e(asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker1.min.js")); ?>"></script>
	      	<script src="<?php echo e(asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker2.min.js")); ?>"></script> -->
	      	<script src="<?php echo e(asset("backend/plugins/clockpicker/js/bootstrap-clockpicker.min.js")); ?>"></script>
	      	<script src="<?php echo e(asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.js")); ?>"></script>


	      	<script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
	      	<script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>

	      	<script src="<?php echo e(asset("backend/assets/pages/jquery.form-pickers.init.js")); ?>"></script>
	      	<script type="text/javascript" src="<?php echo e(asset("backend/plugins/parsleyjs/parsley.min.js")); ?>"></script>
	      	<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	      	<script type="text/javascript">
	      		$(document).ready(function () {
	      			$('form').parsley();
	      		});
	      	</script>
	      	<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
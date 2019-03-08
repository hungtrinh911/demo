<?php $__env->startSection('title', 'Thêm TourGuide'); ?>
<?php $__env->startSection('css'); ?>
 <!--  <link href="backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
  <link href="backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="backend/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
  <link href="backend/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> -->

  <link href="<?php echo e(asset("backend/assets/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/bootstrap-example.min.css")); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/prettify.min.css")); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/photo.css")); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/custom.css")); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/profile.min.css")); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset("backend/assets/css/ticket.min.css")); ?>" type="text/css">

  <link href="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css")); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset("backend/plugins/switchery/css/switchery.min.css")); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset("backend/plugins/multiselect/css/multi-select.css")); ?>"  rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset("backend/plugins/select2/css/select2.min.css")); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css")); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css")); ?>" rel="stylesheet" />
   <link href="<?php echo e(asset("backend/plugins/summernote/summernote-bs4.css")); ?>" rel="stylesheet" />

  <link href="<?php echo e(asset("backend/assets/css/icons.css")); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset("backend/assets/css/style.css")); ?>" rel="stylesheet" type="text/css" />
  <!-- <link href="<?php echo e(asset("backend/assets/cssicheck/custom.css?v=1.0.2")); ?>" rel="stylesheet">
  <link href="<?php echo e(asset("backend/assets/skins/all.css?v=1.0.2")); ?>" rel="stylesheet">
  <script src="<?php echo e(asset("backend/assets/jsicheck/jquery.js")); ?>"></script>
  <script src="<?php echo e(asset("backend/assets/icheck.js?v=1.0.2")); ?>"></script>
  <script src="<?php echo e(asset("backend/assets/jsicheck/custom.min.js?v=1.0.2")); ?>"></script> -->


  <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/jquery.min.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/photo.js")); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/prettify.min.js")); ?>"></script>
  <link href="<?php echo e(asset("backend/assets/css/bootstrap-multiselect.css")); ?>" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo e(asset("backend/assets/js/bootstrap-multiselect.js")); ?>"></script>
  <script  src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
  <div style="display: none;">  <?php echo e($img_cv = $tourguides->img_cv); ?></div>
  <div style="display: none;">  <?php echo e($ids = $tourguides->id); ?></div>
  <div class="container-fluid">
    <ul class="page-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(action('Backend\BackendController@dashboard')); ?>"><i class="fa fa-home"></i>Bảng Tin</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(action('Backend\TourGuideController@index')); ?>">TourGuide</a></li>
      <li class="breadcrumb-item active">Thêm kĩ năng</li>
    </ul>
    <div class="row">
    <div class="col-md-12">
     <div class="profile-sidebar">
        <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet bordered">
                <div class="profile-userpic">
                  <img  src="<?php echo e(asset("images/$img_cv")); ?>" class="rounded-circle" alt="<?php echo e($tourguides->name); ?>">
                </div>
                <div class="profile-usertitle">
                  <div class="profile-usertitle-name"><?php echo e($tourguides->name); ?></div>
                  <div class="profile-usertitle-job"><?php echo e($tourguides->class); ?></div>
                </div>
                
                <div class="profile-userbuttons">
                  <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Update</button>
                  <button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Close</button>
                </div>
               
                <div class="profile-usermenu">
                  <ul class="">
                    <li><a href="<?php echo e(action('Backend\TourGuideController@showprofile',['id'=>$ids])); ?>"><i class="fa fa-home" "></i>Thông Tin Cá Nhân</a></li>
                    <li><a href="<?php echo e(action('Backend\TourGuideController@show_skill',['id' => $ids])); ?>"><i class="fa fa-cog "></i>Kĩ Năng Nghề Nghiệp</a></li>
                    <li><a href=""><i class="fa fa-comments"></i>Comments</a></li>
                  </ul>
                </div>
            </div>
      <!--END-->
            <div class="portlet light bordered">
      <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 37 </div>
                        <div class="uppercase profile-stat-text"> Comments </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 51 </div>
                        <div class="uppercase profile-stat-text"> Views </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> 61 </div>
                        <div class="uppercase profile-stat-text"> Votes </div>
                    </div>
                </div>
                <!-- END STAT -->
             
            </div>
          </div>

          <div class="app-ticket app-ticket-details">
             <!-- 
              <div class="portlet">
                <div class="portlet-body">
                 <div class="row"> -->
                  <div class="col-md-12">
                    <input type="hidden" name="" value="<?php echo e($id =$tourguides->id); ?>">
                    <form method="post" class="form-add" action="<?php echo e(action('Backend\TourGuideController@show_skill',['id' => $id])); ?>" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <div class=" card-box">
                     <div class="form-group ">
                      <label for="" class="text-uppercase" style="color: dodgerblue">Ngôn Ngữ</label>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <?php $__currentLoopData = $tourguide_lang1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="checkbox checkbox-primary">
                            <input id="<?php echo e($lang1->id); ?>" class="lang" type="checkbox" name="languages[]" value="<?php echo e($lang1->id); ?>"  >
                            <label for="<?php echo e($lang1->id); ?>">
                             <?php echo e($lang1->language); ?> 
                           </label>
                         </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                       </div>
                       <div class="col-md-6">
                        <?php $__currentLoopData = $tourguide_lang2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkbox checkbox-primary">
                          <input id="<?php echo e($lang2->id); ?>" class="lang" type="checkbox" name="languages[]" value="<?php echo e($lang2->id); ?>"  >
                          <label for="<?php echo e($lang2->id); ?>">
                           <?php echo e($lang2->language); ?> 
                         </label>
                       </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                     </div>
                   </div>

                 </div>
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Khác</label>
                      <div>
                        <textarea  class="form-control" id="lang" name="lang" value=><?php echo e($tourguides->language); ?></textarea>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                   <div>
                     <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_language">
                      Lưu
                    </button>
                    
                  </div>
                </div>    
                </div>  
                </div>

                <!--role-->   
                  <div class=" card-box">
                     <div class="form-group">
                      <label for="" class="text-uppercase" style="color: dodgerblue">Những vai trò có thể đảm nhiệm khi dẫn đoàn</label> 
                      <hr>
                      <div class="row">
                      <div class="col-md-6">
                      <?php $__currentLoopData = $tourguide_role1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="checkbox checkbox-primary">
                              <input id="<?php echo e($role1->id +20); ?>" class="role" type="checkbox" name="roles[]" value="<?php echo e($role1->id); ?>"  >
                                <label for="<?php echo e($role1->id +20); ?>">
                                   <?php echo e($role1->name); ?> 
                                </label>
                             </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </div>
                        <div class="col-md-6">
                      <?php $__currentLoopData = $tourguide_role2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="checkbox checkbox-primary">
                              <input id="<?php echo e($role2->id +20); ?>" class="role" type="checkbox" name="roles[]" value="<?php echo e($role2->id); ?>"  >
                                <label for="<?php echo e($role2->id +20); ?>">
                                   <?php echo e($role2->name); ?> 
                                </label>
                             </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                        </div>
                      </div>

                      </div>
                      <div class="row">
                     
                      
                      <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                           </div>
                      </div>  
                      </div> 
                      </div>
                      <!--field-->
                      <div class=" card-box">
                     <div class="form-group">
                    <label for="" class="text-uppercase" style="color: dodgerblue">Những vai trò có thể đảm nhiệm khi dẫn đoàn</label>
                    <hr>
                <div class="portlet-body">
                    <div class="row">
                        <div class="form-body col-md-12">
                            <div class="form-group">
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                </th>
                                                <th class="text-center">
                                                    Khách lẻ
                                                </th>
                                                <th class="text-center" >
                                                    Đoàn 4-10
                                                </th>
                                                <th class="text-center">
                                                    Đoàn 10-25
                                                </th>
                                                <th class="text-center">
                                                    Đoàn 25-40
                                                </th>
                                                <th class="text-center">
                                                    Đoàn trên 40
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr class="text-left">
                                            <td class="text-left"> Đưa đón khách </td>
                                             <?php $__currentLoopData = $tourguide_field1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field1->id +50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field1->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour tâm linh  </td>
                                             <?php $__currentLoopData = $tourguide_field2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field2->id +50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field2->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour teambuilding  </td>
                                             <?php $__currentLoopData = $tourguide_field3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field3->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field3->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour mạo hiểm  </td>
                                             <?php $__currentLoopData = $tourguide_field4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field4->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field4->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour học sinh  </td>
                                             <?php $__currentLoopData = $tourguide_field5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field5->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field5->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour truyền thống  </td>
                                             <?php $__currentLoopData = $tourguide_field6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field6): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field6->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field6->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour nghỉ dưỡng  </td>
                                             <?php $__currentLoopData = $tourguide_field7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field7): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field7->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field7->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour xe đạp  </td>
                                             <?php $__currentLoopData = $tourguide_field8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field8): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field8->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field8->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left">  Tour xe máy  </td>
                                             <?php $__currentLoopData = $tourguide_field9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field9): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field9->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field9->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>                                          
                                          <tr class="text-left">
                                            <td class="text-left"> Foody tour  </td>
                                             <?php $__currentLoopData = $tourguide_field10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td class="text-center">
                                              <div class="" style="position: relative;">
                                                  <input id="<?php echo e($field10->id+50); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($field10->id); ?>"  >
                                              </div>
                                              </td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </tr>
                                        </tbody>
                                    </table>
                                    <input class="talent-ids" name="talent-id" type="hidden">
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                                 
                           </div>
                      </div>  
                </div>
            </div>
             </div>
             <!-- end -->
                      <!--certificate-->  
                     <div class=" card-box">
                     <div class="form-group js-lang-check" id="js-lang-check">
                      <label for="" class="text-uppercase" style="color: dodgerblue">
                        
                        Chứng chỉ đạt được

                      </label>
                      <hr>
                      <div class="row">
                      <div class="col-md-6">
                      <?php $__currentLoopData = $tourguide_certificate1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="checkbox checkbox-primary">
                              <input id="<?php echo e($certificate1->id +30); ?>" class="certificate" type="checkbox" name="certificates[]" value="<?php echo e($certificate1->id); ?>"  >
                                <label for="<?php echo e($certificate1->id +30); ?>">
                                   <?php echo e($certificate1->name); ?> 
                                </label>
                             </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </div>
                        <div class="col-md-6">
                      <?php $__currentLoopData = $tourguide_certificate2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="checkbox checkbox-primary">
                              <input id="<?php echo e($certificate2->id +30); ?>" class="certificate" type="checkbox" name="certificates[]" value="<?php echo e($certificate2->id); ?>"  >
                                <label for="<?php echo e($certificate2->id +30); ?>">
                                   <?php echo e($certificate2->name); ?> 
                                </label>
                             </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                        </div>
                      </div>
                      </div>
                      

                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label >Khác</label>
                            <div>
                            <textarea  class="form-control" id="certi" name="certi" value=><?php echo e($tourguides->certificate); ?></textarea>
                            </div>
                          </div>
                      </div>
                        <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                        Lưu
                                 </button>
                           </div>
                      </div>  
                    </div>
                  </div>
                  <div class="card-box">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="" class="text-uppercase" style="color: dodgerblue" > Địa điểm đã tham gia dẫn đoàn </label>
                            <hr style="padding:10px 0 2px 0;">
                             <textarea name="locale_1" id="locale_1" class="summernote"><?php echo e($tourguides->locale_1); ?></textarea>
                          </div>
                            <div class="form-group">
                               <div>
                                     <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_role">
                                            Lưu
                                     </button>
                                    
                               </div>
                            </div>  
                        </div> 
                     </div>
                  </div>

                  <div class="card-box">
                     <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="" class="text-uppercase"style="color: dodgerblue"> Địa điểm đã tham quan, chưa dẫn đoàn</label>
                            <hr>
                           <textarea name="locale_2" id="locale_2" class="summernote"><?php echo e($tourguides->locale_2); ?></textarea>
                          </div>
                        </div> 
                     </div>

                      <div class="form-group">
                           <div>
                                 <button type="submit" class="btn btn-primary waves-effect waves-light" name="btn_certificate">
                                        Lưu
                                 </button>
                                 
                           </div>
                      </div> 
                      </div>

                      </div>
                      </div>             
              </form>
            <!-- </div>
          </div>
        </div> -->
      </div>
    </div>

  


</div>

</div>

</div> 
</div> <!--container -->


<footer class="footer text-right">
  &copy; 2016 - 2018. All rights reserved.
</footer>


<!-- END wrapper -->
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


<!--     <script src="<?php echo e(asset("backend/plugins/moment/moment.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/timepicker/bootstrap-timepicker.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/clockpicker/js/bootstrap-clockpicker.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-daterangepicker/daterangepicker.js")); ?>"></script> -->

    <script src="<?php echo e(asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/switchery/js/switchery.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("backend/plugins/multiselect/js/jquery.multi-select.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/plugins/select2/js/select2.min.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js")); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js")); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset("backend/assets/js/jquery.core.js")); ?>"></script>
    <script src="<?php echo e(asset("backend/assets/js/jquery.app.js")); ?>"></script>

    <script src="<?php echo e(asset("backend/assets/pages/jquery.form-pickers.init.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("backend/plugins/parsleyjs/parsley.min.js")); ?>"></script>
        <script src="<?php echo e(asset("backend/plugins/summernote/summernote-bs4.min.js")); ?>"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 350,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

                $('.inline-editor').summernote({
                    airMode: true
                });

            });
        </script>

    <script>
      $(document).ready(function(){

        var tourguide_lang = "<?php echo e($tourguide_lang); ?>";
        var array = JSON.parse("[" + tourguide_lang + "]");
        $( ".lang" ).each(function( index, element ) {
         var a = $(element).attr('id');
         var b=a-1;
         var c=b+1; ///??????????
         var arr = array.indexOf(c);
         //console.log(arr);
         var $input = $( this );
         if( arr >=0 )
           $input.prop("checked",true);
         else  
          $input.prop("checked",false);
      });

        var tourguide_role = "<?php echo e($tourguide_role); ?>";
        //console.log(tourguide_role);
        var array_role = JSON.parse("[" + tourguide_role + "]");
        $( ".role" ).each(function( index, element ) {
         var a = $(element).attr('id');

         var b=a-21;
         var c=b+1; ///??????????
         var array_roles = array_role.indexOf(c);
         //console.log(b);
         var $input = $( this );
         if( array_roles >=0 )
           $input.prop("checked",true);
         else  
           $input.prop("checked",false);
         
       });

        var tourguide_certificate = "<?php echo e($tourguide_certificate); ?>";
        var array_certificate = JSON.parse("[" + tourguide_certificate + "]");
        $( ".certificate" ).each(function( index, element ) {
         var a = $(element).attr('id');
         console.log(a);
         var b=a-31;
         var c=b+1; ///??????????
         var array_certificates = array_certificate.indexOf(c);
        //console.log(array_certificates);
         var $input = $( this );
         if( array_certificates >=0 )
           $input.prop("checked",true);
         else  
           $input.prop("checked",false);
         
       });
        var tourguide_field = "<?php echo e($tourguide_field); ?>";
        var array_field = JSON.parse("[" + tourguide_field + "]");
        $( ".field" ).each(function( index, element ) {
         var a = $(element).attr('id');
         //console.log(a);
         var b=a-51;
         var c=b+1; ///??????????
         console.log(c);
         var array_fields = array_field.indexOf(c);
         console.log(array_field);
         var $input = $( this );
         if( array_fields >=0 )
           $input.prop("checked",true);
         else  
           $input.prop("checked",false);
         
       });

      });

    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>
  <title><?php echo e($option->site_name); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<meta name="keywords" content="jquery,rating,raty,voto,star,staring,classificacao,classificar,votar,plugin,javascript,library">
   <link rel="shortcut icon" href="<?php echo e(asset("$option->site_icon")); ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/bootstrap.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.carousel.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/owl.theme.default.min.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/style.css")); ?>"/>
  <link rel="stylesheet" href="<?php echo e(asset("fontend/css/responsive.css")); ?>"/>
  <script src="<?php echo e(asset("backend/assets/js/modernizr.min.js")); ?>"></script>

  <link href="<?php echo e(asset("fontend/rate/demo/stylesheets/labs.css")); ?>" media="screen" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="<?php echo e(asset("fontend/rate/lib/jquery.raty.css")); ?>">
<style>.functions .demo {
  margin-bottom: 10px;
}
.complete{
    display:none;
}

.more{
    background:lightblue;
    color:navy;
    font-size:13px;
    padding:3px;
    cursor:pointer;
}
.functions .item {
  background-color: #FEFEFE;
  border-radius: 4px;
  display: inline-block;
  margin-bottom: 5px;
  padding: 5px 10px;
}

.functions .item a {
  border: 1px solid #CCC;
  margin-left: 10px;
  padding: 5px;
  text-decoration: none;
}

.functions .item input {
  display: inline-block;
  margin-left: 2px;
  padding: 5px 6px;
  width: 120px;
}

.functions .item label {
  display: inline-block;
  font-size: 1.1em;
  font-weight: bold;
}

.hint {
  text-align: center;
  width: 160px
}

div.hint {
  font-size: 1.4em;
  height: 46px;
  margin-top: 15px;
  padding: 7px
}
.morecontent span {
    display: none;
}
.morelink {
    display: block;
}
</style>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="tourguide-info">
      <input type="hidden" value="<?php echo e($id = $tourguide->id); ?>"> 
      <div class="container">
        <div class="tourguide-info-wrap">
          <div class="row">
            <div class="col-xl-6 offset-xl-1">
              <h2 class="tourguider-name"><?php echo e($tourguide->name); ?></h2>
              <p class="tourguider-license"><?php echo e($tourguide->class); ?></p>
              <div class="info-nav d-flex">
                <div class="link-list">
                  <a id="Personalinformationlink" href="#Personalinformation"><?php echo e($multilang->personalinformation); ?></a>
                  <a id="jobskilllink" href="#jobskill"><?php echo e($multilang->jobskill); ?></a>
                  <a id="languageusedlink" href="#languageused"><?php echo e($multilang->languageused); ?></a>
                  <a id="roleunionlink" href="#roleunion"><?php echo e($multilang->roleunion); ?></a>
                </div>
                <div class="link-list">
                  <a id="ecucationguidelineslink" href="#educationguidelines"><?php echo e($multilang->educationguidelines); ?></a>
                  <a id="sharethinkinglink" href="#sharethinking"><?php echo e($multilang->sharethinking); ?></a>
                  <a id="tourlocationlink" href="#tourlocation"><?php echo e($multilang->tourlocations); ?></a>
                  <a id="viewfeedbacklink" href="#viewfeedback"><?php echo e($multilang->viewfeedback); ?></a></div>
              </div>
            </div>
            <div class="col-xl-5">
              <div class="tourguide-des">
                <div class="avatar"><img class="img-fluid" src="<?php echo e(asset("images/cv/$tourguide->img_cv")); ?>" alt=""/></div>
                <div class="info">
                  <h3>BIO</h3>
                  <p><?php echo e($tourguide->introduce); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="personal-infomation" id="Personalinformation">
      <div class="container">
        <div class="personal-info-wrap">
          <div class="collapse-header"><a href="#"><?php echo e($multilang->personalinformation); ?></a></div>
          <div class="collapse-body">
            <div class="personnal-info-content">
              <ul class="list-unstyled">
                <li><span><?php echo e($multilang->address); ?> :</span><?php echo e($tourguide->address); ?></li>
                <li><span><?php echo e($multilang->licensedtype); ?> :</span><?php echo e($tourguide->LicensedType); ?></li>
                <li><span><?php echo e($multilang->dob); ?> :</span><?php echo e($tourguide->dob); ?></li>
                <li><span><?php echo e($multilang->joindate); ?> :</span><?php echo e($tourguide->date_start); ?></li>
              </ul>
              <ul class="list-unstyled">
                <li><span><?php echo e($multilang->mobile); ?> :</span><?php echo e($tourguide->phone); ?></li>
                <li><span><?php echo e($multilang->email); ?> :</span> <?php echo e($tourguide->email); ?></li>
                <li><span><?php echo e($multilang->cardid); ?> :</span> <?php echo e($tourguide->card_id); ?></li>
                <li><span><?php echo e($multilang->expirationdate); ?> :</span> <?php echo e($tourguide->date_end); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="guide-skill">
      <div class="container d-flex">
        <div class="job-skill-wrap" id="jobskill">
          <div class="collapse-header"><a href="#"><?php echo e($multilang->jobskill); ?></a></div>
          <div class="collapse-body">
            <div class="job-skill-content">
              <ul class="list-unstyled">
                <?php $__currentLoopData = $tourguide_certificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li><?php echo e($cer[0]); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="language-wrap" id="languageused">
          <div class="collapse-header"><a href="#"><?php echo e($multilang->languageused); ?></a></div>
          <div class="collapse-body">
            <div class="job-skill-content">
              <ul class="list-unstyled">
               <?php $__currentLoopData = $tourguide_lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li><?php echo e($lang[0]); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="role-wrap" id="roleunion">
          <div class="collapse-header"><a href="#"><?php echo e($multilang->roleunion); ?></a></div>
          <div class="collapse-body">
            <div class="job-skill-content">
              <ul class="list-unstyled">
               <?php $__currentLoopData = $tourguide_role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($role[0]); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="education-guidelines">
      <div class="container">
        <div class="educatio-wrap" id="ecucationguidelines">
          <div class="collapse-header"><a href="#"><?php echo e($multilang->educationguidelines); ?></a></div>
          <div class="collapse-body">
            <table class="table table-bordered table-sm m-0 education-table" >
              <thead>
                <tr>
                  <th></th>
                  <th><?php echo e($multilang->retail); ?></th>
                  <th><?php echo e($multilang->group); ?> 4-10</th>
                  <th><?php echo e($multilang->group); ?> 10-25</th>
                  <th><?php echo e($multilang->group); ?> 25-40</th>
                  <th><?php echo e($multilang->group); ?> >40</th>
                </tr>
              </thead>
              <tbody>
                <?php for($i=0; $i < count($tourguide_fieldname) ; $i++): ?> 
                <tr >
                  <td> <label><?php echo e($tourguide_fieldname[$i]); ?></label></td>
                  <?php for($j=0; $j < 5 ; $j++): ?> 
                  <td>
                    <div class="checkbox-custom">
                       <input id="<?php echo e($tourguide_all_field[$i][$j]->id +500); ?>" class="field" type="checkbox" name="field[]" value="<?php echo e($tourguide_all_field[$i][$j]->id); ?>" disabled="true">
                       <label for="<?php echo e($tourguide_all_field[$i][$j]->id +500); ?>"></label>
                    </div>
                  </td>
                  <?php endfor; ?>
                </tr>   
                <?php endfor; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <section class="share-block">
      <div class="container">
        <div class="row">
          <div class="col-xl-6">
            <div class="share-thinking" id="sharethinking">
              <div class="collapse-header"><a href="#"><?php echo e($multilang->personalinformation); ?></a></div>
              <div class="collapse-body">
                <div class="share-thinking-content" id="divVote">
                   
                  <p class="point"><?php echo e($multilang->dtb); ?><span><?php echo e(\App\TourGuide::totalpoint($id)); ?></span></p>
                  <form method="post" action="<?php echo e(action('Fontend\GuidereviewController@vote',$id)); ?>">
                    <?php echo e(csrf_field()); ?>

                  <ul class="list-unstyled share-rate">
                    <li>
                      <p>Friendly & Helpful</p>
                      <div id="score-callback1" class="score-callback" data-score="<?php echo e(\App\TourGuide::getPoint(0,$id)); ?>"></div>
                    </li>
                    <li>
                      <p>Language / Foreign Language</p>
                      <div id="score-callback2" class="score-callback" data-score="<?php echo e(\App\TourGuide::getPoint(1,$id)); ?>"></div>
                   </p>
                    </li>
                    <li>
                      <p>Work attitude & professionalism</p>
                      <div id="score-callback3" class="score-callback" data-score="<?php echo e(\App\TourGuide::getPoint(2,$id)); ?>"></div>
                   </p>
                    </li>
                    <li>
                      <p>Facial, Facial & Personal Hygiene</p>
                      <div id="score-callback4" class="score-callback" data-score="<?php echo e(\App\TourGuide::getPoint(3,$id)); ?>"></div>
                    </p>
                    </li>
                    <li>
                      <p>Knowledge</p>
                      <div id="score-callback5" class="score-callback" data-score="<?php echo e(\App\TourGuide::getPoint(4,$id)); ?>"></div>
                   </p>
                    </li>
                    <li>
                      <p>Ability to solve problem</p>
                      <div id="score-callback6" class="score-callback" data-score="<?php echo e(\App\TourGuide::getPoint(5,$id)); ?>"></div>
                      <!--  <div id="hints" data-score="3"></div>
 <div id="hints1" data-score="4"></div> -->
                     </p>
                    </li>
                  </ul>
              <button class="btn btn-add" type="submit" onclick="voteFunction()">vote</button>
            </form>
                </div>
              </div>
            </div>
            <div class="tour-location" id="tourlocation">
              <div class="collapse-header"><a href="#"><?php echo e($multilang->tourlocations); ?></a></div>
              <div class="collapse-body">
                <div class="tour-location-content">
                  <div class="select-location">
                    <p class="label-name" style="font-weight: 900; margin-bottom: 20px;"><?php echo e($multilang->locale_1); ?> :</p>
                    <a href="#tourlocation" class="show_hide js-location select2-hidden-accessible" data-content="toggle-text">...<?php echo e($multilang->seemore); ?></a>

                    <div class="content " >
                       <?php echo $tourguide->locale_1; ?>

                    </div>

                  </div>
                  <div class="select-location">
                    <p class="label-name" style="font-weight: 900 ; margin-bottom: 20px;"><?php echo e($multilang->locale_2); ?> :</p>
                     <a href="#tourlocation" class="show_hide2 js-location select2-hidden-accessible" data-content="toggle-text">...<?php echo e($multilang->seemore); ?></a>
                    <div class="content2">
                       <?php echo $tourguide->locale_2; ?>

                    </div>

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="comment-box" id="viewfeedback">
              <div class="collapse-header"><a href="#">comments</a></div>
              <div class="collapse-body">
                <div class="comment-box-content">
                  <div class="cmt-list">
                    <?php $__currentLoopData = $firstcomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                      <div class="avatar" style="background-image: url('<?php echo e(asset("fontend/images/comment-img.png")); ?>');"></div>
                      <div class="info">
                        <h4><?php echo e($comment->name); ?><small></small></h4>
                        <div class="comments">
                          <p><?php echo e($comment->comment); ?></p>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div id="divComment" style="display: none;">
                    <?php for($i=3 ;$i< count($morecomments);$i++): ?>
                    <div class="item">
                      <div class="avatar" style="background-image: url('<?php echo e(asset("fontend/images/comment-img.png")); ?>');"></div>
                      <div class="info">
                        <h4><?php echo e($morecomments[$i]->name); ?><small></small></h4>
                        <div class="comments">
                          <p><?php echo e($morecomments[$i]->comment); ?></p>
                        </div>
                      </div>
                    </div>
                    <?php endfor; ?>
                  </div>
                  <a onclick="commentFunction()" class="more" href="#viewfeedback" ><?php echo e($multilang->seemore); ?>...</a>
                  </div>
                  <div class="cmt-form">
                    <form id="comment-form" method="post" action="<?php echo e(action('Fontend\GuidereviewController@addComment',$id)); ?>">
                       <?php echo e(csrf_field()); ?>

                      <div class="input-form mr-xl-3">
                        <label>Name</label>
                        <input class="form-control" name="comment_name" id="comment_name"  type="text" placeholder="Name"/>
                      </div>
                      <div class="input-form mr-xl-3">
                        <label>Email</label>
                        <input class="form-control" name="comment_email" id="comment_email"  type="text" placeholder="Email"/>
                      </div>
                      <div class="input-form">
                        <label>Phone</label>
                        <input class="form-control" name="comment_phone" id="comment_phone"  type="number" placeholder="Phone"/>
                      </div>
                      <div class="textarea-form">
                        <label>Your comments</label>
                        <textarea name="comment_content" id="comment_content" cols="30" rows="10"></textarea>
                      </div>
                      <button class="btn btn-add" type="submit">Add Comment</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 <!-- <div id="targetType"></div>

  <div id="targetType-hint" class="input hint"></div> -->

<div id="score-callback" class="score-callback" data-score="1">1</div>
<!-- <h1>Target Keep</h1>

  <p>If you want to keep the <a href="#score">score</a> into the hint box after you do the rating, turn on this option.</p>

  <div id="targetKeep"></div>

  <div id="targetKeep-hint" class="input hint"></div>
 -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="<?php echo e(asset("backend/assets/js/jquery.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/popper.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/bootstrap.min.js")); ?>"></script>

<script src="<?php echo e(asset("fontend/js/owl.carousel.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset("fontend/js/main.js")); ?>" type="text/javascript"></script>

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
<script src="<?php echo e(asset("backend/plugins/sweet-alert2/sweetalert2.min.js")); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(asset("fontend/rate/vendor/jquery.js")); ?>"></script>
<script src="<?php echo e(asset("fontend/rate/lib/jquery.raty.js")); ?>"></script>
<script src="<?php echo e(asset("fontend/rate/demo/javascripts/labs.js")); ?>" type="text/javascript"></script>
<?php echo $__env->make('backend.shared.initjs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script >
$.fn.raty.defaults.path = '<?php echo e(asset("fontend/rate/lib/images")); ?>';
  $('#score-callback1').raty({
    score: function() {
      return $(this).attr('data-score');
    }
  });
    $('#score-callback2').raty({
    score: function() {
      return $(this).attr('data-score');
    }
  });
      $('#score-callback3').raty({
    score: function() {
      return $(this).attr('data-score');
    }
  });
        $('#score-callback4').raty({
    score: function() {
      return $(this).attr('data-score');
    }
  });
          $('#score-callback5').raty({
    score: function() {
      return $(this).attr('data-score');
    }
  });
            $('#score-callback6').raty({
    score: function() {
      return $(this).attr('data-score');
    }
  });
   $('#hints').raty({ hints: ['a', null, '', undefined, '*_*']});
   $('#hints1').raty({ hints: ['a', null, '', undefined, '*_*']});

</script>
<script>
  function voteFunction() {
    var x = document.getElementById("divVote");
    if (x.style.display !== "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    // var y = document.getElementById("divPoint");
    // if (y.style.display === "none") {
    //     y.style.display = "block";
    // } else {
    //     y.style.display = "none";
    // }
};
</script>
<script>
$(document).ready(function () {
    $(".content").hide();
    $(".show_hide").on("click", function () {
        var txt = $(".content").is(':visible') ? '<?php echo e($multilang->seemore); ?>' : '<?php echo e($multilang->seeless); ?>';
        $(".show_hide").text(txt);
        $(this).next('.content').slideToggle(200);
    });
});
$(document).ready(function () {
    $(".content2").hide();
    $(".show_hide2").on("click", function () {
        var txt = $(".content2").is(':visible') ? '<?php echo e($multilang->seemore); ?>' : '<?php echo e($multilang->seeless); ?>';
        $(".show_hide2").text(txt);
        $(this).next('.content2').slideToggle(200);
    });
});

</script>
<script>
  function commentFunction() {
    var x = document.getElementById("divComment");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
};
</script>
<script>
  $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 30;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more_locale').each(function() {
        var content =$(this).html();
        console.log(content);
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext+ '</span><span class="morecontent"><span>' + h + '</span><a href="" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }
       // console.log($(this).html(html));
    });
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>
<script>
  $(document).ready(function(){
    $("#seeMore").click(function(){
      $("div#seeAll").toggle();
    });
            var tourguide_field = "<?php echo e($tourguide_field); ?>";
        var array_field = JSON.parse("[" + tourguide_field + "]");
        $( ".field" ).each(function( index, element ) {
         var a = $(element).attr('id');
         
         var b=a-501;
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


<?php echo $__env->make('fontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
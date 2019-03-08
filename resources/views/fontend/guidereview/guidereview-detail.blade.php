@extends('fontend.layout')
@section('title')
  <title>{{$option->site_name}}</title>
@endsection
@section('css')
<meta name="keywords" content="jquery,rating,raty,voto,star,staring,classificacao,classificar,votar,plugin,javascript,library">
   <link rel="shortcut icon" href="{{ asset("$option->site_icon") }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"/>
  <link rel="stylesheet" href="{{asset("fontend/css/bootstrap.min.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/owl.carousel.min.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/owl.theme.default.min.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/select2.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/style.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/responsive.css")}}"/>
  <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
  
<style>.functions .demo {
  margin-bottom: 10px;
}
.complete{
    display:none;
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


@endsection
@section('content')
    <section class="tourguide-info">
      <input type="hidden" value="{{ $id = $tourguide->id}}"> 
      <div class="container">
        <div class="tourguide-info-wrap">
          <div class="row">
            <div class="col-xl-6 offset-xl-1">
              <h2 class="tourguider-name">{{$tourguide->name}}</h2>
              <p class="tourguider-license">{{$tourguide->class}}</p>
              <div class="info-nav d-flex">
                <div class="link-list">
                  <a id="Personalinformationlink" href="#Personalinformation">{{ $multilang->personalinformation }}</a>
                  <a id="jobskilllink" href="#jobskill">{{ $multilang->jobskill }}</a>
                  <a id="languageusedlink" href="#languageused">{{$multilang->languageused }}</a>
                  <a id="roleunionlink" href="#roleunion">{{$multilang->roleunion}}</a>
                </div>
                <div class="link-list">
                  <a id="ecucationguidelineslink" href="#educationguidelines">{{$multilang->educationguidelines}}</a>
                  <a id="sharethinkinglink" href="#sharethinking">{{$multilang->sharethinking}}</a>
                  <a id="tourlocationlink" href="#tourlocation">{{$multilang->tourlocations}}</a>
                  <a id="viewfeedbacklink" href="#viewfeedback">{{$multilang->viewfeedback}}</a></div>
              </div>
            </div>
            <div class="col-xl-5">
              <div class="tourguide-des">
                <div class="avatar"><img class="img-fluid" src="{{asset("images/cv/$tourguide->img_cv")}}" alt=""/></div>
                <div class="info">
                  <h3>BIO</h3>
                  <p>{{$tourguide->introduce}}</p>
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
          <div class="collapse-header"><a href="#">{{$multilang->personalinformation}}</a></div>
          <div class="collapse-body">
            <div class="personnal-info-content">
              <ul class="list-unstyled">
                <li><span>{{$multilang->address}} :</span>{{$tourguide->address}}</li>
                <li><span>{{$multilang->licensedtype}} :</span>{{$tourguide->LicensedType }}</li>
                <li><span>{{$multilang->dob}} :</span>{{$tourguide->dob}}</li>
                <li><span>{{$multilang->joindate}} :</span>{{$tourguide->date_start}}</li>
              </ul>
              <ul class="list-unstyled">
                <li><span>{{$multilang->mobile}} :</span>{{$tourguide->phone}}</li>
                <li><span>{{$multilang->email}} :</span> {{$tourguide->email}}</li>
                <li><span>{{$multilang->cardid}} :</span> {{$tourguide->card_id}}</li>
                <li><span>{{$multilang->expirationdate}} :</span> {{$tourguide->date_end}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="guide-skill">
      <div class="container d-flex">
        <div class="job-skill-wrap" id="jobskill">
          <div class="collapse-header"><a href="#">{{$multilang->roleunion}}</a></div>
          <div class="collapse-body">
            <div class="job-skill-content">
              <ul class="list-unstyled">
                @foreach($tourguide_certificate as $cer)
                  <li>{{$cer[0]}}</li>
                @endforeach
                @if($morecre != null)
                  @foreach ($morecre as $morecr)
                   <li>{{$morecr}}</li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="language-wrap" id="languageused">
          <div class="collapse-header"><a href="#">{{$multilang->languageused}}</a></div>
          <div class="collapse-body">
            <div class="job-skill-content">
              <ul class="list-unstyled">
               @foreach ($tourguide_lang as $lang)
               <li>{{$lang[0]}}</li>
               @endforeach
               @if($morelanguages != null)
                @foreach ($morelanguages as $morelang)
               <li>{{$morelang}}</li>
               @endforeach
               @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="role-wrap" id="roleunion">
          <div class="collapse-header"><a href="#">{{$multilang->jobskill}}</a></div>
          <div class="collapse-body">
            <div class="job-skill-content">
              <ul class="list-unstyled">
               @foreach ($tourguide_role as $role)
                <li>{{$role[0]}}</li>
               @endforeach
             
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="education-guidelines">
      <div class="container">
        <div class="educatio-wrap" id="ecucationguidelines">
          <div class="collapse-header"><a href="#">{{$multilang->educationguidelines}}</a></div>
          <div class="collapse-body">
            <div class="table-responsive">
            <table class="table table-bordered table-sm m-0 education-table" >
              <thead>
                <tr>
                  <th></th>
                  <th>{{$multilang->retail}}</th>
                  <th>{{$multilang->group}} 4-10</th>
                  <th>{{$multilang->group}} 10-25</th>
                  <th>{{$multilang->group}} 25-40</th>
                  <th>{{$multilang->group}} >40</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < count($tourguide_fieldname) ; $i++) 
                <tr >
                  <td> <label>{{$tourguide_fieldname[$i]}}</label></td>
                  @for ($j=0; $j < 5 ; $j++) 
                  <td>
                    <div class="checkbox-custom">
                       <input id="{{$tourguide_all_field[$i][$j]->id +500}}" class="field" type="checkbox" name="field[]" value="{{$tourguide_all_field[$i][$j]->id}}" disabled="true">
                       <label for="{{$tourguide_all_field[$i][$j]->id +500}}"></label>
                    </div>
                  </td>
                  @endfor
                </tr>   
                @endfor
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </section>
    <section class="share-block">
      <div class="container">
        <div class="row">
          <div class="col-xl-6">
            <div class="share-thinking" id="sharethinking">
              <div class="collapse-header"><a href="#">{{$multilang->personalinformation}}</a></div>
              <div class="collapse-body">
                <div class="share-thinking-content" id="divVote">
                   
                  <p class="point">{{$multilang->dtb}}<span>{{ \App\TourGuide::totalpoint($id)}}</span></p>
                  <form method="post" action="{{ action('Fontend\GuidereviewController@vote',$id)}}">
                    {{ csrf_field() }}
                  <ul class="list-unstyled share-rate">
                    <li>
                      <p>{{$multilang->friendly}}</p>
                      <div id="half1" class="half" data-score="{{\App\TourGuide::getPoint(0,$id)}}"></div>
                    </li>
                    <li>
                      <p>{{$multilang->foreignlanguage}}</p>
                      <div id="half2" class="half" data-score="{{\App\TourGuide::getPoint(1,$id)}}"></div>
                   </p>
                    </li>
                    <li>
                      <p>{{$multilang->work}}</p>
                      <div id="half3" class="half" data-score="{{\App\TourGuide::getPoint(2,$id)}}"></div>
                   </p>
                    </li>
                    <li>
                      <p>{{$multilang->facial}}</p>
                      <div id="half4" class="half" data-score="{{\App\TourGuide::getPoint(3,$id)}}"></div>
                    </p>
                    </li>
                    <li>
                      <p>{{$multilang->knowledge}}</p>
                      <div id="half5" class="half" data-score="{{\App\TourGuide::getPoint(4,$id)}}"></div>
                   </p>
                    </li>
                    <li>
                      <p>{{$multilang->ability}}</p>
                      <div id="half6" class="half" data-score="{{\App\TourGuide::getPoint(5,$id)}}"></div>
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
              <div class="collapse-header"><a href="#">{{$multilang->tourlocations}}</a></div>
              <div class="collapse-body">
                <div class="tour-location-content">
                   <div class="select-location">
                    <p class="label-name">{{$multilang->locale_1}}</p>
                    <select class="form-control js-location select2-hidden-accessible" name="location">
                     @foreach($locale_1 as $item)
                     <option value="">{{$item}}</option>
                     @endforeach
                    </select>
                  </div>

                  <div class="select-location">
                   <p class="label-name">{{$multilang->locale_2}}</p>
                    <select class="form-control js-location select2-hidden-accessible" name="location">
                     @foreach($locale_2 as $item)
                     <option value="">{{$item}}</option>
                     @endforeach
                    </select>
                    
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
                    @foreach($firstcomments as $comment)
                    <div class="item">
                      <div class="avatar" style="background-image: url('{{asset("fontend/images/avata.png")}}');"></div>
                     <div class="info">
                        <h4>{{$comment->name}}</h4>
                        <div class="comments">
                          <p>{{$comment->comment}}</p>
                        </div>
                      </div> 
                     <!--  <div class="info">
                        <h4>liot Fu<small>Yesterday at 12:30AM</small></h4>
                        <div class="comments">
                          <p>How artistic!</p>
                        </div>
                      </div> -->
                    </div>
                    @endforeach
                    <div id="divComment" style="display: none;">
                    @for($i=3 ;$i< count($morecomments);$i++)
                    <div class="item">
                      <div class="avatar" style="background-image: url('{{asset("fontend/images/avata.png")}}');"></div>
                      <div class="info">
                        <h4>{{$morecomments[$i]->name}}<small></small></h4>
                        <div class="comments">
                          <p>{{$morecomments[$i]->comment}}</p>
                        </div>
                      </div>
                    </div>
                    @endfor
                  </div>
                  <a onclick="commentFunction()" class="more" href="#viewfeedback" >{{$multilang->seemore}}...</a>
                  </div>
                  <div class="cmt-form">
                    <form id="comment-form" method="post" action="{{ action('Fontend\GuidereviewController@addComment',$id) }}">
                       {{ csrf_field() }}
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

@endsection
@section('javascript')


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
<script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
<script src="{{ asset("fontend/assets/js/bootstrap.min.js") }}"></script>
 <script src="{{asset("fontend/js/menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/select2.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/owl.carousel.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/main.js")}}" type="text/javascript"></script>

<script src="{{ asset("backend/assets/js/detect.js") }}"></script>
<script src="{{ asset("backend/assets/js/fastclick.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.slimscroll.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.blockUI.js") }}"></script>
<script src="{{ asset("backend/assets/js/waves.js") }}"></script>
<script src="{{ asset("backend/assets/js/wow.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.nicescroll.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.scrollTo.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>
<script src="{{ asset("backend/plugins/sweet-alert2/sweetalert2.min.js") }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="{{asset("fontend/rate/vendor/jquery.js")}}"></script> -->
<script src="{{asset("fontend/rate/lib/jquery.raty.js")}}"></script>
<script src="{{asset("fontend/rate/demo/javascripts/labs.js")}}" type="text/javascript"></script>
@include('sweet::alert')
<script >
$.fn.raty.defaults.path = '{{asset("fontend/rate/lib/images")}}';
  $('#half1').raty({
    half: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
    $('#half2').raty({
    half: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
      $('#half3').raty({
        half: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
        $('#half4').raty({
          half: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
          $('#half5').raty({
            half: true,
    score: function() {
      return $(this).attr('data-score');
    }
  });
            $('#half6').raty({
              half: true,
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
        var txt = $(".content").is(':visible') ? '{{$multilang->seemore}}' : '{{$multilang->seeless}}';
        $(".show_hide").text(txt);
        $(this).next('.content').slideToggle(200);
    });
});
$(document).ready(function () {
    $(".content2").hide();
    $(".show_hide2").on("click", function () {
        var txt = $(".content2").is(':visible') ? '{{$multilang->seemore}}' : '{{$multilang->seeless}}';
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
            var tourguide_field = "{{$tourguide_field}}";
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


@endsection


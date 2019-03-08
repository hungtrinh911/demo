@extends('fontend.layout')
@section('title')
  <title>{{$option->site_name}}</title>
@endsection
@section('css')
   <link rel="shortcut icon" href="{{ asset("$option->site_icon") }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"/>
  <link rel="stylesheet" href="{{asset("fontend/css/bootstrap.min.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/owl.carousel.min.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/owl.theme.default.min.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/style.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/responsive.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/select2.css")}}"/>
  <link href="{{asset("fontend/pagination/dist/pagination.css")}}" rel="stylesheet" type="text/css">
  <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>

@endsection
@section('content')
    <section class="slider">
      <div class="container">
        <div class="owl-slider owl-theme owl-carousel">
          @foreach($slides_top as $slide)
          <div class="item">
            <img src="{{asset("$slide->image")}}" alt="slide 1"/>
            <div class="description">
              <h2>{{$slide->title}}</h2>
              <p>{{$slide->content}}</p>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </section>
    <section class="introduce">
      <div class="container">
        <div class="introduce-wrap">
          <div class="row">
            <div class="col-xl-1"></div>
            @foreach($site_tourguides as $site_tourguide)
            <div class="col-xl-5 ">
              <div class="intro-item d-flex justify-content-start align-items-start">
                <div class="item-icon"><img class="img-fluid" src="{{asset("$site_tourguide->image")}}" alt=""/></div>
                <div class="item-info">
                  <h2>{{$site_tourguide->title}}</h2>
                  <p>{{$site_tourguide->content}}</p><a class="seemore" href="{{action('Fontend\GuidereviewController@index')}}">{{$multilang->seemore}}</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="guide-profile">
   <!--     <div class="container">
        <div class="row no-gutters guild-wrap">
          <div class="col-xl-11 offset-xl-1">
            <div class="guide-profile d-lg-flex justify-content-lg-center align-items-lg-center">
              <div class="guide-title"> -->
      <div class="container">
        <input type="hidden" value="{{$guide_profile_background_image = $site_guide_profile[0]}}">
        <div class="row no-gutters guild-wrap" style="background-image:  url({{asset("$guide_profile_background_image")}})  #fff left top no-repeat;">
          <div class="col-xl-11 offset-xl-1">
            <div class="guide-profile d-lg-flex justify-content-lg-center align-items-lg-center">
              <div class="guide-title">
                <h2>{{$multilang->tourguide}}</h2>
              </div>
              <div class="guide-info">
                <div class="row">
                  @for($i=1; $i< count($site_guide_profile);$i++ )
                   <div class="col-xl-5">
                    <div class="guide-item d-flex justify-content-start align-items-start"><img class="img-fluid" src="{{asset("fontend/images/ico-check.png")}}" alt=""/>
                      <p>{{$site_guide_profile[$i]}}</p>
                    </div>
                  </div>
                  @endfor
                </div>
              </div>
            </div>
          </div>
         <!--  <div class="col-xl-8 offset-xl-4">
            <div class="guide-slider owl-theme owl-carousel">
              <div class="item"><img src="images/sl-profile-1.jpg" alt="slide 1"/></div>
              <div class="item"><img src="images/sl-profile-2.jpg" alt="slide 2"/></div>
              <div class="item"><img src="images/sl-profile-3.jpg" alt="slide 3"/></div>
            </div>
          </div> -->
          <div class="col-xl-8 offset-xl-4">
          <div class="guide-slider owl-theme owl-carousel">
             @foreach($slides_guide_profile as $slide)
                <div class="item"><img src="{{asset("$slide")}}" alt="slide 1"/></div>
             @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main-course">
      <div class="container">
        <div class="course-inner row no-gutters">
          <div class="col-xl-11 offset-xl-1">
            <input type="hidden" value="{{ $banner1 =$tc_banner1[0]->image}}">
            <input type="hidden" value="{{ $banner3 =$tc_banner3[0]->image}}">
            <div class="course-wrap"><img class="img-fluid d-none d-lg-block" src="{{asset("$banner1")}}" alt=""/>
              <div class="course-item d-sm-flex justify-content-start align-items-start"><img class="img-fluid" src="{{asset("$banner3")}}" alt=""/>
                <div class="course-info">
                  <h2>{{$multilang->trainingcourse}}</h2>
                  <p>{{$multilang->trainingcourse}}</p><a class="seemore" href="{{action('Fontend\TrainingCourseController@index')}}">{{$multilang->seemore}}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-11 offset-xl-1">
            <div class="course-inroduce d-md-flex justify-content-start align-items-start">
            @foreach($trainingcourse as $site_tc)
              <div class="item">
                <h2>{{$site_tc->title}}</h2>
                <p>{{$site_tc->excerpt}}</p>
              </div>
            @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="blog">
      <div class="container">
        <div class="article-item">
          <div class="row">
            @foreach($site_job_search as $site_js)
            <div class="col-xl-5"><a class="article-img" href="#"><img class="img-fluid" src="{{asset("$site_js->image")}}" alt=""/></a></div>
            <div class="col-xl-5">
              <div class="article-info">
                <h2>{{$multilang->jobopportunitysearch}}</h2>
                <p class="category">{{$site_js->description}}</p>
                <p class="description">{{$site_js->content}}</p><a class="seemore" href="#">{{$multilang->seemore}}</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <section class="information">
      <div class="container">
        <div class="informaton-wrap">
          <div class="row">
            <div class="col-lg-6 col-xl-5 offset-xl-1">
              <div class="about-us">
                <h2>{{$multilang->aboutus}}</h2>
                <p class="description">{{$option->site_description}}</p>
                <div class="info-number d-md-flex justify-content-between align-items-center">
                @foreach($site_numbers as $site_number)
                  <div class="item">
                    <h3>{{$site_number->number}}</h3>
                    <p>{{$site_number->word}}</p>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
            <div class="col-xl-5">
              <div class="faqs">
                <h2>{{$multilang->faqs}}</h2>
                <div class="accordion" id="accordionExample">
                  @for($i=100; $i< 103; $i++)
                  <input type="hidden" value="{{$j =$i-100}}">
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{$i}}" aria-expanded="false" aria-controls="collapseTwo">{{$site_faqs[$j]->title}}</button>
                      </h5>
                    </div>
                    <div class="collapse" id="{{$i}}" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">{{$site_faqs[$j]->content}}</div>
                    </div>
                  </div>
                  @endfor

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="guide-review">
      <div class="container">
        <div class="guide-wrap"  style="background-image: url({{asset("fontend/images/bg-require.jpg")}});" >
          <div class="row">
            <div class="col-xl-4 offset-xl-2">
              <div class="guide-info">
                @for($i=200;$i< 201 ;$i++)
                    <input type="hidden" value="{{$j =$i-100}}">
                      <h2>{{$site_contact_us[0]}}</h2>
                      <p class="description">{{$site_contact_us[1]}}</p>
                      <ul class="list-unstyled">
                        <li>{{$site_contact_us[2]}}</li>
                        <li>{{$site_contact_us[3]}}</li>
                        <li>{{$site_contact_us[4]}}</li>
                      </ul>
                @endfor
              </div>
            </div>
            <div class="col-xl-4">
              <div class="guide-img"><img class="img-fluid" src="images/banner-require.png" alt=""/></div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('javascript')

<script src="{{asset("fontend/js/jquery191.min.js")}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>

<script src="{{asset("fontend/js/owl.carousel.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/main.js")}}" type="text/javascript"></script>
 <script src="{{asset("fontend/js/menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/select2.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/pagination.js")}}" type="text/javascript"></script>


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
@include('backend.shared.initjs')
@include('sweet::alert')
@endsection
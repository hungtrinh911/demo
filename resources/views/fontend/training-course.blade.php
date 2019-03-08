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
  <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection
@section('content')
    <section class="training-course-search">
      <div class="container">
        <input type="hidden" value="{{ $site_training_course_image_bg = $tc_banner1[0]->image}}">
        <div class="training-course-search-wrap"><img class="img-fluid" src="{{asset("$site_training_course_image_bg")}}" alt=""/>
          <form class="training-course-search-form" method="post"
              action="{{ action('Fontend\TrainingCourseController@search')}}">
               {{ csrf_field() }}
            <h4>Guildereview</h4>
            <h2>{{$multilang->trainingcourse}}</h2>
            <div class="form-group d-flex">
              <input class="form-control" type="text" placeholder="{{$multilang->search}}" name="key_word" />
              <button type="submit"> {{$multilang->search}}</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="training-course">
      <div class="container">
        <div class="training-course-wrap">
          <div class="row">
            <div class="col-xl-11 offset-xl-1">
              <div class="training-course-list">
                <div class="training-course-heading">
                  <h2>{{$multilang->diversecourses}}</h2>
                  <p>{{$multilang->subcourse}}</p>
                </div>
                <div class="course-list d-flex">
                   @foreach($training_course as $item)
                  <div class="item">
                    <div class="item-info clearfix">
                      <h3>{{$item->title}}</h3>
                      <p>{{($item->excerpt)}}</p>
                      <a class="seemore" href="#">{{$multilang->seemore}}</a>
                    </div>
                    <div class="item-img"><a href="#"><img class="img-fluid" src="{{asset("$item->featured_img")}}" alt=""/></a></div>
                  </div>
                   @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="training-course-banner">
      <div class="container">
        <div class="training-course-banner-wrap">
          <div class="row">
            <input type="hidden" value="{{ $site_training_course_image_sm = $tc_banner2[0]->image}}">
            <div class="col-xl-11 offset-xl-1"><a href="#"><img class="img-fluid" src="{{asset("$site_training_course_image_sm ")}}" alt=""/></a></div>
          </div>
        </div>
      </div>
    </section>
    <section class="training-course-branch">
      <div class="container">
        <div class="training-course-branch-wrap">
          <div class="row">
            <div class="col-xl-6 offset-xl-1">
              <div class="branch-address">
                <div class="branch-heading">
                  <h2>{{$multilang->branchclass}}</h2>
                  <p>{{$multilang->subbranch}}</p>
                </div>
                <div class="branch-location">
                  @for($i=0;$i< count($site_multi_address);$i++)
                   <div class="item">
                        <h3 class="location">{{$site_multi_address[$i]}}</h3>
                        <p class="description">{{$multilang->branch_number}} {{$i+1}}</p>
                  </div>
                  @endfor
                </div>
              </div>
            </div>
            <div class="col-xl-5">
              <input type="hidden" value="{{ $banner3 = $tc_banner3[0]->image}}">
              <div class="branch-banner-wrap"><a href="#"><img class="img-fluid" src="{{asset("$banner3")}}" alt=""/></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <section id ="training-course-comment">
      <div class="container">
        <div class="training-course-comment-wrap">
          <div class="row">
            <div class="col-xl-11 offset-xl-1">
              <div class="training-course-comment">
                <div class="owl-comment-slider owl-theme owl-carousel">
                  @foreach($site_review as $review)
                  <div class="item">
                    <div class="client-icon">
                      <div class="client-icon-img"><img src="{{asset("$review->image")}}" alt="slide 1"/></div>
                    </div>
                    <div class="client-comment">
                      <h3>{{$review->title}}<small> - Student</small></h3>
                      <p>“{{$review->content}}”</p>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('javascript')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>

<script src="{{asset("fontend/js/owl.carousel.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/main.js")}}" type="text/javascript"></script>
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
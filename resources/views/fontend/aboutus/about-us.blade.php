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
    <section id="guidebanner">
      <div class="container">
        <div class="guidebanner-wrap">
          <h1 class="banner-title">we are guidereview</h1>
        </div>
      </div>
    </section>
    <section id="about-us">
      <div class="container">
        <div class="about-us-wrap">
          <div class="col-xl-10 offset-xl-1">
            <div class="about-us">
              <h2>{{$multilang->aboutus}}</h2>
              <div class="about-content">
                {!!$aboutus!!}
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
 <script src="{{asset("fontend/js/menu.min.js")}}" type="text/javascript"></script>
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
@include('backend.shared.initjs')
@include('sweet::alert')
<script>

  // $(document).ready(function(){
  //   $("#seeMore").click(function(){
  //     $("div#seeAll").toggle();
  //   });
    
  // });

</script>

@endsection
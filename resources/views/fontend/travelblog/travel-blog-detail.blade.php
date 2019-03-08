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
  <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection
@section('content')
    

    <section class="blog-detail-main">
      <div class="container">
        <div class="blog-detail-wrap">
          <div class="row">
            <div class="col-xl-9">
              <div class="js-title">
                <h2 class="h2-title">{{$multilang->news}}</h2>
              </div>
              <div class="article-detail">
                <h1 class="article-title">{{$trainingcourse->title}}</h1>
                <div class="article-detail-info"><span class="author">{{$trainingcourse->author_name}}</span><span class="times">{{$trainingcourse->created_at}}</span></div>
                <div class="article-detail-img"><img class="img-fluid" src="{{("$trainingcourse->featured_img")}}" alt=""/></div>
                <div class="article-detail-content">
                  {!!$trainingcourse->content!!}
                </div>
              </div>
              <div class="related-news">
                <div class="js-title">
                  <h2 class="h2-title">{{$multilang->relatednews}}</h2>
                </div>
                <div class="related-news-list">
                  @foreach($related_trainingcourse as $related)
                  <div class="item"><a href="{{action('Fontend\JobSearchController@jobsearchdetail',$related->id)}}">
                      <div class="item-img"><img class="img-fluid" src="{{("$related->featured_img")}}" alt=""/></div>
                      <div class="item-info">
                        <h3>{{$related->title}}</h3>
                      </div></a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="promotion-news">
                <div class="js-title">
                  <h2 class="h2-title">{{$multilang->promotionnews}}</h2>
                </div>
                <div class="promotion-ads-item"><a href="#"></a></div>
                <div class="promotion-list">
                  @for($i =0 ;$i< count($travelleft_id);$i++)
                  <input type="hidden" value="{{$travelleft_img = $travelleft_id[$i]->featured_img}}">
                  <input type="hidden" value="{{$travelleft_ids = $travelleft_id[$i]->id}}">
                  <div class="item"><a href="{{action('Fontend\JobSearchController@jobsearchdetail',$travelleft_ids)}}">
                      <div class="item-img"><img class="img-fluid" src="{{asset("$travelleft_img")}}" alt=""/></div>
                      <div class="item-info">
                        <h3 style="">{{$travelleft_id[$i]->title}}</h3>
                      </div></a></div>
                  @endfor
                </div>
                <div class="promotion-ads-item"><a href="#"><img class="img-fluid" src="images/ads-blog-02.png" alt=""/></a></div>
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
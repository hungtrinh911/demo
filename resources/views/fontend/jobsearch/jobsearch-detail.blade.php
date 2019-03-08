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
    <section class="job-search">
      <div class="container">
        <input type="hidden" value="{{$banner = $js_banner[0]->image}}">  
        <div class="job-search-wrap"><img class="img-fluid" src="{{asset("$banner")}}" alt=""/>
          <form class="job-search-form" id="serch-form" method="post"
              action="{{ action('Fontend\JobSearchController@search')}}">
               {{ csrf_field() }}
            <div class="job-search-form-header">
              <h2>{{$multilang->jobsearch}}</h2>
              <h4>{{$multilang->js_sub}}</h4>
            </div>
            <div class="form-group d-flex">
              <div class="text-search">
                <input class="form-control" type="text" name="key_word" placeholder=""/>
              </div>
              <div class="select-job">
                <select class="form-control js-job-single select2-hidden-accessible" name="category">
                   <option value="">{{$multilang->category}}</option>
                  @foreach($jobsearch_category as $jsc)
                   <option value="{{$jsc->name}}">{{$jsc->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="select-place">
                <select class="form-control js-place-single select2-hidden-accessible" name="city">
                   <option value="">{{$multilang->city}}</option>
                  @foreach ($cities as $city)
                  <option value="{{$city->name}}" >{{$city->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="btn-action">
                <button type="submit">{{$multilang->search}}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <section class="blog-detail-main">
      <div class="container">
        <div class="blog-detail-wrap">
          <div class="row">
            <div class="col-xl-9">
               <div class="js-title">
                <h2 class="h2-title">{{$multilang->news}}</h2>
              </div>
              <div class="article-detail">
                <h1 class="article-title">{{$jobsearch->title}}</h1>
                <div class="article-detail-info"><span class="author">{{$jobsearch->author_name}}</span><span class="times">{{$jobsearch->created_at}}</span></div>
                <div class="article-detail-img"><img class="img-fluid" src="{{("$jobsearch->featured_img")}}" alt=""/></div>
                <div class="article-detail-content">
                  {!!$jobsearch->content!!}
                </div>
              </div>
              <div class="related-news">
                <div class="js-title">
                  <h2 class="h2-title">{{$multilang->relatednews}}</h2>
                </div>
                <div class="related-news-list">
                  @if($related_jobsearch != null)
                  @foreach($related_jobsearch as $related)
                  <div class="item"><a href="{{action('Fontend\JobSearchController@jobsearchdetail',$related->id)}}">
                      <div class="item-img"><img class="img-fluid" src="{{("$related->featured_img")}}" alt=""/></div>
                      <div class="item-info">
                        <h3>{{$related->title}}</h3>
                      </div></a>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
<!--             <div class="col-xl-3">
              <div class="promotion-news">
                <div class="js-title">
                  <h2 class="h2-title">PROMOTION NEWS</h2>
                </div>
                <div class="promotion-ads-item"><a href="#"><img class="img-fluid" src="images/ads-blog-01.png" alt=""/></a></div>
                <div class="promotion-list">
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                  <div class="item"><a hreg="#">
                      <div class="item-img"><img class="img-fluid" src="images/article-sb-img.png" alt=""/></div>
                      <div class="item-info">
                        <h3>Charity fights food waste in Việt Nam</h3>
                        <p class="times">12/ 10/ 2018</p>
                      </div></a></div>
                </div>
                <div class="promotion-ads-item"><a href="#"><img class="img-fluid" src="images/ads-blog-02.png" alt=""/></a></div>
              </div>

            </div> -->
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
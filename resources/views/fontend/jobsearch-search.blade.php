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
    <section class="top-employer">
      <div class="container">
        <div class="top-employer-wrap">
          <div class="col-xl-12">
            <div class="js-title">
              <h2 class="h2-title">{{$multilang->js_employee}}</h2>
           
            </div>
            <div class="top-employer-list">
              @foreach($js_top_employer as $employer)
              <div class="item"><a class="top-employer-img" href="#"><img class="img-fluid" src="{{asset("$employer->image")}}" alt=""/></a><a class="top-employer-name" href="#">{{$employer->name}}</a></div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="job-collection">
      <div class="container">
        <div class="job-collection-wrap">
          <div class="row">
            <div class="col-xl-9">
              <div class="js-title">
                <h2 class="h2-title">{{$multilang->js_job}}</h2>
              </div>
               <div class="data-container"></div>
                <div id="pagination-demo2"></div>
                @if($searched == null)
                 <h2>{{$multilang->result}}</h2>
                @endif
           <!--  <nav aria-label="Page navigation example">
                 {{ $jobsearch->links() }}
            </nav> -->
        
            </div>
            <div class="col-xl-3">
              <div class="ads-list">
                <div class="js-title">
                  <h2 class="h2-title">{{$multilang->salientcompany}}</h2>
                </div>
                <div class="ads-list-item">
                  @foreach($js_left_image as $left_image)
                  <a href="#"><img class="img-fluid" src="{{asset("$left_image->image")}}" alt=""/></a>
                  @endforeach
                 <!--  <a href="#"><img class="img-fluid" src="{{asset("fontend/images/ads-banner-02.png")}}" alt=""/></a><a href="#"><img class="img-fluid" src="{{asset("fontend/images/ads-banner-03.png")}}" alt=""/></a><a href="#"><img class="img-fluid" src="{{asset("fontend/images/ads-banner-04.png")}}" alt=""/></a></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<div id="wrapper">
    <section>

       
       
    </section>
</div>
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


<script src="{{ asset("backend/assets/js/detect.js") }}"></script>
<script src="{{ asset("backend/assets/js/fastclick.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.slimscroll.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.blockUI.js") }}"></script>
<script src="{{ asset("backend/assets/js/waves.js") }}"></script>
<script src="{{ asset("backend/assets/js/wow.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.nicescroll.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.scrollTo.min.js") }}"></script>
<script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
<script src="{{ asset("backend/plugins/sweet-alert2/sweetalert2.min.js") }}"></script>
<script src="{{ asset("fontend/pagination/src/pagination.js")}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(function() {
  (function(name) {
    var container = $('#pagination-' + name);
    var data = {!!$searched!!};
    console.log(data);
    console.log(Array.isArray(data));
    container.pagination({
      dataSource: data,
      locator: 'item',
      totalNumber: 5,
      pageSize: 4,
      ajax: {
        beforeSend: function() {
          container.prev().html('Loading data from serve...');
        }
      },
      callback: function(response, pagination) {
        var dataHtml = ' <div class="new-jobs-list"> ';

        $.each(response, function (index, item) {
          dataHtml += '<div class="item"><div class="job-info"><div class="job-img"><a href="#"><img class="img-fluid" src="'+item.featured_img+'" alt=""/></a></div>  <div class="job-desc"><h3><a href="#">'+item.title+'</a></h3><p class="company">'+item.excerpt+'</p> <div class="desciption"><div style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap; ">'+item.description+'</div></div></div></div><div class="job-action"><p class="times">'+item.created_at+'</p></div></div>';

        });

        dataHtml += '</div>';
      
        container.prev().html(dataHtml);
      }
    })
  })('demo2');
})
</script>
@include('backend.shared.initjs')
@include('sweet::alert')
@endsection
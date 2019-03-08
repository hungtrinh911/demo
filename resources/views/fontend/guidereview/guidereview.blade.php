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
   <link rel="stylesheet" href="{{asset("fontend/css/select2.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/style.css")}}"/>
  <link rel="stylesheet" href="{{asset("fontend/css/responsive.css")}}"/>
  <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{asset("fontend/pagination/dist/pagination.css")}}" rel="stylesheet" type="text/css">
 
@endsection
@section('content')
  <section class="slider">
    <div class="container">
      <div class="gr-slider owl-theme owl-carousel">
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
    <section class="search-form">
      <div class="container">
        <div class="search-form-wrap">
          <div class="row">
            <div class="col-xl-8 offset-xl-2">
            <form class="d-flex justify-content-between align-items-center" id="serch-form" method="post"
              action="{{ action('Fontend\GuidereviewController@search')}}">
               {{ csrf_field() }}
              <div class="input-form">
                <input class="form-control" type="text" placeholder="" id="key_word" name="key_word" placeholder="{{$multilang->search}}"/>
              </div>
              <div class="select-provincial">
                <select class="form-control js-provincial-single select2-hidden-accessible" name="provincial">
                  <option value="">{{$multilang->city}}</option>
                  @foreach ($cities as $city)
                  <option value="{{$city->name}}">{{$city->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="select-language">
                <select class="form-control js-language-single select2-hidden-accessible" name="language">
                  <option value="">{{$multilang->language}}</option>
                 @foreach ($languages as $language)
                 <option value="{{$language->language}}">{{$language->language}}</option>
                 @endforeach
               </select>
             </div>
             <button class="btn" type="submit">{{$multilang->search}}</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <section class="hot-tourguide">
  <div class="container">
    <div class="hot-tourguide-wrap">
      <div class="row">
        <div class="col-xl-6 offset-xl-3">
          <div class="tourguide-title">
            <h2>{{$multilang->hot_tourguide}}</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div class="tour-guider d-flex justify-content-between align-items-center">
            @foreach($tourguides_hot as $hot)
            <input type="hidden" value="{{ $img_cv = $hot->img_cv}}">
            <input type="hidden" value="{{ $id = $hot->id}}">
            <div class="item"><a  href="{{action('Fontend\GuidereviewController@detail',$id)}}"><img class="img-fluid" src="{{asset("images/cv/$img_cv")}}"alt=""/></a>
              <div class="tour-guilder-info d-flex">
                <div class="logo"><img class="img-fluid" src="{{asset("fontend/images/fake-logo.jpg")}}" alt=""/></div>
                <div class="info">
                  <h3><a style="color: white;" href="{{action('Fontend\GuidereviewController@detail',$id)}}">{{$hot->name}}</a></h3>
                  <p class="lang">
                   @if(\App\Language::getFlag($id) != null)
                   @foreach (\App\Language::getFlag($id) as $flag)
                   <img src=" {{asset("$flag")}}" alt=""/>
                   @endforeach
                   @endif
                 </p>
                <p class="rate">                         
                  @for( $i=0 ; $i < floor(\App\TourGuide::totalpoint($id)) ;$i++)
                <span class="star"></span>
                @endfor
                @if(\App\TourGuide::totalpoint($id) > 0 && (\App\TourGuide::totalpoint($id))/floor(\App\TourGuide::totalpoint($id)) != 1  )
                <span class="half-star"></span>
                @endif
                @for($i=0;$i < floor(5- \App\TourGuide::totalpoint($id)) ;$i++)
                  <span class="blank-star"></span>
                @endfor
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
</section>
 <section class="list-tourguide">
      <div class="container">
        <div class="list-tourguide-wrap">
          <div class="row">
            <div class="col-xl-6 offset-xl-3">
              <div class="tourguide-title">
                 <h2>{{$multilang->list_tourguide}}</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-10 offset-xl-1">
               <div class="list-guider d-flex flex-wrap justify-content-start align-items-center">
              @foreach($tourguidespg as $item)
    <input type="hidden" value="{{ $img_cv = $item->img_cv}}">
    <input type="hidden" value="{{ $id = $item->id}}">
          <div class="guider-item" >
            <div class="guider-img">
              <img class="img-fluid" src="{{asset("images/cv/$img_cv")}}" alt=""/>
            </div>
            <div class="guider-info">
              <h3>{{$item->name}}</h3>
              <p class="license">{{$item->class}}</p>
              <p class="rate">
              @for( $i=0 ; $i < floor(\App\TourGuide::totalpoint($id)) ;$i++)
                <span class="star"></span>
                @endfor
                @if(\App\TourGuide::totalpoint($id) > 0 && (\App\TourGuide::totalpoint($id))/floor(\App\TourGuide::totalpoint($id)) != 1  )
                <span class="half-star"></span>
                @endif
                @for($i=0;$i < floor(5- \App\TourGuide::totalpoint($id)) ;$i++)
                  <span class="blank-star"></span>
                @endfor
              </p>
              <p class="btn-action">
                <a class="btn" href="{{action('Fontend\GuidereviewController@detail',$id)}}">{{$multilang->viewprofile}}</a>
              </p>
              </div>
            </div>
            @endforeach
            </div>
            {{$tourguidespg->links()}}
        

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


<script src="{{asset("fontend/js/select2.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/owl.carousel.min.js")}}" type="text/javascript"></script>
<script src="{{asset("fontend/js/main.js")}}" type="text/javascript"></script>
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
<script src="{{ asset("fontend/pagination/src/pagination.js")}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('backend.shared.initjs')
@include('sweet::alert')    
<!-- <script>
$(function() {
  (function(name) {
    var container = $('#pagination-' + name);
    var data = {!!$tourguides!!};
    console.log(data);
    console.log(Array.isArray(data));
    container.pagination({
      dataSource: data,
      locator: 'item',
      totalNumber: 25,
      pageSize: 10,
      ajax: {
        beforeSend: function() {
          container.prev().html('Loading data from serve...');
        }
      },
      callback: function(response, pagination) {
        var dataHtml = ' <div class="list-guider d-flex flex-wrap justify-content-start align-items-center"> ';

        $.each(response, function (index, item) {
          id=item.id;
          
          dataHtml += '<input type="hidden" value="{{ $img_cv = ''}} '+item.img_cv+'"><input id="ids" type="hidden" value="{{ $id = ''}}'+item.id+'"> <div class="guider-item" ><div class="guider-img"><img class="img-fluid" src="{{asset("images/cv")}}/'+item.img_cv+'" alt=""/></div><div class="guider-info"><h3>'+item.name+'</h3><p class="license">'+item.class+'</p><p class="rate"> </p><p class="btn-action"><a class="btn" href="{{action('Fontend\GuidereviewController@detail',array('id'=>'')) }}/' + item.id + '">{{$multilang->viewprofile}}</a></p></div></div>'
        });

        dataHtml += '</div>';
      
        container.prev().html(dataHtml);
      }
    })
  })('demo2');
})
</script> -->
</script>

@endsection

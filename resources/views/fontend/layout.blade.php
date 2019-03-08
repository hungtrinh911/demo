<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    @yield('css')
</head>
<body class="home-page">
<header>
    <div class="container">
        <div class="d-none d-xl-block">
          <div class="d-flex justify-content-between align-items-center" id="header">
            <div class="col-xl-1">
          <input type="hidden" value="{{$img = $option->site_icon}}">
          <h1 class="logo"><a href="{{action('Fontend\IndexController@index')}}"><img class="img-fluid" src="{{asset("$img")}}" alt="logo"/></a></h1>
        </div>
        <div class="col-xl-11">
          <div class="d-flex justify-content-between align-items-center">
            <ul class="nav">
              <li><a href="{{action('Fontend\IndexController@index')}}">{{$multilang->home}}</a></li>
              <li  class=""><a href="{{action('Fontend\GuidereviewController@index')}}">{{$multilang->tourguide}}</a></li>
              <li class="level-2"><a href="{{action('Fontend\TrainingCourseController@index')}}">{{$multilang->trainingcourse}}</a>
                <ul class="list-unstyled">
                @foreach($tc_category as $tc)
                  <li><a href="{{action('Fontend\TrainingCourseController@index')}}">{{$tc->name}}</a></li>
                @endforeach
                </ul>
              </li>              
              <li class="level-2"><a href="{{action('Fontend\JobSearchController@index')}}">{{$multilang->jobsearch}}</a>
              </li>
               <li class=""><a href="{{action('Fontend\TravelBlogController@index')}}">{{$multilang->blog}}</a></li>
              <li><a href="{{action('Fontend\FaqsController@index')}}">{{$multilang->faqs}}</a></li>
              <li><a href="{{action('Fontend\AboutUsController@index')}}">{{$multilang->aboutus}}</a></li>
            </ul>
            <ul class="login list-unstyled d-flex justify-content-between align-items-center">
             @foreach(\App\Helper::localeList() as $item)
             @if(\App\Helper::currentLocale() !== $item->locale)
             <li class="active">
              <a href="?lang={{ $item->locale }}"><img src="{{ $item->flag }}"/></a>
            </li>
             @endif
            @endforeach
          </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="d-block d-xl-none">
          <div id="mobile-header">
            <h1 class="logo"><a href="#"><img class="img-fluid" src="{{asset("$img")}}" alt="logo"/></a></h1><a class="mobile-toggle-btn" href="#javacsript:void(0);"><span></span><span></span><span></span></a>
            <ul class="mobile-nav list-unstyled" style="display: none">
              <li><a href="{{action('Fontend\IndexController@index')}}">{{$multilang->home}}</a></li>
              <li  class=""><a href="{{action('Fontend\GuidereviewController@index')}}">{{$multilang->tourguide}}</a></li>
              <li class="sub-menu"><a href="{{action('Fontend\TrainingCourseController@index')}}">{{$multilang->trainingcourse}}</a>
                <ul class="list-unstyled" style="display: none">
                  <li class="sub-menu">
                    <ul class="list-unstyled" style="display: none">
                      @foreach($tc_category as $tc)
                      <li><a href="{{action('Fontend\TrainingCourseController@index')}}">{{$tc->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="level-2"><a href="{{action('Fontend\JobSearchController@index')}}">{{$multilang->jobsearch}}</a>
              </li>
               <li class=""><a href="{{action('Fontend\TravelBlogController@index')}}">{{$multilang->blog}}</a></li>
              <li><a href="{{action('Fontend\FaqsController@index')}}">{{$multilang->faqs}}</a></li>
              <li><a href="{{action('Fontend\AboutUsController@index')}}">{{$multilang->aboutus}}</a></li>
              @foreach(\App\Helper::localeList() as $item)
            @if(\App\Helper::currentLocale() !== $item->locale)
             <li class="sign-in">
              <a href="?lang={{ $item->locale }}"><img src="{{ $item->flag }}"/></a>
            </li>
            @endif
            @endforeach
            </ul>
          </div>
        </div>

<!--           <div class="d-block d-xl-none">
          <div id="mobile-header">
            <h1 class="logo"><a href="#"><img class="img-fluid" src="{{asset("$img")}}" alt="logo"/></a></h1><a class="mobile-toggle-btn" href="javacsript:void(0);"><span></span><span></span><span></span></a>
            <ul class="mobile-nav list-unstyled" style="display: none">
              <li><a href="{{action('Fontend\IndexController@index')}}">{{$multilang->home}}</a></li>
              <li  class=""><a href="{{action('Fontend\GuidereviewController@index')}}">{{$multilang->tourguide}}</a></li>
              <li class="sub-menu"><a href="{{action('Fontend\TrainingCourseController@index')}}">{{$multilang->trainingcourse}}</a>
                <ul class="list-unstyled" style="display: none">
                  <li class="sub-menu">
                    <ul class="list-unstyled" style="display: none">
                      @foreach($tc_category as $tc)
                      <li><a href="{{action('Fontend\TrainingCourseController@index')}}">{{$tc->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="level-2"><a href="{{action('Fontend\JobSearchController@index')}}">{{$multilang->jobsearch}}</a>
              </li>
               <li class=""><a href="{{action('Fontend\TravelBlogController@index')}}">{{$multilang->blog}}</a></li>
              <li><a href="{{action('Fontend\FaqsController@index')}}">{{$multilang->faqs}}</a></li>
              <li><a href="{{action('Fontend\AboutUsController@index')}}">{{$multilang->aboutus}}</a></li>
            </ul>
            <ul class="login list-unstyled d-flex justify-content-between align-items-center">
            @foreach(\App\Helper::localeList() as $item)
            @if(\App\Helper::currentLocale() !== $item->locale)
             <li class="active">
              <a href="?lang={{ $item->locale }}"><img src="{{ $item->flag }}"/></a>
            </li>
            @endif
            @endforeach
            </ul>
          </div>
        </div> -->
    </div>
  </header>
   @yield('content')
</section>
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 offset-xl-2">
            <div class="address">
              <h2>{{$multilang->aboutus}}</h2>
              <p class="desciption">{{$option->site_description}}</p>
              <ul class="list-unstyled">
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="{{asset("fontend/images/f-location.png")}}"/></div>
                  <div class="text">
                    <h4>{{$multilang->address}}</h4>
                    <p>{{$option->site_address}}</p>
                  </div>
                </li>
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="{{asset("fontend/images/f-phone.png")}}"/></div>
                  <div class="text">
                    <h4>{{$multilang->mobile}}</h4>
                    <p>{{$option->site_telephone}}</p>
                  </div>
                </li>
                <li class="d-flex justify-content-start align-items-start">
                  <div class="icon"><img class="img-fluid" src="{{asset("fontend/images/f-mail.png")}}"/></div>
                  <div class="text">
                    <h4>{{$multilang->email}}</h4>
                    <p>{{$option->site_email}}</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-4 offset-xl-1">
            <div class="contact">
              <h2>{{$multilang->contactus}}</h2>

              <form method="post" class="contact-form"
              action="{{ action('Fontend\IndexController@addContactUs') }}">
             {{ csrf_field() }}
                <input class="form-control" type="text" name="contact_name" id="contact_name" placeholder="{{$multilang->name}}" value="" >
                <input class="form-control" type="mail" name="contact_email" id="contact_email" placeholder="{{$multilang->email}}" >
                <input class="form-control" type="text" name="contact_phone" id="contact_phone" placeholder="{{$multilang->phone}}">
                <textarea class="form-control" row="3" name="contact_content" id="contact_content" placeholder="Message">{{old('contact_content')}}</textarea>
                <button class="btn-submit" type="submit">submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
<section class="bottom-bar">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 offset-xl-2">

        <div class="copyright"> {{\App\Option::get('site_copyright')}}</div>
      </div>
      <div class="col-xl-4 offset-xl-1 align-items-center">
        <ul class="social list-unstyled d-flex justify-content-center align-items-center">
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="{{asset("fontend/images/s-facebook.png")}}" alt=""/></a></li>
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="{{asset("fontend/images/s-twiter.png")}}" alt=""/></a></li>
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="{{asset("fontend/images/s-google.png")}}" alt=""/></a></li>
          <li class="d-flex justify-content-center align-items-center"><a href="#"><img src="{{asset("fontend/images/s-dribble.png")}}" alt=""/></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- END wrapper -->
@yield('javascript')
</body>
</html>

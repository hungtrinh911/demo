@extends('backend.layout')
@section('title', 'Tùy chỉnh thông tin')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/switchery/css/switchery.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/multiselect/css/multi-select.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/select2/css/select2.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-select/css/bootstrap-select.min.css") }}"/>
    <link rel="stylesheet"
          href="{{ asset("backend/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/plugins/jstree/style.css") }}"/>

    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/custom.css") }}"/>

    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')

    <div class="container-fluid">

        <form method="post" class="form-add" action="{{ action('Backend\OptionController@edit') }}">
        {{csrf_field()}}

        <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="btn-group pull-right m-t-15">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Cập nhật
                        </button>
                    </div>
                    <h4 class="page-title">Tùy chỉnh thông tin {{(session('locale'))}}</h4>
                    <ol class="breadcrumb">
                        {{--<li class="breadcrumb-item"><a href="#">Ubold</a></li>--}}
                        {{--<li class="breadcrumb-item"><a href="#">Forms</a></li>--}}
                        {{--<li class="breadcrumb-item active">X Editable</li>--}}
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @include('backend.shared.flash-message')
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#basic" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                Cơ bản
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#update" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Nâng cao
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#seo" data-toggle="tab" aria-expanded="false" class="nav-link">
                                SEO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#social" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Mạng xã hội
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#jobsearch" data-toggle="tab" aria-expanded="false" class="nav-link">
                               Trang Job Search
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#travelblog" data-toggle="tab" aria-expanded="false" class="nav-link">
                               Trang Travel blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#trainingcourse" data-toggle="tab" aria-expanded="false" class="nav-link">
                               Trang Training course
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Tên website</td>
                                    <td width="65%">
                                        <input type="text" id="site_name" name="site_name" class="form-control"
                                               value="{{ $option->site_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Đường dẫn website</td>
                                    <td>
                                        <input type="text" id="site_url" name="site_url" class="form-control"
                                               value="{{ $option->site_url }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Favicon (biểu tượng trên thanh trình duyệt)</td>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-2">
                                                <button type="button" id="btn-select-site-icon"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#modal-select-site-icon">
                                                    Chọn icon
                                                </button>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="hidden" id="site_icon" name="site_icon"
                                                       value="{{ $option->site_icon }}">
                                            </div>
                                            <div id="modal-select-site-icon" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn icon</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id=site_icon&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Thông tin copyright</td>
                                    <td>
                                        <input type="text" id="site_copyright" name="site_copyright"
                                               class="form-control"
                                               value="{{ $option->site_copyright }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                        <input type="text" id="site_address" name="site_address" class="form-control"
                                               value="{{ $option->site_address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chi nhánh</td>
                                    <td>
                                        <input type="text" id="site_multi_address" name="site_multi_address"
                                               value="{{ $option->site_multi_address }}"
                                                class="form-control
                                               placeholder="cách nhau bởi dấu chấm phẩy"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số Hotline</td>
                                    <td>
                                        <input type="text" id="site_hotline" name="site_hotline" class="form-control"
                                               value="{{ $option->site_hotline }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số máy bàn văn phòng</td>
                                    <td>
                                        <input type="text" id="site_telephone" name="site_telephone"
                                               class="form-control"
                                               value="{{ $option->site_telephone }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ email</td>
                                    <td>
                                        <input type="text" id="site_email" name="site_email" class="form-control"
                                               value="{{ $option->site_email }}">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="update">
                        <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr> 
                                      <td style="font-size: 22px;  font-weight: bold;">Danh sách slide top</td> 
                                    </tr>
                                    <tr>
                                        <td>Tiêu Đề</td>
                                        <td>Tóm Tắt</td>
                                        <td>Ảnh</td>
                                    </tr>
                                    @for ($i=0; $i < count($slides_top) ; $i++) 
                                    <input type="hidden" value="{{$j = $i+5}}">
                                    <input type="hidden" value="{{$k = $j+5}}">
                                    <input type="hidden" value="{{$m = $k+5}}">
                                    <tr>
                                    <td><label for=""></label><input type="text" id="{{$i}}" name="{{$i}}" class="form-control"
                                     value="{{$slides_top[$i]->title}}" placeholder="tiêu đề"></td>
                                    <td><label for=""></label>
                                    <textarea id="{{$j}}" name="{{$j}}" class="form-control">{{ $slides_top[$i]->content }}</textarea>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-3">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#{{$m}}">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                       value="{{ $slides_top[$i]->image}}">
                                            </div>
                                            <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                     </td>
                                     </tr>
                                     @endfor
                                     <tr> <td style="font-size: 22px;  font-weight: bold;">Tour Guide</td> </tr> 
                                       <tr>
                                        <td>Tiêu Đề</td>
                                        <td>Tóm Tắt</td>
                                        <td>Ảnh</td>
                                    </tr>
                                    @for ($i = 20; $i < 22 ; $i++) 
                                    <input type="hidden" value="{{$j = $i+5}}">
                                    <input type="hidden" value="{{$k = $j+5}}">
                                    <input type="hidden" value="{{$m = $k+5}}">
                                    <input type="hidden" value="{{$f = $i-20}}">
                                    <tr>
                                    <td><label for=""></label><input type="text" id="{{$i}}" name="{{$i}}" class="form-control"
                                     value="{{$site_tourguides[$f]->title}}" placeholder="tiêu đề"></td>
                                     
                                    <td><label for=""></label>
                                    <textarea id="{{$j}}" name="{{$j}}" class="form-control">{{ $site_tourguides[$f]->content }}</textarea>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-3">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#{{$m}}">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                       value="{{ $site_tourguides[$f]->image}}">
                                            </div>
                                            <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                     </td>
                                     </tr>
                                     @endfor
                                     <tr> <td style="  font-size: 22px;  font-weight: bold;">Guide Profiles</td></tr>
                                     @for($i = 40 ; $i< 44 ;$i++)
                                     <input type="hidden" value="{{$j = $i-39}}">
                                     <tr>
                                          <label for=""></label>
                                          <td>Nội dung</td> 
                                          <label for=""></label>
                                          <td><input type="text" id="{{$i}}" name="{{$i}}" class="form-control"
                                          value="{{$site_guide_profiles[$j]}}" placeholder="tiêu đề">
                                          </td>
                                          <td></td>
                                     </tr>
                                     @endfor

                                    @for($i = 1000 ; $i< 1001 ;$i++)
                                     <input type="hidden" value="{{$j = $i-1000}}">
                                     <input type="hidden" value="{{$k = $i+5}}">
                                     <input type="hidden" value="{{$m = $k+5}}">
                                     <tr>
                                        <td>Ảnh nền</td>
                                            <td>
                                            <div class="row h-100">
                                                <div class="col-lg-3">
                                                    <button type="button" id="btn-select-site-image"
                                                            class="btn btn-default waves-effect waves-light w-100"
                                                            data-toggle="modal" data-target="#{{$m}}">
                                                        Chọn
                                                    </button>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                           value="{{ $site_guide_profiles[$j]}}">
                                                </div>
                                                <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="full-width-modalLabel"
                                                     aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">×
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe style="width:100%;" height="500px" frameborder="0"
                                                                        src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                                </iframe>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                         </td>
                                          <td></td>
                                     </tr>
                                     @endfor
                                    <tr>
                                    <td>Danh sách slide phần guide-profile</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-3 h-100">
                                                <button type="button" id="btn-select-site-logos"
                                                        class="btn btn-default waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target="#modal-select-site-logos">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="site_logos" name="site_logos"
                                                       value="{{ $option->site_logos }}">
                                            </div>
                                            <div id="modal-select-site-logos" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id=site_logos&relative_url=1&multiple=1">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </td>
                                </tr>

                                  
                                    <tr> <td style="font-size: 22px;  font-weight: bold;">Job Opportunity Search</td> </tr> 
                                       <tr>
                                        <td>Tiêu Đề</td>
                                        <td>Tóm Tắt</td>
                                        <td>Ảnh</td>
                                    </tr>
                                    @for ($i = 3000; $i < 3001 ; $i++) 
                                    <input type="hidden" value="{{$j = $i+5}}">
                                    <input type="hidden" value="{{$k = $j+5}}">
                                    <input type="hidden" value="{{$m = $k+5}}">
                                    <input type="hidden" value="{{$f = $i-3000}}">
                                    <tr>
                                    <td><label for=""></label><input type="text" id="{{$i}}" name="{{$i}}" class="form-control"
                                     value="{{$site_job_search[$f]->description}}" placeholder="tiêu đề"></td>

                                    <td><label for=""></label>
                                    <textarea id="{{$j}}" name="{{$j}}" class="form-control">{{ $site_job_search[$f]->content }}</textarea>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-3">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#{{$m}}">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                       value="{{ $site_job_search[$f]->image}}">
                                            </div>
                                            <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                     </td>
                                     </tr>
                                     @endfor
                                       <tr> <td style="  font-size: 22px;  font-weight: bold;">Thông Sô</td> </tr> 
                                       <tr>
                                        <td>Số liệu</td>
                                        <td>Nội dung</td>
                                        <td></td>
                                    </tr>
                                    @for ($i = 5000; $i < 5003 ; $i++) 
                                    <input type="hidden" value="{{$j = $i+5}}">
                                    <input type="hidden" value="{{$f = $i-5000}}">
                                    <tr>
                                        <td><label for=""></label><input type="text" id="{{$i}}" name="{{$i}}" class="form-control"
                                         value="{{$site_number[$f]->number}}"></td>
                                        <td><label for=""></label>
                                        <input type="text" id="{{$j}}" name="{{$j}}" class="form-control" value="{{ $site_number[$f]->word }}">
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endfor

                                      <tr> <td style="  font-size: 22px;  font-weight: bold;">Faqs</td> </tr> 
                                       <tr>
                                        <td>câu hỏi</td>
                                        <td>trả lời</td>
                                        <td></td>
                                    </tr>
                                    @for ($i = 4000; $i < 4003 ; $i++) 
                                    <input type="hidden" value="{{$j = $i+5}}">
                                    <input type="hidden" value="{{$f = $i-4000}}">
                                    <tr>
                                        <td><label for=""></label><input type="text" id="{{$i}}" name="{{$i}}" class="form-control"
                                         value="{{$site_faqs[$f]->title}}" placeholder="tiêu đề"></td>
                                        <td>
                                        <textarea id="{{$j}}" name="{{$j}}" class="form-control">{{ $site_faqs[$f]->content }}</textarea>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endfor

                                    <tr> <td style="  font-size: 22px;  font-weight: bold;">Why guide review</td> </tr> 
                                    <tr>
                                        <td>Tiêu Đề</td>
                                        <td>Tóm Tắt</td>
                                        <td></td>
                                    </tr>
                                    @for ($i = 6000; $i < 6001 ; $i++) 
                                    <input type="hidden" value="{{$j = $i+5}}">
                                    <input type="hidden" value="{{$f = $i-6000}}">
                                    <tr>
                                        <td><label for=""></label><input type="text" id="9003" name="9003" class="form-control"
                                         value="{{$site_contact_us[0]}}" placeholder="tiêu đề"></td>
                                        <td>
                                        <textarea id="9004" name="9004" class="form-control">{{ $site_contact_us[1] }}</textarea>
                                        </td>
                                    </tr>
                                    @endfor
                                    <tr>
                                        <td><label for=""></label><input type="text" id="9000" name="9000" class="form-control"
                                         value="{{$site_contact_us[2]}}" placeholder="tiêu đề"></td>
                                       
                                        <td><label for=""></label><input type="text" id="9001" name="9001" class="form-control"
                                         value="{{$site_contact_us[3]}}" placeholder="tiêu đề"></td>
                                     
                                        <td><label for=""></label><input type="text" id="9002" name="9002" class="form-control"
                                         value="{{$site_contact_us[4]}}" placeholder="tiêu đề"></td>
                                    
                                    </tr>
                                   
                                </tbody> 
                        </table>
                        </div>
                        <div class="tab-pane" id="seo">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Tiêu đề mặc định</td>
                                    <td width="65%">
                                        <input type="text" id="site_title" name="site_title" class="form-control"
                                               value="{{ $option->site_title }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mô tả site</td>
                                    <td>
                                    <textarea id="site_description" name="site_description" class="form-control"
                                              rows="3"
                                              placeholder="">{{ $option->site_description }}</textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Từ khóa</td>
                                    <td>
                                        <input type="text" id="site_keywords" name="site_keywords"
                                               value="{{ $option->site_keywords }}"
                                               data-role="tagsinput" class="form-control"
                                               placeholder="thêm từ khóa"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ảnh mặc định website</td>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-2">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#modal-select-site-image">
                                                    Chọn icon
                                                </button>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="hidden" id="site_image" name="site_image"
                                                       value="{{ $option->site_image }}">
                                            </div>
                                            <div id="modal-select-site-image" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id=site_image&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Google Analytics Tracking ID</td>
                                    <td>
                                        <input type="text" id="gg_analytics_tracking_id" name="gg_analytics_tracking_id"
                                               class="form-control"
                                               value="{{ $option->gg_analytics_tracking_id }}">
                                    </td>
                                </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="social">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td width="35%">Facebook AppID</td>
                                    <td width="65%">
                                        <input type="text" id="fb_app_id" name="fb_app_id" class="form-control"
                                               value="{{ $option->fb_app_id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook Page</td>
                                    <td>
                                        <input type="text" id="fb_page_link" name="fb_page_link" class="form-control"
                                               value="{{ $option->fb_page_link }}">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="trainingcourse">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                     @for($i = 300 ; $i< 301 ;$i++)
                                     <input type="hidden" value="{{$j = $i-300}}">
                                     <input type="hidden" value="{{$k = $i+5}}">
                                     <input type="hidden" value="{{$m = $k+5}}">
                                     <tr>
                                        <td width="35%">Ảnh 1</td>
                                            <td>
                                            <div class="row h-100">
                                                <div class="col-lg-3">
                                                    <button type="button" id="btn-select-site-image"
                                                            class="btn btn-default waves-effect waves-light w-100"
                                                            data-toggle="modal" data-target="#{{$m}}">
                                                        Chọn
                                                    </button>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                           value="{{ $tc_banner1[$j]->image}}">
                                                </div>
                                                <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="full-width-modalLabel"
                                                     aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">×
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe style="width:100%;" height="500px" frameborder="0"
                                                                        src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                                </iframe>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                         </td>
                                          <td></td>
                                     </tr>
                                     @endfor
                                    
                                </tr>
                                <tr>
                                    
                                   @for($i = 330 ; $i< 331 ;$i++)
                                     <input type="hidden" value="{{$j = $i-330}}">
                                     <input type="hidden" value="{{$k = $i+5}}">
                                     <input type="hidden" value="{{$m = $k+5}}">
                                     <tr>
                                        <td>Ảnh 2</td>
                                            <td>
                                            <div class="row h-100">
                                                <div class="col-lg-3">
                                                    <button type="button" id="btn-select-site-image"
                                                            class="btn btn-default waves-effect waves-light w-100"
                                                            data-toggle="modal" data-target="#{{$m}}">
                                                        Chọn
                                                    </button>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                           value="{{ $tc_banner2[$j]->image}}">
                                                </div>
                                                <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="full-width-modalLabel"
                                                     aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">×
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe style="width:100%;" height="500px" frameborder="0"
                                                                        src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                                </iframe>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                         </td>
                                          <td></td>
                                     </tr>
                                     @endfor
                                </tr>
                                <tr>
                                    
                                    @for($i = 360 ; $i< 361 ;$i++)
                                     <input type="hidden" value="{{$j = $i-360}}">
                                     <input type="hidden" value="{{$k = $i+5}}">
                                     <input type="hidden" value="{{$m = $k+5}}">
                                     <tr>
                                        <td>Ảnh 3</td>
                                            <td>
                                            <div class="row h-100">
                                                <div class="col-lg-3">
                                                    <button type="button" id="btn-select-site-image"
                                                            class="btn btn-default waves-effect waves-light w-100"
                                                            data-toggle="modal" data-target="#{{$m}}">
                                                        Chọn
                                                    </button>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                           value="{{ $tc_banner3[$j]->image}}">
                                                </div>
                                                <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="full-width-modalLabel"
                                                     aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-full">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">×
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe style="width:100%;" height="500px" frameborder="0"
                                                                        src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                                </iframe>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                         </td>
                                          <td></td>
                                     </tr>
                                     @endfor
                                </tr>
                                 <tr> 
                                      <td style="font-size: 22px;  font-weight: bold;">Nhận xét về khóa học</td> 
                                    </tr>
                                    <tr>
                                        <td>Tên</td>
                                        <td>Nội dung</td>
                                        <td>Ảnh</td>
                                    </tr>
                                    @for ($i=0; $i < count($site_review) ; $i++) 
                                    <input type="hidden" value="{{$j = $i+695}}">
                                    <input type="hidden" value="{{$l = $i+700}}">
                                    <input type="hidden" value="{{$k = $i+705}}">
                                    <input type="hidden" value="{{$m = $i+710}}">
                                    <tr>
                                    <td><label for=""></label><input type="text" id="{{$j}}" name="{{$j}}" class="form-control"
                                     value="{{$site_review[$i]->title}}" placeholder="tiêu đề"></td>
                                    <td><label for=""></label>
                                    <textarea id="{{$l}}" name="{{$l}}" class="form-control">{{ $site_review[$i]->content }}</textarea>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-3">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#{{$m}}">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                       value="{{ $site_review[$i]->image}}">
                                            </div>
                                            <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                     </td>
                                     </tr>
                                     @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="travelblog">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr> 
                                      <td style="font-size: 22px;  font-weight: bold;">Ảnh banner </td> 
                                    </tr>
                                    <tr>
                                        <td>Ảnh</td>
                                    </tr>
                                    @for ($i=0; $i < 1 ; $i++) 
                                    <input type="hidden" value="{{$k = $i+3610}}">
                                    <input type="hidden" value="{{$m = $i+3615}}">
                                    <tr>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-3">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#{{$m}}">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                       value="{{$tb_banner[$i]->image}}">
                                            </div>
                                            <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                     </td>
                                     </tr>
                                     @endfor

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="jobsearch">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                     <tr> 
                                      <td style="font-size: 22px;  font-weight: bold;">Ảnh bìa</td> 
                                    </tr>
                                    <tr>
                                        <td>Ảnh</td>
                                    </tr>
                                    @for ($i=0; $i < 1 ; $i++) 
                                    <input type="hidden" value="{{$k = $i+2620}}">
                                    <input type="hidden" value="{{$m = $i+2625}}">
                                    <tr>
                                    <td>
                                        <div class="row h-100">
                                            <div class="col-lg-3">
                                                <button type="button" id="btn-select-site-image"
                                                        class="btn btn-default waves-effect waves-light w-100"
                                                        data-toggle="modal" data-target="#{{$m}}">
                                                    Chọn
                                                </button>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="hidden" id="{{$k}}" name="{{$k}}"
                                                       value="{{$js_banner[$i]->image}}">
                                            </div>
                                            <div id="{{$m}}" class="modal fade" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="full-width-modalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-full">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="full-width-modalLabel">Chọn</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe style="width:100%;" height="500px" frameborder="0"
                                                                    src="/backend/plugins/filemanager/dialog.php?type=1&field_id={{$k}}&relative_url=1&multiple=0">
                                                            </iframe>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                     </td>
                                     </tr>
                                     @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div> <!-- container -->

@endsection

@section('javascript')
    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/detect.js") }}"></script>
    <script src="{{ asset("backend/assets/js/fastclick.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.slimscroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.blockUI.js") }}"></script>
    <script src="{{ asset("backend/assets/js/waves.js") }}"></script>
    <script src="{{ asset("backend/assets/js/wow.min.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.nicescroll.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.scrollTo.min.js") }}"></script>

    <script src="{{ asset("backend/plugins/jstree/jstree.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/switchery/js/switchery.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/multiselect/js/jquery.multi-select.js") }}"></script>
    <script src="{{ asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js") }}"></script>
    <script src="{{ asset("backend/plugins/select2/js/select2.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-select/js/bootstrap-select.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") }}"></script>
    <script src="{{ asset("backend/plugins/tinymce/tinymce.min.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js") }}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js") }}"></script>
    @include('backend.shared.initjs')

    <script type="text/javascript">
        $(document).ready(function () {
            reloadImages('site_icon', '');
            reloadImages('site_logos', '');
            reloadImages('site_image', '');
            reloadImages('10', '');
            reloadImages('11', '');
            reloadImages('12', '');
            reloadImages('305', '');
            reloadImages('335', '');
            reloadImages('365', '');
            reloadImages('12', '');
            reloadImages('12', '');
            reloadImages('444', '');
            reloadImages('445', '');

            reloadImages('705', '');
            reloadImages('706', '');
            reloadImages('707', '');

            reloadImages('30', '');
            reloadImages('31', '');
            reloadImages('1005', '');
            reloadImages('2010', '');
            reloadImages('2011', '');
            reloadImages('2012', '');
            reloadImages('2230', '');
            reloadImages('2231', '');
            reloadImages('2232', '');
            reloadImages('2510', '');
            reloadImages('2511', '');
            reloadImages('2512', '');
            reloadImages('2620', '');

            reloadImages('3010', '');
            reloadImages('3610', '');
        });

        function responsive_filemanager_callback(field_id) {
            reloadImages(field_id, '/{{ env('UPLOAD_FOLDER') }}/');
        }
    </script>
@endsection

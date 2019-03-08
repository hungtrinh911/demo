@extends('backend.layout')
@section('title', 'Thêm TourGuide')
@section('css')
 <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
   
      <link href="{{asset("backend/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
      <link href="{{asset("backend/assets/css/style.css")}}" rel="stylesheet" type="text/css" />
      <script  src="{{asset("backend/assets/js/modernizr.min.js")}}"></script>
@endsection

@section('content')
          <!-- ============================================================== -->
          <!-- Start right Content here -->
          <div class="container-fluid">
          
                <div class="row">
                  <div class="col-sm-8">
                    <h4 class="page-title">Danh sách TourGuide</h4>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ action('Backend\TourGuideController@index') }} ">Tour Guide</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                      </ol>                                         
                    </div>
                    <div class="col-sm-1">
                      <div class="m-b-30">
                       <a href="{{ action('Backend\TourGuideController@create') }} " class="btn btn-default">Thêm Mới</a>
                     </div>
                   </div>

               </div>
             <div class="row">
               <div class="col-sm-12">
                <div class="card-box">
                    @if(Auth::user()->can('delete-news'))
                        <button id="grid-btn-delete-multi" class="btn btn-danger"
                                data-toggle="modal" data-target=".modal-delete" disabled>
                            <i class="fa fa-times m-r-5"></i>Xóa
                        </button>
                    @endif
                    <table id="grid" class="table-bordered "
                           data-toggle="table"
                           data-toolbar="#grid-btn-delete-multi"
                           data-search="true"
                           data-show-refresh="false"
                           data-show-toggle="false"
                           data-show-columns="false"
                           data-show-pagination-switch="false"
                           data-page-size="10"
                           data-page-list="[5, 10, 20, 30, 50]"
                           data-url="{{ action('Api\TourGuideController@grid') }}"
                           data-side-pagination="server"
                           data-pagination="true"
                           data-show-footer="false"
                           data-only-info-pagination="false"
                           data-locale="vi-VN"
                           data-pagination-pre-text="<< Trước"
                           data-pagination-next-text="Sau >>">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="id" data-sortable="false">ID</th>
                            <th data-field="name" data-sortable="false">Tên</th>
                            <th data-field="status" data-sortable="false">Trạng thái
                            </th>
                            <th data-field="class" data-sortable="false">Rank
                                cập nhật
                            </th>
                            <th data-field="id" data-formatter="gridAction">Hành động</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
                            
                          </div> <!-- container -->
    <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Xóa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    Bạn đồng ý xóa?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    <form method="post" class="form-delete">
                        {{csrf_field()}}
                        <button type="button" class="btn btn-danger waves-effect waves-light">Xóa</button>
                        <input type="hidden" id="ids" name="ids" value="">
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection

@section('javascript')
      <script>
        var resizefunc = [];
    </script>

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

    <script src="{{ asset("backend/plugins/bootstrap-table/js/bootstrap-table.js") }}"></script>
    <script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-vi-VN.min.js") }}"></script>
    {{--    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>--}}

    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>
    @include('backend.shared.initjs')

    <script>
        $(document).ready(function () {
            var $table = $('#grid');
              $( '.bs-checkbox' ).each(function( index, element ) {
                 console.log(  $(element).text());
              });
           
            $remove = $('#grid-btn-delete-multi');
            $table.on('load-success.bs.table', function () {
                $remove.prop('disabled', true);
                $('.modal-delete').modal('hide');
                $('.grid-btn-delete').on('click', function () {
                    $('.form-delete ').attr('action', $(this).attr('data-href'));
                });
            });

            $table.on('page-change.bs.table', function (e, number, size, search) {
                var offset = (number - 1) * size;
                $table.bootstrapTable('refresh', {
                    offset: offset,
                    limit: size,
                    search: search
                });
            });

            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
            });

            $remove.on('click', function () {
                var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                    return row.id
                });
                $('.form-delete #ids').val(ids);
            });

            $('.form-delete').on('submit', function () {
                event.preventDefault();

                $.ajax({
                    url: '{{ action('Api\TourGuideController@destroy') }}', type: 'POST', dataType: 'JSON',
                    data: $(this).serialize(),
                    success: function (data) {
                        $table.bootstrapTable('refresh', {silent: true});
                    }
                });
            });
        });

        function gridAction(value, row) {
            var actions = '';
              @if(Auth::user()->can('edit-news'))
                actions += '<a href="{{ action('Backend\TourGuideController@show_skill', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-info-circle "></i></a> ';
            @endif
            @if(Auth::user()->can('edit-news'))
                actions +='<a href="{{ action('Backend\TourGuideController@edit', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i class="fa fa-pencil"></i></a> ';
            @endif
          
            @if(Auth::user()->can('delete-news'))
                actions += '<a href="javascript:;" class="on-default remove-row text-danger grid-btn-delete" data-placement="top" title="" data-original-title="Delete" data-toggle="modal" data-target=".modal-delete" data-href="{{  action('Backend\TourGuideController@destroy', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary"><i data-id="' + row.id + '" class="fa fa-trash-o grid-btn-delete"></i></a> ';
            @endif


                return actions;
        }
    </script>
@endsection

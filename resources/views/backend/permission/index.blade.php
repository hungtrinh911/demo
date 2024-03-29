
@extends('backend.layout')
@section('title', 'Danh sách permission')
@section('css')
    <link rel="stylesheet" href="{{ asset("backend/plugins/bootstrap-table/css/bootstrap-table.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/icons.css") }}"/>
    <link rel="stylesheet" href="{{ asset("backend/assets/css/style.css") }}"/>
    <script src="{{ asset("backend/assets/js/modernizr.min.js") }}"></script>
@endsection

@section('content')

    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">

               <!--  <div class="btn-group pull-right m-t-15">
                    <a href="{{ action('Backend\NewsController@showAddForm') }}" class="btn btn-default">
                        <i class="fa fa-plus"></i></a>
                </div> -->

                <h4 class="page-title">Danh sách permission</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ action('Backend\PermissionController@index') }}">Permission</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>

            </div>
        </div>

        <!--Custom Toolbar-->
        <!--===================================================-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">

                    <button id="demo-delete-row" class="btn btn-danger" disabled><i class="fa fa-times m-r-5"></i>Delete
                    </button>
                    <table id="table" class="table-bordered "
                           data-toggle="table"
                           data-toolbar="#demo-delete-row"
                           data-search="true"
                           data-show-refresh="false"
                           data-show-toggle="false"
                           data-show-columns="false"
                           data-show-pagination-switch="false"
                           data-page-size="20"
                           data-page-list="[5, 10, 20, 50]"
                           data-url="{{ action('Api\PermissionController@grid') }}"
                           data-side-pagination="server"
                           data-pagination="true"
                           data-show-footer="false"
                           data-only-info-pagination="false"
                           data-pagination-pre-text="<< Trước"
                           data-pagination-next-text="Sau >>">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="id" data-sortable="false">ID</th>
                            <th data-field="title" data-sortable="false">Tiêu đề</th>
                            <th data-field="created_at" data-sortable="false" data-formatter="dateFormatter">Ngày tạo
                            </th>
                            <th data-field="updated_at" data-sortable="false" data-formatter="dateFormatter">Ngày
                                cập nhật
                            </th>
                            <th data-field="id" data-formatter="gridAction">Hành động</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>

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
    <script src="{{ asset("backend/assets/pages/jquery.bs-table.js") }}"></script>

    <script src="{{ asset("backend/assets/js/jquery.core.js")}}"></script>
    <script src="{{ asset("backend/assets/js/jquery.app.js")}}"></script>

    <script>
        $(document).ready(function () {
            var $table = $('#table');
            $table.on('page-change.bs.table', function (e, number, size, search) {
                var offset = (number - 1) * size;
                $table.bootstrapTable('refresh', {
                    offset: offset,
                    limit: size,
                    search: search
                });
            });
        });

        function gridAction(value, row) {
            var actions = '';

            console.log(value);
            console.log(row);

            @if(Auth::user()->can('edit-news'))
                actions += '<a href="{{ action('Backend\NewsController@showEditForm', array('id'=>'')) }}/' + row.id + '" class="on-default edit-row text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i></a> ';
            @endif

                    @if(Auth::user()->can('delete-news'))
                actions += '<a href="#" class="on-default remove-row text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> ';
            @endif

                return actions;
        }
    </script>

@endsection

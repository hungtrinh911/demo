@extends('backend.layout')
@section('title', 'Danh Sách contact')
@section('css')
      <link rel="stylesheet" href="{{asset("backend/plugins/magnific-popup/css/magnific-popup.css")}}" />
      <link rel="stylesheet" href="{{asset("backend/plugins/jquery-datatables-editable/dataTables.bootstrap4.min.css")}}" />

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
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                      <div class="col-sm-10">
                                        <h4 class="page-title">Danh sách contact</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ action('Backend\ContactUsController@index') }} ">contact</a></li>
                                            <li class="breadcrumb-item active">Danh sách</li>
                                        </ol>                                         
                                      </div>
                                    </div>
                                    <table class="table table-striped add-edit-table" id="datatable-editable">
                                        <thead>
                                        <tr>
                                            <th>Họ Tên</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                        <tr class="gradeX">
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <input type="hidden" name="" value="{{$id =$contact->id}}">
                                            <td class="actions">
                                               <a href="{{ action('Backend\ContactUsController@show',['id' =>$id]) }}"  title="" data-original-title="Chi Tiết"><i class="fa fa-edit"></i></a>
                                                @if (Auth::user()->can('list-contact'))
                                                <a href="javascript:;"
                                                   class="on-default remove-row text-danger grid-btn-delete"
                                                   data-placement="top" title="" data-original-title="Delete"
                                                   data-toggle="modal" data-target=".modal-delete"
                                                   data-href="{{ action('Backend\ContactUsController@destroy', ['id' =>$id]) }}">
                                                    <i class="fa fa-trash-o"></i></a>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: page -->
                        </div> <!-- end Panel -->
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
                       {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Xóa</button>
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

      <!-- jQuery  -->
      <script src="{{ asset("backend/assets/js/jquery.min.js") }}"></script>
      <script src="{{ asset("backend/assets/js/popper.min.js")}}"></script><!-- Popper for Bootstrap -->
      <script src="{{asset("backend/assets/js/bootstrap.min.js")}}"></script>
      <script src="{{asset("backend/assets/js/detect.js")}}"></script>
      <script src="{{asset("backend/assets/js/fastclick.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.slimscroll.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.blockUI.js")}}"></script>
      <script src="{{asset("backend/assets/js/waves.js")}}"></script>
      <script src="{{asset("backend/assets/js/wow.min.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.nicescroll.js")}}"></script>
      <script src="{{asset("backend/assets/js/jquery.scrollTo.min.js")}}"></script>
     

        <script src="{{asset("backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js")}}"></script>
        <script src="{{asset("backend/plugins/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("backend/plugins/datatables/dataTables.bootstrap4.min.js")}}"></script>
        <script src="{{asset("backend/plugins/tiny-editable/mindmup-editabletable.js")}}"></script>
        <script src="{{asset("backend/plugins/tiny-editable/numeric-input-example.js")}}"></script>

        <!-- App js -->
        

        <script src="{{asset("backend/assets/js/jquery.core.js")}}"></script>
        <script src="{{asset("backend/assets/js/jquery.app.js")}}"></script>

        <script src="{{asset("backend/assets/pages/datatables.editable.init.js")}}"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>
          <script type="text/javascript">
        $(document).ready(function () {
           
            $('.grid-btn-delete').on('click', function () {
                $('.form-delete').attr('action', $(this).attr('data-href'));
            });
        });
    </script>
    
@endsection

{{-- {{dd($listUsers)}} --}}
@extends('theme.layouts.layout')
@section('title')
	Danh sách nhân viên trong {{$team->name}}
@endsection
@section('css')
    <link href="{{asset('/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings"></i>
                    <span class="caption-subject">Danh sách nhân viên trong {{$team->name}}</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn white btn-outline" href="javascript:;" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <span> Công cụ </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right" id="table_tools">
                            <li>
                                <a href="javascript:;" data-action="0" class="tool-action">
                                    <i class="icon-printer"></i> Print
                                </a>
                            </li>

                            <li>
                                <a href="javascript:;" data-action="1" class="tool-action">
                                    <i class="icon-doc"></i> PDF
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-action="2" class="tool-action">
                                    <i class="icon-paper-clip"></i> Excel
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="table-tsh">
                        <thead>
                            <tr>
                                <th> Mã nhân viên </th>
                                <th> Tên nhân viên </th>
                                <th> Email </th>
                                <th> Địa chỉ </th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUsers as $lu)
                                <tr>
                                    <td>{{$lu->id}}</td>
                                    <td>{{$lu->name}}</td>
                                    <td>{{$lu->email}}</td>
                                    <td>{{$lu->address}}</td>
                                    <td class="btn-group btn-group-solid">
                                        <a href="javascript:;" onclick="confirmRemove('{{ route('remove-user', ['id' => $lu->id]) }}')"  class="btn btn-icon-only red btn-outline">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-icon-only blue btn-outline">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-toggle="modal" href="#view{{$lu->id}}" class="btn btn-icon-only purple btn-outline">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($listUsers as $lu)
                        <div id="view{{$lu->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Thông tin nhân viên</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                        <div class="col-md-4">
                                            <img src="{{asset($lu->avatar)}}" class="img-responsive" alt="{{$lu->avatar}}">
                                            <h4>Bộ phận IT</h4>
                                            <p>{{$part->name}}</p>
                                            <h4>Nhóm IT</h4>
                                            <p>{{$team->name}}</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="col-md-12 form-group">
                                                <h5>Họ tên</h5>
                                                <p>{{$lu->name}}</p>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <h5>Ngày sinh</h5>
                                                <p>{{$lu->birthday}}</p>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <h5>Giới tính</h5>
                                                <p>{{$lu->gender}}</p>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <h5>Số điện thoại</h5>
                                                <p>{{$lu->phonenumber}}</p>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <h5>Email</h5>
                                                <p>{{$lu->email}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <h5 class="text-center">Mô tả chi tiết</h5>
                                            @php
                                                $desc = html_entity_decode($lu->desc);
                                                echo $desc;
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js1')
    <script src="{{asset('/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
@endsection
@section('js2')
    <script src="{{asset('/assets/pages-custom/scripts/table-datatables-buttons.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
@endsection
@section('js3')

@endsection
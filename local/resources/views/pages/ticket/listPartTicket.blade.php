@extends('theme.layouts.layout')
@section('title')
    Danh sách công việc của bộ phận {{$part->name}}
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
                    <span class="caption-subject">Danh sách công việc của bộ phận {{$part->name}}</span>
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
                    <table class="table table-striped table-hover" id="table-tsh">
                        <thead>
                            <tr>
                                <th> Mã công việc </th>
                                <th> Tên công việc </th>
                                <th> Thời hạn </th>
                                <th> Nhóm thực hiện </th>
                                <th> Trạng thái </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listTickets as $ticket)
                                <tr data-toggle="modal" href="#view{{$ticket->id}}">
                                    @php
                                        $requestName = $ticket->ticketGetMemberName($ticket->id_request);
                                        $partName = $ticket->ticketGetPartName();
                                        $teamName = $ticket->ticketGetTeamName();
                                        $assignName = $ticket->ticketGetMemberName($ticket->id_assign);
                                        $relatedName = $ticket->ticketGetMemberName($ticket->id_related);
                                        $statusName = $ticket->ticketGetStatusName($ticket->status);
                                    @endphp
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->name}}</td>
                                    <td>{{$ticket->deadline}}</td>
                                    <td>{{$teamName}}</td>
                                    <td>{{$statusName}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($listTickets as $ticket)
    <div id="view{{$ticket->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
        <div class="modal-header">
            <h5 class="text-center">Công việc: {{$ticket->name}}</h5>
        </div>
        <div class="modal-footer">
            <div class="col-md-6">
                <a href="{{ route('view-ticket', ['id'=>$ticket->id]) }}" class="btn green btn-outline btn-block">Chi tiết công việc</a>
            </div>
            <div class="col-md-6">
                <button type="button" data-dismiss="modal" class="btn btn-outline dark btn-block">Đóng</button>
            </div>
        </div>
    </div>
@endforeach
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

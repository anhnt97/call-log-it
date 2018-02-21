@extends('theme.layouts.layout')
@section('title')
	Chi tiết công việc {{$ticket->name}}
@endsection
@section('css')
    <link href="{{asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />

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
                    <span class="caption-subject">Chi tiết công việc: {{$ticket->name}}</span>
                </div>
                @if (Auth::user()->role >=300 || Auth::user()->id == $ticket->id_request || Auth::user()->id == $ticket->id_assign || Auth::user()->id == $ticket->id_related)
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn white btn-outline" href="javascript:;" data-toggle="dropdown">
                            <i class="fa fa-pencil"></i>
                            <span> Chỉnh sửa </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            @if (Auth::user()->role >= 400 || Auth::user()->id == $ticket->id_assign)
                                <li>
                                    <a data-toggle="modal" href="#editStatus">Trạng thái</a>
                                </li>
                            @endif
                            @if (Auth::user()->role >= 400 || Auth::user()->id == $ticket->id_request)
                                <li>
                                    <a data-toggle="modal" href="#editDeadline">Ngày hết hạn</a>
                                </li>
                            @endif
                            @if (Auth::user()->role >= 300 || Auth::user()->id == $ticket->id_request)
                                <li>
                                    <a data-toggle="modal" href="#editPriority">Mức độ ưu tiên</a>
                                </li>
                            @endif
                            @if (Auth::user()->role >= 300)
                                <li>
                                    <a data-toggle="modal" href="#editAssign">Người thực hiện</a>
                                </li>
                            @endif
                            @if (Auth::user()->role >= 300 || Auth::user()->id == $ticket->id_request)
                                <li>
                                    <a data-toggle="modal" href="#editRelated">Người liên quan</a>
                                </li>
                            @endif
                            @if ($ticket->status != 5)
                                @if (Auth::user()->role >= 400 || Auth::user()->id == $ticket->id_request || $ticket->status != 5)
                                    <li>
                                        <a data-toggle="modal" href="#closeTicket">Đóng công việc</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                        <div id="editStatus" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Thay đổi trạng thái</p>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('save-edit-ticket', ['id' => $ticket->id]) }}" method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <select name="status" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        @foreach ($status as $st)
                                            <option value="{{$st->id}}" @if ($st->id == $ticket->status) selected
                                            @endif>{{$st->name}}</option> @endforeach
                                    </select>
                                    @if(count($errors) > 0)
                                        <span class="text-danger">{{$errors->first('contentComment')}}</span>
                                    @endif
                                    <h5>Lý do thay đổi</h5>
                                    <textarea name="contentComment" class="form-control" rows="7"></textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline blue">Lưu thay đổi</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="editDeadline" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Thay đổi ngày hết hạn</p>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('save-edit-ticket', ['id' => $ticket->id]) }}" method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <div class="input-group date form_datetime">
                                        <input name="deadline" value="{{$ticket->deadline}}" type="text" size="16" readonly class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn default date-set" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <h5>Lý do thay đổi</h5>
                                    <textarea name="contentComment" class="form-control" rows="7"></textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline blue">Lưu thay đổi</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="editPriority" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Thay đổi mức độ ưu tiên</p>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('save-edit-ticket', ['id' => $ticket->id]) }}" method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <select name="priority" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        <option value="Thấp" @if ($ticket->priority == "Thấp") selected @endif>Thấp</option>
                                        <option value="Bình thường" @if ($ticket->priority == "Bình thường") selected @endif>Bình thường</option>
                                        <option value="Cao" @if ($ticket->priority == "Cao") selected @endif>Cao</option>
                                        <option value="Khẩn cấp" @if ($ticket->priority == "Khẩn cấp") selected @endif>Khẩn cấp</option>
                                    </select>
                                    <h5>Lý do thay đổi</h5>
                                    <textarea name="contentComment" class="form-control" rows="7"></textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline blue">Lưu thay đổi</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="editAssign" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Thay đổi người thực hiện</p>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('save-edit-ticket', ['id' => $ticket->id]) }}" method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <label class="control-label sbold">Bộ phận IT<span class="required">*</span> </label>
                                    <select name="id_part" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        <option></option>
                                        @foreach ($listPart as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <label class="control-label sbold">Nhóm IT<span class="required">*</span></label>
                                    <select name="id_team" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                    </select>
                                    <label class="control-label sbold">Người thực hiện</label>
                                    <select name="id_assign" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                    </select>
                                    <h5>Lý do thay đổi</h5>
                                    <textarea name="contentComment" class="form-control" rows="7"></textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline blue">Lưu thay đổi</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="editRelated" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Thay đổi người liên quan</p>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('save-edit-ticket', ['id' => $ticket->id]) }}" method="post" accept-charset="utf-8">
                                    {{csrf_field()}}
                                    <select name="id_related" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        @foreach ($users as $u)
                                            <option value="{{$u->id}}" @if ($u->id == $ticket->id_related) selected @endif>{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                    <h5>Lý do thay đổi</h5>
                                    <textarea name="contentComment" class="form-control" rows="7"></textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline blue">Lưu thay đổi</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="closeTicket" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Bạn có muốn đóng công việc không?</p>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-4">
                                    <a data-toggle="modal" href="#rate0" class="btn green btn-outline btn-block">Không hài lòng</a>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('close-ticket', ['id' => $ticket->id, 'rate' => 1]) }}" method="post" accept-charset="utf-8">
                                        {{csrf_field()}}
                                        <button class="btn purple btn-outline btn-block">Hài lòng</button>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" data-dismiss="modal" class="btn btn-outline dark btn-block">Hủy</button>
                                </div>
                            </div>
                        </div>

                        <div id="removeTicket" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                            <div class="modal-header">
                                <p class="text-center sbold">Bạn có chắc chắn muốn xóa công việc</p>
                            </div>
                            <div class="modal-body">
                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <a href="{{ route('remove-ticket', ['id'=>$ticket->id]) }}" class="btn green btn-outline btn-block">Xóa công việc</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" data-dismiss="modal" class="btn btn-outline dark btn-block">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="rate0" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                        <div class="modal-body">
                            <form action="{{ route('close-ticket', ['id' => $ticket->id, 'rate' => 0]) }}" method="post" accept-charset="utf-8">
                                {{csrf_field()}}
                                <h5 class="sbold">Lý do không hài lòng</h5>
                                <textarea name="reasonrate" class="form-control" rows="3"></textarea>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline blue">Gửi</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (Auth::user()->role >= 400 || Auth::user()->id == $ticket->id_request)
                    <div class="btn-group">
                        <a class="btn red btn-outline" data-toggle="modal" href="#removeTicket">
                            <i class="fa fa-trash-o"></i>
                            <span>Xóa công việc</span>
                        </a>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <div class="portlet-body form">
                <form action="{{ route('post-comment', ['id' => $ticket->id]) }}" class="form-horizontal" method="post" accept-charset="utf-8" role="form">
                    {{csrf_field()}}
                    <div class="form-body">
                        <h4 class="text-center text-primary sbold">Thông tin công việc: {{$ticket->name}}</h4>
                        <div class="form-group">
                            <div class="col-md-12">
                                @php
                                    $requestName = $ticket->ticketGetMemberName($ticket->id_request);
                                    $partName = $ticket->ticketGetPartName();
                                    $teamName = $ticket->ticketGetTeamName();
                                    $assignName = $ticket->ticketGetMemberName($ticket->id_assign);
                                    $relatedName = $ticket->ticketGetMemberName($ticket->id_related);
                                    $statusName = $ticket->ticketGetStatusName($ticket->status);
                                @endphp
                                <div class="col-md-3">
                                    <h5 class="sbold">Ảnh minh họa</h5>
                                    <img src="{{asset($ticket->url_img)}}" class="img-responsive" alt="{{$ticket->url_img}}">
                                </div>
                                <div class="col-md-9">
                                	<div class="col-md-4">
                                	    <h5 class="sbold">Ngày tạo:</h5>
                                	    {{$ticket->create_at}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Cập nhật lúc:</h5>
                                	    {{$ticket->create_at}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Ngày hết hạn:</h5>
                                	    {{$ticket->deadline}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Người tạo:</h5>
                                	    {{$requestName}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Người thực hiện:</h5>
                                	    {{$assignName}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Đơn vị:</h5>
                                	    {{$partName}} - {{$teamName}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Mức độ ưu tiên:</h5>
                                	    {{$ticket->priority}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Trạng thái:</h5>
                                	    {{$statusName}}
                                    </div>
                                    <div class="col-md-4">
                                	    <h5 class="sbold">Người liên quan:</h5>
                                	    {{$relatedName}}
                                    </div>
                                    <div class="col-md-4">
                                    	<h5 class="sbold">Nội dung chi tiết</h5>
                                    	<a data-toggle="modal" href="#contentTicket">Xem nội dung tại đây</a>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="sbold">Lịch sử công việc</h5>
                                        <a data-toggle="modal" href="#historyTicket">Xem lịch sử công việc</a>
                                    </div>
                                    @if ($ticket->status == 5)
                                        <div class="col-md-4">
                                            <h5 class="sbold">Đánh giá</h5>
                                            @if ($ticket->rate == 1)
                                                Hài lòng
                                            @else
                                                Không hài lòng
                                            @endif
                                        </div>
                                        @if ($ticket->rate == 0)
                                            <div class="col-md-8">
                                                <h5 class="sbold">Lý do không hài lòng</h5>
                                                {{$ticket->reasonrate}}
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div id="contentTicket" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                                <div class="modal-header">
                                    <p class="text-center">Nội dung chi tiết</p>
                                </div>
                                <div class="modal-body">
                                    @php
                                        echo $ticket->content;
                                    @endphp
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                </div>
                            </div>
                            <div id="historyTicket" class="modal fade" tabindex="-1" data-backdrop="static" data-attention-animation="false">
                                <div class="modal-header">
                                    <p class="text-center">Lịch sử công việc</p>
                                </div>
                                <div class="modal-body">
                                    @foreach ($history as $h)
                                        <div class="col-md-12 form-group">
                                            <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                @php
                                                    $user = $h->getUserComment();
                                                @endphp
                                                <img class="todo-userpic pull-left img-circle" src="{{asset($user->avatar)}}" width="60px" height="60px">
                                                <div class="todo-tasklist-item-title sbold"> <i class="fa fa-user"></i> {{$user->name}} </div>
                                                <div class="todo-tasklist-item-text"> <i class="fa fa-commenting"></i> {{$h->content}} </div>
                                                <div class="todo-tasklist-item-text"> <i class="fa fa-commenting">{{$h->change}} </i></div>
                                                <div class="todo-tasklist-controls pull-left">
                                                    <span class="todo-tasklist-date">
                                                        <i class="fa fa-calendar"></i> {{$h->getDateCarbon()}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Đóng</button>
                                </div>
                            </div>
                            @if(Auth::user()->role >= 300 || Auth::user()->id == $ticket->id_request || Auth::user()->id == $ticket->id_assign || Auth::user()->id == $ticket->related)
							<div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <legend></legend>
                                </div>
                                <h5 class="sbold">Bình luận <span class="fa fa-commenting"></span></h5>
                                <div class="input-group">
                                    <input name="contentComment" type="text" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn blue" type="submit">Bình luận</button>
                                    </span>
                                </div>
                                @if(count($errors) > 0)
                                    <span class="text-danger">{{$errors->first('contentComment')}}</span>
                                @endif
                            @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <legend></legend>
                                    </div>
                                    @foreach ($comments as $cm)
                                        <div class="col-md-12 form-group">
                                            <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                @php
                                                    $user = $cm->getUserComment();
                                                @endphp
                                                <img class="todo-userpic pull-left img-circle" src="{{asset($user->avatar)}}" width="54px" height="54px">
                                                <div class="todo-tasklist-item-title sbold"><i class="fa fa-user"></i> {{$user->name}} </div>
                                                <div class="todo-tasklist-item-text"> <i class="fa fa-commenting"></i> {{$cm->content}} </div>
                                                <div class="todo-tasklist-controls pull-left">
                                                    <span class="todo-tasklist-date">
                                                        <i class="fa fa-calendar"></i> {{$cm->getDateCarbon()}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
							</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js1')
    <script src="{{asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>

	<script src="{{asset('/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
@endsection
@section('js2')
    <script src="{{asset('/assets/pages-custom/scripts/components-date-time-pickers.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/pages-custom/scripts/components-select2.js')}}" type="text/javascript"></script>

    <script src="{{asset('/assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>

	<script src="{{asset('/assets/pages/scripts/ui-extended-modals.min.js')}}" type="text/javascript"></script>
@endsection
@section('js3')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="id_part"]').on('change', function() {
            var partID = $(this).val();
            if(partID) {
                $.ajax({
                    url: '/getDataTeam/'+partID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_team"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="id_team"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="id_team"]').empty();
            }
        });
        $('select[name="id_team"]').on('change', function() {
            var teamID = $(this).val();
            if(teamID) {
                $.ajax({
                    url: '/getDataUser/'+teamID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_assign"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="id_assign"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="id_assign"]').empty();
            }
        });
    });
</script>
@endsection
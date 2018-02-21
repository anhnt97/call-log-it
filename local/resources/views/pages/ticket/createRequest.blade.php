@extends('theme.layouts.layout')
@section('title')
    Thêm yêu cầu
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
                    <span class="caption-subject">Thêm yêu cầu</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{ route('save-create-ticket') }}" id="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-body">
                        <h4 class="text-center text-primary sbold">Thông tin công việc</h4>
                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new col-md-12" data-provides="fileinput">
                                    <label class="control-label sbold">Ảnh minh họa</label>
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100%; height: 150px">
                                        <img src="{{ asset('/uploads/tickets/ticket.png') }}" class="img-responsive" name="url_img" alt="" />
                                    </div>
                                    <div class="col-md-12">
                                        <span class="btn blue btn-outline btn-file center-block">
                                            <span class="fileinput-new"> Chọn ảnh </span>
                                            <span class="fileinput-exists"> Thay đổi ảnh </span>
                                            <input type="file" name="url_img">
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists btn-block" data-dismiss="fileinput"> Xóa bỏ </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <label class="control-label sbold">Tên công việc<span class="required">*</span></label>
                                    <input type="text" placeholder="Nhập tên công việc" class="form-control" name="name" value="{{ old('name') }}" />
                                    @if(count($errors) > 0)
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label sbold">Ngày hết hạn<span class="required">*</span></label>
                                    @if(count($errors) > 0)
                                        <span class="text-danger">{{$errors->first('deadline')}}</span>
                                    @endif
                                    <div class="input-group date form_datetime">
                                        <input name="deadline" value="{{ old('deadline') }}" type="text" size="16" readonly class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn default date-set" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <label class="control-label sbold">Mức độ ưu tiên<span class="required">*</span></label>
                                    <select name="priority" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        <option value="Thấp">Thấp</option>
                                        <option value="Bình thường">Bình thường</option>
                                        <option value="Cao">Cao</option>
                                        <option value="Khẩn cấp">Khẩn cấp</option>
                                    </select>
                                    <label class="control-label sbold">Người liên quan</label>
                                    <select name="id_related" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        <option></option>
                                        @foreach ($users as $u)
                                            <option value="{{$u->id}}">{{$u->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label sbold">Bộ phận IT<span class="required">*</span> </label>
                                    @if(count($errors) > 0)
                                            <span class="text-danger">{{$errors->first('id_part')}}</span>
                                        @endif
                                    <select name="id_part" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                        <option></option>
                                        @foreach ($listPart as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <label class="control-label sbold">Nhóm IT<span class="required">*</span></label>
                                    @if(count($errors) > 0)
                                        <span class="text-danger">{{$errors->first('id_team')}}</span>
                                    @endif
                                    <select name="id_team" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                    </select>

                                    <label class="control-label sbold">Người thực hiện</label>
                                    <select name="id_assign" class="form-control select2-allow-clear select2-bootstrap-prepend">
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label class="control-label sbold">Nội dung chi tiết</label>
                                    <textarea name="content" class="form-control" id="summernote_1"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Thêm mới</button>
                                <button type="button" class="btn default">Hủy bỏ</button>
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
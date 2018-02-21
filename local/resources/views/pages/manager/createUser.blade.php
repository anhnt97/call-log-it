@extends('theme.layouts.layout_blank')
@section('css1')
	<link href="{{asset('/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/bootstrap-summernote/summernote.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js1')
	<script src="{{asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
@endsection
@section('js2')
	<script src="{{asset('/assets/pages/scripts/form-samples.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>
@endsection

@section('title')
	Thêm nhân viên
@endsection
@section('content')
	<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings"></i>
                    <span class="caption-subject">Thêm nhân viên</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="{{ route('save-create-user') }}" id="" class="form-horizontal" method="post" enctype="multipart/form-data">
                	{{csrf_field()}}
                    <div class="form-body">
                    	<h4 class="text-center text-primary sbold">Thông tin nhân viên</h4>
                        <div class="form-group">
							<div class="col-md-3">
								<div class="fileinput fileinput-new col-md-12" data-provides="fileinput">
									<label class="control-label sbold">Ảnh địa diện</label>
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100%; height: 150px">
                                    	<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" class="img-responsive" name="avatar" alt="" />
                                    </div>
                                    <div class="col-md-12">
                                        <span class="btn blue btn-outline btn-file center-block">
                                            <span class="fileinput-new"> Chọn ảnh đại diện </span>
                                            <span class="fileinput-exists"> Thay đổi ảnh </span>
                                            <input type="file" name="avatar">
                                        </span>
                                        <a href="javascript:;" class="btn red fileinput-exists btn-block" data-dismiss="fileinput"> Xóa bỏ </a>
                                    </div>
                                    <div class="col-md-12">
                                    	<div class="form-group">
                                    		<label class="control-label sbold">Bộ phận IT</label>
									        <select name="id_part" class="form-control">
									            <option>---Chọn bộ phận IT---</option>
									            @foreach ($listPart as $key=>$value)
									                <option value="{{$key}}">{{$value}}</option>
									            @endforeach
									        </select>
									        <label class="control-label sbold"><b>Team IT</b></label>
									        <select name="id_team" class="form-control">
									            <option>---Chọn đội IT---</option>
									        </select>
                                    	</div>
                                    </div>
                                </div>
							</div>
							<div class="col-md-9">
                            	<div class="col-md-6">
                            		<label class="control-label sbold">Họ tên<span class="required">*</span></label>
                                	<input type="text" placeholder="Ví dụ: Trần Sách Hải" class="form-control" name="name" />
                            	</div>
                                <div class="col-md-6">
                                    <label class="control-label sbold"><b>Chức vụ</b></label>
                                    <select name="role" class="form-control">
                                        <option value="100">Nhân viên</option>
                                        <option value="200">Nhân viên IT</option>
                                        <option value="300">Trưởng nhóm</option>
                                        <option value="400">Trưởng bộ phận</option>
                                        <option value="500">Quản trị viên</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                	<label class="control-label sbold">Ngày sinh</label>
                                    <div class="input-group date date-picker" data-date="02-11-1997" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                        </span>
                                        <input type="text" class="form-control" readonly="" name="birthday">
                            	    </div>
                                </div>
                                <div class="col-md-6">
                                	<label class="control-label sbold">Giới tính</label>
                                	<div class="md-radio-inline">
	                                    <div class="md-radio">
	                                        <input type="radio" id="1" name="gender" value="Nam" class="md-radiobtn" checked="checked">
	                                        <label for="1">
	                                            <span class="inc"></span>
	                                            <span class="check"></span>
	                                            <span class="box"></span> Nam
	                                        </label>
	                                    </div>
	                                    <div class="md-radio">
	                                        <input type="radio" id="2" name="gender" value="Nữ" class="md-radiobtn">
	                                        <label for="2">
	                                            <span class="inc"></span>
	                                            <span class="check"></span>
	                                            <span class="box"></span> Nữ
	                                        </label>
	                                    </div>
	                                    <div class="md-radio">
	                                        <input type="radio" id="3" name="gender" value="Khác" class="md-radiobtn">
	                                        <label for="3">
	                                            <span class="inc"></span>
	                                            <span class="check"></span>
	                                            <span class="box"></span> Khác
	                                        </label>
	                                    </div>
	                                </div>
                                </div>
                                <div class="col-md-6">
                                	<label class="control-label sbold">Email<span class="required">*</span></label>
                                	<input type="text" placeholder="Ví dụ: transachhai97@gmail.com" class="form-control" name="email" />
                                </div>
                                <div class="col-md-6">
                                	<label class="control-label sbold">Số điện thoại</label>
                                	<input type="text" placeholder="Ví dụ: 0123456789" class="form-control" name="phonenumber" />
                                </div>
                                <div class="col-md-12">
                                	<label class="control-label sbold">Địa chỉ<span class="required">*</span></label>
                                	<textarea name="address" class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
	                            <div class="col-md-12">
	                            	<label class="control-label sbold">Mô tả chi tiết</label>
	                                <textarea name="desc" class="form-control" id="summernote_1"></textarea>
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
    });
</script>
@endsection
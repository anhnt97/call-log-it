@extends('theme.layouts.layout')
@section('title')
	Trang chủ
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
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('assets/pages-custom/media/bg/3.jpg') }}" width="100%" style="max-height: 555px" class="img-responsive">
            <div class="carousel-caption ">
                <h3>Chào mừng bạn đến với hệ thống Call Log IT</h3>
                <p>
                    Quản lý thuận tiện, đơn giản , dễ sử dụng !
                </p>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('assets/pages-custom/media/bg/2.jpg') }}" width="100%" style="max-height: 555px" class="img-responsive">
            <div class="carousel-caption">
                <h3>Hệ thống được phát triển bởi H2A Team</h3>
                <p>Cảm ơn các bạn đã sử dụng hệ thống!</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
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
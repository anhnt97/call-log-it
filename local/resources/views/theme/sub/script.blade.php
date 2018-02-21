{{-- BEGIN SCRIPTS --}}
{{-- BEGIN CORE PLUGINS --}}
<script src="{{asset('/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
{{-- END CORE PLUGINS --}}
{{-- BEGIN PAGE LEVEL PLUGINS --}}
<script src="{{asset('/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
@yield('js1')
{{-- END PAGE LEVEL PLUGINS --}}
{{-- BEGIN THEME GLOBAL SCRIPTS --}}
<script src="{{asset('/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
{{-- END THEME GLOBAL SCRIPTS --}}
{{-- BEGIN PAGE LEVEL SCRIPTS --}}
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if(Session::has('msg'))
    toastr.success("{{ Session::get('msg') }}", "Thông báo");
    @endif
</script>
@yield('js2')
{{-- END PAGE LEVEL SCRIPTS --}}
{{-- BEGIN THEME LAYOUT SCRIPTS --}}
<script src="{{asset('/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
{{-- END THEME LAYOUT SCRIPTS --}}
@yield('js3')
{{-- END SCRIPT --}}
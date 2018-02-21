<!DOCTYPE html>
{{--
Template Name: Laravel Project
Version: 2.11.97
Author: TSH97
Website: https://www.facebook.com/transachhai97
Contact: transachhai97@gmail.com
 --}}
<html lang="en">
{{-- BEGIN HEAD --}}
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    @include('theme.sub.style')
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
</head>
{{-- END HEAD --}}
<body class="page-header-fixed page-sidebar-fixed page-sidebar-closed-hide-logo page-content-white page-md">
    <div class="page-wrapper">
        {{-- BEGIN HEADER --}}
        @include('theme.main.header')
        {{-- BEGIN HEADER --}}
        {{-- BEGIN HEADER & CONTENT DIVIDER --}}
        <div class="clearfix"> </div>
        {{-- END HEADER & CONTENT DIVIDER --}}
        {{-- BEGIN CONTAINER --}}
        <div class="page-container">
            @include('theme.layouts.sidebar')
            {{-- BEGIN CONTENT --}}
            <div class="page-content-wrapper">
                {{-- BEGIN CONTENT BODY --}}
                <div class="page-content">
                    {{-- BEGIN PAGE HEADER --}}
                    @include('theme.quick.quick_theme')
                    {{-- BEGIN PAGE BAR --}}
                    {{-- @yield('page-bar') --}}
                    {{-- END PAGE BAR --}}
                    {{-- BEGIN PAGE TITLE --}}
                    {{-- <h1 class="page-title">@yield('title')</h1> --}}
                    {{-- END PAGE TITLE --}}
                    {{-- END PAGE HEADER --}}
                    {{-- BEGIN DASHBOARD --}}

                    @yield('table')

                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box purple portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings"></i>
                                        <span class="caption-subject uppercase">Danh sách nhân viên</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn white btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <span> Công cụ </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right" id="table_tools">
                                                <li>
                                                    <a href="javascript:;" data-action="0" class="tool-action">
                                                        <i class="icon-printer"></i> Print</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:;" data-action="1" class="tool-action">
                                                        <i class="icon-doc"></i> PDF</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="2" class="tool-action">
                                                        <i class="icon-paper-clip"></i> Excel</a>
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
                                                @foreach ($listUsers as $element)
                                                    <tr>
                                                        <td>{{$element->id}}</td>
                                                        <td>{{$element->name}}</td>
                                                        <td>{{$element->email}}</td>
                                                        <td>{{$element->address}}</td>
                                                        <td class="btn-group btn-group-solid">
                                                            <a href="javascript:;" onclick="confirmRemove('{{ route('remove-user', ['id' => $element->id, 'name'=>$element->name]) }}')" class="btn btn-icon-only red btn-outline">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn btn-icon-only blue btn-outline">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn btn-icon-only purple btn-outline">
                                                                <i class="fa fa-share"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                    {{-- END DASHBOARD --}}
                </div>
                {{-- END CONTENT BODY --}}
            </div>
            {{-- END CONTENT --}}
            {{-- BEGIN QUICK SIDEBAR --}}
            @include('theme.quick.quick_sidebar')
            {{-- END QUICK SIDEBAR --}}
        </div>
        {{-- END CONTAINER --}}
        {{-- BEGIN FOOTER --}}
        @include('theme.main.footer')
        {{-- END FOOTER --}}
    </div>
    {{-- BEGIN QUICK NAV --}}
    @include('theme.quick.quick_nav')
    {{-- END QUICK NAV --}}
    {{-- BEGIN SCRIPTS --}}
    @include('theme.sub.script')
    {{-- END SCRIPT --}}
</body>

</html>
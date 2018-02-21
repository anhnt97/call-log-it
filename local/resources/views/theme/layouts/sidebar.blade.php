{{-- BEGIN SIDEBAR --}}
<div class="page-sidebar-wrapper">
    {{-- BEGIN SIDEBAR --}}
    {{-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --}}
    {{-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed --}}
    <div class="page-sidebar navbar-collapse collapse">
        {{-- BEGIN SIDEBAR MENU --}}
        {{-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) --}}
        {{-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode --}}
        {{-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode --}}
        {{-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --}}
        {{-- DOC: Set data-keep-expand="true" to keep the submenues expanded --}}
        {{-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed --}}
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            {{-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element --}}
            {{-- BEGIN SIDEBAR TOGGLER BUTTON --}}
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            {{-- END SIDEBAR TOGGLER BUTTON --}}
            {{-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element --}}
            <li class="sidebar-search-wrapper">
                {{-- BEGIN RESPONSIVE QUICK SEARCH FORM --}}
                {{-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box --}}
                {{-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box --}}
                <form class="sidebar-search  sidebar-search-bordered" action="#" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                {{-- END RESPONSIVE QUICK SEARCH FORM --}}
            </li>
            {{-- Trang chủ --}}
            <li class="nav-item ">
                <a href="{{ route('homepage') }}" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Trang chủ</span>
                </a>
            </li>
            {{-- Tin tức --}}
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">Tin tức</span>
                </a>
            </li>
            {{-- Yêu cầu --}}
            <li class="heading ">
                <h3 class="uppercase">Yêu cầu</h3>
            </li>
            {{-- Thêm yêu cầu --}}
            <li class="nav-item ">
                <a href="{{ route('create-ticket') }}" class="nav-link nav-toggle">
                    <i class="icon-plus"></i>
                    <span class="title">Thêm yêu cầu</span>
                </a>
            </li>
            {{-- Công việc --}}
            <li class="heading ">
                <h3 class="uppercase">Công việc</h3>
            </li>
            {{-- Công việc liên quan --}}
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-code-fork"></i>
                    <span class="title">Công việc liên quan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    {{-- Công việc liên quan -Tất cả --}}
                    <li class="nav-item ">
                        <a href="{{ route('related-request') }}" class="nav-link ">
                            <i class="fa fa-globe"></i>
                            <span class="title">Tất cả</span>
                            {{-- <span class="badge badge-success">1</span> --}}
                        </a>
                    </li>
                    {{-- Công việc liên quan -Mới nhất --}}
                    <li class="nav-item ">
                        <a href="{{ route('related-request-status', ['status'=>'moi-nhat']) }}" class="nav-link ">
                            <i class="fa fa-envelope-o"></i>
                            <span class="title">Mới nhất</span>
                            {{-- <span class="badge badge-success">2</span> --}}
                        </a>
                    </li>
                    {{-- Công việc liên quan -Đang xử lý --}}
                    <li class="nav-item ">
                        <a href="{{ route('related-request-status', ['status'=>'dang-xu-ly']) }}" class="nav-link ">
                            <i class="fa fa-spinner"></i>
                            <span class="title">Đang xử lý</span>
                            {{-- <span class="badge badge-success">3</span> --}}
                        </a>
                    </li>
                    {{-- Công việc liên quan -Hoàn thành --}}
                    <li class="nav-item ">
                        <a href="{{ route('related-request-status', ['status'=>'hoan-thanh']) }}" class="nav-link ">
                            <i class="fa fa-check-circle-o"></i>
                            <span class="title">Hoàn thành</span>
                            {{-- <span class="badge badge-success">4</span> --}}
                        </a>
                    </li>
                    {{-- Công việc liên quan -Quá hạn --}}
                    <li class="nav-item ">
                        <a href="{{ route('related-request-status', ['status'=>'qua-han']) }}" class="nav-link ">
                            <i class="fa fa-calendar"></i>
                            <span class="title">Quá hạn</span>
                            {{-- <span class="badge badge-success">1</span> --}}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Công việc được giao --}}
            @if (Auth::user()->role >= 200)
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-user"></i>
                        <span class="title">Công việc được giao</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        {{-- Công việc được giao -Tất cả --}}
                        <li class="nav-item ">
                            <a href="{{ route('assigned-request') }}" class="nav-link ">
                                <i class="fa fa-globe"></i>
                                <span class="title">Tất cả</span>
                            </a>
                        </li>
                        {{-- Công việc được giao -Mới nhất --}}
                        <li class="nav-item ">
                            <a href="{{ route('assigned-request-status', ['status'=>'moi-nhat']) }}" class="nav-link ">
                                <i class="fa fa-envelope-o"></i>
                                <span class="title">Mới nhất</span>
                            </a>
                        </li>
                        {{-- Công việc được giao -Đang xử lý --}}
                        <li class="nav-item ">
                            <a href="{{ route('assigned-request-status', ['status'=>'dang-xu-ly']) }}" class="nav-link ">
                                <i class="fa fa-spinner"></i>
                                <span class="title">Đang xử lý</span>
                            </a>
                        </li>
                        {{-- Công việc được giao -Phản hồi --}}
                        <li class="nav-item ">
                            <a href="{{ route('assigned-request-status', ['status'=>'phan-hoi']) }}" class="nav-link ">
                                <i class="fa fa-mail-reply-all"></i>
                                <span class="title">Phản hồi</span>
                            </a>
                        </li>
                        {{-- Công việc được giao -Quá hạn --}}
                        <li class="nav-item ">
                            <a href="{{ route('assigned-request-status', ['status'=>'qua-han']) }}" class="nav-link ">
                                <i class="fa fa-calendar"></i>
                                <span class="title">Quá hạn</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- Công việc tôi yêu cầu --}}
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Công việc tôi yêu cầu</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    {{-- Công việc tôi yêu cầu -Tất cả --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request') }}" class="nav-link ">
                            <i class="fa fa-globe"></i>
                            <span class="title">Tất cả</span>
                        </a>
                    </li>
                    {{-- Công việc tôi yêu cầu -Mới nhất --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request-status', ['status'=>'moi-nhat']) }}" class="nav-link ">
                            <i class="fa fa-envelope-o"></i>
                            <span class="title">Mới nhất</span>
                        </a>
                    </li>
                    {{-- Công việc tôi yêu cầu -Đang xử lý --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request-status', ['status'=>'dang-xu-ly']) }}" class="nav-link ">
                            <i class="fa fa-spinner"></i>
                            <span class="title">Đang xử lý</span>
                        </a>
                    </li>
                    {{-- Công việc tôi yêu cầu -Hoàn thành --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request-status', ['status'=>'hoan-thanh']) }}" class="nav-link ">
                            <i class="fa fa-check-circle-o"></i>
                            <span class="title">Hoàn thành</span>
                        </a>
                    </li>
                    {{-- Công việc tôi yêu cầu -Phản hồi --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request-status', ['status'=>'phan-hoi']) }}" class="nav-link ">
                            <i class="fa fa-mail-reply-all"></i>
                            <span class="title">Phản hồi</span>
                        </a>
                    </li>
                    {{-- Công việc tôi yêu cầu -Đã đóng --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request-status', ['status'=>'da-dong']) }}" class="nav-link ">
                            <i class="fa fa-lock"></i>
                            <span class="title">Đã đóng</span>
                        </a>
                    </li>
                    {{-- Công việc tôi yêu cầu -Quá hạn --}}
                    <li class="nav-item ">
                        <a href="{{ route('my-request-status', ['status'=>'qua-han']) }}" class="nav-link ">
                            <i class="fa fa-calendar"></i>
                            <span class="title">Quá hạn</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Công việc của nhóm --}}
            @if (Auth::user()->role == 300)
                <li class="nav-item  ">
                    @php
                        $team = Auth::user()->getTeam();
                        $teamSlug = $team['slug'];
                    @endphp
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Công việc của nhóm</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        {{-- Công việc của nhóm -Tất cả --}}
                        <li class="nav-item ">
                            <a href="{{ route('list-team-ticket', ['slugTeam' => $teamSlug]) }}" class="nav-link ">
                                <i class="fa fa-globe"></i>
                                <span class="title">Tất cả</span>
                            </a>
                        </li>
                        {{-- Công việc của nhóm -Mới nhất --}}
                        <li class="nav-item ">
                            <a href="{{ route('list-team-ticket-status', ['slugTeam' => $teamSlug, 'status' => 'moi-nhat']) }}" class="nav-link ">
                                <i class="fa fa-envelope-o"></i>
                                <span class="title">Mới nhất</span>
                            </a>
                        </li>
                        {{-- Công việc của nhóm -Đang xử lý --}}
                        <li class="nav-item ">
                            <a href="{{ route('list-team-ticket-status', ['slugTeam' => $teamSlug, 'status' => 'dang-xu-ly']) }}" class="nav-link ">
                                <i class="fa fa-spinner"></i>
                                <span class="title">Đang xử lý</span>
                            </a>
                        </li>
                        {{-- Công việc của nhóm -Hoàn thành --}}
                        <li class="nav-item ">
                            <a href="{{ route('list-team-ticket-status', ['slugTeam' => $teamSlug, 'status' => 'phan-hoi']) }}" class="nav-link ">
                                <i class="fa fa-mail-reply-all"></i>
                                <span class="title">Phản hồi</span>
                            </a>
                        </li>
                        {{-- Công việc của nhóm -Quá hạn --}}
                        <li class="nav-item ">
                            <a href="{{ route('list-team-ticket-status', ['slugTeam' => $teamSlug, 'status' => 'qua-han']) }}" class="nav-link ">
                                <i class="fa fa-calendar"></i>
                                <span class="title">Quá hạn</span>
                            </a>
                        </li>
                        {{-- Công việc của nhóm -Đã đóng --}}
                        <li class="nav-item ">
                            <a href="{{ route('list-team-ticket-status', ['slugTeam' => $teamSlug, 'status' => 'da-dong']) }}" class="nav-link ">
                                <i class="fa fa-lock"></i>
                                <span class="title">Đã đóng</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 400)

                <li class="nav-item  ">
                    @php
                        $part = Auth::user()->getPart();
                        $partSlug = $part['slug'];
                    @endphp
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-keyboard-o"></i>
                        <span class="title">Công việc của bộ phận IT</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item ">
                            <a href="{{ route('list-part-ticket', ['slugPart'=>$partSlug]) }}" class="nav-link ">
                                <i class="fa fa-globe"></i>
                                <span class="title">Tất cả</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('list-part-ticket-status', ['slugPart'=>$partSlug, 'status'=>'moi-nhat']) }}" class="nav-link ">
                                <i class="fa fa-envelope-o"></i>
                                <span class="title">Mới nhất</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('list-part-ticket-status', ['slugPart'=>$partSlug, 'status'=>'dang-xu-ly']) }}" class="nav-link ">
                                <i class="fa fa-spinner"></i>
                                <span class="title">Đang xử lý</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('list-part-ticket-status', ['slugPart'=>$partSlug, 'status'=>'phan-hoi']) }}" class="nav-link ">
                                <i class="fa fa-mail-reply-all"></i>
                                <span class="title">Phản hồi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('list-part-ticket-status', ['slugPart'=>$partSlug, 'status'=>'qua-han']) }}" class="nav-link ">
                                <i class="fa fa-calendar"></i>
                                <span class="title">Quá hạn</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('list-part-ticket-status', ['slugPart'=>$partSlug, 'status'=>'da-dong']) }}" class="nav-link ">
                                <i class="fa fa-lock"></i>
                                <span class="title">Đã đóng</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 500)
                <li class="heading">
                    <h3 class="uppercase">Nhân sự</h3>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('list-part-it') }}" class="nav-link nav-toggle">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">Quản lý nhân sự</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('create-user') }}" class="nav-link nav-toggle">
                        <i class="fa fa-plus"></i>
                        <span class="title">Thêm nhân viên</span>
                    </a>
                </li>
            @endif

            <li class="heading">
                <h3 class="uppercase">Khác</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">Cài đặt</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-envelope-o"></i>
                    <span class="title">Liên hệ</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-comments-o"></i>
                    <span class="title">Phản hồi</span>
                </a>
            </li>

        </ul>
        {{-- END SIDEBAR MENU --}}
    </div>
    {{-- END SIDEBAR --}}
</div>
{{-- END SIDEBAR --}}
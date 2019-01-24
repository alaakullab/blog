<!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{aurl('/')}}">
                      {{-- <h1 alt="logo" class="logo-default">@awt('Control Panel','en')</h1> --}}

                        <img src="{{url('design/admin_panel')}}/assets/layouts/layout4/img/logo-light.png" alt="logo" class="logo-default" />
                       </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    {{--<form class="search-form" action="page_general_search_2.html" method="GET">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control input-sm" placeholder="Search..." name="query">--}}
                            {{--<span class="input-group-btn">--}}
                                {{--<a href="javascript:;" class="btn submit">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</a>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">

                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>

<li class="dropdown dropdown-extended dropdown-notification" id="cog_list">
    <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="fa fa-paint-brush"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="javascript:;" onclick="change_theme('1')">
            <i class="fa fa-paint-brush"></i> {{trans('admin.theme1')}} </a>
        </li>
        <li>
            <a href="javascript:;" onclick="change_theme('2')">
            <i class="fa fa-paint-brush"></i> {{trans('admin.theme2')}} </a>
        </li>
        <li>
            <a href="javascript:;" onclick="change_theme('3')">
            <i class="fa fa-paint-brush"></i> {{trans('admin.theme3')}} </a>
        </li>
    </ul>
</li>

<li class="dropdown dropdown-extended dropdown-notification" id="lang_list">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="fa fa-globe"></i>
    </a>
    <ul class="dropdown-menu">
        @foreach(L::all() as $l)
        <li>
            <a href="{{aurl('lang/'.$l)}}">
            <i class="fa fa-flag"></i> {{trans('admin.'.$l)}} </a>
        </li>
        @endforeach
    </ul>
</li>

                            <!-- BEGIN NOTIFICATION DROPDOWN -->


                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{ admin()->user()->name }} </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <img alt="" class="img-circle" src="{{url('design/admin_panel')}}/assets/layouts/layout4/img/avatar9.jpg" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ aurl('logout') }}">
                                            <i class="fa fa-key"></i> {{ trans('admin.logout') }} </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->

                        </ul>

                    </div>

                    <!-- END TOP NAVIGATION MENU -->
                </div>
                                <div class="clearfix"> </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->

        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">


    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

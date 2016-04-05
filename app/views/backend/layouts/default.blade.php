
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta charset="utf-8"/>
        <title>
            @section('titulo')
           Admin misanvictorino.com
            @show
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        	<meta name="csrf-token" content="{{csrf_token()}}">

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
                <link href="{{ asset('/assets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"/>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="{{ asset('/assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="{{ asset('/assets/css/style-metronic.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/css/pages/tasks.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/assets/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
                <link href="{{ asset('/assets/plugins/redactor/redactor.css') }}" rel="stylesheet" type="text/css" id="style_color"/>


        <link href="{{ asset('/assets/css/themes/default.css') }}" rel="stylesheet" type="text/css"/>
      
 		<link href="{{ asset('/assets/scripts/spectrum/spectrum.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <style>
        	.navbar-brand {
float: left;
 padding: 0px;
font-size: 18px;
line-height: 20px;
height: 50px;
} 
        </style>
            @yield('style')

        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">   
                <!-- BEGIN LOGO -->
                <a class="navbar-brand" href="{{ route('admin') }}"> 
                    <img src="https://lh6.googleusercontent.com/-5-snoQh6B_w/UzTwr7xqtOI/AAAAAAAAE1U/mA7NiVXC-2I/s100/logoblanco.png" alt="logo" class="img-responsive"/>
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <i class="fa fa-bars"></i>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right">
                    <!--<li class="dropdown" id="header_notification_bar">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-warning"></i>
                                    <span class="badge">
                                             6
                                    </span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                    <li>
                                            <p>
                                                     You have 14 new notifications
                                            </p>
                                    </li>
                                    <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-success">
                                                                            <i class="fa fa-plus"></i>
                                                                    </span>
                                                                     New user registered.
                                                                    <span class="time">
                                                                             Just now
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                    </span>
                                                                     Server #12 overloaded.
                                                                    <span class="time">
                                                                             15 mins
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-warning">
                                                                            <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                                     Server #2 not responding.
                                                                    <span class="time">
                                                                             22 mins
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                    </span>
                                                                     Application error.
                                                                    <span class="time">
                                                                             40 mins
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                    </span>
                                                                     Database overloaded 68%.
                                                                    <span class="time">
                                                                             2 hrs
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                    </span>
                                                                     2 user IP blocked.
                                                                    <span class="time">
                                                                             5 hrs
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-warning">
                                                                            <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                                     Storage Server #4 not responding.
                                                                    <span class="time">
                                                                             45 mins
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                    </span>
                                                                     System Error.
                                                                    <span class="time">
                                                                             55 mins
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                    </span>
                                                                     Database overloaded 68%.
                                                                    <span class="time">
                                                                             2 hrs
                                                                    </span>
                                                            </a>
                                                    </li>
                                            </ul>
                                    </li>
                                    <li class="external">
                                            <a href="#">
                                                     See all notifications <i class="m-icon-swapright"></i>
                                            </a>
                                    </li>
                            </ul>
                    </li>
                    -->
                    <!--<li class="dropdown" id="header_inbox_bar">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-envelope"></i>
                                    <span class="badge">
                                             5
                                    </span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                    <li>
                                            <p>
                                                     You have 12 new messages
                                            </p>
                                    </li>
                                    <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                                    <li>
                                                            <a href="inbox-a=view.html">
                                                                    
                                                                    <span class="subject">
                                                                            <span class="from">
                                                                                     Lisa Wong
                                                                            </span>
                                                                            <span class="time">
                                                                                     Just Now
                                                                            </span>
                                                                    </span>
                                                                    <span class="message">
                                                                             Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh...
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="inbox-a=view.html">
                                                                    
                                                                    <span class="subject">
                                                                            <span class="from">
                                                                                     Richard Doe
                                                                            </span>
                                                                            <span class="time">
                                                                                     16 mins
                                                                            </span>
                                                                    </span>
                                                                    <span class="message">
                                                                             Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="inbox-a=view.html">
                                                            
                                                                    <span class="subject">
                                                                            <span class="from">
                                                                                     Bob Nilson
                                                                            </span>
                                                                            <span class="time">
                                                                                     2 hrs
                                                                            </span>
                                                                    </span>
                                                                    <span class="message">
                                                                             Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="inbox-a=view.html">
                                                                    
                                                                    <span class="subject">
                                                                            <span class="from">
                                                                                     Lisa Wong
                                                                            </span>
                                                                            <span class="time">
                                                                                     40 mins
                                                                            </span>
                                                                    </span>
                                                                    <span class="message">
                                                                             Vivamus sed auctor 40% nibh congue nibh...
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="inbox-a=view.html">
                                                                    
                                                                    <span class="subject">
                                                                            <span class="from">
                                                                                     Richard Doe
                                                                            </span>
                                                                            <span class="time">
                                                                                     46 mins
                                                                            </span>
                                                                    </span>
                                                                    <span class="message">
                                                                             Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                                                                    </span>
                                                            </a>
                                                    </li>
                                            </ul>
                                    </li>
                                    <li class="external">
                                            <a href="inbox.html">
                                                     See all messages <i class="m-icon-swapright"></i>
                                            </a>
                                    </li>
                            </ul>
                    </li>
                    -->
                    <!--<li class="dropdown" id="header_task_bar">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-tasks"></i>
                                    <span class="badge">
                                             5
                                    </span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                    <li>
                                            <p>
                                                     You have 12 pending tasks
                                            </p>
                                    </li>
                                    <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     New release v1.2
                                                                            </span>
                                                                            <span class="percent">
                                                                                     30%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress">
                                                                            <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             40% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     Application deployment
                                                                            </span>
                                                                            <span class="percent">
                                                                                     65%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress progress-striped">
                                                                            <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             65% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     Mobile app release
                                                                            </span>
                                                                            <span class="percent">
                                                                                     98%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress">
                                                                            <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             98% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     Database migration
                                                                            </span>
                                                                            <span class="percent">
                                                                                     10%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress progress-striped">
                                                                            <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             10% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     Web server upgrade
                                                                            </span>
                                                                            <span class="percent">
                                                                                     58%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress progress-striped">
                                                                            <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             58% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     Mobile development
                                                                            </span>
                                                                            <span class="percent">
                                                                                     85%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress progress-striped">
                                                                            <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             85% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                                    <li>
                                                            <a href="#">
                                                                    <span class="task">
                                                                            <span class="desc">
                                                                                     New UI release
                                                                            </span>
                                                                            <span class="percent">
                                                                                     18%
                                                                            </span>
                                                                    </span>
                                                                    <span class="progress progress-striped">
                                                                            <span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                                                    <span class="sr-only">
                                                                                             18% Complete
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                            </a>
                                                    </li>
                                            </ul>
                                    </li>
                                    <li class="external">
                                            <a href="#">
                                                     See all tasks <i class="m-icon-swapright"></i>
                                            </a>
                                    </li>
                            </ul>
                    </li>
                    -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                            <span class="username">
                            	
                                {{ Sentry::getUser()->first_name }}
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!--<li>
                                    <a href="extra_profile.html">
                                            <i class="fa fa-user"></i> My Profile
                                    </a>
                            </li>
                            <li>
                                    <a href="page_calendar.html">
                                            <i class="fa fa-calendar"></i> My Calendar
                                    </a>
                            </li>
                            <li>
                                    <a href="inbox.html">
                                            <i class="fa fa-envelope"></i> My Inbox
                                            <span class="badge badge-danger">
                                                     3
                                            </span>
                                    </a>
                            </li>
                            <li>
                                    <a href="#">
                                            <i class="fa fa-tasks"></i> My Tasks
                                            <span class="badge badge-success">
                                                     7
                                            </span>
                                    </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                    <a href="javascript:;" id="trigger_fullscreen">
                                            <i class="fa fa-arrows"></i> Full Screen
                                    </a>
                            </li>
                            <li>
                                    <a href="extra_lock.html">
                                            <i class="fa fa-lock"></i> Lock Screen
                                    </a>
                            </li>-->
                            <li>
                                <a href="/auth/logout">
                                    <i class="fa fa-key"></i> Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
                    <!-- BEGIN SIDEBAR MENU -->

                    <?php
                    if (isset($_GET["menu"])) {
                        ?>

                        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                            <li class="sidebar-toggler-wrapper">
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                <div class="sidebar-toggler hidden-phone">
                                    <i class="fa fa-bars"></i> 
                                </div>
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            </li>

                            <li class="start active ">
                                <a href="index.html">
                                    <i class="fa fa-home"></i>
                                    <span class="title">
                                        Dashboardsdfd
                                    </span>
                                    <span class="selected">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="title">
                                        E-Commerce
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="ecommerce_index.html">
                                            <i class="fa fa-bullhorn"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ecommerce_orders.html">
                                            <i class="fa fa-shopping-cart"></i>
                                            Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ecommerce_orders_view.html">
                                            <i class="fa fa-tags"></i>
                                            Order View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ecommerce_products.html">
                                            <i class="fa fa-sitemap"></i>
                                            Products
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ecommerce_products_edit.html">
                                            <i class="fa fa-file-o"></i>
                                            Product Edit
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-gift"></i>
                                    <span class="title">
                                        Frontend Themes
                                    </span>
                                    <span class="arrow">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Complete E-Commerce Frontend Theme For Metronic Admin">
                                        <a href="http://keenthemes.com/preview/index.php?theme=metronic_ecommerce" target="_blank">
                                            <span class="title">
                                                E-Commerce Frontend
                                            </span>
                                        </a>
                                    </li>
                                    <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Complete Multipurpose Corporate Frontend Theme For Metronic Admin">
                                        <a href="http://keenthemes.com/preview/index.php?theme=metronic_frontend" target="_blank">
                                            <span class="title">
                                                Corporate Frontend
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-cogs"></i>
                                    <span class="title">
                                        Page Layouts
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="index_horizontal_menu.html">
                                            Dashboard & Mega Menu
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_horizontal_sidebar_menu.html">
                                            Horizontal & Sidebar Menu
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_horizontal_menu1.html">
                                            Horizontal Mega Menu 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_horizontal_menu2.html">
                                            Horizontal Mega Menu 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_search_on_header.html">
                                            Searchbar On Header
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_sidebar_toggler_on_header.html">
                                            Sidebar Toggler On Header
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_sidebar_reversed.html">
                                            <span class="badge badge-roundless badge-success">
                                                new
                                            </span>
                                            Right Sidebar Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_sidebar_fixed.html">
                                            Sidebar Fixed Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_sidebar_closed.html">
                                            Sidebar Closed Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_ajax.html">
                                            Content Loading via Ajax
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_disabled_menu.html">
                                            Disabled Menu Links
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_blank_page.html">
                                            Blank Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_boxed_page.html">
                                            Boxed Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_language_bar.html">
                                            Language Switch Bar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layout_promo.html">
                                            Promo Page
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-bookmark-o"></i>
                                    <span class="title">
                                        UI Features
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="ui_general.html">
                                            General
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_buttons.html">
                                            Buttons & Icons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_typography.html">
                                            Typography
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_tabs_accordions_navs.html">
                                            Tabs, Accordions & Navs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_tree.html">
                                            <span class="badge badge-roundless badge-important">
                                                new
                                            </span>
                                            Tree View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_page_progress_style_1.html">
                                            <span class="badge badge-roundless badge-warning">
                                                new
                                            </span>
                                            Page Progress Bar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_blockui.html">
                                            Block UI
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_notific8.html">
                                            Notific8 Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_toastr.html">
                                            Toastr Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_alert_dialog_api.html">
                                            <span class="badge badge-roundless badge-important">
                                                new
                                            </span>
                                            Alerts & Dialogs API
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_session_timeout.html">
                                            Session Timeout
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_idle_timeout.html">
                                            User Idle Timeout
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_modals.html">
                                            Modals
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_extended_modals.html">
                                            Extended Modals
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_tiles.html">
                                            Tiles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_datepaginator.html">
                                            <span class="badge badge-roundless badge-success">
                                                new
                                            </span>
                                            Date Paginator
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_nestable.html">
                                            Nestable List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-puzzle-piece"></i>
                                    <span class="title">
                                        UI Components
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="components_pickers.html">
                                            Pickers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_dropdowns.html">
                                            Custom Dropdowns
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_form_tools.html">
                                            Form Tools
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_editors.html">
                                            Markdown & WYSIWYG Editors
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_ion_sliders.html">
                                            Ion Range Sliders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_noui_sliders.html">
                                            NoUI Range Sliders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_jqueryui_sliders.html">
                                            jQuery UI Sliders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_knob_dials.html">
                                            Knob Circle Dials
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-table"></i>
                                    <span class="title">
                                        Form Stuff
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="form_controls.html">
                                            Form Controls
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_layouts.html">
                                            Form Layouts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_editable.html">
                                            <span class="badge badge-roundless badge-warning">
                                                new
                                            </span>
                                            Form X-editable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_wizard.html">
                                            Form Wizard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_validation.html">
                                            Form Validation
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_image_crop.html">
                                            <span class="badge badge-roundless badge-important">
                                                new
                                            </span>
                                            Image Cropping
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_fileupload.html">
                                            Multiple File Upload
                                        </a>
                                    </li>
                                    <li>
                                        <a href="form_dropzone.html">
                                            Dropzone File Upload
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="title">
                                        Email Templates
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="email_newsletter.html">
                                            Responsive Newsletter<br>
                                            Email Template
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email_system.html">
                                            Responsive System<br>
                                            Email Template
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-sitemap"></i>
                                    <span class="title">
                                        Pages
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="page_portfolio.html">
                                            <i class="fa fa-briefcase"></i>
                                            <span class="badge badge-warning badge-roundless">
                                                new
                                            </span>
                                            Portfolio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_timeline.html">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="badge badge-info">
                                                4
                                            </span>
                                            Timeline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_coming_soon.html">
                                            <i class="fa fa-cogs"></i>
                                            Coming Soon
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_blog.html">
                                            <i class="fa fa-comments"></i>
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_blog_item.html">
                                            <i class="fa fa-font"></i>
                                            Blog Post
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_news.html">
                                            <i class="fa fa-coffee"></i>
                                            <span class="badge badge-success">
                                                9
                                            </span>
                                            News
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_news_item.html">
                                            <i class="fa fa-bell"></i>
                                            News View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_about.html">
                                            <i class="fa fa-group"></i>
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_contact.html">
                                            <i class="fa fa-envelope-o"></i>
                                            Contact Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="page_calendar.html">
                                            <i class="fa fa-calendar"></i>
                                            <span class="badge badge-important">
                                                14
                                            </span>
                                            Calendar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-gift"></i>
                                    <span class="title">
                                        Extra
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="extra_profile.html">
                                            User Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_lock.html">
                                            Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_faq.html">
                                            FAQ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html">
                                            <span class="badge badge-important">
                                                4
                                            </span>
                                            Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_search.html">
                                            Search Results
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_invoice.html">
                                            Invoice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_pricing_table.html">
                                            Pricing Tables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_404_option1.html">
                                            404 Page Option 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_404_option2.html">
                                            404 Page Option 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_404_option3.html">
                                            404 Page Option 3
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_500_option1.html">
                                            500 Page Option 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra_500_option2.html">
                                            500 Page Option 2
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-folder-open"></i>
                                    <span class="title">
                                        Multi Level Menu
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-cogs"></i> Item 1
                                            <span class="arrow">
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-user"></i>
                                                    Sample Link 1
                                                    <span class="arrow">
                                                    </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-remove"></i> Sample Link 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-pencil"></i> Sample Link 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-edit"></i> Sample Link 1
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user"></i> Sample Link 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-external-link"></i> Sample Link 2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bell"></i> Sample Link 3
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-globe"></i> Item 2
                                            <span class="arrow">
                                            </span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user"></i> Sample Link 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-external-link"></i> Sample Link 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bell"></i> Sample Link 1
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-folder-open"></i>
                                            Item 3
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        Login Options
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="login.html">
                                            Login Form 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login_soft.html">
                                            Login Form 2
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-th"></i>
                                    <span class="title">
                                        Data Tables
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="table_basic.html">
                                            Basic Datatables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="table_responsive.html">
                                            Responsive Datatables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="table_managed.html">
                                            Managed Datatables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="table_editable.html">
                                            Editable Datatables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="table_advanced.html">
                                            Advanced Datatables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="table_ajax.html">
                                            Ajax Datatables
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-file-text"></i>
                                    <span class="title">
                                        Portlets
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="portlet_general.html">
                                            General Portlets
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portlet_ajax.html">
                                            Ajax Portlets
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portlet_draggable.html">
                                            Draggable Portlets
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-map-marker"></i>
                                    <span class="title">
                                        Maps
                                    </span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="maps_google.html">
                                            Google Maps
                                        </a>
                                    </li>
                                    <li>
                                        <a href="maps_vector.html">
                                            Vector Maps
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="last ">
                                <a href="charts.html">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <span class="title">
                                        Visual Charts
                                    </span>
                                </a>
                            </li>
                        </ul>
                   
                    <!--<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span class="title">
                                    Gestor de In
                                </span>
                                <span class="arrow">
                                </span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Crear editar agregar tiendas">
                                    <a href="{{ route('tienda') }}" target="_blank">
                                        <span class="title">
                                        Tiendas
                                        </span>
                                    </a>
                                </li>
                             
                            </ul>
                        </li>
                    </ul>--->
                   <?php } ?>
                    @if(Sentry::getUser()->id==1 || Sentry::getUser()->id==4)

               
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span class="title">
                                    Usuarios
                                </span>
                                <span class="arrow">
                                </span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                    <a href="{{ route('users') }}" target="_blank">
                                        <span class="title">
                                            Usuarios
                                        </span>
                                    </a>
                                </li>
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar grupos">
                                    <a href="{{ route('groups') }}" target="_blank">

                                        <span class="title">
                                            Grupos
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                         @endif
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span class="title">
                                    Inventarios
                                </span>
                                <span class="arrow">
                                </span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('tienda') }}" target="_blank">
                                        <span class="title">
                                            Inventario
                                        </span>
                                    </a>
                                </li>
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('productos') }}" target="_blank">
                                        <span class="title">
                                            Productos
                                        </span>
                                    </a>
                                </li>
                                
                                 <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('pedidos') }}" target="_blank">
                                        <span class="title">
                                            Pedidos
                                        </span>
                                    </a>
                                </li>
                                <!--<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar grupos">
                                    <a href="{{ route('groups') }}" target="_blank">

                                        <span class="title">
                                            Grupos
                                        </span>
                                    </a>
                                </li>--->
                            </ul>
                        </li>
                    </ul>
                    
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span class="title">
                                    Sistema
                                </span>
                                <span class="arrow">
                                </span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                  <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('categoria') }}" target="_blank">
                                        <span class="title">
                                            Categorias
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('marca') }}" target="_blank">
                                        <span class="title">
                                            Marcas
                                        </span>
                                    </a>
                                </li>
                                
                              <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('color') }}" target="_blank">
                                        <span class="title">
                                            Colores
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('material') }}" target="_blank">
                                        <span class="title">
                                            Materiales
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('talla') }}" target="_blank">
                                        <span class="title">
                                            Tallas
                                        </span>
                                    </a>
                                </li>
                                
                       
                                <!--<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar grupos">
                                    <a href="{{ route('groups') }}" target="_blank">

                                        <span class="title">
                                            Grupos
                                        </span>
                                    </a>
                                </li>--->
                            </ul>
                        </li>
                    </ul>
                    
                                        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span class="title">
                                    Pagina
                                </span>
                                <span class="arrow">
                                </span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('destacados') }}" target="_blank">
                                        <span class="title">
                                            Destacados
                                        </span>
                                    </a>
                                </li>
                              <!--    
                              <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar, crear y borrar">
                                   <a href="{{ route('color') }}" target="_blank">
                                        <span class="title">
                                            Colores
                                        </span>
                                    </a>
                                </li>
                              <li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="Administrar grupos">
                                    <a href="{{ route('groups') }}" target="_blank">

                                        <span class="title">
                                            Grupos
                                        </span>
                                    </a>
                                </li>--->
                            </ul>
                        </li>
                    </ul>

                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')

                </div>

            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                2014 &copy; Metronic by keenthemes.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="/assets/plugins/respond.min.js"></script>
        <script src="/assets/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="{{ asset('/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>

        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <script src="{{ asset('/assets/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
        <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
        <script src="{{ asset('/assets/plugins/redactor/redactor.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/redactor/fullscreen.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/redactor/fontsize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/redactor/fontfamily.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/redactor/fontcolor.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/plugins/redactor/es.js') }}" type="text/javascript"></script>

        <script src="{{ asset('/assets/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script src="{{ asset('/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('/assets/scripts/core/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/scripts/custom/index.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/scripts/custom/tasks.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/assets/scripts/spectrum/spectrum.js') }}" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
        $(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


        jQuery(document).ready(function() {
            App.init(); // initlayout and core plugins
           // Index.init();
           // Index.initCalendar(); // init index page's custom scripts
          //  Index.initCharts(); // init index page's custom scripts  
           // Index.initChat();
         //   Index.initMiniCharts();
          //  Index.initDashboardDaterange();
            //Index.initIntro();
            Tasks.initDashboardWidget();
 $(".select").select2({placeholder: "Select a State",
    allowClear: true});
        });
        
        $('.redactor_content').redactor({
				lang: 'es',
				imageUpload: '/home/public/subirimageneditor',
				convertDivs: false,
				autoresize: true,
				minHeight: 350,
				phpTags: true,
				linkEmail: true,
				plugins: ['fullscreen','fontsize','fontfamily','fontcolor']
			});
        
        </script>
        <!-- END JAVASCRIPTS -->
    @yield('scripts')
    
    </body>
    <!-- END BODY -->
</html>
<!-- Localized -->
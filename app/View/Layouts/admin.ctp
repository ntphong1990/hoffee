<!DOCTYPE html>
<html>
<head>
    <title>Hoffee - Dashboard</title>
    <link href="<?php echo Configure::read('Settings.DOMAIN');?>/sass/css/application.css" rel="stylesheet">
    <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/tether/dist/js/tether.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/util.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/collapse.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/dropdown.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/button.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/tooltip.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/alert.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/slimScroll/jquery.slimscroll.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/widgster/widgster.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/pace.js/pace.js" data-pace-options='{ "target": ".content-wrap", "ghostTime": 1000 }'></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/js/bootstrap-fix/button.js"></script>

<!-- common app js -->
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/js/settings.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/js/app.js"></script>

<!-- page specific libs -->
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/underscore/underscore.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/d3/d3.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/raphael/raphael-min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jQuery-Mapael/js/maps/world_countries.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/popover.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>

<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/d3/d3.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/raphael/raphael-min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/flot.animator/jquery.flot.animator.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/flot/jquery.flot.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/flot-orderBars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/flot/jquery.flot.selection.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/flot/jquery.flot.time.js"></script>

<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/nvd3/build/nv.d3.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/morris.js/morris.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<!-- page specific js -->
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/js/index.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/js/form-elements.js"></script>

<!-- page specific libs -->
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap/js/dist/modal.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jquery-autosize/jquery.autosize.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap3-wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap3-wysihtml5/src/bootstrap3-wysihtml5.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/select2/select2.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/switchery/dist/switchery.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/moment/min/moment.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jasny-bootstrap/js/inputmask.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/jasny-bootstrap/js/fileinput.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/holderjs/holder.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/markdown/lib/markdown.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<!-- page specific js -->
<script src="<?php echo Configure::read('Settings.DOMAIN');?>/sass/js/form-elements.js"></script>
</head>
<body id="sidebar">



<nav class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-sm-down">
            <a>HOFFEE</a>
        </header>
        <!-- seems like lots of recent admin template have this feature of user info in the sidebar.
             looks good, so adding it and enhancing with notifications -->
        <div class="sidebar-status hidden-md-up">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="thumb-sm avatar pull-xs-right">
                    <img class="img-circle" src="demo/img/people/a5.jpg" alt="...">
                </span>
                <!-- .circle is a pretty cool way to add a bit of beauty to raw data.
                     should be used with bg-* and text-* classes for colors -->
                <span class="circle bg-warning fw-bold text-gray-dark">
                    13
                </span>
                &nbsp;
                Admin <strong>Smith</strong>
                <b class="caret"></b>
            </a>
            <!-- #notifications-dropdown-menu goes here when screen collapsed to xs or sm -->
        </div>
        <!-- main notification links are placed inside of .sidebar-nav -->
        <ul class="sidebar-nav">
            <li class="active">
                <!-- an example of nested submenu. basic bootstrap collapse component -->
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-desktop"></i>
                    </span>
                    Tổng quan
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-dashboard" class="collapse in">
                    <li class="active"><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/financials">Thống kê</a></li>
                    <li class="active"><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/financials/list">Thu Chi</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/users/index">
                    <span class="icon">
                        <i class="fa fa-user"></i>
                    </span>
                    Nhân viên
                </a>
            </li>
            <li>
                <a href="#sidebar-customer" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-users"></i>
                    </span>
                    Khách hàng
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-customer" class="collapse in">
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/index">Danh sách</a></li>
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/customers/add">Tạo mới</a></li>
                </ul>
            </li>
            <li>
                <a href="#sidebar-order" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-money"></i>
                    </span>
                    Bán hàng
                    <sup class="text-warning fw-semi-bold">
                        new
                    </sup>
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-order" class="collapse in">
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/index">Danh sách</a></li>
                     <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/create">Tạo mới</a></li>
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/orders/temp">Nháp</a></li>
                </ul>
               
            </li>

             <li>
                <a href="#sidebar-storage" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-home"></i>
                    </span>
                    Kho
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-storage" class="collapse in">
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/stocks/index">Trạng thái</a></li>
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/stocks/add">Nhập kho</a></li>
                </ul>
               
            </li>

            <li>
                <a href="#sidebar-product" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-home"></i>
                    </span>
                    Sản phẩm
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-product" class="collapse in">
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/brands/index">Nhóm sản phẩm</a></li>
                    <li><a href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/products/index">Sản phẩm</a></li>
                </ul>
               
            </li>
        </ul>
        <!-- every .sidebar-nav may have a title -->
        
        <h5 class="sidebar-nav-title">Settings <a class="action-link" href="#"><i class="glyphicon glyphicon-plus"></i></a></h5>
        <!-- some styled links in sidebar. ready to use as links to email folders, projects, groups, etc -->
        <ul class="sidebar-labels">
            <li>
                <a href="#">
                    <!-- yep, .circle again -->
                    <i class="fa fa-circle text-warning mr-xs"></i>
                    <span class="label-name">My Recent</span>
                     
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-circle text-gray mr-xs"></i>
                    <span class="label-name">Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-circle text-danger mr-xs"></i>
                    <span class="label-name">Background</span>
                </a>
            </li>
        </ul>
        <h5 class="sidebar-nav-title">Projects</h5>
        <!-- A place for sidebar notifications & alerts -->
        <div class="sidebar-alerts">
            <div class="alert fade in">
                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                <span class="text-white fw-semi-bold">Sales Report</span> <br>
                <div class="bg-gray-transparent progress-bar">
                    <progress class="progress progress-xs progress-bar-gray-light mt-xs mb-0" value="100" max="100" style="width: 16%"></progress>
                </div>
                <small>Calculating x-axis bias... 65%</small>
            </div>
            <div class="alert fade in">
                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                <span class="text-white fw-semi-bold">Personal Responsibility</span> <br>
                <div class="bg-gray-transparent progress-bar">
                    <progress class="progress progress-xs progress-danger mt-xs mb-0" value="100" max="100" style="width: 23%"></progress>
                </div>
                <small>Provide required notes</small>
            </div>
        </div>
    </div>
</nav>
<!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
<nav class="page-controls navbar navbar-dashboard">
    <div class="container-fluid">
        <!-- .navbar-header contains links seen on xs & sm screens -->
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <!-- whether to automatically collapse sidebar on mouseleave. If activated acts more like usual admin templates -->
                    <a class="hidden-md-down nav-link" id="nav-state-toggle" href="#" data-toggle="tooltip" data-html="true" data-original-title="Turn<br>on/off<br>sidebar<br>collapsing" data-placement="bottom">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                    <!-- shown on xs & sm screen. collapses and expands navigation -->
                    <a class="hidden-lg-up nav-link" id="nav-collapse-toggle" href="#" data-html="true" title="Show/hide<br>sidebar" data-placement="bottom">
                        <span class="rounded rounded-lg bg-gray text-white hidden-md-up"><i class="fa fa-bars fa-lg"></i></span>
                        <i class="fa fa-bars fa-lg hidden-sm-down"></i>
                    </a>
                </li>
                <!-- <li class="nav-item hidden-sm-down"><a href="#" class="nav-link"><i class="fa fa-refresh fa-lg"></i></a></li>
                <li class="nav-item ml-n-xs hidden-sm-down"><a href="#" class="nav-link"><i class="fa fa-times fa-lg"></i></a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-md-up">
                <li>
                    <!-- toggles chat -->
                    <a href="#" data-toggle="chat-sidebar">
                        <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-globe fa-lg"></i></span>
                    </a>
                </li>
            </ul>
            <!-- xs & sm screen logo -->
            <a class="navbar-brand hidden-md-up" href="<?php echo Configure::read('Settings.DOMAIN');?>/admin/financials/index">
                <i class="fa fa-circle text-gray mr-n-sm"></i>
                <i class="fa fa-circle text-warning"></i>
                &nbsp;
                Hoffee
                &nbsp;
                <i class="fa fa-circle text-warning mr-n-sm"></i>
                <i class="fa fa-circle text-gray"></i>
            </a>
        </div>

        <!-- this part is hidden for xs screens -->
        <div class="collapse navbar-collapse">
            <!-- search form! link it to your search server -->
            <!-- <form class="navbar-form pull-xs-left" role="search">
                <div class="form-group">
                    <div class="input-group input-group-no-border">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                        <input class="form-control" type="text" placeholder="Search Dashboard">
                    </div>
                </div>
            </form> -->
            <ul class="nav navbar-nav pull-xs-right">
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle dropdown-toggle-notifications nav-link" id="notifications-dropdown-toggle" data-toggle="dropdown">
                        <span class="thumb-sm avatar pull-xs-left">
                            <img class="img-circle" src="https://secure.gravatar.com/avatar/2efd8534a82578a162535ce9abd0224c.jpg?s=40&amp;d=https%3A%2F%2Fsecure.gravatar.com%2Favatar%2F18f9f20ec1a7be8020924ce0048b6ef2.jpg%3Fs%3D40" alt="...">
                        </span>
                        &nbsp;
                        <strong><?php echo $authUser['name'];?> </strong>&nbsp;
                        <span class="circle bg-warning fw-bold">
                            13
                        </span>
                        <b class="caret"></b></a>
                    <!-- ready to use notifications dropdown.  inspired by smartadmin template.
                         consists of three components:
                         notifications, messages, progress. leave or add what's important for you.
                         uses Sing's ajax-load plugin for async content loading. See #load-notifications-btn -->
                    <div class="dropdown-menu dropdown-menu-right animated fadeInUp" id="notifications-dropdown-menu">
                        <section class="card notifications">
                            <header class="card-header">
                                <div class="text-xs-center mb-sm">
                                    <strong>You have 13 notifications</strong>
                                </div>
                                <div class="btn-group btn-group-sm btn-group-justified" id="notifications-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <!-- ajax-load plugin in action. setting data-ajax-load & data-ajax-target is the
                                             only requirement for async reloading -->
                                        <input type="radio" checked
                                               data-ajax-trigger="change"
                                               data-ajax-load="demo/ajax/notifications.html"
                                               data-ajax-target="#notifications-list"> Notifications
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio"
                                               data-ajax-trigger="change"
                                               data-ajax-load="demo/ajax/messages.html"
                                               data-ajax-target="#notifications-list"> Messages
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio"
                                               data-ajax-trigger="change"
                                               data-ajax-load="demo/ajax/progress.html"
                                               data-ajax-target="#notifications-list"> Progress
                                    </label>
                                </div>
                            </header>
                            <!-- notification list with .thin-scroll which styles scrollbar for webkit -->
                            <div id="notifications-list" class="list-group thin-scroll">
                                <div class="list-group-item">
                                <span class="thumb-sm pull-xs-left mr clearfix">
                                    <img class="img-circle" src="demo/img/people/a3.jpg" alt="...">
                                </span>
                                    <p class="no-margin overflow-hidden">
                                        1 new user just signed up! Check out
                                        <a href="#">Monica Smith</a>'s account.
                                        <time class="help-block no-margin">
                                            2 mins ago
                                        </time>
                                    </p>
                                </div>
                                <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-xs-left mr">
                                    <i class="glyphicon glyphicon-upload fa-lg"></i>
                                </span>
                                    <p class="text-ellipsis no-margin">
                                        2.1.0-pre-alpha just released. </p>
                                    <time class="help-block no-margin">
                                        5h ago
                                    </time>
                                </a>
                                <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-xs-left mr">
                                    <i class="fa fa-bolt fa-lg"></i>
                                </span>
                                    <p class="text-ellipsis no-margin">
                                        Server load limited. </p>
                                    <time class="help-block no-margin">
                                        7h ago
                                    </time>
                                </a>
                                <div class="list-group-item">
                                <span class="thumb-sm pull-xs-left mr clearfix">
                                    <img class="img-circle" src="demo/img/people/a5.jpg" alt="...">
                                </span>
                                    <p class="no-margin overflow-hidden">
                                        User <a href="#">Jeff</a> registered
                                        &nbsp;&nbsp;
                                        <a class="label label-success">Allow</a>
                                        <a class="label label-danger">Deny</a>
                                        <time class="help-block no-margin">
                                            12:18 AM
                                        </time>
                                    </p>
                                </div>
                                <div class="list-group-item">
                                    <span class="thumb-sm pull-xs-left mr">
                                        <i class="fa fa-shield fa-lg"></i>
                                    </span>
                                    <p class="no-margin overflow-hidden">
                                        Instructions for changing your Envato Account password. Please
                                        check your account <a href="#">security page</a>.
                                        <time class="help-block no-margin">
                                            12:18 AM
                                        </time>
                                    </p>
                                </div>
                                <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-xs-left mr">
                                    <span class="rounded bg-primary rounded-lg">
                                        <i class="fa fa-facebook text-white"></i>
                                    </span>
                                </span>
                                    <p class="text-ellipsis no-margin">
                                        New <strong>76</strong> facebook likes received.</p>
                                    <time class="help-block no-margin">
                                        15 Apr 2014
                                    </time>
                                </a>
                                <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-xs-left mr">
                                    <span class="circle circle-lg bg-gray-dark">
                                        <i class="fa fa-circle-o text-white"></i>
                                    </span>
                                </span>
                                    <p class="text-ellipsis no-margin">
                                        Dark matter detected.</p>
                                    <time class="help-block no-margin">
                                        15 Apr 2014
                                    </time>
                                </a>
                            </div>
                            <footer class="card-footer text-sm">
                                <!-- ajax-load button. loads demo/ajax/notifications.php to #notifications-list
                                     when clicked -->
                                <button class="btn-label btn-link pull-xs-right"
                                        id="load-notifications-btn"
                                        data-ajax-load="demo/ajax/notifications.php"
                                        data-ajax-target="#notifications-list"
                                        data-loading-text="<i class='fa fa-refresh fa-spin mr-xs'></i> Loading...">
                                    <i class="fa fa-refresh"></i>
                                </button>
                                <span>Synced at: 21 Apr 2014 18:36</span>
                            </footer>
                        </section>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-cog fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="profile.html"><i class="glyphicon glyphicon-user"></i> &nbsp; My Account</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="calendar.html">Calendar</a></li>
                        <li><a class="dropdown-item" href="inbox.html">Inbox &nbsp;&nbsp;<span class="label label-pill label-danger animated bounceIn">9</span></a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo Configure::read('Settings.DOMAIN');?>/users/logout"><i class="fa fa-sign-out"></i> &nbsp; Log Out</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="chat-sidebar">
                        <i class="fa fa-globe fa-lg"></i>
                    </a>
                    <div id="chat-notification" class="chat-notification hide">
                        <div class="chat-notification-inner">
                            <h6 class="title">
                                <span class="thumb-xs">
                                    <img src="demo/img/people/a6.jpg" class="img-circle mr-xs pull-xs-left">
                                </span>
                                Jess Smith
                            </h6>
                            <p class="text">Hey! What's up?</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="chat-sidebar" id="chat">
    <div class="chat-sidebar-content">
        <header class="chat-sidebar-header">
            <h5 class="chat-sidebar-title">Contacts</h5>
            <div class="form-group no-margin">
                <div class="input-group input-group-dark">
                    <input class="form-control fs-mini" id="chat-sidebar-search" type="text" placeholder="Search...">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </header>
        <div class="chat-sidebar-contacts chat-sidebar-panel open">
            <h5 class="sidebar-nav-title">Today</h5>
            <div class="list-group chat-sidebar-user-group">
                <a class="list-group-item" href="#chat-sidebar-user-1">
                    <i class="fa fa-circle text-success pull-xs-right"></i>
                    <span class="thumb-sm pull-xs-left mr">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <h6 class="message-sender">Chris Gray</h6>
                    <p class="message-preview">Hey! What's up? So many times since we</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-2">
                    <i class="fa fa-circle text-gray-light pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="img/avatar.png" alt="...">
                </span>
                    <h6 class="message-sender">Jamey Brownlow</h6>
                    <p class="message-preview">Good news coming tonight. Seems they agreed to proceed</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-3">
                    <i class="fa fa-circle text-danger pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="demo/img/people/a1.jpg" alt="...">
                </span>
                    <h6 class="message-sender">Livia Walsh</h6>
                    <p class="message-preview">Check out my latest email plz!</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-4">
                    <i class="fa fa-circle text-gray-light pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="img/avatar.png" alt="...">
                </span>
                    <h6 class="message-sender">Jaron Fitzroy</h6>
                    <p class="message-preview">What about summer break?</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-5">
                    <i class="fa fa-circle text-success pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="demo/img/people/a4.jpg" alt="...">
                </span>
                    <h6 class="message-sender">Mike Lewis</h6>
                    <p class="message-preview">Just ain't sure about the weekend now. 90% I'll make it.</p>
                </a>
            </div>
            <h5 class="sidebar-nav-title">Last Week</h5>
            <div class="list-group chat-sidebar-user-group">
                <a class="list-group-item" href="#chat-sidebar-user-6">
                    <i class="fa fa-circle text-gray-light pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="demo/img/people/a6.jpg" alt="...">
                </span>
                    <h6 class="message-sender">Freda Edison</h6>
                    <p class="message-preview">Hey what's up? Me and Monica going for a lunch somewhere. Wanna join?</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-7">
                    <i class="fa fa-circle text-success pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="demo/img/people/a5.jpg" alt="...">
                </span>
                    <h6 class="message-sender">Livia Walsh</h6>
                    <p class="message-preview">Check out my latest email plz!</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-8">
                    <i class="fa fa-circle text-warning pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="demo/img/people/a3.jpg" alt="...">
                </span>
                    <h6 class="message-sender">Jaron Fitzroy</h6>
                    <p class="message-preview">What about summer break?</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-9">
                    <i class="fa fa-circle text-gray-light pull-xs-right"></i>
                <span class="thumb-sm pull-xs-left mr">
                    <img class="img-circle" src="img/avatar.png" alt="...">
                </span>
                    <h6 class="message-sender">Mike Lewis</h6>
                    <p class="message-preview">Just ain't sure about the weekend now. 90% I'll make it.</p>
                </a>
            </div>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-1">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Chris Gray
                </a>
            </h6>
            <ul class="message-list">
                <li class="message">
                    <span class="thumb-sm">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <div class="message-body">
                        Hey! What's up?
                    </div>
                </li>
                <li class="message">
                    <span class="thumb-sm">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <div class="message-body">
                        Are you there?
                    </div>
                </li>
                <li class="message">
                    <span class="thumb-sm">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <div class="message-body">
                        Let me know when you come back.
                    </div>
                </li>
                <li class="message from-me">
                    <span class="thumb-sm">
                        <img class="img-circle" src="img/avatar.png" alt="...">
                    </span>
                    <div class="message-body">
                        I am here!
                    </div>
                </li>
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-2">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Jamey Brownlow
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-3">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Livia Walsh
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-4">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Jaron Fitzroy
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-5">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Mike Lewis
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-6">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Freda Edison
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-7">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Livia Walsh
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-8">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Jaron Fitzroy
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-9">
            <h6 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Mike Lewis
                </a>
            </h6>
            <ul class="message-list">
            </ul>
        </div>
        <footer class="chat-sidebar-footer form-group">
            <input class="form-control input-dark" id="chat-sidebar-input" type="text"  placeholder="Type your message">
        </footer>
    </div>
</div>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
    <main id="content" class="content" role="main">
        <?= $this->fetch('content') ?>
    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->

</body>
</html>
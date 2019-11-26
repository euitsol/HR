@extends('layouts.joli')
@section('title', 'Appeal')
@section('link')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
@endsection
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[42]->display_name}}</li>
        <li class="active">{{$menu[44]->display_name}}</li>
    </ul>
@endsection
@section('pageTitle', 'Appeal')
@section('content')
    <div class="row">

        <div class="col-md-6">

            <!-- START MODALS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Basic Modals</h3>
                </div>
                <div class="panel-body">
                    <p>This is basic examples of bootstrap modals usage</p>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal_basic">Basic</button>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal_no_head">No Head</button>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal_no_footer">No Footer</button>
                </div>
            </div>
            <!-- END MODALS -->

        </div>

        <div class="col-md-6">

            <!-- START MODAL SIZES -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Modal Sizes</h3>
                </div>
                <div class="panel-body">
                    <p>All you need is add class <code>modal-lg,modal-sm</code> to <code>modal-dialog</code> to get other size.</p>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal_small">Small</button>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal_basic">Basic</button>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal_large">Large</button>
                </div>
            </div>
            <!-- END MODAL SIZES -->

        </div>

    </div>
@endsection
@section('modal')
    <!-- MODALS -->
    <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Basic Modal</h4>
                </div>
                <div class="modal-body">
                    Some content in modal example
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End MODALS -->
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
{{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection




































{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <!-- META SECTION -->--}}
{{--    <title>Joli Admin - Responsive Bootstrap Admin Template</title>--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1" />--}}

{{--    <link rel="icon" href="favicon.ico" type="image/x-icon" />--}}
{{--    <!-- END META SECTION -->--}}

{{--    <!-- CSS INCLUDE -->--}}
{{--    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('joli/css/theme-default.css')}}"/>--}}
{{--    <!-- EOF CSS INCLUDE -->--}}
{{--</head>--}}
{{--<body>--}}
{{--<!-- START PAGE CONTAINER -->--}}
{{--<div class="page-container">--}}

{{--    <!-- START PAGE SIDEBAR -->--}}
{{--    <div class="page-sidebar">--}}
{{--        <!-- START X-NAVIGATION -->--}}
{{--        <ul class="x-navigation">--}}
{{--            <li class="xn-logo">--}}
{{--                <a href="index.html">Joli Admin</a>--}}
{{--                <a href="#" class="x-navigation-control"></a>--}}
{{--            </li>--}}
{{--            <li class="xn-profile">--}}
{{--                <a href="#" class="profile-mini">--}}
{{--                    <img src="assets/images/users/avatar.jpg" alt="John Doe"/>--}}
{{--                </a>--}}
{{--                <div class="profile">--}}
{{--                    <div class="profile-image">--}}
{{--                        <img src="assets/images/users/avatar.jpg" alt="John Doe"/>--}}
{{--                    </div>--}}
{{--                    <div class="profile-data">--}}
{{--                        <div class="profile-data-name">John Doe</div>--}}
{{--                        <div class="profile-data-title">Web Developer/Designer</div>--}}
{{--                    </div>--}}
{{--                    <div class="profile-controls">--}}
{{--                        <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>--}}
{{--                        <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="xn-title">Navigation</li>--}}
{{--            <li>--}}
{{--                <a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>--}}
{{--            </li>--}}
{{--            <li class="xn-openable">--}}
{{--                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li>--}}
{{--                    <li><a href="pages-profile.html"><span class="fa fa-user"></span> Profile</a></li>--}}
{{--                    <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Address Book</a></li>--}}
{{--                    <li class="xn-openable">--}}
{{--                        <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>--}}
{{--                            <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="xn-openable">--}}
{{--                        <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>--}}
{{--                            <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>--}}
{{--                            <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>--}}
{{--                    <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>--}}
{{--                    <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>--}}
{{--                    <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>--}}
{{--                    <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>--}}
{{--                    <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>--}}
{{--                    <li class="xn-openable">--}}
{{--                        <a href="#"><span class="fa fa-file"></span> Blog</a>--}}

{{--                        <ul>--}}
{{--                            <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>--}}
{{--                            <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="xn-openable">--}}
{{--                        <a href="#"><span class="fa fa-sign-in"></span> Login</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="pages-login.html">App Login</a></li>--}}
{{--                            <li><a href="pages-login-website.html">Website Login</a></li>--}}
{{--                            <li><a href="pages-login-website-light.html"> Website Login Light</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="xn-openable">--}}
{{--                        <a href="#"><span class="fa fa-warning"></span> Error Pages</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>--}}
{{--                            <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>--}}
{{--                            <li><a href="pages-error-500.html"> Error 500</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="xn-openable">--}}
{{--                <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Layouts</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="layout-boxed.html">Boxed</a></li>--}}
{{--                    <li><a href="layout-nav-toggled.html">Navigation Toggled</a></li>--}}
{{--                    <li><a href="layout-nav-top.html">Navigation Top</a></li>--}}
{{--                    <li><a href="layout-nav-right.html">Navigation Right</a></li>--}}
{{--                    <li><a href="layout-nav-top-fixed.html">Top Navigation Fixed</a></li>--}}
{{--                    <li><a href="layout-nav-custom.html">Custom Navigation</a></li>--}}
{{--                    <li><a href="layout-frame-left.html">Frame Left Column</a></li>--}}
{{--                    <li><a href="layout-frame-right.html">Frame Right Column</a></li>--}}
{{--                    <li><a href="layout-search-left.html">Search Left Side</a></li>--}}
{{--                    <li><a href="blank.html">Blank Page</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="xn-title">Components</li>--}}
{{--            <li class="xn-openable active">--}}
{{--                <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">UI Kits</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> Widgets</a></li>--}}
{{--                    <li class="active"><a href="ui-elements.html"><span class="fa fa-cogs"></span> Elements</a></li>--}}
{{--                    <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Buttons</a></li>--}}
{{--                    <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Panels</a></li>--}}
{{--                    <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Icons</a><div class="informer informer-warning">+679</div></li>--}}
{{--                    <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Typography</a></li>--}}
{{--                    <li><a href="ui-portlet.html"><span class="fa fa-th"></span> Portlet</a></li>--}}
{{--                    <li><a href="ui-sliders.html"><span class="fa fa-arrows-h"></span> Sliders</a></li>--}}
{{--                    <li><a href="ui-alerts-popups.html"><span class="fa fa-warning"></span> Alerts & Popups</a></li>--}}
{{--                    <li><a href="ui-lists.html"><span class="fa fa-list-ul"></span> Lists</a></li>--}}
{{--                    <li><a href="ui-tour.html"><span class="fa fa-random"></span> Tour</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="xn-openable">--}}
{{--                <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Forms</span></a>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="form-layouts-two-column.html"><span class="fa fa-tasks"></span> Form Layouts</a>--}}
{{--                        <div class="informer informer-danger">New</div>--}}
{{--                        <ul>--}}
{{--                            <li><a href="form-layouts-one-column.html"><span class="fa fa-align-justify"></span> One Column</a></li>--}}
{{--                            <li><a href="form-layouts-two-column.html"><span class="fa fa-th-large"></span> Two Column</a></li>--}}
{{--                            <li><a href="form-layouts-tabbed.html"><span class="fa fa-table"></span> Tabbed</a></li>--}}
{{--                            <li><a href="form-layouts-separated.html"><span class="fa fa-th-list"></span> Separated Rows</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="form-elements.html"><span class="fa fa-file-text-o"></span> Elements</a></li>--}}
{{--                    <li><a href="form-validation.html"><span class="fa fa-list-alt"></span> Validation</a></li>--}}
{{--                    <li><a href="form-wizards.html"><span class="fa fa-arrow-right"></span> Wizards</a></li>--}}
{{--                    <li><a href="form-editors.html"><span class="fa fa-text-width"></span> WYSIWYG Editors</a></li>--}}
{{--                    <li><a href="form-file-handling.html"><span class="fa fa-floppy-o"></span> File Handling</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="xn-openable">--}}
{{--                <a href="tables.html"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> Basic</a></li>--}}
{{--                    <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> Data Tables</a></li>--}}
{{--                    <li><a href="table-export.html"><span class="fa fa-download"></span> Export Tables</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="xn-openable">--}}
{{--                <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Charts</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="charts-morris.html"><span class="xn-text">Morris</span></a></li>--}}
{{--                    <li><a href="charts-nvd3.html"><span class="xn-text">NVD3</span></a></li>--}}
{{--                    <li><a href="charts-rickshaw.html"><span class="xn-text">Rickshaw</span></a></li>--}}
{{--                    <li><a href="charts-other.html"><span class="xn-text">Other</span></a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>--}}
{{--            </li>--}}
{{--            <li class="xn-openable">--}}
{{--                <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>--}}
{{--                <ul>--}}
{{--                    <li class="xn-openable">--}}
{{--                        <a href="#">Second Level</a>--}}
{{--                        <ul>--}}
{{--                            <li class="xn-openable">--}}
{{--                                <a href="#">Third Level</a>--}}
{{--                                <ul>--}}
{{--                                    <li class="xn-openable">--}}
{{--                                        <a href="#">Fourth Level</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#">Fifth Level</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <!-- END X-NAVIGATION -->--}}
{{--    </div>--}}
{{--    <!-- END PAGE SIDEBAR -->--}}

{{--    <!-- PAGE CONTENT -->--}}
{{--    <div class="page-content">--}}

{{--        <!-- START X-NAVIGATION VERTICAL -->--}}
{{--        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">--}}
{{--            <!-- TOGGLE NAVIGATION -->--}}
{{--            <li class="xn-icon-button">--}}
{{--                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>--}}
{{--            </li>--}}
{{--            <!-- END TOGGLE NAVIGATION -->--}}
{{--            <!-- SEARCH -->--}}
{{--            <li class="xn-search">--}}
{{--                <form role="form">--}}
{{--                    <input type="text" name="search" placeholder="Search..."/>--}}
{{--                </form>--}}
{{--            </li>--}}
{{--            <!-- END SEARCH -->--}}
{{--            <!-- SIGN OUT -->--}}
{{--            <li class="xn-icon-button pull-right">--}}
{{--                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>--}}
{{--            </li>--}}
{{--            <!-- END SIGN OUT -->--}}
{{--            <!-- MESSAGES -->--}}
{{--            <li class="xn-icon-button pull-right">--}}
{{--                <a href="#"><span class="fa fa-comments"></span></a>--}}
{{--                <div class="informer informer-danger">4</div>--}}
{{--                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>--}}
{{--                        <div class="pull-right">--}}
{{--                            <span class="label label-danger">4 new</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">--}}
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="list-group-status status-online"></div>--}}
{{--                            <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>--}}
{{--                            <span class="contacts-title">John Doe</span>--}}
{{--                            <p>Praesent placerat tellus id augue condimentum</p>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="list-group-status status-away"></div>--}}
{{--                            <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>--}}
{{--                            <span class="contacts-title">Dmitry Ivaniuk</span>--}}
{{--                            <p>Donec risus sapien, sagittis et magna quis</p>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="list-group-status status-away"></div>--}}
{{--                            <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>--}}
{{--                            <span class="contacts-title">Nadia Ali</span>--}}
{{--                            <p>Mauris vel eros ut nunc rhoncus cursus sed</p>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="list-group-item">--}}
{{--                            <div class="list-group-status status-offline"></div>--}}
{{--                            <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>--}}
{{--                            <span class="contacts-title">Darth Vader</span>--}}
{{--                            <p>I want my money back!</p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="panel-footer text-center">--}}
{{--                        <a href="pages-messages.html">Show all messages</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- END MESSAGES -->--}}
{{--            <!-- TASKS -->--}}
{{--            <li class="xn-icon-button pull-right">--}}
{{--                <a href="#"><span class="fa fa-tasks"></span></a>--}}
{{--                <div class="informer informer-warning">3</div>--}}
{{--                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>--}}
{{--                        <div class="pull-right">--}}
{{--                            <span class="label label-warning">3 active</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="panel-body list-group scroll" style="height: 200px;">--}}
{{--                        <a class="list-group-item" href="#">--}}
{{--                            <strong>Phasellus augue arcu, elementum</strong>--}}
{{--                            <div class="progress progress-small progress-striped active">--}}
{{--                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>--}}
{{--                            </div>--}}
{{--                            <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>--}}
{{--                        </a>--}}
{{--                        <a class="list-group-item" href="#">--}}
{{--                            <strong>Aenean ac cursus</strong>--}}
{{--                            <div class="progress progress-small progress-striped active">--}}
{{--                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>--}}
{{--                            </div>--}}
{{--                            <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>--}}
{{--                        </a>--}}
{{--                        <a class="list-group-item" href="#">--}}
{{--                            <strong>Lorem ipsum dolor</strong>--}}
{{--                            <div class="progress progress-small progress-striped active">--}}
{{--                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>--}}
{{--                            </div>--}}
{{--                            <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>--}}
{{--                        </a>--}}
{{--                        <a class="list-group-item" href="#">--}}
{{--                            <strong>Cras suscipit ac quam at tincidunt.</strong>--}}
{{--                            <div class="progress progress-small">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>--}}
{{--                            </div>--}}
{{--                            <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="panel-footer text-center">--}}
{{--                        <a href="pages-tasks.html">Show all tasks</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- END TASKS -->--}}
{{--        </ul>--}}
{{--        <!-- END X-NAVIGATION VERTICAL -->--}}

{{--        <!-- START BREADCRUMB -->--}}
{{--        <ul class="breadcrumb">--}}
{{--            <li><a href="#">Home</a></li>--}}
{{--            <li><a href="#">UI Kits</a></li>--}}
{{--            <li class="active">Elements</li>--}}
{{--        </ul>--}}
{{--        <!-- END BREADCRUMB -->--}}

{{--        <!-- PAGE TITLE -->--}}
{{--        <div class="page-title">--}}
{{--            <h2><span class="fa fa-arrow-circle-o-left"></span> Elements</h2>--}}
{{--        </div>--}}
{{--        <!-- END PAGE TITLE -->--}}

{{--        <!-- PAGE CONTENT WRAPPER -->--}}
{{--        <div class="page-content-wrap">--}}

{{--            <div class="row">--}}

{{--                <div class="col-md-6">--}}

{{--                    <!-- START MODALS -->--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Basic Modals</h3>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <p>This is basic examples of bootstrap modals usage</p>--}}
{{--                            <button class="btn btn-default" data-toggle="modal" data-target="#modal_basic">Basic</button>--}}
{{--                            <button class="btn btn-default" data-toggle="modal" data-target="#modal_no_head">No Head</button>--}}
{{--                            <button class="btn btn-default" data-toggle="modal" data-target="#modal_no_footer">No Footer</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END MODALS -->--}}

{{--                </div>--}}

{{--                <div class="col-md-6">--}}

{{--                    <!-- START MODAL SIZES -->--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Modal Sizes</h3>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <p>All you need is add class <code>modal-lg,modal-sm</code> to <code>modal-dialog</code> to get other size.</p>--}}
{{--                            <button class="btn btn-default" data-toggle="modal" data-target="#modal_small">Small</button>--}}
{{--                            <button class="btn btn-default" data-toggle="modal" data-target="#modal_basic">Basic</button>--}}
{{--                            <button class="btn btn-default" data-toggle="modal" data-target="#modal_large">Large</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END MODAL SIZES -->--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="row">--}}

{{--                <div class="col-md-6">--}}

{{--                    <!-- START LABELS -->--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Labels</h3>--}}
{{--                            <ul class="panel-controls">--}}
{{--                                <li class="label-control"><span class="label label-info">Some label text</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <span class="label label-default">Default</span>--}}
{{--                            <span class="label label-primary">Primary</span>--}}
{{--                            <span class="label label-success">Success</span>--}}
{{--                            <span class="label label-info">Info</span>--}}
{{--                            <span class="label label-warning">Warning</span>--}}
{{--                            <span class="label label-danger">Danger</span>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <span class="label label-default label-form">Default</span>--}}
{{--                            <span class="label label-primary label-form">Primary</span>--}}
{{--                            <span class="label label-success label-form">Success</span>--}}
{{--                            <span class="label label-info label-form">Info</span>--}}
{{--                            <span class="label label-warning label-form">Warning</span>--}}
{{--                            <span class="label label-danger label-form">Danger</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END LABELS -->--}}

{{--                    <!-- START PAGINATION -->--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Pagination</h3>--}}
{{--                            <ul class="pagination pagination-sm pull-right">--}}
{{--                                <li><a href="#">&laquo;</a></li>--}}
{{--                                <li><a href="#">1</a></li>--}}
{{--                                <li><a href="#">2</a></li>--}}
{{--                                <li class="active"><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li><a href="#">5</a></li>--}}
{{--                                <li><a href="#">&raquo;</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}

{{--                            <ul class="pagination pagination-lg">--}}
{{--                                <li><a href="#">&laquo;</a></li>--}}
{{--                                <li><a href="#">1</a></li>--}}
{{--                                <li class="active"><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li><a href="#">&raquo;</a></li>--}}
{{--                            </ul>--}}


{{--                            <ul class="pagination">--}}
{{--                                <li class="disabled"><a href="#">&laquo;</a></li>--}}
{{--                                <li class="active"><a href="#">1</a></li>--}}
{{--                                <li><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li><a href="#">5</a></li>--}}
{{--                                <li><a href="#">&raquo;</a></li>--}}
{{--                            </ul>--}}

{{--                            <ul class="pagination pagination-sm">--}}
{{--                                <li class="disabled"><a href="#">&laquo;</a></li>--}}
{{--                                <li class="active"><a href="#">1</a></li>--}}
{{--                                <li><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li><a href="#">5</a></li>--}}
{{--                                <li><a href="#">&raquo;</a></li>--}}
{{--                            </ul>--}}

{{--                        </div>--}}
{{--                        <div class="panel-footer">--}}
{{--                            <ul class="pagination pagination-sm pull-right">--}}
{{--                                <li><a href="#">&laquo;</a></li>--}}
{{--                                <li><a href="#">1</a></li>--}}
{{--                                <li><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li><a href="#">5</a></li>--}}
{{--                                <li><a href="#">6</a></li>--}}
{{--                                <li><a href="#">7</a></li>--}}
{{--                                <li class="active"><a href="#">8</a></li>--}}
{{--                                <li class="disabled"><a href="#">&raquo;</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END PAGINATION -->--}}

{{--                    <!-- START SCROLLBAR -->--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Custom Content Scroller</h3>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body scroll" style="height: 150px;">--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sagittis rhoncus dolor a porta. Sed fermentum tincidunt convallis. Donec magna orci, fringilla in laoreet sit amet, lobortis quis sem. Nulla lacinia suscipit lectus non convallis. Morbi in condimentum urna. Cras porta hendrerit dapibus. Sed efficitur urna in dictum luctus.</p>--}}
{{--                            <p>Sed sollicitudin velit vel purus finibus porttitor. Ut a felis ullamcorper, bibendum risus lobortis, bibendum ex. Nulla rutrum nunc ipsum. Nullam sed nibh non leo condimentum sollicitudin. Etiam sagittis dui sed dolor pharetra, et efficitur felis luctus. Mauris eu arcu maximus, lacinia purus quis, tempor magna. Suspendisse sit amet quam in mi aliquam hendrerit nec eget ante. Fusce bibendum imperdiet efficitur. Mauris facilisis ligula nec dolor dapibus convallis eget vitae velit. Nunc egestas metus neque, nec fermentum enim facilisis eu. Aliquam sagittis pharetra ante, sit amet luctus sem efficitur sed.</p>--}}
{{--                            <p>Quisque ac diam et enim maximus laoreet. Nulla et venenatis orci. Ut viverra, neque ac euismod iaculis, est libero rutrum augue, sed fermentum risus sapien id lectus. Quisque hendrerit ex ac felis malesuada finibus non ac justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sagittis tortor at diam dapibus lobortis. Pellentesque sed ornare nisl. Nunc in viverra eros. Integer faucibus sed nunc vitae laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas vestibulum imperdiet ante non mattis. Vivamus sapien risus, aliquet sed fermentum id, commodo ac felis. Proin sollicitudin varius tortor eu luctus.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END SCROLLBAR -->--}}

{{--                </div>--}}

{{--                <div class="col-md-6">--}}

{{--                    <!-- START PROGRESSBARS -->--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Progressbars</h3>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body">--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>--}}
{{--                            </div>--}}

{{--                            <h5>Colors</h5>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
{{--                                    40%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">--}}
{{--                                    20%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">--}}
{{--                                    60%--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">--}}
{{--                                    80%--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-colorful" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
{{--                                    75%--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <h5>Features</h5>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
{{--                                    40% Complete (success)--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45% Complete</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-success" style="width: 30%">--}}
{{--                                    30% (success)--}}
{{--                                </div>--}}
{{--                                <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 30%">--}}
{{--                                    30% (warning)--}}
{{--                                </div>--}}
{{--                                <div class="progress-bar progress-bar-danger" style="width: 40%">--}}
{{--                                    40% (danger)--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <h5>Small</h5>--}}
{{--                            <div class="progress progress-small">--}}
{{--                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">75%</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-small">--}}
{{--                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">33%</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-small">--}}
{{--                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-small">--}}
{{--                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>--}}
{{--                            </div>--}}
{{--                            <div class="progress progress-small">--}}
{{--                                <div class="progress-bar progress-bar-colorful" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END PROGRESSBARS -->--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}

{{--                <div class="col-md-6">--}}
{{--                    <!-- START ACCORDION -->--}}
{{--                    <div class="panel-group accordion">--}}
{{--                        <div class="panel panel-primary">--}}
{{--                            <div class="panel-heading">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a href="#accOneColOne">--}}
{{--                                        Collapsible Group Item #1--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div class="panel-body panel-body-open" id="accOneColOne">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="panel panel-info">--}}
{{--                            <div class="panel-heading">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a href="#accOneColTwo">--}}
{{--                                        Collapsible Group Item #2--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div class="panel-body" id="accOneColTwo">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="panel panel-warning">--}}
{{--                            <div class="panel-heading">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a href="#accOneColThree">--}}
{{--                                        Collapsible Group Item #3--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div class="panel-body" id="accOneColThree">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END ACCORDION -->--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}

{{--                    <!-- START ACCORDION -->--}}
{{--                    <div class="panel-group accordion accordion-dc">--}}
{{--                        <div class="panel panel-primary">--}}
{{--                            <div class="panel-heading">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a href="#accTwoColOne">--}}
{{--                                        Collapsible Group Item #1--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div class="panel-body panel-body-open" id="accTwoColOne">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="panel panel-info">--}}
{{--                            <div class="panel-heading">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a href="#accTwoColTwo">--}}
{{--                                        Collapsible Group Item #2--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div class="panel-body" id="accTwoColTwo">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="panel panel-warning">--}}
{{--                            <div class="panel-heading">--}}
{{--                                <h4 class="panel-title">--}}
{{--                                    <a href="#accTwoColThree">--}}
{{--                                        Collapsible Group Item #3--}}
{{--                                    </a>--}}
{{--                                </h4>--}}
{{--                            </div>--}}
{{--                            <div class="panel-body" id="accTwoColThree">--}}
{{--                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END ACCORDION -->--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="row">--}}

{{--                <div class="col-md-6">--}}
{{--                    <!-- START TABS -->--}}
{{--                    <div class="panel panel-default tabs">--}}
{{--                        <ul class="nav nav-tabs" role="tablist">--}}
{{--                            <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">First</a></li>--}}
{{--                            <li><a href="#tab-second" role="tab" data-toggle="tab">Second</a></li>--}}
{{--                            <li><a href="#tab-third" role="tab" data-toggle="tab">Third</a></li>--}}
{{--                            <li><a href="#tab-fourth" role="tab" data-toggle="tab">Fourth</a></li>--}}
{{--                        </ul>--}}
{{--                        <div class="panel-body tab-content">--}}
{{--                            <div class="tab-pane active" id="tab-first">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum dolor sem, quis pharetra dui ultricies vel. Cras non pulvinar tellus, vel bibendum magna. Morbi tellus nulla, cursus non nisi sed, porttitor dignissim erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis commodo lectus. Vivamus vel tincidunt enim, non vulputate ipsum. Ut pellentesque consectetur arcu sit amet scelerisque. Fusce commodo leo eros, ut eleifend massa congue at.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-second">--}}
{{--                                <p>Donec tristique eu sem et aliquam. Proin sodales elementum urna et euismod. Quisque nisl nisl, venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed, elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis. Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed aliquet neque posuere.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-third">--}}
{{--                                <p>Vestibulum cursus augue sed leo tempor, at aliquam orci dictum. Sed mattis metus id velit aliquet, et interdum nulla porta. Etiam euismod pellentesque purus, in fermentum eros venenatis ut. Praesent vitae nibh ac augue gravida lacinia non a ipsum. Aenean vestibulum eu turpis eu posuere. Sed eget lacus lacinia, mollis urna et, interdum dui. Donec sed diam ut metus imperdiet malesuada. Maecenas tincidunt ultricies ipsum, lobortis pretium dolor sodales ut. Donec nec fringilla nulla. In mattis sapien lorem, nec tincidunt elit scelerisque tempus.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-fourth">--}}
{{--                                <p>In mattis sapien lorem, nec tincidunt elit scelerisque tempus. Quisque nisl nisl, venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed, elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis. Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed aliquet neque posuere.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END TABS -->--}}
{{--                </div>--}}

{{--                <div class="col-md-6">--}}
{{--                    <!-- START JUSTIFIED TABS -->--}}
{{--                    <div class="panel panel-default tabs">--}}
{{--                        <ul class="nav nav-tabs nav-justified">--}}
{{--                            <li class="active"><a href="#tab8" data-toggle="tab">First</a></li>--}}
{{--                            <li><a href="#tab9" data-toggle="tab">Second</a></li>--}}
{{--                            <li><a href="#tab10" data-toggle="tab">Third</a></li>--}}
{{--                        </ul>--}}
{{--                        <div class="panel-body tab-content">--}}
{{--                            <div class="tab-pane active" id="tab8">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum dolor sem, quis pharetra dui ultricies vel. Cras non pulvinar tellus, vel bibendum magna. Morbi tellus nulla, cursus non nisi sed, porttitor dignissim erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis commodo lectus. Vivamus vel tincidunt enim, non vulputate ipsum. Ut pellentesque consectetur arcu sit amet scelerisque. Fusce commodo leo eros, ut eleifend massa congue at.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab9">--}}
{{--                                <p>Donec tristique eu sem et aliquam. Proin sodales elementum urna et euismod. Quisque nisl nisl, venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed, elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis. Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed aliquet neque posuere.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab10">--}}
{{--                                <p>Vestibulum cursus augue sed leo tempor, at aliquam orci dictum. Sed mattis metus id velit aliquet, et interdum nulla porta. Etiam euismod pellentesque purus, in fermentum eros venenatis ut. Praesent vitae nibh ac augue gravida lacinia non a ipsum. Aenean vestibulum eu turpis eu posuere. Sed eget lacus lacinia, mollis urna et, interdum dui. Donec sed diam ut metus imperdiet malesuada. Maecenas tincidunt ultricies ipsum, lobortis pretium dolor sodales ut. Donec nec fringilla nulla. In mattis sapien lorem, nec tincidunt elit scelerisque tempus.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END JUSTIFIED TABS -->--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <!-- START VERTICAL TABS WITH HEADING -->--}}
{{--                    <div class="panel panel-default nav-tabs-vertical">--}}
{{--                        <div class="panel-heading">--}}
{{--                            <h3 class="panel-title">Tabs with heading</h3>--}}
{{--                        </div>--}}
{{--                        <div class="tabs">--}}
{{--                            <ul class="nav nav-tabs">--}}
{{--                                <li class="active"><a href="#tab19" data-toggle="tab">First</a></li>--}}
{{--                                <li><a href="#tab20" data-toggle="tab">Second</a></li>--}}
{{--                                <li><a href="#tab21" data-toggle="tab">Third</a></li>--}}
{{--                            </ul>--}}
{{--                            <div class="panel-body tab-content">--}}
{{--                                <div class="tab-pane active" id="tab19">--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum dolor sem, quis pharetra dui ultricies vel. Cras non pulvinar tellus, vel bibendum magna. Morbi tellus nulla, cursus non nisi sed, porttitor dignissim erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis commodo lectus. Vivamus vel tincidunt enim, non vulputate ipsum. Ut pellentesque consectetur arcu sit amet scelerisque. Fusce commodo leo eros, ut eleifend massa congue at.</p>--}}
{{--                                    <p>Nam a nisi et nisi tristique lacinia non sit amet orci. Duis blandit leo odio, eu varius nulla fringilla adipiscing. Praesent posuere blandit diam, sit amet suscipit justo consequat sed. Duis cursus volutpat ante at convallis. Integer posuere a enim eget imperdiet. Nulla consequat dui quis purus molestie fermentum. Donec faucibus sapien eu nisl placerat auctor. Pellentesque quis justo lobortis, tempor sapien vitae, dictum orci.</p>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane" id="tab20">--}}
{{--                                    <p>Donec tristique eu sem et aliquam. Proin sodales elementum urna et euismod. Quisque nisl nisl, venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed, elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis. Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed aliquet neque posuere.</p>--}}
{{--                                    <p>Nam a nisi et nisi tristique lacinia non sit amet orci. Duis blandit leo odio, eu varius nulla fringilla adipiscing. Praesent posuere blandit diam, sit amet suscipit justo consequat sed. Duis cursus volutpat ante at convallis. Integer posuere a enim eget imperdiet. Nulla consequat dui quis purus molestie fermentum. Donec faucibus sapien eu nisl placerat auctor. Pellentesque quis justo lobortis, tempor sapien vitae, dictum orci.</p>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane" id="tab21">--}}
{{--                                    <p>Vestibulum cursus augue sed leo tempor, at aliquam orci dictum. Sed mattis metus id velit aliquet, et interdum nulla porta. Etiam euismod pellentesque purus, in fermentum eros venenatis ut. Praesent vitae nibh ac augue gravida lacinia non a ipsum. Aenean vestibulum eu turpis eu posuere. Sed eget lacus lacinia, mollis urna et, interdum dui. Donec sed diam ut metus imperdiet malesuada. Maecenas tincidunt ultricies ipsum, lobortis pretium dolor sodales ut. Donec nec fringilla nulla. In mattis sapien lorem, nec tincidunt elit scelerisque tempus.</p>--}}
{{--                                    <p>Nam a nisi et nisi tristique lacinia non sit amet orci. Duis blandit leo odio, eu varius nulla fringilla adipiscing. Praesent posuere blandit diam, sit amet suscipit justo consequat sed. Duis cursus volutpat ante at convallis. Integer posuere a enim eget imperdiet. Nulla consequat dui quis purus molestie fermentum. Donec faucibus sapien eu nisl placerat auctor. Pellentesque quis justo lobortis, tempor sapien vitae, dictum orci.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END VERTICAL TABS WITH HEADING -->--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <!-- START VERTICAL TABS -->--}}
{{--                    <div class="panel panel-default tabs nav-tabs-vertical">--}}
{{--                        <ul class="nav nav-tabs">--}}
{{--                            <li class="active"><a href="#tab22" data-toggle="tab">First</a></li>--}}
{{--                            <li><a href="#tab23" data-toggle="tab">Second</a></li>--}}
{{--                            <li><a href="#tab24" data-toggle="tab">Third</a></li>--}}
{{--                        </ul>--}}
{{--                        <div class="panel-body tab-content">--}}
{{--                            <div class="tab-pane active" id="tab22">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum dolor sem, quis pharetra dui ultricies vel. Cras non pulvinar tellus, vel bibendum magna. Morbi tellus nulla, cursus non nisi sed, porttitor dignissim erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis commodo lectus. Vivamus vel tincidunt enim, non vulputate ipsum. Ut pellentesque consectetur arcu sit amet scelerisque. Fusce commodo leo eros, ut eleifend massa congue at.</p>--}}
{{--                                <p>Nam a nisi et nisi tristique lacinia non sit amet orci. Duis blandit leo odio, eu varius nulla fringilla adipiscing. Praesent posuere blandit diam, sit amet suscipit justo consequat sed. Duis cursus volutpat ante at convallis. Integer posuere a enim eget imperdiet. Nulla consequat dui quis purus molestie fermentum. Donec faucibus sapien eu nisl placerat auctor. Pellentesque quis justo lobortis, tempor sapien vitae, dictum orci.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab23">--}}
{{--                                <p>Donec tristique eu sem et aliquam. Proin sodales elementum urna et euismod. Quisque nisl nisl, venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed, elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis. Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed aliquet neque posuere.</p>--}}
{{--                                <p>Nam a nisi et nisi tristique lacinia non sit amet orci. Duis blandit leo odio, eu varius nulla fringilla adipiscing. Praesent posuere blandit diam, sit amet suscipit justo consequat sed. Duis cursus volutpat ante at convallis. Integer posuere a enim eget imperdiet. Nulla consequat dui quis purus molestie fermentum. Donec faucibus sapien eu nisl placerat auctor. Pellentesque quis justo lobortis, tempor sapien vitae, dictum orci.</p>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab24">--}}
{{--                                <p>Vestibulum cursus augue sed leo tempor, at aliquam orci dictum. Sed mattis metus id velit aliquet, et interdum nulla porta. Etiam euismod pellentesque purus, in fermentum eros venenatis ut. Praesent vitae nibh ac augue gravida lacinia non a ipsum. Aenean vestibulum eu turpis eu posuere. Sed eget lacus lacinia, mollis urna et, interdum dui. Donec sed diam ut metus imperdiet malesuada. Maecenas tincidunt ultricies ipsum, lobortis pretium dolor sodales ut. Donec nec fringilla nulla. In mattis sapien lorem, nec tincidunt elit scelerisque tempus.</p>--}}
{{--                                <p>Nam a nisi et nisi tristique lacinia non sit amet orci. Duis blandit leo odio, eu varius nulla fringilla adipiscing. Praesent posuere blandit diam, sit amet suscipit justo consequat sed. Duis cursus volutpat ante at convallis. Integer posuere a enim eget imperdiet. Nulla consequat dui quis purus molestie fermentum. Donec faucibus sapien eu nisl placerat auctor. Pellentesque quis justo lobortis, tempor sapien vitae, dictum orci.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- END VERTICAL TABS -->--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--        <!-- END PAGE CONTENT WRAPPER -->--}}
{{--    </div>--}}
{{--    <!-- END PAGE CONTENT -->--}}
{{--</div>--}}
{{--<!-- END PAGE CONTAINER -->--}}

{{--<!-- MODALS -->--}}
{{--<div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
{{--                <h4 class="modal-title" id="defModalHead">Basic Modal</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                Some content in modal example--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal" id="modal_no_head" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body">--}}
{{--                <h3>Modal without head</h3>--}}
{{--                <p>Lorem ipsum dolor sit amet</p>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal" id="modal_no_footer" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
{{--                <h4 class="modal-title" id="defModalHead">Modal Without Footer</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <p>Some content in modal example</p>--}}
{{--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
{{--                <h4 class="modal-title" id="largeModalHead">Large Modal</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                Some content in modal example--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-sm">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
{{--                <h4 class="modal-title" id="smallModalHead">Small Modal</h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                Some content in modal example--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- EOF MODALS -->--}}

{{--<!-- MESSAGE BOX-->--}}
{{--<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">--}}
{{--    <div class="mb-container">--}}
{{--        <div class="mb-middle">--}}
{{--            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>--}}
{{--            <div class="mb-content">--}}
{{--                <p>Are you sure you want to log out?</p>--}}
{{--                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>--}}
{{--            </div>--}}
{{--            <div class="mb-footer">--}}
{{--                <div class="pull-right">--}}
{{--                    <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>--}}
{{--                    <button class="btn btn-default btn-lg mb-control-close">No</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- END MESSAGE BOX-->--}}

{{--<!-- START PRELOADS -->--}}
{{--<audio id="audio-alert" src="{{asset('joli/audio/alert.mp3')}}" preload="auto"></audio>--}}
{{--<audio id="audio-fail" src="{{asset('joli/audio/fail.mp3')}}" preload="auto"></audio>--}}
{{--<!-- END PRELOADS -->--}}

{{--<!-- START SCRIPTS -->--}}
{{--<!-- START PLUGINS -->--}}
{{--<script type="text/javascript" src="{{asset('joli/js/plugins/jquery/jquery.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('joli/js/plugins/jquery/jquery-ui.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap.min.js')}}"></script>--}}
{{--<!-- END PLUGINS -->--}}

{{--<!-- THIS PAGE PLUGINS -->--}}
{{--<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>--}}
{{--<script type="text/javascript"--}}
{{--        src="{{asset('joli/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>--}}
{{--<!-- END PAGE PLUGINS -->--}}

{{--<!-- START TEMPLATE -->--}}
{{--<script type="text/javascript" src="{{asset('joli/js/settings.js')}}"></script>--}}

{{--<script type="text/javascript" src="{{asset('joli/js/plugins.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('joli/js/actions.js')}}"></script>--}}
{{--<!-- END TEMPLATE -->--}}
{{--<!-- END SCRIPTS -->--}}

{{--</body>--}}
{{--</html>--}}







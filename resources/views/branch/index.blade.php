@extends('layouts.joli')
@section('title', 'Branch')
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[6]->display_name}}</li>
        <li class="active">{{$menu[8]->display_name}}</li>
    </ul>
@endsection
@section('pageTitle', 'Branch')
@section('content')
    <div class="row mb-5">
        @if(session('BStoreSuccess'))
            <div class="alert alert-success text-center">
                {{session('BStoreSuccess')}}
            </div>
        @elseif(session('Cannotdelete'))
            <div class="alert alert-warning text-center">
                {{session('Cannotdelete')}}
            </div>
        @elseif(session('DeleteSuccess'))
            <div class="alert alert-success text-center">
                {{session('DeleteSuccess')}}
            </div>
        @elseif(session('BUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('BUpdateSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">BRANCH CREATE</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('branch.store')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Branch Title" name="title" required
                                           class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('title'))
                                    <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                    class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Create</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ALL BRANCHES</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bs as $i => $b)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$b->title}}</td>
                                <td>
                                    @if (($b->id * 1) != 1)
                                        <a href="{{route('branch.edit', ['bid' => $b->id])}}"
                                           class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                                        <a href="{{route('branch.delete', ['bid' => $b->id])}}"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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

{{--@include('includes.bubbly.header')--}}
{{--@include('includes.bubbly.sidebar')--}}
{{--<div class="container-fluid px-xl-5">--}}
{{--    <section class="py-5">--}}
{{--        @if(session('BStoreSuccess'))--}}
{{--            <div class="alert alert-success text-center">--}}
{{--                {{session('BStoreSuccess')}}--}}
{{--            </div>--}}
{{--        @elseif(session('Cannotdelete'))--}}
{{--            <div class="alert alert-warning text-center">--}}
{{--                {{session('Cannotdelete')}}--}}
{{--            </div>--}}
{{--        @elseif(session('DeleteSuccess'))--}}
{{--            <div class="alert alert-success text-center">--}}
{{--                {{session('DeleteSuccess')}}--}}
{{--            </div>--}}
{{--        @elseif(session('BUpdateSuccess'))--}}
{{--            <div class="alert alert-success text-center">--}}
{{--                {{session('BUpdateSuccess')}}--}}
{{--            </div>--}}
{{--        @elseif(session('unsuccess'))--}}
{{--            <div class="alert alert-danger text-center">--}}
{{--                {{session('unsuccess')}}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="h6 text-uppercase mb-0">Branch Create</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{route('branch.store')}}" class="form-horizontal" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Title</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    @if($errors->has('title'))--}}
{{--                                        <span class="help-block text-danger">{{$errors->first('title')}}</span>--}}
{{--                                    @endif--}}
{{--                                    <input type="text" placeholder="Branch Title" name="title"--}}
{{--                                           class="form-control form-control-success {{$errors->has('title') ? 'is-invalid' : ''}}"--}}
{{--                                           required>--}}
{{--                                    <small class="form-text text-muted ml-3">Duplicate entry is not allowed*.--}}
{{--                                    </small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-9 ml-auto">--}}
{{--                                    <button type="submit" class="btn btn-primary">Create</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h6 class="text-uppercase mb-0">Branches</h6>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table table-striped table-sm card-text">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Title</th>--}}
{{--                                <th class="text-right">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($bs as $i => $b)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{$i + 1}}</th>--}}
{{--                                    <td>{{$b->title}}</td>--}}
{{--                                    <td class="text-right">--}}
{{--                                        @if (($b->id * 1) != 1)--}}
{{--                                            <a href="{{route('branch.edit', ['bid' => $b->id])}}"--}}
{{--                                               class="btn btn-sm btn-success">Edit</a>--}}
{{--                                            <a href="{{route('branch.delete', ['bid' => $b->id])}}"--}}
{{--                                               class="btn btn-sm btn-danger"--}}
{{--                                               onclick="return confirm('Are you sure ?')">Delete</a>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}
{{--@include('includes.bubbly.footer')--}}
{{--</body>--}}
{{--</html>--}}
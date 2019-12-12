@extends('layouts.joli')
@section('title', 'Loan Type')
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[33]->display_name}}</li>
        <li class="active">{{$menu[38]->display_name}}</li>
    </ul>
@endsection
@section('pageTitle', 'Loan Type')
@section('content')
    <div class="row mb-5">
{{--        @if(session('LoanTypeCreateSuccess'))--}}
{{--            <div class="alert alert-success text-center">--}}
{{--                {{session('LoanTypeCreateSuccess')}}--}}
{{--            </div>--}}
{{--        @elseif(session('LoanTypeUpdateSuccess'))--}}
{{--            <div class="alert alert-success text-center">--}}
{{--                {{session('LoanTypeUpdateSuccess')}}--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Task Detail</h3>
                </div>
                {{--     Form Start              --}}
                <form action="" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$task->title}}" name="title" required
                                           class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                </div>
                                <small class="help-block">Duplicate entry is not allowed*</small>
                                @if($errors->has('title'))
                                    <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                    class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Loan Types</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Loan Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loantypes as $i => $lt)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$lt->type}}</td>
                                <td>
                                    @if ($lt->id != 1)
                                        <a href="{{route('loan.type.edit', ['ltid' => $lt->id])}}"
                                           class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('loanType.delete', ['ltid' => $lt->id]) }}"
                                           class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')"><i
                                                    class="fa fa-trash-o"></i></a>
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
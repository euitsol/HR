@extends('layouts.joli')
@section('title', 'Circular edit')
@section('link')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
@endsection
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li><a href="{{route('circular')}}">{{$menu[16]->display_name}}</a></li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'Circular edit')
@section('content')
    <section class="mb-5">
        <div class="row">
            @if(session('NoticeUpdateSuccess'))
                <div class="alert alert-success text-center">
                    {{session('NoticeUpdateSuccess')}}
                </div>
            @elseif(session('NoticeUnpublishSuccess'))
                <div class="alert alert-success text-center">
                    {{session('NoticeUnpublishSuccess')}}
                </div>
            @elseif(session('NoticePublishSuccess'))
                <div class="alert alert-success text-center">
                    {{session('NoticePublishSuccess')}}
                </div>
            @endif
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Circulars</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Job</th>
                                <th class="text-center">Branch</th>
                                {{--<th>Details</th>--}}
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notices as $i => $n)
                                <tr>
                                    <th class="text-center">{{$i + 1}}</th>
                                    <td class="text-center">{{$n->jobTitle}}</td>
                                    <td class="text-center">{{$n->branchTitle}}</td>
                                    <td class="text-center">
                                        <a href="{{route('notice.applicant.view', ['nid' => $n->id])}}"
                                           class="btn btn-sm btn-warning mb-1">Applicant</a>
                                        @if(($n->publish * 1) == 1)
                                            <a href="{{route('circular.unpublish', ['nid' => $n->id])}}"
                                               class="btn btn-sm btn-info mb-1">Unpublish</a>
                                        @else
                                            <a href="{{route('circular.publish', ['nid' => $n->id])}}"
                                               class="btn btn-sm btn-info mb-1">Publish</a>
                                        @endif
                                        <a href="{{route('notice.view', ['nid' => $n->id])}}"
                                           class="btn btn-sm btn-primary mb-1">View</a>
                                        @if(($n->id * 1) != ($nedit->id * 1))
                                            <a href="{{route('notice.edit', ['nid' => $n->id])}}"
                                               class="btn btn-sm btn-success mb-1"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" onclick="noticeDelete({{ $n->id }})"
                                               class="btn btn-sm btn-danger mb-1"><i class="fa fa-trash-o"></i></a>
                                        @else
                                            <a href="{{route('notice.edit', ['nid' => $n->id])}}"
                                               class="btn btn-sm btn-success mb-1 disabled"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger mb-1 disabled"><i
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
    </section>
    <section class="mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Circular</h3>
                    </div>
                    {{--     Form Start              --}}
                    <form action="{{route('notice.update', ['nid' => $nedit->id])}}" class="form-horizontal" method="post">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Select Designation</label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="job" required>
                                        <option selected hidden value="{{$nedit->job_id}}">{{$t}}</option>
                                        @foreach($jobs as $j)
                                            <option value="{{$j->id}}" {{(old('job')== $j->id)?'selected':'' }}>{{$j->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('job'))
                                        <span class="help-block text-danger">{{$errors->first('job')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Select Branch</label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="branch" required>
                                        <option selected hidden
                                                value="{{$nedit->branch_id}}">{{$nedit->branchTitle}}</option>
                                        @foreach($branches as $b)
                                            <option value="{{$b->id}}" {{(old('branch')== $b->id)?'selected':'' }}>{{$b->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('branch'))
                                        <span class="help-block text-danger">{{$errors->first('branch')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Employee Type</label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="employeeType" required>
                                        <option selected hidden
                                                value="{{$nedit->employeeType_id}}">{{$nedit->ett}}</option>
                                        @foreach($es as $e)
                                            <option value="{{$e->id}}" {{(old('employeeType')== $e->id)?'selected':'' }}>{{$e->type}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('employeeType'))
                                        <span class="help-block text-danger">{{$errors->first('employeeType')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Publish</label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="publish" required>
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @if($errors->has('publish'))
                                        <span class="help-block text-danger">{{$errors->first('publish')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Details</label>
                                <div class="col-md-6 col-xs-12">
                                    <textarea
                                            class="form-control {{$errors->has('details') ? 'is-invalid' : ''}}"
                                            rows="5" name="details" required>{!! $nedit->notice !!}</textarea>
                                    <script>
                                        CKEDITOR.replace('details');
                                    </script>
                                    @if($errors->has('details'))
                                        <span class="help-block text-danger">{{$errors->first('details')}}</span>
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
        </div>
    </section>

@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--        <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
    <script>
        function noticeDelete(nid) {
            if (nid != '') {
                $.ajax({
                    url: ("{{ route('total.applied.user', 'nid') }}").replace('nid', nid),
                    method: "GET",
                    success: function (res) {
                        if (res > 0) {
                            if (confirm("This notice has '" + res + "' applicants. Are you sure to force delete ?")) {
                                window.location.href = ("{{ route('notice.delete', 'nid') }}").replace('nid', nid);
                            }
                        } else {
                            if (confirm("Are you sure?")) {
                                window.location.href = ("{{ route('notice.delete', 'nid') }}").replace('nid', nid);
                            }
                        }
                    }
                });
            }
        }
    </script>
@endsection

{{--@include('includes.bubbly.header')--}}
{{--@include('includes.bubbly.sidebar')--}}
{{--<div class="container-fluid px-xl-5">--}}
{{--    <section class="py-5">--}}
{{--        @if(session('NoticeUpdateSuccess'))--}}
{{--            <div class="alert alert-success text-center">--}}
{{--                {{session('NoticeUpdateSuccess')}}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="row">--}}

{{--            <!-- Basic Form-->--}}
{{--            <div class="col-lg-6 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="h6 text-uppercase mb-0">Notice Edit</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{route('notice.update', ['nid' => $nedit->id])}}" class="form-horizontal"--}}
{{--                              method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Select Job</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <select class="form-control" name="job" required>--}}
{{--                                        @if($errors->has('job'))--}}
{{--                                            <span class="help-block text-danger">{{$errors->first('job')}}</span>--}}
{{--                                        @endif--}}
{{--                                        <option selected hidden value="{{$nedit->job_id}}">{{$t}}</option>--}}
{{--                                        @foreach($jobs as $j)--}}
{{--                                            <option value="{{$j->id}}">{{$j->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Select Branch</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <select class="form-control" name="branch" required>--}}
{{--                                        @if($errors->has('branch'))--}}
{{--                                            <span class="help-block text-danger">{{$errors->first('branch')}}</span>--}}
{{--                                        @endif--}}
{{--                                        <option selected hidden--}}
{{--                                                value="{{$nedit->branch_id}}">{{$nedit->branchTitle}}</option>--}}
{{--                                        @foreach($branches as $b)--}}
{{--                                            <option value="{{$b->id}}">{{$b->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Employee Type</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <select class="form-control" name="employeeType" required>--}}
{{--                                        @if($errors->has('employeeType'))--}}
{{--                                            <span class="help-block text-danger">{{$errors->first('employeeType')}}</span>--}}
{{--                                        @endif--}}
{{--                                        <option selected hidden--}}
{{--                                                value="{{$nedit->employeeType_id}}">{{$nedit->ett}}</option>--}}
{{--                                        @foreach($es as $e)--}}
{{--                                            <option value="{{$e->id}}">{{$e->type}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Publish</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <select class="form-control" name="publish" required>--}}
{{--                                        @if($errors->has('publish'))--}}
{{--                                            <span class="help-block text-danger">{{$errors->first('publish')}}</span>--}}
{{--                                        @endif--}}
{{--                                        <option value="1" selected>Yes</option>--}}
{{--                                        <option value="0">No</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Details</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <textarea--}}
{{--                                            class="form-control form-control-success {{$errors->has('details') ? 'has-error' : ''}}"--}}
{{--                                            name="details" id="" cols="30" rows="26"--}}
{{--                                            required>{!! $nedit->notice !!}</textarea>--}}
{{--                                    <script>--}}
{{--                                        CKEDITOR.replace('details');--}}
{{--                                    </script>--}}
{{--                                    @if($errors->has('details'))--}}
{{--                                        <span class="help-block text-danger">{{$errors->first('details')}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-9 ml-auto">--}}
{{--                                    <button type="submit" class="btn btn-primary">Update</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h6 class="text-uppercase mb-0">All Notices</h6>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table table-striped table-sm card-text">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Job</th>--}}
{{--                                <th>Branch</th>--}}
{{--                                --}}{{--<th>Details</th>--}}
{{--                                <th class="text-right">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @php  $i = 1; @endphp--}}
{{--                            @foreach($notices as $n)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{$i}}</th>--}}
{{--                                    <td>{{$n->jobTitle}}</td>--}}
{{--                                    <td>{{$n->branchTitle}}</td>--}}
{{--                                    <td class="text-right">--}}
{{--                                        @if(($n->publish * 1) == 1)--}}
{{--                                            <a href="{{route('circular.unpublish', ['nid' => $n->id])}}"--}}
{{--                                               class="btn btn-sm btn-info mb-1">Unpublish</a>--}}
{{--                                        @else--}}
{{--                                            <a href="{{route('circular.publish', ['nid' => $n->id])}}"--}}
{{--                                               class="btn btn-sm btn-info mb-1">Publish</a>--}}
{{--                                        @endif--}}
{{--                                        <a href="{{route('notice.view', ['nid' => $n->id])}}"--}}
{{--                                           class="btn btn-sm btn-primary mb-1">View</a>--}}
{{--                                        @if(($n->id * 1) != ($nedit->id * 1))--}}
{{--                                            <a href="{{route('notice.edit', ['nid' => $n->id])}}"--}}
{{--                                               class="btn btn-sm btn-success mb-1">Edit</a>--}}
{{--                                        @else--}}
{{--                                            <a href="{{route('notice.edit', ['nid' => $n->id])}}"--}}
{{--                                               class="btn btn-sm btn-success  mb-1 disabled">Edit</a>--}}
{{--                                        @endif--}}
{{--                                        <a href="javascript:void(0)" onclick="noticeDelete({{ $n->id }})"--}}
{{--                                           class="btn btn-sm btn-danger mb-1">X</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @php  $i++; @endphp--}}
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
{{--<script>--}}
{{--    function noticeDelete(nid) {--}}
{{--        if (nid != '') {--}}
{{--            $.ajax({--}}
{{--                url: ("{{ route('total.applied.user', 'nid') }}").replace('nid', nid),--}}
{{--                method: "GET",--}}
{{--                success: function (res) {--}}
{{--                    if (res > 0) {--}}
{{--                        if (confirm("This notice has '" + res + "' applicants. Are you sure to force delete ?")) {--}}
{{--                            window.location.href = ("{{ route('notice.delete', 'nid') }}").replace('nid', nid);--}}
{{--                        }--}}
{{--                    } else {--}}
{{--                        if (confirm("Are you sure?")) {--}}
{{--                            window.location.href = ("{{ route('notice.delete', 'nid') }}").replace('nid', nid);--}}
{{--                        }--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
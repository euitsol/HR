@extends('layouts.joli')
@section('title', 'Global Communication')
@section('style')
    <style>
        .comment-img {
            max-height: 100px;
            max-width: 500px;
            margin-left: 55px;
        }

        .messages.messages-img .item .image img {
            margin-top: 3px;
        }

        .reply-item {
            margin-bottom: 1px !important;
        }

        .reply-item-first {
            margin-top: 12px;
        }
    </style>
@endsection
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[39]->display_name}}</li>
        <li class="active">{{$menu[40]->display_name}}</li>
    </ul>
@endsection
@section('pageTitle', 'Global Messaging')
@section('content')
    <div class="row">
        @if(session('CommentgCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('CommentgCreateSuccess')}}
            </div>
        @elseif(session('ReplygCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('ReplygCreateSuccess')}}
            </div>
        @elseif(session('CommentgUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('CommentgUpdateSuccess')}}
            </div>
        @elseif(session('ReplygUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('ReplygUpdateSuccess')}}
            </div>
        @elseif(session('ReplygDeleteSuccess'))
            <div class="alert alert-success text-center">
                {{session('ReplygDeleteSuccess')}}
            </div>
        @elseif(session('CommentgDeleteSuccess'))
            <div class="alert alert-success text-center">
                {{session('CommentgDeleteSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        @if($tcomments)
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Comment</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tcomments as $i => $tc)
                                <tr>
                                    <td>{{$i + 1}}</td>
                                    <td>{{ substr($tc->commentg, 0, 15) }}...</td>
                                    <td>
                                        <a href="{{route('commentg.single.view', ['cid' => $tc->id])}}"
                                           style="text-decoration: none;">Read more</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row mb-5">
        <div class="col-md-10 offset-md-1">
            <div class="content-frame-body content-frame-body-left">
                <div class="panel panel-default push-up-10">
                    <div class="panel-body panel-body-search">
                        <form action="{{route('commentg.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <input type="file" name="file" id="file" style="display: none;">
                                    <button type="button" class="btn btn-default" id="file-btn"><span
                                                class="fa fa-camera"></span></button>
                                    @if(count($users) > 0)
                                        <button type="button" class="btn btn-default" id="tag-btn">
                                            <i class="glyphicon glyphicon-tags"></i>
                                        </button>
                                    @endif
                                </div>
                                @if(count($users) > 0)
                                    <div id="tag-span" style="display: none;">
                                        @foreach($users as $u)
                                            @if((($u->id)*1) != Auth::id())
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="tags[]"
                                                           value="{{$u->id}}"> {{$u->name}}
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}"
                                       name="comment" placeholder="Your message..." required>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Comment</button>
                                </div>
                            </div>
                            @if($errors->has('comment'))
                                <span class="help-block text-danger"
                                      style="margin-left: 100px;">{{$errors->first('comment')}}</span>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="messages messages-img">
                    @foreach($comments as $c)
                        <div class="item {{ (($c->user_id *1) == Auth::id()) ? "in" : "" }}">
                            <div class="image">
                                <img
                                        @if($c->user_image != null)
                                        src="{{asset($c->user_image)}}"
                                        @else
                                        src="{{asset('joli/avatar.png')}}"
                                        @endif
                                        alt="John Doe">
                            </div>
                            <div class="text">
                                <div class="heading">
                                    <a href="#" style="text-decoration: none;">{{$c->user_name}}</a>
                                    <span class="date">
                                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($c->created_at))->diffForHumans()}}
                                        @if((Auth::id()) == (($c->user_id)*1))
                                            <a href="{{route('commentg.edit', ['cid' => $c->id])}}" title="Edit"><i
                                                        class="fa fa-pencil" style="color: #95b75d;"></i></a>
                                            <a href="{{route('commentg.delete', ['cid' => $c->id])}}" title="Delete"
                                               onclick="return confirm('Are you sure you want to delete the comment ?')"><i
                                                        class="fa fa-trash-o" style="color: #E04B4A;"></i></a>
                                        @endif
                                    </span>
                                    @if(count($tags) > 0)
                                        <br>
                                        @foreach($tags as $t)
                                            @if((($t->comment_id)*1) == (($c->id)*1))
                                                @foreach($users as $u)
                                                    @if((($u->id)*1) == (($t->user_id)))
                                                        <a href="#" style="text-decoration: none;"><span
                                                                    class="text-secondary m-1">{{$u->name}}</span></a>
                                                        &nbsp;@break
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                {{$c->commentg}}
                                @if($c->file != null)
                                    <br>
                                    @if ((pathinfo($c->file, PATHINFO_EXTENSION) == 'jpeg') || (pathinfo($c->file, PATHINFO_EXTENSION) == 'jpg') || (pathinfo($c->file, PATHINFO_EXTENSION) == 'png') ||(pathinfo($c->file, PATHINFO_EXTENSION) == 'gif'))
                                        <a href="{{route('download.commentg.file', ['cid' => $c->id])}}"
                                           onclick="return confirm('Are you sure you want to download the image ?')">
                                            <img src="{{asset($c->file)}}" alt="img" class="comment-img">
                                        </a>
                                    @else
                                        <a href="{{route('download.commentg.file', ['cid' => $c->id])}}">
                                            <i class="glyphicon glyphicon-cloud-download"></i>
                                        </a>
                                    @endif
                                @endif
                                <a href="{{route('replyg.create', ['cid' => $c->id])}}" class="float-right">
                                    <i class="fa fa-mail-reply"></i>
                                </a>
                                {{--     Reply        --}}
                                @foreach($replies as $r)
                                    @if((($r->commentg_id)*1) == (($c->id)*1) )
                                        <div class="item reply-item reply-item-first">
                                            <div class="image">
                                                <img
                                                        @if($r->user_image != null)
                                                        src="{{asset($r->user_image)}}"
                                                        @else
                                                        src="{{asset('joli/avatar.png')}}"
                                                        @endif
                                                        alt="Image">
                                            </div>
                                            <div class="text">
                                                <div class="heading">
                                                    <a href="#" style="text-decoration: none;">{{$r->user_name}}</a>
                                                    <span class="date">
                                                    {{\Carbon\Carbon::createFromTimeStamp(strtotime($r->created_at))->diffForHumans()}}
                                                        @if((Auth::id()) == (($r->user_id)*1))
                                                            <a href="{{route('replyg.edit', ['rid' => $r->id])}}"><i
                                                                        class="fa fa-pencil"
                                                                        style="color: #95b75d;"></i></a>
                                                            <a href="{{route('replyg.delete', ['rid' => $r->id])}}"
                                                               onclick="return confirm('Are you sure you want to delete the Reply ?')"><i
                                                                        class="fa fa-trash-o"
                                                                        style="color: #E04B4A;"></i></a>
                                                        @endif
                                                 </span>
                                                </div>
                                                {{$r->replyg}}
                                                @if($r->file != null)
                                                    <br>
                                                    @if ((pathinfo($r->file, PATHINFO_EXTENSION) == 'jpeg') || (pathinfo($r->file, PATHINFO_EXTENSION) == 'jpg') || (pathinfo($r->file, PATHINFO_EXTENSION) == 'png') ||(pathinfo($r->file, PATHINFO_EXTENSION) == 'gif'))
                                                        <a href="{{route('download.replyg.file', ['rid' => $r->id])}}"
                                                           onclick="return confirm('Are you sure you want to download the image ?')">
                                                            <img src="{{asset($r->file)}}" alt="Image"
                                                                 class="comment-img">
                                                        </a>
                                                    @else
                                                        <a href="{{route('download.replyg.file', ['rid' => $r->id])}}">
                                                            <i class="glyphicon glyphicon-cloud-download"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{--     Reply  End      --}}
                            </div>
                        </div>
                    @endforeach

                    {{ $comments->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    <script>
        $(function () {
            $("#file-btn").on('click', e => {
                $("#file").click();
            });
            $("#tag-btn").on('click', e => {
                $("#tag-span").slideToggle();
            });
        });
    </script>
    <!-- END THIS PAGE PLUGINS-->
@endsection












{{--@include('includes.bubbly.header')--}}
{{--@include('includes.bubbly.sidebar')--}}
{{--<div class="container-fluid px-xl-5">--}}
{{--    <section class="py-5">--}}
{{--        --}}{{--        @if(session('CommentgCreateSuccess'))--}}
{{--        --}}{{--            <div class="alert alert-success text-center">--}}
{{--        --}}{{--                {{session('CommentgCreateSuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @elseif(session('ReplygCreateSuccess'))--}}
{{--        --}}{{--            <div class="alert alert-success text-center">--}}
{{--        --}}{{--                {{session('ReplygCreateSuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @elseif(session('CommentgUpdateSuccess'))--}}
{{--        --}}{{--            <div class="alert alert-success text-center">--}}
{{--        --}}{{--                {{session('CommentgUpdateSuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @elseif(session('ReplygUpdateSuccess'))--}}
{{--        --}}{{--            <div class="alert alert-success text-center">--}}
{{--        --}}{{--                {{session('ReplygUpdateSuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @elseif(session('ReplygDeleteSuccess'))--}}
{{--        --}}{{--            <div class="alert alert-success text-center">--}}
{{--        --}}{{--                {{session('ReplygDeleteSuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @elseif(session('CommentgDeleteSuccess'))--}}
{{--        --}}{{--            <div class="alert alert-success text-center">--}}
{{--        --}}{{--                {{session('CommentgDeleteSuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @elseif(session('unsuccess'))--}}
{{--        --}}{{--            <div class="alert alert-danger text-center">--}}
{{--        --}}{{--                {{session('unsuccess')}}--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        @endif--}}
{{--        --}}{{--        @if($tcomments)--}}
{{--        --}}{{--            <div class="row">--}}
{{--        --}}{{--                <div class="col">--}}
{{--        --}}{{--                    <div class="card">--}}
{{--        --}}{{--                        <div class="card-body">--}}
{{--        --}}{{--                            <table class="table table-sm table-striped">--}}
{{--        --}}{{--                                <thead>--}}
{{--        --}}{{--                                <tr>--}}
{{--        --}}{{--                                    <th scope="col">#SL</th>--}}
{{--        --}}{{--                                    <th scope="col">Comment</th>--}}
{{--        --}}{{--                                    <th scope="col"></th>--}}
{{--        --}}{{--                                </tr>--}}
{{--        --}}{{--                                </thead>--}}
{{--        --}}{{--                                <tbody>--}}
{{--        --}}{{--                                @foreach($tcomments as $i => $tc)--}}
{{--        --}}{{--                                    <tr>--}}
{{--        --}}{{--                                        <td>{{$i + 1}}</td>--}}
{{--        --}}{{--                                        <td>{{ substr($tc->commentg, 0, 15) }}...</td>--}}
{{--        --}}{{--                                        <td>--}}
{{--        --}}{{--                                            <a href="{{route('commentg.single.view', ['cid' => $tc->id])}}"--}}
{{--        --}}{{--                                               style="text-decoration: none;">Read more</a>--}}
{{--        --}}{{--                                        </td>--}}
{{--        --}}{{--                                    </tr>--}}
{{--        --}}{{--                                @endforeach--}}
{{--        --}}{{--                                </tbody>--}}
{{--        --}}{{--                            </table>--}}
{{--        --}}{{--                        </div>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--            <hr>--}}
{{--        --}}{{--        @endif--}}
{{--        --}}{{--        <div class="row">--}}
{{--        --}}{{--            <div class="col">--}}
{{--        --}}{{--                --}}{{----}}{{--ADD New Comment--}}
{{--        --}}{{--                <div class="card">--}}
{{--        --}}{{--                    <div class="card-header">--}}
{{--        --}}{{--                        <h3 class="h6 text-uppercase mb-0">Add Comment</h3>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                    <div class="card-body">--}}
{{--        --}}{{--                        <form action="{{route('commentg.store')}}" class="form-horizontal"--}}
{{--        --}}{{--                              method="post" enctype="multipart/form-data">--}}
{{--        --}}{{--                            @csrf--}}
{{--        --}}{{--                            <div class="form-group row">--}}
{{--        --}}{{--                                <label class="col-md-2 form-control-label">Comment</label>--}}
{{--        --}}{{--                                <div class="col-md-10">--}}
{{--        --}}{{--                                    <textarea--}}
{{--        --}}{{--                                            class="form-control {{$errors->has('comment') ? 'has-error' : ''}}"--}}
{{--        --}}{{--                                            name="comment" cols="30" rows="2"--}}
{{--        --}}{{--                                            required></textarea>--}}
{{--        --}}{{--                                    @if($errors->has('comment'))--}}
{{--        --}}{{--                                        <span class="help-block text-danger">{{$errors->first('comment')}}</span>--}}
{{--        --}}{{--                                    @endif--}}
{{--        --}}{{--                                </div>--}}
{{--        --}}{{--                            </div>--}}
{{--        --}}{{--                            --}}{{----}}{{--                            @if(count($users) > 0)--}}
{{--        --}}{{--                            --}}{{----}}{{--                                <div class="form-group row">--}}
{{--        --}}{{--                            --}}{{----}}{{--                                    <label class="col-md-2 form-control-label">Tag User</label>--}}
{{--        --}}{{--                            --}}{{----}}{{--                                    <div class="col-md-10">--}}
{{--        --}}{{--                            --}}{{----}}{{--                                        @foreach($users as $u)--}}
{{--        --}}{{--                            --}}{{----}}{{--                                            @if((($u->id)*1) != Auth::id())--}}
{{--        --}}{{--                            --}}{{----}}{{--                                                <label class="checkbox-inline">--}}
{{--        --}}{{--                            --}}{{----}}{{--                                                    <input type="checkbox" name="tags[]"--}}
{{--        --}}{{--                            --}}{{----}}{{--                                                           value="{{$u->id}}"> {{$u->name}}--}}
{{--        --}}{{--                            --}}{{----}}{{--                                                </label>--}}
{{--        --}}{{--                            --}}{{----}}{{--                                            @endif--}}
{{--        --}}{{--                            --}}{{----}}{{--                                        @endforeach--}}
{{--        --}}{{--                            --}}{{----}}{{--                                    </div>--}}
{{--        --}}{{--                            --}}{{----}}{{--                                </div>--}}
{{--        --}}{{--                            --}}{{----}}{{--                            @endif--}}
{{--        --}}{{--                            <div class="form-group row">--}}
{{--        --}}{{--                                <label class="col-md-2 form-control-label">Upload</label>--}}
{{--        --}}{{--                                <div class="col-md-10">--}}
{{--        --}}{{--                                    <input type="file" class="form-control-file" name="file">--}}
{{--        --}}{{--                                </div>--}}
{{--        --}}{{--                            </div>--}}
{{--        --}}{{--                            <div class="form-group row">--}}
{{--        --}}{{--                                <div class="col-md-9 ml-auto">--}}
{{--        --}}{{--                                    <button type="submit" class="btn btn-primary">Post Comment</button>--}}
{{--        --}}{{--                                </div>--}}
{{--        --}}{{--                            </div>--}}
{{--        --}}{{--                        </form>--}}
{{--        --}}{{--                    </div>--}}
{{--        --}}{{--                </div>--}}
{{--        --}}{{--            </div>--}}
{{--        --}}{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="py-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col mb-5">--}}
{{--                @foreach($comments as $c)--}}
{{--                    --}}{{--Comment Section Start--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                --}}{{--                                <div class="col-md-1 text-center">--}}
{{--                                --}}{{--                                    <img--}}
{{--                                --}}{{--                                            @if($c->user_image != null)--}}
{{--                                --}}{{--                                            src="{{asset($c->user_image)}}"--}}
{{--                                --}}{{--                                            @else--}}
{{--                                --}}{{--                                            src="{{asset('bubbly/img/avatar.png')}}"--}}
{{--                                --}}{{--                                            @endif--}}
{{--                                --}}{{--                                            class="img rounded-circle img-fluid" style="max-height: 70px;"/>--}}
{{--                                --}}{{--                                    <br>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                <div class="col-md-11">--}}
{{--                                    <div>--}}
{{--                                        --}}{{--Link to user profile--}}
{{--                                        --}}{{--///////////////////////////////////////////////////////////////////////////////--}}
{{--                                        <a class="float-left" href="#"><strong>--}}
{{--                                                --}}{{--                                                {{$c->user_name}}--}}
{{--                                            </strong></a>&nbsp;--}}
{{--                                        --}}{{--                            <p class="text-secondary">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c->created_at)->format('jS F, Y')}}</p>--}}
{{--                                        --}}{{--                                        <span class="text-secondary">{{\Carbon\Carbon::createFromTimeStamp(strtotime($c->created_at))->diffForHumans()}}</span>--}}
{{--                                        --}}{{--                                        <br>--}}
{{--                                        --}}{{--                                        @if(count($tags) > 0)--}}
{{--                                        --}}{{--                                            @foreach($tags as $t)--}}
{{--                                        --}}{{--                                                @if((($t->comment_id)*1) == (($c->id)*1))--}}
{{--                                        --}}{{--                                                    @foreach($users as $u)--}}
{{--                                        --}}{{--                                                        @if((($u->id)*1) == (($t->user_id)))--}}
{{--                                        --}}{{--                                                            --}}{{----}}{{--will link to user profile ///////////////////////////////////////////////--}}
{{--                                        --}}{{--                                                            <a href="#" style="text-decoration: none;">{{$u->name}}</a>--}}
{{--                                        --}}{{--                                                            &nbsp;--}}
{{--                                        --}}{{--                                                        @endif--}}
{{--                                        --}}{{--                                                    @endforeach--}}
{{--                                        --}}{{--                                                @endif--}}
{{--                                        --}}{{--                                            @endforeach--}}
{{--                                        --}}{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    --}}{{--                                    <p>{{$c->commentg}}</p>--}}
{{--                                    --}}{{--                                    @if($c->file != null)--}}
{{--                                    --}}{{--                                        @if ((pathinfo($c->file, PATHINFO_EXTENSION) == 'jpeg') || (pathinfo($c->file, PATHINFO_EXTENSION) == 'jpg') || (pathinfo($c->file, PATHINFO_EXTENSION) == 'png') ||(pathinfo($c->file, PATHINFO_EXTENSION) == 'gif'))--}}
{{--                                    --}}{{--                                            <a href="{{route('download.commentg.file', ['cid' => $c->id])}}"--}}
{{--                                    --}}{{--                                               onclick="return confirm('Are you sure you want to download the image ?')">--}}
{{--                                    --}}{{--                                                <img src="{{asset($c->file)}}" alt="Image" style="max-height: 200px;">--}}
{{--                                    --}}{{--                                            </a>--}}
{{--                                    --}}{{--                                        @else--}}
{{--                                    --}}{{--                                            <a href="{{route('download.commentg.file', ['cid' => $c->id])}}"><i--}}
{{--                                    --}}{{--                                                        class="fas fa-file-download"--}}
{{--                                    --}}{{--                                                        style="font-size: 50px; color: #2ecc71;"></i></a>--}}
{{--                                    --}}{{--                                        @endif--}}
{{--                                    --}}{{--                                    @endif--}}
{{--                                    <p class="mt-2">--}}
{{--                                        --}}{{--                                        @if((Auth::id()) == (($c->user_id)*1))--}}
{{--                                        --}}{{--                                            <a href="{{route('commentg.edit', ['cid' => $c->id])}}"--}}
{{--                                        --}}{{--                                               class="btn btn-sm btn-dark">Edit</a>--}}
{{--                                        --}}{{--                                            <a href="{{route('commentg.delete', ['cid' => $c->id])}}"--}}
{{--                                        --}}{{--                                               class="btn btn-sm btn-danger" title="Delete Comment"--}}
{{--                                        --}}{{--                                               onclick="return confirm('Are you sure you want to delete this Comment ?')">--}}
{{--                                        --}}{{--                                                <i class="far fa-trash-alt"></i>--}}
{{--                                        --}}{{--                                            </a>--}}
{{--                                        --}}{{--                                        @endif--}}
{{--                                        --}}{{--                                        <a href="{{route('replyg.create', ['cid' => $c->id])}}"--}}
{{--                                        --}}{{--                                           class="float-right btn btn-outline-primary ml-2">--}}
{{--                                        --}}{{--                                            <i class="fa fa-reply"></i> Reply--}}
{{--                                        --}}{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            --}}{{--Reply Section--}}
{{--                            @foreach($replies as $r)--}}
{{--                                @if((($r->commentg_id)*1) == (($c->id)*1) )--}}
{{--                                    <div class="card card-inner ml-5">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-1">--}}
{{--                                                    <img--}}
{{--                                                            --}}{{--                                                            @if($r->user_image != null)--}}
{{--                                                            --}}{{--                                                            src="{{asset($r->user_image)}}"--}}
{{--                                                            --}}{{--                                                            @else--}}
{{--                                                            --}}{{--                                                            src="{{asset('bubbly/img/avatar.png')}}"--}}
{{--                                                            --}}{{--                                                            @endif--}}
{{--                                                            class="img rounded-circle img-fluid"--}}
{{--                                                            style="max-height: 50px;float: right;"/>--}}
{{--                                                    <br>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-11">--}}
{{--                                                    <p>--}}
{{--                                                        --}}{{--Link to user profile--}}
{{--                                                        --}}{{--///////////////////////////////////////////////////////////////////////////////--}}
{{--                                                        <a class="float-left" href="#"><strong>--}}
{{--                                                                --}}{{--                                                                {{$r->user_name}}--}}
{{--                                                            </strong></a><br>--}}
{{--                                                        --}}{{--<p class="text-secondary">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$c->created_at)->format('jS F, Y')}}</p>--}}
{{--                                                        --}}{{--                                                        <span class="text-secondary">{{\Carbon\Carbon::createFromTimeStamp(strtotime($r->created_at))->diffForHumans()}}</span>--}}
{{--                                                    </p>--}}
{{--                                                    <div class="clearfix"></div>--}}
{{--                                                    --}}{{--                                                    <p>{{$r->replyg}}</p>--}}
{{--                                                    --}}{{--                                                    @if($r->file != null)--}}
{{--                                                    --}}{{--                                                        @if ((pathinfo($r->file, PATHINFO_EXTENSION) == 'jpeg') || (pathinfo($r->file, PATHINFO_EXTENSION) == 'jpg') || (pathinfo($r->file, PATHINFO_EXTENSION) == 'png') ||(pathinfo($r->file, PATHINFO_EXTENSION) == 'gif'))--}}
{{--                                                    --}}{{--                                                            <a href="{{route('download.replyg.file', ['rid' => $r->id])}}"--}}
{{--                                                    --}}{{--                                                               onclick="return confirm('Are you sure you want to download the image ?')">--}}
{{--                                                    --}}{{--                                                                <img src="{{asset($r->file)}}" alt="Image"--}}
{{--                                                    --}}{{--                                                                     style="max-height: 150px;">--}}
{{--                                                    --}}{{--                                                            </a>--}}
{{--                                                    --}}{{--                                                        @else--}}
{{--                                                    --}}{{--                                                            <a href="{{route('download.replyg.file', ['rid' => $r->id])}}">--}}
{{--                                                    --}}{{--                                                                <i class="fas fa-file-download"--}}
{{--                                                    --}}{{--                                                                   style="font-size: 50px; color: #2ecc71;"></i>--}}
{{--                                                    --}}{{--                                                            </a>--}}
{{--                                                    --}}{{--                                                        @endif--}}
{{--                                                    --}}{{--                                                    @endif--}}
{{--                                                    <p class="mt-2">--}}
{{--                                                        @if((Auth::id()) == (($r->user_id)*1))--}}
{{--                                                            <a href="{{route('replyg.edit', ['rid' => $r->id])}}"--}}
{{--                                                               class="btn btn-sm btn-outline-dark">Edit</a>--}}
{{--                                                            <a href="{{route('replyg.delete', ['rid' => $r->id])}}"--}}
{{--                                                               class="btn btn-sm btn-outline-danger"--}}
{{--                                                               title="Delete Reply"--}}
{{--                                                               onclick="return confirm('Are you sure you want to delete this Reply ?')">--}}
{{--                                                                <i class="far fa-trash-alt"></i>--}}
{{--                                                            </a>--}}
{{--                                                        @endif--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            --}}{{--Reply Section End--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    --}}{{--Comment Section End--}}
{{--                @endforeach--}}

{{--                {{ $comments->links() }}--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}
{{--@include('includes.bubbly.footer')--}}
{{--</body>--}}
{{--</html>--}}
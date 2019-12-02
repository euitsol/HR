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
                        {{-- @foreach($etypes as $i => $e)--}}
                        <tr>
{{--                            <td>{{$i + 1}}</td>--}}
                            <td>1</td>
{{--                            <td>{{ substr($tc->commentg, 0, 15) }}...</td>--}}
                            <td>dsfsdgfdgfdgfdgfdgfdgfdgfd...</td>
                            <td>
{{--                                <a href="{{route('commentg.single.view', ['cid' => $tc->id])}}"--}}
{{--                                   style="text-decoration: none;">Read more</a>--}}
                                <a href="" style="text-decoration: none;">Read more</a>
                            </td>
                        </tr>
                        {{-- @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-10 offset-md-1">
            <div class="content-frame-body content-frame-body-left">
                <div class="panel panel-default push-up-10">
                    <div class="panel-body panel-body-search">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <input type="file" name="" id="file" style="display: none;">
                                    <button type="button" class="btn btn-default" id="file-btn"><span
                                                class="fa fa-camera"></span></button>
                                    {{--@if(count($users) > 0)--}}
                                    <button type="button" class="btn btn-default" id="tag-btn">
                                        <i class="glyphicon glyphicon-tags"></i>
                                    </button>
                                    {{--@endif--}}
                                </div>
                                {{--@if(count($users) > 0)--}}
                                <div id="tag-span" style="display: none;">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]"
                                               value="1"> dsfsdfsdf
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]"
                                               value="1"> dsfsdfsdf
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]"
                                               value="1"> dsfsdfsdf
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]"
                                               value="1"> dsfsdfsdf
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]"
                                               value="1"> dsfsdfsdf
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="tags[]"
                                               value="1"> dsfsdfsdf
                                    </label>
                                </div>
                                {{--@endif--}}


                                <input type="text" class="form-control" name="" placeholder="Your message..."/>


                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Comment</button>
                                </div>
                            </div>
                            <span class="help-block text-danger" style="margin-left: 100px;">sfdsfsdfsdf</span>

                        </form>
                    </div>
                </div>

                <div class="messages messages-img">
                    <div class="item in">
                        <div class="image">
                            <img src="{{asset('joli/assets/images/users/user2.jpg')}}" alt="John Doe">
                        </div>
                        <div class="text">
                            <div class="heading">
                                <a href="#">John Doe</a>
                                <br>
                                <a href=""><span class="text-secondary m-1">fdsfsdf fsdfd</span></a>
                                <a href=""><span class="text-secondary m-1">fdsfsdf</span></a>
                                <span class="date">
                                    08:33
                                    <a href=""><i class="fa fa-pencil" style="color: #95b75d;"></i></a>
                                    <a href=""
                                       onclick="return confirm('Are you sure you want to delete the comment ?')"><i
                                                class="fa fa-trash-o" style="color: #E04B4A;"></i></a>
                                </span>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae
                            iaculis.
                                                        <br>
                                                        <img src="{{asset('joli/assets/images/users/user2.jpg')}}" alt="img" class="comment-img">
                            <a href="" class="float-right"><i class="fa fa-mail-reply"></i></a>


                            {{--     Reply        --}}
                            <div></div>
                            <div class="item reply-item reply-item-first">
                                <div class="image">
                                    <img src="{{asset('joli/assets/images/users/user.jpg')}}" alt="Dmitry Ivaniuk">
                                </div>
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Dmitry Ivaniuk</a>
                                        <span class="date">
                                            08:39
                                            <a href=""><i class="fa fa-pencil" style="color: #95b75d;"></i></a>
                                    <a href=""
                                       onclick="return confirm('Are you sure you want to delete the comment ?')"><i
                                                class="fa fa-trash-o" style="color: #E04B4A;"></i></a>
                                        </span>
                                    </div>
                                    Integer et ipsum vitae urna mattis dictum. Sed eu sollicitudin nibh, in luctus
                                    velit.
                                    {{--                                    <br>--}}
                                    {{--                                    <img src="{{asset('joli/assets/images/users/user2.jpg')}}" alt="img" class="comment-img">--}}
                                </div>
                            </div>
                            <div class="item reply-item">
                                <div class="image">
                                    <img src="{{asset('joli/assets/images/users/user.jpg')}}" alt="Dmitry Ivaniuk">
                                </div>
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Dmitry Ivaniuk</a>
                                        <span class="date">
                                            08:39
                                            <a href=""><i class="fa fa-pencil" style="color: #95b75d;"></i></a>
                                    <a href=""
                                       onclick="return confirm('Are you sure you want to delete the comment ?')"><i
                                                class="fa fa-trash-o" style="color: #E04B4A;"></i></a>
                                        </span>
                                    </div>
                                    Integer et ipsum vitae urna mattis dictum. Sed eu sollicitudin nibh, in luctus
                                    velit.
                                    {{--                                    <br>--}}
                                    {{--                                    <img src="{{asset('joli/assets/images/users/user2.jpg')}}" alt="img" class="comment-img">--}}
                                </div>
                            </div>
                            {{--     Reply  End      --}}


                        </div>
                    </div>

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


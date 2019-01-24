@extends('home.index')
@push('css')
    {{--<link href="{{url('design/blog/')}}/common-css/ionicons.css" rel="stylesheet">--}}
    <link href="{{url('design/blog/')}}/single-post-2/css/styles.css" rel="stylesheet">
    <link href="{{url('design/blog/')}}/single-post-2/css/responsive.css" rel="stylesheet">
@endpush
@section('content')
    <!-- HOME -->

    <div style=" background-color: #F2F2F2;">

        <div class="slider"
             style="background-image: url({{ Storage::url($hire->file)}})">
            <div class="display-table  center-text">

                <h1 class="title display-table-cell" style="color: #29ca8e;">
                    <div class="well well-lg hiretitle" >
                        <b>{{ $hire->title  }}</b>
                    </div>
                </h1>

            </div>
        </div> <!-- slider -->

        <section class="post-area" style="padding: 0px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-0 singlehireview"></div>
                    <div class="col-lg-10 col-md-12">

                        <div class="main-post">

                            <div class="post-top-area">

                                <h5 class="pre-title">FASHION</h5>

                                <h3 class="title"><a href="#"><b>{{ $hire->title  }}</b></a></h3>

                                <div class="post-info">

                                    <div class="left-area">
                                        <a class="avatar" href="#"><img
                                                src="{{ Storage::url( $hire->user->user_image ) }}"
                                                alt="{{$hire->user->username}}"></a>
                                    </div>

                                    <div class="middle-area">
                                        <a class="name" href="#"><b>@if($hire->user->First_Name == null){{$hire->user->username}} @else {{$hire->user->First_Name . ' ' .$hire->user->Last_Name }} @endif</b></a>
                                        <h6 class="date">on {{$hire->created_at->toDayDateTimeString()}}</h6>
                                    </div>

                                </div><!-- post-info -->


                            </div><!-- post-top-area -->

                            <div class="post-image"><img
                                    src="{{ Storage::url($hire->file)}}"
                                    alt="Blog Image"></div>

                            <div class="post-bottom-area">

                                <p class="para">{!! $hire->description !!}</p>


                                {{--<ul class="tags">--}}
                                {{--<li><a href="#">Mnual</a></li>--}}
                                {{--<li><a href="#">Liberty</a></li>--}}
                                {{--<li><a href="#">Recommendation</a></li>--}}
                                {{--<li><a href="#">Inspiration</a></li>--}}
                                {{--</ul>--}}

                                <div class="post-icons-area">
                                    <ul class="post-icons">
                                        {{--<li><a href="#"><i class="ion-heart"></i>57</a></li>--}}
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{count($hire->HireComment)}}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                    </ul>

                                    <ul class="icons">
                                        <li>SHARE :</li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                @foreach($hire->HireComment as $comment)
                                            <div class="comment">
                                                <div class="post-info">
                                                    <div class="left-area">
                                                        <a class="avatar" href="#"><img
                                                                src="{{ Storage::url($comment->hire->user->user_image)}}"
                                                                alt="Profile Image"></a>
                                                    </div>
                                                    <div class="middle-area">
                                                        <a class="name" href="#"><b>{{ $comment->author }}</b></a>
                                                        <h6 class="date">{{$comment->created_at->toDayDateTimeString()}}</h6>
                                                    </div>
                                                </div><!-- post-info -->

                                            <p class="hirecomment"> {{$comment->content}}</p>
                                            </div>
                                @endforeach
                                <div id="old_comment"></div>

                                @if (Auth::check())
                                    <div class="post-footer post-info">
                                        <div class="left-area">
                                            <a class="avatar" href="#"><img
                                                    src="{{ empty(Auth::user()->user_image) ? '' : Storage::url(Auth::user()->user_image) }}"
                                                    alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area" style="display: block;">
                                            <form method="POST" id="formComent">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="hire_id" id="hire_id"
                                                       value="{{ $hire->id }}">
                                                <div class="input-group">

                                                    <input type="text" class="text-area-messge form-control"
                                                           style="background-color: #F2F2F2;" name="content"
                                                           id="contentComment">
                                                    <span class="input-group-btn">
                               <button class="btn submit-btn" type="submit" id="form-submit">
                                   <i class="fa fa-comment" aria-hidden="true"></i>
                               </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div><!-- post-bottom-area -->
                                    </div>
                                @else
                                    <center>
                                        <div class="post-footer ">
                                            <div class="middle-area" style="display: block;background-color: #F2F2F2;">
                                                <span><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a></span> |
                                                <span><a href="{{url('/E-commerce/register')}}">{{trans('admin.register')}}</a></span>
                                            </div>
                                        </div>
                                    </center>
                                @endif
                            </div><!-- main-post -->

                        </div><!-- col-lg-8 col-md-12 -->

                    </div><!-- row -->
                </div><!-- container -->
            </div>
            @if (!Auth::check())
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                <div class="modal-dialog modal-sm">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="Login">{{trans('admin.Customer_login')}}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['route'=>'shop.login','method'=>'post']) !!}
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password-modal"
                                       placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> {{trans('admin.Log_in')}}</button>
                            </p>

                            </form>

                            <p class="text-center text-muted">{{trans('admin.Not_registered_yet')}}</p>
                            <p class="text-center text-muted"><a href="{{url('E-commerce/register')}}"><strong>{{trans('admin.register_now')}}</strong></a>! {{trans('admin.It_is_easy')}}</p>

                        </div>
                    </div>
                </div>
            </div>
            @endif
        </section><!-- post-area -->
        </section><!-- post-area -->

        <section class="recomended-area section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img
                                        src="{{url('design/blog/')}}/images/alex-lambley-205711.jpg" alt="Blog Image">
                                </div>
                                <div class="blog-info">

                                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the
                                                Most Complex
                                                Concepts in Physics?</b></a></h4>

                                    <ul class="post-footer">
                                        <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img
                                        src="{{url('design/blog/')}}/images/caroline-veronez-165944.jpg"
                                        alt="Blog Image"></div>

                                <div class="blog-info">
                                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the
                                                Most Complex
                                                Concepts in Physics?</b></a></h4>

                                    <ul class="post-footer">
                                        <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                    </ul>
                                </div><!-- blog-info -->

                            </div><!-- single-post -->

                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img
                                        src="{{url('design/blog/')}}/images/marion-michele-330691.jpg" alt="Blog Image">
                                </div>
                                <div class="blog-info">
                                    <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the
                                                Most Complex
                                                Concepts in Physics?</b></a></h4>

                                    <ul class="post-footer">
                                        <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                    </ul>
                                </div><!-- blog-info -->

                            </div><!-- single-post -->

                        </div><!-- card -->
                    </div><!-- col-md-6 col-sm-12 -->

                </div><!-- row -->

            </div><!-- container -->
        </section>


    </div>
    @if (Auth::check())
        @push('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#hidshowformComent").hide();
                $("#hideshowcomments").click(function () {
                    $("#hidshowformComent").slideToggle("slow");
                });
            });
            $(document).ready(function () {

                $('#btnpostComent').click(function () {
                    var hire_id = $('#hire_id').val();
                    var contentComment = $('#contentComment').val();
                });
                $('#formComent').on('submit', function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var ts = new Date();

                    // $("#old_comment").html("posting comment ...");
                    var formdata = $(this).serialize();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('hire.comment')}}",
                        data: formdata,
                        dataType: 'json',
                        success: function (data) {
                            var div = '<div class="comment"><div class="post-footer post-info"><div class="left-area"><a class="avatar" href="#"><img src="{{ empty(Auth::user()->user_image) ? '' : Storage::url(Auth::user()->user_image) }}"alt="Profile Image"></a></div><div class="middle-area"><a class="name" href="#"><b>' + data.author + ' </b></a> <h6 class="date"> ' + ts.toUTCString() + ' </h6></div></div><!-- post-info --><p style="padding-left: 13%;">' + data.content + '</p></div>';
                            $("#old_comment").append(div);
                            $('#formComent')[0].reset();
                        },
                        error: function () {
                            alert("Error reaching the server. Check your connection");
                        }

                    });
                });
            });
        </script>
        <script src="{{url('design/blog/')}}/common-js/tether.min.js"></script>
        <script src="{{url('design/blog/')}}/common-js/scripts.js"></script>
    @endpush
    @endif
@stop

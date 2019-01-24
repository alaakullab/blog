@extends('shop.index')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="{{url('E-commerce')}}">{{trans('admin.home')}}</a>
                    </li>
                    <li>{{awtTrans('Reset Password')}}</li>
                </ul>

            </div>

                  <div class="col-md-6">
                <div class="box">
                    <h1>{{trans('admin.New_account')}}</h1>

                    <p class="lead">{{trans('admin.Nrcy')}}</p>
                    <p>{{trans('admin.pnewaccount')}}</p>
                    <p class="text-muted">{!! trans('admin.newaccount_contact') !!}</p>

                    <hr>

                    {!! Form::open(['url'=>url('/E-commerce/register'),'method'=>'post']) !!}
                    <div class="form-group {{$errors->get('username') ? 'has-error' : '' }}">
                        <label for="name">{{trans('admin.username')}}</label>
                        <input class="form-control" id="name" name="username" type="text">
                        @if($errors->get('username') )
                            <span class="help-block">
{{ $errors->first('username') }} </span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->get('email') ? 'has-error' : '' }}">
                        <label for="email">{{trans('admin.email')}}</label>
                        <input class="form-control" id="email" name="email" type="email">
                    </div>
                    <div class="form-group {{$errors->get('password') ? 'has-error' : '' }}">
                        <label for="password">{{trans('admin.password')}}</label>
                        <input class="form-control" id="password" name="password" type="password">
                        @if($errors->get('password') )
                            <span class="help-block">
                            {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> {{trans('admin.register')}}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-md-6">
                       @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="box">
                    <h1>{{awtTrans('reset password')}}</h1>

                    <p class="lead">{{awtTrans('Have you lost your password')}}</p>
                    <p class="text-muted">{{awtTrans('Put your e-mail address to receive a password-reset message')}}.</p>

                    <hr>
                    <div class="alert alert-danger {{ session()->has('error')?'':'hide' }} ">
                        <button class="close" data-close="alert"></button>
                        @if(session()->has('error'))
                            <span> {{ session('error') }} </span>
                        @else
                            <span> {{ trans('admin.enter_email_and_password') }} </span>
                        @endif
                    </div>

<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                    <div class="form-group {{$errors->get('email') ? 'has-error' : '' }}">
                        <label for="name">{{trans('admin.email')}}</label>
                        <input class="form-control" id="name" name="email" type="email" required>
                        @if($errors->get('email') )
                            <span class="help-block">
{{ $errors->first('email') }} </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> {{awtTrans('send reset password link')}}
                        </button>
                    </div>
                    {!! Form::close() !!}
          </div>
            </div>


        </div>
        <!-- /.container -->
    </div>


@stop

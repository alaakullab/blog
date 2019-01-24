@extends('shop.index')
@section('content')

                @if(Auth::check())

        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/E-commerce') }}">{{ trans('admin.home') }}</a>
                    </li>
                    <li> @awt('Checkout - Address','ar')</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    @if($address != null)
                    {!! Form::open(['url'=>'E-commerce/address/'.Auth::user()->id,'method'=>'post']) !!}
                    <h1>@awt('Checkout','en')</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="{{url('E-commerce/address')}}"><i class="fa fa-map-marker"></i><br>@awt('Address','en')</a>
                        </li>

                        <li class="disabled"><a href="{{url('/E-commerce/payment-method')}}"><i class="fa fa-money"></i><br>@awt('Payment Method','en')</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>@awt('Order Review','en')</a>
                        </li>
                        <li  class="disabled"><a href="#"><i class="fa fa-eye"></i><br>@awt('make your Payment','en') </a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('addressesline') ? 'has-error' : '' }}">
                                    <label for="firstname">@awt('address line','en')</label>
                                    <input class="form-control" id="addressesline" value="{{$address->addressesline}}" name="addressesline" type="text">
                                    @if($errors->get('addressesline') )
                                        <span class="help-block">
{{ $errors->first('addressesline') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('city') ? 'has-error' : '' }}">
                                    <label for="city">@awt('city','en')</label>
                                    <input class="form-control" id="city" value="{{$address->city}}" name="city" type="text">
                                    @if($errors->get('city') )
                                        <span class="help-block">
{{ $errors->first('city') }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('state') ? 'has-error' : '' }}">
                                    <label for="state">@awt('state','en')</label>
                                    <input class="form-control" id="state" value="{{$address->state}}" name="state" type="text">
                                    @if($errors->get('state') )
                                        <span class="help-block">
{{ $errors->first('state') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('zip') ? 'has-error' : '' }}">
                                    <label for="zip">@awt('zip','en')</label>
                                    <input class="form-control" id="zip"  value="{{$address->zip}}" mix="5" name="zip" type="text">
                                    @if($errors->get('zip') )
                                        <span class="help-block">
{{ $errors->first('zip') }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group {{$errors->get('country') ? 'has-error' : '' }}">
                                    <label for="country">@awt('country','en')</label>
                                    <input class="form-control" id="country"  value="{{$address->country}}"  name="country" type="text">
                                    @if($errors->get('country') )
                                        <span class="help-block">
{{ $errors->first('country') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group {{$errors->get('phone') ? 'has-error' : '' }}">
                                    <label for="phone">@awt('Phone','ar')</label>
                                    <input class="form-control" id="phone" value="{{$address->phone}}" mix="15" name="phone" type="text">
                                    @if($errors->get('phone') )
                                        <span class="help-block">
{{ $errors->first('phone') }} </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="box-footer">
                        <div class="pull-left">
     <a href="{{url('E-commerce/cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>@awt('Back to basket','en')</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit"  class="btn btn-primary">@awt('Continue to Delivery Method','en')<i
                                    class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @else

                    {!! Form::open(['url'=>'E-commerce/address','method'=>'post']) !!}
                    <h1>@awt('Checkout','ar')</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="{{url('E-commerce/address')}}"><i class="fa fa-map-marker"></i><br>{{trans('admin.address')}}</a>
                        </li>
    <li class="disabled"><a href="{{url('/E-commerce/payment-method')}}"><i class="fa fa-money"></i><br>{{ trans('admin.Payment_Method') }}</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>{{ trans('admin.Order_Review') }}</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>{{ trans('admin.Payment_Gateway') }} </a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('addressesline') ? 'has-error' : '' }}">
                                    <label for="firstname">@awt('address line','en')</label>
                                    <input class="form-control" id="addressesline" value="{{old('addressesline')}}" name="addressesline" type="text">
                                    @if($errors->get('addressesline') )
                                        <span class="help-block">
{{ $errors->first('addressesline') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('city') ? 'has-error' : '' }}">
                                    <label for="city">@awt('city','en')</label>
                                    <input class="form-control" id="city" value="{{old('city')}}" name="city" type="text">
                                    @if($errors->get('city') )
                                        <span class="help-block">
{{ $errors->first('city') }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('state') ? 'has-error' : '' }}">
                                    <label for="state">@awt('state','en')</label>
                                    <input class="form-control" id="state" value="{{old('state')}}" name="state" type="text">
                                    @if($errors->get('state') )
                                        <span class="help-block">
{{ $errors->first('state') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{$errors->get('zip') ? 'has-error' : '' }}">
                                    <label for="zip">@awt('zip','en')</label>
                                    <input class="form-control" id="zip"  value="{{old('zip')}}" mix="5" name="zip" type="text">
                                    @if($errors->get('zip') )
                                        <span class="help-block">
{{ $errors->first('zip') }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group {{$errors->get('country') ? 'has-error' : '' }}">
                                    <label for="country">@awt('country','en')</label>
                                    <input class="form-control" id="country"  value="{{old('country')}}"  name="country" type="text">
                                    @if($errors->get('country') )
                                        <span class="help-block">
{{ $errors->first('country') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group {{$errors->get('phone') ? 'has-error' : '' }}">
                                    <label for="phone">@awt('Phone','ar')</label>
                                    <input class="form-control" id="phone" value="{{old('phone')}}" mix="15" name="phone" type="text">
                                    @if($errors->get('phone') )
                                        <span class="help-block">
{{ $errors->first('phone') }} </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="box-footer">
                        <div class="pull-left">
     <a href="{{url('E-commerce/cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>@awt('Back to basket','en')</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit"  class="btn btn-primary">@awt('Continue to Delivery Method','en')<i
                                    class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @endif
                                  </div>
                <!-- /.box -->

            </div>

            <!-- /.col-md-9 -->

            <div class="col-md-3">

                  <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>{{ trans('admin.Order_summary') }}</h3>{{ trans('admin.Product') }}
                        </div>
                        <p class="text-muted">{{ trans('admin.Shipping_and_additional_costs_are_calculated_based_on_the_values_you_have_entered.') }}</p>

                        <div class="table-responsive">
                              <table class="table">
                                <tbody>
                                <tr>
                                    <td>{{ trans('admin.Order_subtotal') }}</td>
                                    <th>${{Cart::subtotal()}}</th>
                                </tr>

                                <tr>
                                    <td>{{ trans('admin.Tax') }}</td>
                                    <th>${{Cart::tax()}}</th>
                                </tr>
                                <tr class="total">
                                    <td>{{ trans('admin.total') }}</td>
                                    <th>{{Cart::total()}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
        @else

 <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="{{url('E-commerce')}}">{{trans('admin.home')}}</a>
                    </li>
                    <li>{{trans('admin.NA/SI')}}</li>
                </ul>

            </div>

            <div class="col-md-6">
                <div class="box">
                    <h1>{{trans('admin.New_account')}}</h1>

                    <p class="lead">{{trans('admin.Nrcy')}}</p>
                    <p>{{trans('admin.pnewaccount')}}</p>
                    <p class="text-muted">{!! trans('admin.newaccount_contact') !!}</p>

                    <hr>

                    {!! Form::open(['url'=>url('/E-commerce/register_checkout'),'method'=>'post']) !!}
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
                        @if($errors->get('email') )
                            <span class="help-block">
{{ $errors->first('email') }} </span>
                        @endif
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
                <div class="box">
                    <h1>{{trans('admin.login')}}</h1>

                    <p class="lead">{{trans('admin.AlreadyOC')}}</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                        turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                        Donec eu libero sit amet quam egestas semper. Aenean ultricies
                        mi vitae est. Mauris placerat eleifend leo.</p>

                    <hr>
                    <div class="alert alert-danger {{ session()->has('error')?'':'hide' }} ">
                        <button class="close" data-close="alert"></button>
                        @if(session()->has('error'))
                            <span> {{ session('error') }} </span>
                        @else
                            <span> {{ trans('admin.enter_email_and_password') }} </span>
                        @endif
                    </div>
                    {!! Form::open(['url'=>url('/E-commerce/login_ecommerce_checkout'),'method'=>'post']) !!}
                    <div class="form-group">
                        <label for="email">{{trans('admin.email')}}</label>
                        <input class="form-control" id="email" name="email" type="text">
                    </div>
                    <div class="form-group">
                        <label for="password">{{trans('admin.password')}}</label>
                        <input class="form-control" id="password" name="password" type="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> {{trans('admin.Log_in')}}</button>
                    </div>
                    {!! Form::close() !!}                </div>
            </div>


        </div>
        <!-- /.container -->
    </div>




 @endif



@stop

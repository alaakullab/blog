@extends('shop.index')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">{{ trans('admin.home') }}</a>
                    </li>
                    <li>{{ trans('admin.order') }}</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***-->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('admin.Customer_section') }}</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li class="">
                                <a href="{{ url('E-commerce/account') }}"><i class="fa fa-users"></i> {{ trans('admin.My_account') }}</a>
                            </li>
                            <li class="">
                                <a href="{{ url('E-commerce/account/Account_information') }}"><i class="fa fa-cog"></i> {{ trans('admin.Account_information') }}</a>
                            </li>
                            <li class="">
                                <a href="{{ url('E-commerce/account/Change_profile') }}"><i class="fa fa-user"></i> {{ trans('admin.Change_profile') }}</a>
                            </li>

                            <li class="active">
                                <a href="{{ url('E-commerce/order') }}"><i class="fa fa-heart"></i> {{ trans('admin.My_wishlist') }}</a>
                            </li>
                            @if(\Auth::user()->teams == 'yes')
                                <li class="">
                                    <a href="{{ url('bloger/account/exp') }}"><i
                                                class="fa fa-user"></i> @awt('add experiences','en')</a>
                                </li>
                            @endif
                            @if(\Auth::user()->Informations_users_de or \Auth::user()->Informations_users_team)
                                <li class="">
                                    <a href="{{ url('E-commerce/account/social-media') }}"><i
                                                class="	fa fa-pinterest-square"></i> @awt('Social Media','ar')</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('E-commerce/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('admin.logout') }}</a>
                            </li>
                        </ul>


                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        @if(session()->has('success'))
                            <span> {{ session('success') }} </span>
                        @endif
                    </div>
                @endif
                <div class="box">
                    <h1>{{ trans('admin.order') }}</h1>
                    <p class="lead">@awt('Here are the products that have been added to your favorites
                        ','en').</p>
                    <div class="row products">
                        <?php $count = 1; ?>
                    @foreach($orders as $order)
                            <?php  // return dd($Products); ?>
                            <div class="col-md-8 col-sm-8">
                                <div class="row">
                                    <table class="table">
                                        <thedar>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('admin.name') }}</th>
                                                <th>{{ trans('admin.qty') }}</th>
                                                <th>{{ trans('admin.price') }}</th>
                                                <th>{{ trans('admin.status') }}</th>
                                                <th>{{ trans('admin.created_at') }}</th>
                                                <th>*</th>

                                            </tr>
                                        </thedar>
                                        <tbody>
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>@if(app('l')=='en'){{product_row($order->id)->product_name_en}}@else{{product_row($order->id)->product_name_ar}}  @endif</td>
                                            <td>{{ order_qty($order->id) }}</td>
                                            <td>${{product_row($order->id)->price}}</td>
                                            <td>@if($order->delivered == 0 )pending @else delivered @endif</td>
                                            <td>{{ product_row($order->id)->created_at }}</td>
                                            <td> <a href="{{url('E-commerce/product/'.product_row($order->id)->id)}}" class="btn btn-default">@awt('View detail','en')</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container -->
    </div>

@stop

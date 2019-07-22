@extends('shop.index')
@section('content')



        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/E-commerce') }}">{{ trans('admin.home') }}</a>
                    </li>
                    <li>@awt('Checkout - Order review','ar')</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    {!! Form::open(['url'=>url('E-commerce/Order/'.$key),'method'=>'post']) !!}
                        <h1>@awt('Checkout - Order review','ar')</h1>

                        <ul class="nav nav-pills nav-justified">
                            <li ><a href="{{url('E-commerce/address')}}"><i class="fa fa-map-marker"></i><br>@awt('Address','en')</a>
                            </li>

                            <li ><a href="{{url('/E-commerce/payment-method')}}"><i class="fa fa-money"></i><br>@awt('Payment Method','en')</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-eye"></i><br>@awt('Order Review','en')</a>
                            </li>
                            <li  class="disabled"><a href="#"><i class="fa fa-eye"></i><br>@awt('make your Payment','en') </a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <td colspan="2">{{ trans('admin.product_name') }}</td>
                                            <td>{{ trans('admin.Quantity') }}</td>
                                            <td>{{ trans('admin.Unit_price') }}</td>
                                            <td>{{ trans('admin.Tax') }}</td>
                                            {{-- <td>Discount</td> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartItems as $cartItem)
                                    <tr>
                                        <td>
                                            <a href="#">
                                                    <img src="@if(product_find($cartItem->name)){{Storage::url(product_find($cartItem->name)->full_path)}}@endif" width="55px" alt="" >
                                            </a>
                                        </td>
                                        <td><a href="#">{{$cartItem->name}}</a>
                                        </td>

                                        <td>{{$cartItem->qty}}</td>
                                        <td>${{$cartItem->price}}</td>
                                        <td>${{Cart::tax()}}</td>
                                    </tr>
                                 @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th colspan="5">${{Cart::total()}}</th>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{url('E-commerce/payment-method')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>@awt('Back to Payment method','en')</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">@awt('Place an order','en')<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
{!! Form::close() !!}                </div>
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





@stop

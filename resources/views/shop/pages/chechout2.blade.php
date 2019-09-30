@extends('shop.index')
@section('content')
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/E-commerce') }}">{{ trans('admin.home') }}</a>
                    </li>
                    <li>@awt('Checkout - Payment method','en')</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    {!! Form::open(['route'=>'cart.payment_method_post','method'=>'post']) !!}
                        <h1>@awt('Checkout - Payment method','en')</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li ><a href="{{url('E-commerce/address')}}"><i class="fa fa-map-marker"></i><br>@awt('Address','en')</a>
                            </li>

                            <li class="active"><a href="{{url('/E-commerce/payment-method')}}"><i class="fa fa-money"></i><br>@awt('Payment Method','en')</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>@awt('Order Review','en')</a>
                            </li>
                            <li  class="disabled"><a href="#"><i class="fa fa-eye"></i><br>@awt('make your Payment','en') </a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>{{awtTrans('Paypal','ar')}}</h4>

                                        <p>{{awtTrans('We like it all','ar')}}.</p>

                                        <div class="box-footer text-center">

                                            <input name="Paypal" value="Paypal" type="radio">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>{{awtTrans('Payment gateway','ar')}}</h4>

                                        <p>{{awtTrans('VISA and Mastercard only','ar')}}.</p>

                                        <div class="box-footer text-center">

                                            <input name="payment" value="Payment" type="radio">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{url('E-commerce')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>{{awtTrans('Back to Shipping method','ar')}}</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">{{awtTrans('Continue to Order review','ar')}}<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}
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





@stop

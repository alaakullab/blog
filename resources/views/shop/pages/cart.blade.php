@extends('shop.index')
@section('content')

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">{{ trans('admin.home') }}</a>
                        </li>
                        <li>{{ trans('admin.Shopping_cart') }}</li>
                    </ul>
                </div>
                <div class="col-md-9" id="basket">
                    <div class="box">
                            <h1>{{ trans('admin.Shopping_cart') }}</h1>
                            <p class="text-muted">{{ trans('admin.You_currently_have_3_item(s)_in_your_cart',['num'=>Cart::count()]) }}.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">{{ trans('admin.product_name') }}</th>
                                        <th>{{ trans('admin.Quantity') }}</th>
                                        <th>{{ trans('admin.Unit_price') }}</th>
                                        <th>{{ trans('admin.Tax') }}</th>
                                        <th colspan="2">{{ trans('admin.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartItems as $cartItem)
                                        <tr>
                                            <td>
                                                <a href="#">

                                                    <img src="@if(product_find($cartItem->name)){{Storage::url(product_find($cartItem->name)->full_path)}}@endif" alt="" >
                                                </a>
                                            </td>
                                            <td><a href="#">{{$cartItem->name}}</a>
                                            </td>
                                            <td>
                                    {!!Form::open(['route'=>['cart.update',$cartItem->rowId],'method'=>'put'])!!}
                                                <input type="number" min="1" value="{{$cartItem->qty}}" name="qty" class="form-control">
                                            </td>
                                            <td>${{$cartItem->price}}</td>
                                            <td>${{Cart::tax()}}</td>

                                            <td colspan="2"><button class="btn btn-default" ><i class="fa fa-refresh"></i></button>
                                                <a href="{{route('cart.delete',$cartItem->rowId)}}" class="btn btn-default"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            {!!Form::close()!!}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="5">{{ trans('admin.total') }}</th>
                                        <th colspan="4">${{Cart::total()}}</th>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('E-commerce')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                                        {{ trans('admin.Continue_shopping') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{url('/E-commerce/address')}}" @if(Cart::count() == '0') disabled @endif class="btn btn-primary">{{ trans('admin.Proceed_to_checkout') }} <i
                                            class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                    </div>
                    <!-- /.box -->
                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>{{ trans('admin.You_may_also_like_these_products') }}</h3>
                            </div>
                        </div>
            @foreach(Product_last() as $last)
                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height" style="height: 380px;">
                            <div class="flip-container">
                                <div class="flipper">
                                    <?php
 $pr = $last->file;
$p = count($pr);
for ($x = 0; $x < $p; $x++) {

	?>
  @if($pr && $p == 1)
    <div class="front">
        <a href="{{url('E-commerce/product/'.$last->id)}}">
            <img src="{{ Storage::url( $pr[0]->full_path) }}" alt=""
                 class="img-responsive">
        </a>
    </div>
    <div class="back">
        <a href="{{url('E-commerce/product/'.$last->id)}}">
            <img src="{{ Storage::url( $pr[0]->full_path) }}" alt=""
                 class="img-responsive">
        </a>
    </div>
  @else
                                    <div class="front">
                                        <a href="{{url('E-commerce/product/'.$last->id)}}">
                                            <img src="{{ Storage::url( $pr[0]->full_path) }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="{{url('E-commerce/product/'.$last->id)}}">
                                            <img src="{{ Storage::url( $pr[1]->full_path) }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                  @endif
                                    <?php }?>
                                </div>
                            </div>
                            <a href="{{url('E-commerce/product/'.$last->id)}}" class="invisible">
                                <img src="{{url('shop/')}}/img/product2.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                 @if(app('l') == 'en')
                                 @if($last->product_name_en == null)
                                <h3>{{$last->product_name_ar}}</h3>
                                @else
                                <h3>{{$last->product_name_en}}</h3>
                                @endif
                                @else
                                <h3>{{$last->product_name_ar}}</h3>
                                @endif
                                <p class="price">${{$last->price}}</p>
                                     <p class="text-center buttons">
                                         <a href="{{url('E-commerce/cart/'.$last->id.'/edit')}}/" class="btn btn-primary"><i
                                                     class="fa fa-shopping-cart"></i></a>
                                         @if(Auth::check())
                                             <a href="{{ url('/E-commerce/wishlist/'.$last->id) }}" class="btn btn-default"><i
                                                         class="fa fa-heart"></i></a>
                                         @else
                                             <a href="{{ url('/E-commerce/wishlist/'.$last->id) }}" data-toggle="modal" data-target="#login-modal"  class="btn btn-default"><i
                                                         class="fa fa-heart"></i></a>
                                         @endif
                                     </p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>
                @endforeach
                    </div>
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
        </div>
        <!-- /#content -->
@stop

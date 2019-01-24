@extends('shop.index')
@section('content')

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">{{ trans('admin.home') }}</a>
                        </li>
                        <li>{{ $title}}</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">


                            <h1>@awt('Payment successful','en')</h1>
                            <p class="text-muted">@awt('Please check your email every time','en').</p>
                            <div class="table-responsive">
                            <h4> @awt('Products will be shipped within 10 days
You will be sent an e-mail message stating the shipment of the products .','en')</h4>
                                <br>
                                <h5><a href="{{url('E-commerce/contact')}}" >@awt('If a message is not sent within 10 days, please contact us .','ar')</a></h5>
                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('E-commerce')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                                        {{ trans('admin.Continue_shopping') }}</a>
                                </div>
                                <div class="pull-right">
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
$p = count($last->file);
for ($x = 0; $x < $p; $x++) {

	?>
  @if($p == 1)
    <div class="front">
                                                  <a href="{{url('E-commerce/product/'.$last->id)}}">
                                              <img src="{{ Storage::url( $pr[0]->full_path) }}" class="img-responsive">
                                                  </a>
                                              </div>

                                              <div class="back">
                                                  <a href="{{url('E-commerce/product/'.$last->id)}}">
                                                  <img src="{{ Storage::url($pr[0]->full_path ) }}" alt=""  class="img-responsive">
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
                            </table>
                        </div>

                    </div>
{{--

                    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
 --}}
                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@stop

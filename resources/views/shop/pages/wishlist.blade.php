@extends('shop.index')
@section('content')
 <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">{{ trans('admin.home') }}</a>
                        </li>
                        <li>{{ trans('admin.wishlist') }}</li>
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
<a href="{{ url('E-commerce/wishlist') }}"><i class="fa fa-heart"></i> {{ trans('admin.My_wishlist') }}</a>
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
                        <h1>{{ trans('admin.wishlist') }}</h1>
                        <p class="lead">@awt('Here are the products that have been added to your favorites
','en').</p>
                    </div>
                    <div class="row products">
                      @foreach($wishlist as $wishlist)
                        @foreach(product_where($wishlist->product_id) as $Products)


                        <div class="col-md-3 col-sm-4">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                      <?php
            $pr = $Products->file;
            $p = count($pr);
            for ($x = 0; $x < $p; $x++) {

            ?>
            @if($p == 1)
              <div class="front">
                                                            <a href="{{url('E-commerce/product/'.$Products->id)}}">
                                                        <img src="{{ Storage::url( $pr[0]->full_path) }}" class="img-responsive">
                                                            </a>
                                                        </div>

                                                        <div class="back">
                                                            <a href="{{url('E-commerce/product/'.$Products->id)}}">
                                                            <img src="{{ Storage::url($pr[0]->full_path ) }}" alt=""  class="img-responsive">
                                                            </a>
                                                        </div>
            @else
                                      <div class="front">
                                                <a href="{{url('E-commerce/product/'.$Products->id)}}">
                                                    {{--<img src="{{url('shop/')}}/img/product2.jpg" alt=""--}}
                                            <img src="{{ Storage::url( $pr[0]->full_path) }}" class="img-responsive">
                                                </a>
                                            </div>

                                            <div class="back">
                                                <a href="{{url('E-commerce/product/'.$Products->id)}}">
                                                <img src="{{ Storage::url($pr[1]->full_path ) }}" alt=""  class="img-responsive">
                                                </a>
                                            </div>
                                          @endif
                                            <?php }?>
                                    </div>
                                </div>
                                <a href="{{url('E-commerce/product/'.$Products->id)}}" class="invisible">
                                    <img src="{{url('shop/')}}/img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html">@if(app('l')=='en'){{$Products->product_name_en}}@else{{$Products->product_name_ar}}  @endif</a></h3>
                                    <p class="price">${{$Products->price}}</p>
                                    <p class="buttons">
                                        <a href="{{url('E-commerce/product/'.$Products->id)}}" class="btn btn-default">@awt('View detail','en')</a>
                                        <a href="{{url('E-commerce/cart/'.$Products->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>@awt('Add to cart','ar')</a>
                                        <a href="{{url('/E-commerce/delete/wishlist/'.$wishlist->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i>{{trans('admin.delete')}}</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                      @endforeach
                      @endforeach
                    </div>

                </div>

            </div>
            <!-- /.container -->
        </div>

@stop

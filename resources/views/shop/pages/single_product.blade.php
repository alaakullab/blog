@extends('shop.index')
@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('E-commerce') }}">{{ trans('admin.home') }}</a>
                    </li>
                    @if(app('l') == 'en')
                        <li>  {{$product->product_name_en}}</</li>
                    @else
                        @if($product->product_name_ar == null)

                            <li>  {{$product->product_name_en}}</</li>
                        @else
                            <li>  {{$product->product_name_ar}}</</li>

                        @endif
                    @endif
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS *** -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('admin.categories')}}</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            @foreach($dep as $dep)
                                <li class="{{ $dep->id  == $product->department->parent_id ? 'active' : '' }}">
                                    @if($dep->parent_id == null)
                                        <a href="#">{{$dep->dep_name_en}} <span
                                                class="badge pull-right">{{count(dep_shop_parent($dep->id))}}</span></a>
                                    @endif
                                    @foreach(dep_shop_parent($dep->id) as $dep_parent)
                                        <ul>
                                            <li>
                                                <a href="{{url('E-commerce/category/'.$dep_parent->dep_name_en)}}">{{$dep_parent->dep_name_en}}</a>
                                            </li>
                                        </ul>
                                        @empty($dep_parent)

                                        @endempty
                                    @endforeach
                                </li>
                            @endforeach


                        </ul>

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">@awt('Filter prices','ar') </h3>
                    </div>

                    <div class="panel-body">

                      {!!Form::open(['url'=>url('E-commerce/category/'.$product->department->dep_name_en.'/filter'),'method'=>'post'])!!}
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="25">  @awt('From $ 25 to $ 50','en')
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="50">  @awt('From $ 50 to $ 100','en')

                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="100">  @awt('From $ 100 to $ 200','en')

                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="100000">  @awt('All prices','en')
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> @awt('Apply','en')
                            </button>

                            {!!Form::close()!!}

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">@awt('Sort by','en')
                          {{-- <a class="btn btn-xs btn-danger pull-right" href="#"><i
                                    class="fa fa-times-circle"></i> Clear</a> --}}
                                  </h3>
                    </div>

                    <div class="panel-body">

                      {!!Form::open(['url'=>url('E-commerce/category/'.$product->department->dep_name_en.'/filter'),'method'=>'post'])!!}
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="orderBy" value="Low">  @awt('Price: Low to High','en')
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="orderBy" value="High">  @awt('Price: High to Low','en')
                                    </label>
                                </div>

                            </div>

                            <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> @awt('Apply','en')
                            </button>

                            {!!Form::close()!!}

                    </div>
                </div>
                @if(setting()->facebook)
                <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">@awt('Follow us on Facebook','en')</h3>
                        </div>
    
                        <div class="panel-body">
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.1&appId=1134975683208848&autoLogAppEvents=1';
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                             <div class="fb-page" data-href="{{setting()->facebook}}" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{setting()->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{setting()->facebook}}"> </a></blockquote></div>
                        </div>
    
                    </div>
                    @endif

                <!-- *** MENUS AND FILTERS END *** -->

                <div class="banner">
                    <a href="#">
                        {{--<img src="{{Storage::url(dep_parent($product->department->parent_id)->image_dep)}}" alt="{{dep_parent($product->department->parent_id)->dep_name_en}}" class="img-responsive">--}}
                    </a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <?php
                            $file = Product_first($product->id);
                            ?>
                            <img src="@if($file){{ Storage::url($file->full_path)}}@endif" alt="" class="img-responsive">
                        </div>
                        @if( new DateTime('now') <= $product->created_at->addWeekdays(10))
                       <div class="ribbon new">
                           <div class="theribbon">@awt('New','en')</div>
                           <div class="ribbon-background"></div>
                       </div>
                       @endif
                        <!-- /.ribbon -->

                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            @if(app('l') == 'en')
                                @if($product->product_name_en == null)
                                    <h1 class="text-center">{{$product->product_name_ar}}</h1>
                                    @if($product->draftsmen != null)
                                    <p class="goToDescription">{!! $product->draftsmen->username  !!}
                                   </p>
                                   @endif
                                @else
                                    <h1 class="text-center">{{$product->product_name_en}}</h1>

                                @endif
                                <p class="goToDescription">@if($product->draftsmen != null)<a href="{{url('draftsman/'.$product->draftsmen->username.'/index')}}" class="scroll-to">
                                @if($product->draftsmen->First_Name){!! $product->draftsmen->First_Name.' '.$product->draftsmen->Last_Name  !!}  @else {!! $product->draftsmen->username  !!}@endif
                                </a>
                                @endif
                               </p>
                            @else
                                @if($product->product_name_ar == null)
                                    <h1 class="text-center">{{$product->product_name_en}}</h1>

                                @else
                                    <h1 class="text-center">{{$product->product_name_ar}}</h1>


                                @endif
                                    @if($product->draftsmen != null)
                                <p class="goToDescription"><a href="{{url('draftsman/'.$product->draftsmen->username.'/index')}}" class="scroll-to">
                                @if($product->draftsmen->First_Name){!! $product->draftsmen->First_Name.' '.$product->draftsmen->Last_Name  !!}  @else {!! $product->draftsmen->username  !!}@endif
                                </a>
                               </p>
                                    @endif
                            @endif


                            <p class="price">${{$product->price}}</p>

                            <p class="text-center buttons">
                                <a href="{{url('E-commerce/cart/'.$product->id.'/edit')}}/" class="btn btn-primary"><i
                                        class="fa fa-shopping-cart"></i>{{ awtTrans('Add to cart', 'ar') }}</a>
                                        @if(Auth::check())
                                        <a href="{{ url('/E-commerce/wishlist/'.$product->id) }}" class="btn btn-default"><i
                                            class="fa fa-heart"></i> {{ awtTrans('Add to wishlist', 'ar') }}</a>
                                        @else
                                        <a href="{{ url('/E-commerce/wishlist/'.$product->id) }}" data-toggle="modal" data-target="#login-modal"  class="btn btn-default"><i
                                            class="fa fa-heart"></i> {{ awtTrans('Add to wishlist', 'ar') }}</a>
                                        @endif

                            </p>


                        </div>

                        <div class="row" id="thumbs">
                            @foreach ($product->file as $file)
                                <div class="col-xs-4">
                                    <a href="@if($file){{ Storage::url($file->full_path)}}@endif" class="thumb ">
                                        <img src="@if($file){{ Storage::url($file->full_path)}}@endif" alt="" class="img-responsive">
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>


                <div class="box" id="details">
                    @if(app('l') == 'en')
                        {!! $product->description_en !!}
                    @else
                        @if($product->description_ar == null)
                            {!! $product->description_en !!}
                        @else
                            {!! $product->description_ar !!}


                        @endif
                    @endif
                    <hr>
                    <div class="social">
                        <h4>{{ trans('admin.Show_it_to_your_friends') }}</h4>
                        <p>
                            <a href="javascript: void(0)"
                               onclick="popup('http://www.facebook.com/sharer.php?u={{Request::url()}}')"
                               class="external facebook" data-animate-hover="pulse"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="javascript: void(0)"
                               onclick="popup('https://plus.google.com/share?url={{Request::url()}}')"
                               class="external gplus" data-animate-hover="pulse"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="javascript: void(0)"
                               onclick="popup('https://twitter.com/home?status={{Request::url()}}')"
                               class="external twitter" data-animate-hover="pulse"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="javascript: void(0)"
                               onclick="popup('https://pinterest.com/pin/create/button/?url={{Request::url()}}&media=https%3A//bit.ly/fcc-relaxing-cat&description={{$product->product_name_en}}')"
                               class="email" data-animate-hover="pulse"><i class="fa fa-pinterest"></i></a>
                        </p>
                    </div>
                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height" style="height: 380px;">
                            <h3>{{ trans('admin.You_may_also_like_these_products') }}</h3>
                        </div>
                    </div>
                    @foreach($product_get as $product_get)
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height" style="height: 380px;">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <?php
                                        $pr = $product_get->file;
                                        $p = count($pr);
                                        for ($x = 0; $x < $p; $x++) {




                                        ?>
                                        @if($p == 1)
                                          <div class="front">
                                              <a href="{{url('E-commerce/product/'.$product_get->id)}}">
                                                  <img src="{{ Storage::url( $pr[0]->full_path) }}" alt=""
                                                       class="img-responsive">
                                              </a>
                                          </div>
                                          <div class="back">
                                              <a href="{{url('E-commerce/product/'.$product_get->id)}}">
                                                  <img src="{{ Storage::url( $pr[0]->full_path) }}" alt=""
                                                       class="img-responsive">
                                              </a>
                                          </div>
                                        @else
                                        <div class="front">
                                            <a href="{{url('E-commerce/product/'.$product_get->id)}}">
                                                <img src="{{ Storage::url( $pr[0]->full_path) }}" alt=""
                                                     class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{url('E-commerce/product/'.$product_get->id)}}">
                                                <img src="{{ Storage::url( $pr[1]->full_path) }}" alt=""
                                                     class="img-responsive">
                                            </a>
                                        </div>
                                      @endif
                                        <?php }?>
                                    </div>
                                </div>
                                <a href="{{url('E-commerce/product/'.$product_get->id)}}" class="invisible">
                                    <img src="{{url('shop/')}}/img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    @if(app('l') == 'en')
                                        @if($product_get->product_name_en == null)

                                            <h3>{{$product_get->product_name_ar}}</h3>
                                        @else
                                            <h3>{{$product_get->product_name_en}}</h3>
                                        @endif
                                    @else

                                        <h3>{{$product_get->product_name_ar}}</h3>
                                    @endif
                                    <p class="price">${{$product_get->price}}</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach
                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height" style="height: 380px;">
                            <h3>{{ trans('admin.Products_viewed_recently') }}</h3>
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
                                        @if($p == 1)
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
                                                <img src="{{ Storage::url( $pr[0]->full_path) }}" alt=""
                                                     class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{url('E-commerce/product/'.$last->id)}}">
                                                <img src="{{ Storage::url( $pr[1]->full_path) }}" alt=""
                                                     class="img-responsive">
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
        </div>
        <!-- /.container -->
    </div>
@stop

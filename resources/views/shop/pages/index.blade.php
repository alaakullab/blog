@extends('shop.index')
@section('content')

        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                      @foreach ($slider as $slider )
                      <div class="item">
                            <img class="img-responsive" src="{{Storage::url($slider->image_slider)}}" alt="">
                        </div>
                      @endforeach
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is
                                    used in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>{{ trans('admin.Hot_this_week') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="container ">
                    <div class="product-slider">

                        @forelse($product as $product)
                            <div class="item">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <?php
$pr = $product->file;
$p = count($pr);
for ($x = 0; $x < $p; $x++) {

	?>
  @if($p == 1)
    <div class="front">
                                                  <a href="{{url('E-commerce/product/'.$product->id)}}">
                                              <img src="{{ Storage::url( $pr[0]->full_path) }}" class="img-responsive">
                                                  </a>
                                              </div>

                                              <div class="back">
                                                  <a href="{{url('E-commerce/product/'.$product->id)}}">
                                                  <img src="{{ Storage::url($pr[0]->full_path ) }}" alt=""  class="img-responsive">
                                                  </a>
                                              </div>
  @else
                                      <div class="front">
                                                <a href="{{url('E-commerce/product/'.$product->id)}}">
                                                    {{--<img src="{{url('shop/')}}/img/product2.jpg" alt=""--}}
                                            <img src="{{ Storage::url( $pr[0]->full_path) }}" class="img-responsive">
                                                </a>
                                            </div>

                                            <div class="back">
                                                <a href="{{url('E-commerce/product/'.$product->id)}}">
                                                <img src="{{ Storage::url($pr[1]->full_path ) }}" alt=""  class="img-responsive">
                                                </a>
                                            </div>
                                          @endif
                                            <?php }?>

                                        </div>
                                    </div>
                                    <a href="{{url('E-commerce/product/'.$product->id)}}" class="invisible">
                                        <img src="{{url('shop/')}}/img/product2.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="{{url('E-commerce/product/'.$product->id)}}">@if(app('l')=='en'){{$product->product_name_en}}@else{{$product->product_name_ar}} @endif</a></h3>
                                        <p class="price">
                                            {{-- <del>$280</del> --}}
                                            ${{$product->price}}
                                        </p>
                                        <p class="text-center buttons">
                                            <a href="{{url('E-commerce/cart/'.$product->id.'/edit')}}/" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            @if(Auth::check())
                                                <a href="{{ url('/E-commerce/wishlist/'.$product->id) }}" class="btn btn-default"><i
                                                            class="fa fa-heart"></i></a>
                                            @else
                                                <a href="#" data-toggle="modal" data-target="#login-modal"  class="btn btn-default"><i
                                                            class="fa fa-heart"></i></a>
                                            @endif

                                        </p>
                                    </div>

                                    <!-- /.text -->

                                   {{--<div class="ribbon sale">--}}
                                        {{--<div class="theribbon">SALE</div>--}}
                                        {{--<div class="ribbon-background"></div>--}}
                                    {{--</div>--}}
                                    <!-- /.ribbon -->
                                     @if( new DateTime('now') <= $product->created_at->addWeekdays(10))
                                    <div class="ribbon new">
                                        <div class="theribbon">@awt('New','en')</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                    @endif
                                    <!-- /.ribbon -->
{{--
                                    <div class="ribbon gift">
                                        <div class="theribbon">GIFT</div>
                                        <div class="ribbon-background"></div>
                                    </div> --}}
                                    <!-- /.ribbon -->
                                </div>
                                <!-- /.product -->
                            </div>
@endforeach
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
        _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>@awt('Categories','en')</h3>
                        <p class="lead">@awt('Here are the pictures of the main sections','en')</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            @foreach ($depar as $dep )
                            <div class="item">
                                    <a href="{{url('E-commerce/category/'.dep_first($dep->id))}})}}">
                                        @if($dep->image_dep)
                                    <img src="{{Storage::url($dep->image_dep)}}" alt=""
                                             class="img-responsive">
                                             @endif
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
        _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">{{ trans('admin.From_our_blog') }}</h3>

                        <p class="lead">{{ trans('admin.What_New') }} <a href="{{ url('/bloger') }}">{{ trans('admin.Check_out_your_blogger!') }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        @foreach(post_last2() as $post)
                        <div class="col-sm-6">
                            <div class="post">
                            <h4><a href="{{url('/bloger/post/'.$post->id)}}">
                                @if(app('l')=='en')
                                {{$post->title_en}}
                                @else
                                {{$post->title_ar}}
                                @endif
                            </a></h4>
                                <p class="author-category">@awt('By','ar') <a href="#">@if($post->user->First_Name !=null){{$post->user->First_Name .' '.$post->user->Last_Name}}@else{{$post->user->username}} @endif</a> @awt('in','ar')<a href="{{url('bloger/category/'.$post->tag->name_en)}}">@if(app('l') == 'ar'){{$post->tag->name_ar}}@else
                                    {{$post->tag->name_en}}
                                @endif
                            </a>
                                </p>
                                <hr>
                                <p class="intro">@if(app('l') == 'ar'){!! str_limit($post->content_ar, 300,'...') !!}@else{!! str_limit($post->content_en, 300,'...') !!}@endif</p>
                                <p class="read-more"><a href="{{url('/bloger/post/'.$post->id)}}" class="btn btn-primary">@awt('Continue reading','en')</a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                       

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->
@stop

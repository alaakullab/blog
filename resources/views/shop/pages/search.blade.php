@extends('shop.index')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">{{ trans('admin.home') }}</a>
                    </li>
                    <li>{{ trans('admin.search') }}</li>
                </ul>
            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">@awt('Categories','ar')</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            @foreach($dep as $dep)
                          <li class="{{    dep_shop_get(request()->segment(3)) == $dep->dep_name_en ? 'active' : '' }}">
                                    @if($dep->parent_id == null or $dep->parent_id == 0)

                                    <a href="#">{{$dep->dep_name_en}}  <span class="badge pull-right">{{dep_shop_parent($dep->id)->count()}}</span></a>
                                    @endif
                                                @foreach(dep_shop_parent($dep->id) as $dep_parent)


                                                <ul>
                                            <li>
                                                <a href="{{url('E-commerce/category/'.$dep_parent->dep_name_en)}}">{{$dep_parent->dep_name_en}}</a>
                                            </li>
                                        </ul>
                                                    @empty($dep_parent)
                                                    <h1>No Row</h1>
                                                        @endempty
                                                @endforeach
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                       <h3 class="panel-title">@awt('Filter prices','ar')    {{--<a class="btn btn-xs btn-danger pull-right" href="#"><i
                                    class="fa fa-times-circle"></i> Clear</a> --}}

                                  </h3>
                    </div>

                    <div class="panel-body">

                      {!!Form::open(['url'=>url('E-commerce/category/'.request()->segment(3).'/filter'),'method'=>'post'])!!}
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="25">  @awt('From $ 25 to $ 50','ar')
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="50">  @awt('From $ 50 to $ 100','ar')

                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="100">  @awt('From $ 100 to $ 200','ar')

                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="prices" value="100000">  @awt('All prices','ar')
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> @awt('Apply','ar')
                            </button>

                            {!!Form::close()!!}

                    </div>
                </div>
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">@awt('Sort by','ar')
                          {{-- <a class="btn btn-xs btn-danger pull-right" href="#"><i
                                    class="fa fa-times-circle"></i> Clear</a> --}}
                                  </h3>
                    </div>

                    <div class="panel-body">

                      {!!Form::open(['url'=>url('E-commerce/category/'.request()->segment(3).'/filter'),'method'=>'post'])!!}
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                      <input type="radio" name="orderBy" value="Low">  @awt('Price: Low to High','ar')
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="orderBy" value="High">  @awt('Price: High to Low','ar')
                                    </label>
                                </div>

                            </div>

                            <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> @awt('Apply','ar')
                            </button>

                            {!!Form::close()!!}
                    </div>
                </div>

                <!-- *** MENUS AND FILTERS END *** -->

                <div class="banner">
               {{--      <a href="#">
                        <img src="{{ Storage::url($dep->image_dep ) }}" alt="{{$dep->dep_name_en}}" class="img-responsive">
                    </a> --}}
                </div>
            </div>

            <div class="col-md-9">
              @if(empty($products) or $products == null or count($products) <= 0)
                <div class="box">
                    <center>

<h1> {{ trans('admin.norow') }} </h1>
                    </center>

                </div>
@endif

                <div class="row products">
                    @if(empty($products))

                    @else
                    @foreach($products as $product)
                        <div class="col-md-4 col-sm-6">
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
                                                <img src="{{Storage::url($pr[0]->full_path)}}" alt=""
                                                     class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{url('E-commerce/product/'.$product->id)}}">
                                                <img src="{{Storage::url($pr[1]->full_path)}}" alt=""
                                                     class="img-responsive">
                                            </a>
                                        </div>
                                      @endif
                                        <?php } ?>
                                    </div>
                                </div>
                                <a href="{{url('E-commerce/product/'.$product->id)}}" class="invisible">
                                    <img src="{{url('shop/')}}/img/product1.jpg" alt="" class="img-responsive">
                                </a>

                                <div class="text">
                                    @if(app('l') == 'en')
                                    <h3><a href="{{url('E-commerce/product/'.$product->id)}}">{{$product->product_name_en}}</a></h3>
                                    @else
                                        <h3><a href="{{url('E-commerce/product/'.$product->id)}}">{{$product->product_name_ar}}</a></h3>

                                    @endif
                                    <p class="price">${{$product->price}}</p>
                                    <p class="buttons">
                                        <a href="{{url('E-commerce/product/'.$product->id)}}" class="btn btn-default">@awt('View detail','ar')</a>

                                    </p>
                                </div>

                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    @empty($product)
<h1> NO ROW active </h1>
                    @endempty
                @endforeach
                @endif
                <!-- /.col-md-4 -->
                </div>
                <!-- /.products -->

                <div class="pages">

                    {{--<p class="loadMore">--}}
                    {{--<a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>--}}
                    {{--</p>--}}
                                        {{ $products->links() }}


                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>

@stop

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{url('E-commerce')}}" data-animate-hover="bounce">
                <img src="{{url('shop/')}}/img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="{{url('shop/')}}/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span
                    class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="{{url('/E-commerce/cart')}}">
                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">{{Cart::count()}} {{ trans('admin.items_in_cart') }}</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="{{url('E-commerce')}}">{{trans('admin.home')}}</a>
                </li>
                @foreach(dep_shop() as $dep)

                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">        @if(app('l') == 'en')
                            {{$dep->dep_name_en}}
                            @else
                            {{$dep->dep_name_ar}}
                            @endif
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                    <div class="col-sm-3">


                                        <ul>
                                               @foreach(dep_shop_parent($dep->id) as $dep_parent)
                                                    @if(app('l') == 'en')
                                            <li><a href="{{url('E-commerce/category/'.$dep_parent->dep_name_en)}}">{{$dep_parent->dep_name_en}}</a>
                                            </li>
                                            @else
                                            <li><a href="{{url('E-commerce/category/'.$dep_parent->dep_name_en)}}">{{$dep_parent->dep_name_ar}}</a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                @endforeach
                <li><a href="{{url('bloger')}}" >{{trans('admin.blog')}}</a></li>

            @if(app('l') == 'ar')

                         <li><a href="{{aurl('lang/en')}}" >{{trans('admin.en')}} </a></li>
                         @else
                         <li><a href="{{aurl('lang/ar')}}" >{{trans('admin.ar')}} </a></li>

                         @endif

            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="{{url('/E-commerce/cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span
                        class="hidden-sm">{{Cart::count()}} {{ trans('admin.items_in_cart') }}</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">
               {!! Form::open(['url'=>url('/E-commerce/search'),'method'=>'get','role'=>'search' ,'class'=>'navbar-form']) !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="{{ trans('admin.search') }}">
                    <span class="input-group-btn">
                }

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                </div>
{!! Form::close() !!}
  {{--           <form class="navbar-form" role="search" method="post">
                <div class="input-group">
                    <input type="text" class="form-control"  placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form> --}}

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
<div id="all">

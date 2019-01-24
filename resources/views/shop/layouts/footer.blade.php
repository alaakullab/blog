
<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>{{trans('admin.Pages')}}</h4>

                <ul>
                    <li><a href="{{url('/')}}">{{trans('admin.home_page')}}</a>
                    </li>
                    <li><a href="{{url('E-commerce')}}">{{trans('admin.store')}}</a>
                    </li>
                    <li><a href="{{url('bloger')}}">{{trans('admin.bloger')}}</a>
                    </li>
                    <li><a href="{{url('E-commerce/contact')}}">{{trans('admin.Contact_us')}}</a>
                    </li>
                </ul>
                @if(!Auth::check())
                <hr>

                <h4>{{trans('admin.User_section')}}</h4>

                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">{{trans('admin.login')}}</a>
                    </li>
                    <li><a href="{{url('/E-commerce/register')}}">{{trans('admin.register')}}</a>
                    </li>
                </ul>
@endif
                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>{{trans('admin.Top_categories')}}</h4>
                @foreach(dep_get() as $dep)
                    @if($dep->parent_id == null)
                    @if(app('l')=='en')
                <h5>{{$dep->dep_name_en}}</h5>
                @else
                <h5>{{$dep->dep_name_ar}}</h5>
                @endif
@endif
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

@endforeach

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>{{trans('admin.information_about_us')}}</h4>

                @if(app('l')=='en')
                {!! setting('site_desc_en') !!}
                
                @else
                {!! setting('site_desc_ar') !!}
                
                @endif
<br>
                <a href="{{url('E-commerce/contact')}}">{{trans('admin.Go_to_contact_page')}}</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

              <h4>@awt('Get the news','en')</h4>

              <p class="text-muted">@awt('You will not take your time in minutes and in return will send all new emails to you
','en').</p>

{!!Form::open(['url'=>url('/E-commerce/New_news'),'method'=>'post'])!!}
                <div class="input-group">

                        <input type="email" class="form-control" name="email_news" required>

                        <span class="input-group-btn">

			    <button class="btn btn-default" type="button">@awt('Subscribe','ar')!</button>

			</span>

                    </div>
                    <!-- /input-group -->
{!!Form::close()!!}
                <hr>

                <h4>{{trans('admin.Stay_in_touch')}}</h4>

                <p class="social">
                    @if(setting('facebook'))

                        <a href="{{setting('facebook')}}" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    @endif
                        @if(setting('twitter'))

                        <a href="{{setting('twitter')}}" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    @endif
                        @if(setting('instagram'))

                        <a href="{{setting('instagram')}}" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                    @endif

                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">{{setting('copyright')}}.</p>

        </div>
        <div class="col-md-6">
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->




<!-- *** SCRIPTS TO INCLUDE ***

____________________________________________ -->
<script src="{{url('shop/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{url('shop/js/bootstrap.min.js')}}"></script>
<script src="{{url('shop/js/jquery.cookie.js')}}"></script>
<script src="{{url('shop/js/waypoints.min.js')}}"></script>
<script src="{{url('shop/js/modernizr.js')}}"></script>
<script src="{{url('shop/js/bootstrap-hover-dropdown.js')}}"></script>
<script src="{{url('shop/js/owl.carousel.min.js')}}"></script>
<script src="{{url('shop/js/front.js')}}"></script>
{!! NoCaptcha::renderJs() !!}

@stack('js')

</body>

</html>

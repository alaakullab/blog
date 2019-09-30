@extends('home.index')
@section('content')
    <!-- HOME -->
    <section id="home">
        <div class="row">

            <div class="owl-carousel owl-theme home-slider">

                @foreach(slider_home() as $slider)
                    <div class="item item-<?php if ($slider->id == 1) {
                        echo 'first';
                    } elseif ($slider->id == 2) {
                        echo 'second';
                    } elseif ($slider->id == 3) {
                        echo 'second';
                    }?>" style="background-image: url('storage/{{$slider->image_slider}}');">
                        <div class="caption">
                            <div class="container">
                                <div class="col-md-6 col-sm-12">
                                    @if(app('l') == 'en')
                                        <h1>{{$slider->title_en}}</h1>
                                        <h3>{{$slider->desc_en}}</h3>
                                    @else
                                        <h1>{{$slider->title_ar}}</h1>
                                        <h3>{{$slider->desc_ar}}</h3>
                                    @endif
                                    <a href="{{url('E-commerce')}}"
                                       class="section-btn btn btn-default smoothScroll">{{trans('admin.go_shop')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature">
        <div class="container">
            <div class="row">
                @foreach (Service_row() as $Service)

                    <div class="col-md-4 col-sm-4">
                        <div class="feature-thumb">
                            <span>0{{$Service->id}}</span>
                            @if(app('l') == 'en')
                                <h3>{{$Service->title_en}}</h3>
                                <p>{{$Service->desc_en}}.</p>
                            @else
                                <h3>{{$Service->title_ar}}</h3>
                                <p>{{$Service->desc_ar}}.</p>
                            @endif
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        @if(app('l') == 'en')
                            <h2>{{$HomeLogin->title_en}}</h2>
                        @else
                            <h2>{{$HomeLogin->title_ar}}</h2>

                        @endif

                        <figure>
                            <span><i class="fa fa-users"></i></span>
                            <figcaption>
                                @if(app('l') == 'en')
                                    <h3>{{$HomeLogin->name_title1_en}}</h3>
                                    <p class="homedescmenu">{{$HomeLogin->name_desc1_en}}.</p>
                                @else
                                    <h3>{{$HomeLogin->name_title1_ar}}</h3>
                                    <p class="homedescmenu">{{$HomeLogin->name_desc1_ar}}.</p>
                                @endif
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-certificate"></i></span>
                            <figcaption>
                                @if(app('l') == 'en')
                                    <h3>{{$HomeLogin->name_title2_en}}</h3>
                                    <p class="homedescmenu">{{$HomeLogin->name_desc2_en}}.</p>
                                @else
                                    <h3>{{$HomeLogin->name_title2_ar}}</h3>
                                    <p class="homedescmenu">{{$HomeLogin->name_desc2_ar}}.</p>
                                @endif
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-bar-chart-o"></i></span>
                            <figcaption>
                                @if(app('l') == 'en')
                                    <h3>{{$HomeLogin->name_title3_en}}</h3>
                                    <p class="homedescmenu">{{$HomeLogin->name_desc3_en}}.</p>
                                @else
                                    <h3>{{$HomeLogin->name_title3_ar}}</h3>
                                    <p class="homedescmenu">{{$HomeLogin->name_desc3_ar}}.</p>
                                @endif
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
                    @if (Auth::check())
                        <div class="entry-form">
                            <div class="">
                                <a class="avatar" href="#"><img
                                            style="width: 150px; border: 5px #4fbfa8 solid ; border-radius: 50%"
                                            src="{{ empty(Auth::user()->user_image) ? url('user_placeholder.png') : Storage::url(Auth::user()->user_image) }}"
                                            alt="Profile Image"></a>
                                <br/><br/>
                            </div>
                            <div>
                           <span>
                                <h2>{{empty(Auth::user()->First_Name.Auth::user()->Last_Name) ? Auth::user()->username : Auth::user()->First_Name .' '.Auth::user()->Last_Name }}</h2>
                                    <a href="{{ url('E-commerce/account') }}"><h3
                                                style="color:#4fbfa8;">{{ trans('admin.My_account') }}</h3></a>
                               <a style="color: white;" href="{{url('/E-commerce/logout')}}">Log out</a>
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="entry-form">
                            {!!Form::open(['url'=>url('user_post')])!!}
                            <h2>{{trans('admin.Sign_Up')}}</h2>
                            <input type="text" name="username" class="form-control"
                                   placeholder="{{trans('admin.username')}}" required="">

                            <input type="email" name="email" class="form-control" placeholder="{{trans('admin.email')}}"
                                   pattern="[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+"
                                   title="default@example.com"
                                   required="">

                            <input type="password" name="password" class="form-control"
                                   placeholder="{{trans('admin.password')}}" required=""
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

                            {{--                            <input type="password" name="password_confirmation" class="form-control"--}}
                            {{--                                   placeholder="{{trans('admin.password_confirmation')}}" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" >--}}

                            <button class="submit-btn form-control"
                                    id="form-submit">{{trans('admin.Sign_Up_sub')}}</button>

                            {!!Form::close()!!}
                            <span><a href="#" style="color:#4fbfa8;" data-toggle="modal"
                                     data-target="#login-modal">{{trans('admin.login')}}</a></span>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>


    <!-- TEAM -->
    <section id="team">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2 class="ce">{{trans('admin.team')}}
                            <small>@awt('View the team','en')</small>
                        </h2>
                    </div>
                </div>

                @foreach(User_Team() as $team )

                    <div class="col-md-3 col-sm-6">
                        <div class="team-thumb">
                            <div class="team-image">
                                @if($team->user_image)
                                    <a href="{{url('team/'.$team->username)}}">
                                        <img src="{{Storage::url($team->user_image)}}" class="img-responsive"
                                             alt="{{$team->First_Name.' '.$team->Last_Name }}" style="height: 263px;">
                                    </a>
                                @else
                                    <a href="{{url('team/'.$team->username)}}">
                                        <img src="{{url('user_placeholder.png')}}" class="img-responsive" alt=""
                                             style="height: 263px;">
                                    </a>
                                @endif
                            </div>
                            <div class="team-info">
                                <a href="{{url('team/'.$team->username)}}">
                                    <h3>{{$team->First_Name.' '.$team->Last_Name }}</h3>
                                </a>
                                <span></span>
                            </div>
                            <ul class="social-icon">
                                @if($team->Informations_users_team->facebook)
                                    <li><a href="{{$team->Informations_users_team->facebook}}" target="_blank"
                                           class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                @endif
                                @if($team->Informations_users_team->instagram)
                                    <li><a href="{{$team->Informations_users_team->instagram}}" target="_blank"
                                           class="fa fa-instagram"></a></li>
                                @endif
                                @if($team->Informations_users_team->twitter)
                                    <li><a href="{{$team->Informations_users_team->twitter}}" target="_blank"
                                           class="fa fa-twitter"></a></li>
                                @endif
                                @if($team->Informations_users_team->pinterest)
                                    <li><a href="{{$team->Informations_users_team->pinterest}}" target="_blank"
                                           class="fa fa-pinterest"></a></li>
                                @endif
                                @if($team->Informations_users_team->linkedin)
                                    <li><a href="{{$team->Informations_users_team->linkedin}}" target="_blank"
                                           class="fa fa-linkedin"></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>


    <!-- Courses -->
    <section id="courses">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2 class="ce">@awt('Other products','en')
                            <small>ِ@awt('The latest products are displayed from our store','en')</small>
                        </h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">
                        @foreach(Product_last5() as $last)
                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="courses-thumb">
                                        <div class="courses-top">
                                            <div class="courses-image">
                                                <?php
                                                $pr = Product_first($last->id);
                                                ?>
                                                @if($pr && $pr->full_path != null)
                                                    <img src="{{Storage::url($pr->full_path)}}"
                                                         class="img-responsive" alt="">
                                                @endif
                                            </div>
                                            <div class="courses-date display-none">
                                                <span> <i class="fa fa-calendar"></i> {{ $last->created_at->format('Y-m-d') }}</span>
                                                @if (date('Y-m-d',strtotime($last->created_at)) >= date('Y-m-d'))
                                                    <span> <i class="fa fa-clock-o"></i> {{ 24 - date('H',strtotime($last->created_at->format('h:i:sa')) - strtotime(date('h:i:sa'))) }} Hours </span>
                                                @endif
                                            </div>
                                        </div>
                                        <!--                                            --><?php //print_r($last); die(); ?>
                                        <div class="courses-detail">
                                            @if(app('l')=='en')
                                                <h3>
                                                    <a href="{{url('E-commerce/product/'.$last->id)}}">{{$last->product_name_en}}</a>
                                                </h3>
                                            @else
                                                <h3>
                                                    <a href="{{url('E-commerce/product/'.$last->id)}}">{{$last->product_name_ar}}</a>
                                                </h3>

                                            @endif
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>

                                        <div class="courses-info">
                                            <div class="courses-author">
                                                <img src="{{Storage::url($last->user->user_image)}}"
                                                     class="img-responsive" alt="">
                                                @if($last->user->First_Name ==null)

                                                    <span>{{$last->user->username}}</span>
                                                @else
                                                    <span>{{$last->user->First_Name .' '.$last->user->Last_Name }}</span>

                                                @endif
                                            </div>
                                            <div class="courses-price">
                                                <a href="{{url('E-commerce/product/'.$last->id)}}"><span>$ {{$last->price}}</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
    </section>


    <!-- TESTIMONIAL -->
    <section id="testimonial">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2 class="ce">@awt('Latest publications','ar')
                            <small>@awt('The last posts are displayed on her blog','ar')</small>
                        </h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-client">
                        @foreach(Post_last4() as $last)
                            <div class="col-md-4 col-sm-4">
                                <div class="item">
                                    <div class="tst-image">
                                        <img src="{{Storage::url($last->user->user_image)}}" class="img-responsive"
                                             alt="">
                                    </div>
                                    <div class="tst-author">
                                        @if($last->user->First_Name ==null)

                                            <h4>{{$last->user->username}}</h4>
                                        @else
                                            <h4>{{$last->user->First_Name .' '.$last->user->Last_Name }}</h4>

                                        @endif
                                        {{--                                    <span>Shopify Developer</span>--}}
                                    </div>
                                    @if(app('l') == 'en')
                                        <p>


                                            <a href="{{url('bloger/post/'.$last->id)}}">{!!$last->title_en!!}</a>
                                        </p>

                                    @else
                                        <p>
                                            <a href="{{url('bloger/post/'.$last->id)}}">{!!$last->title_ar!!}</a>

                                        </p>
                                    @endif
                                    {{--
                                                                    <div class="tst-rating">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                    --}}
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
    </section>


    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="section-title">
                        <h2>@awt('Contact us','ar')
                            <small>@awt('we love conversations. let us talk!','en')</small>
                        </h2>
                    </div>
                    {!!Form::open(['url'=>url('/Contact'),'method'=>'post','id'=>'contact-form','role'=>'form'])!!}
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group {{$errors->get('full_name') ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="{{trans('admin.enter_full_name')}}"
                                   name="full_name" id="full_name" type="text">
                            @if($errors->get('full_name') )
                                <span class="help-block">
{{ $errors->first('full_name') }} </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->get('email_contacts') ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="{{trans('admin.enter_email')}}" id="email"
                                   name="email_contacts" type="email">
                            @if($errors->get('email_contacts') )
                                <span class="help-block">
{{ $errors->first('email_contacts') }} </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->get('message') ? 'has-error' : '' }}">
                            <textarea id="message" rows="6" class="form-control"
                                      placeholder="{{trans('admin.enter_message')}}" name="message"></textarea>
                            @if($errors->get('message') )
                                <span class="help-block">
{{ $errors->first('message') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input type="submit" class="form-control" name="send message"
                               value="{{awtTrans('send message','en')}}">
                    </div>

                    <!-- /.row -->
                    {!!Form::close()!!}


                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="contact-image">
                        <img src="{{url('blog/-ltr/')}}/images/contact-image.jpg" class="img-responsive"
                             alt="Smiling Two Girls">
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop

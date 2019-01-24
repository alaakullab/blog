@extends('home.layouts.index')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/flaticon.css">
    <link href="{{url('draftsman/')}}/assets/css/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('draftsman/')}}/assets/css/responsive.css">
@endpush
@section('content')
    <div class="bodystyel">

        <!-- ========== ========== right side body start ========== ========== -->

        <div class="right-side-body container">
            <div style="float: right; margin: 10px 15px 15px 15px"></div>

            <div id="user" >
            <!-- ==================== main-slider-section start ==================== -->
                <section id="main_profile_section" class="main_profile_section mb-30 clearfix">

                    <div class="main_profile">

                        <div class="row">

                            <div class="col l6 m6 s12">
                                <div class="item_child_left left-align">
                                    <h2 class="hi">@awt('hello','ar').</h2>
                                    <p class="name">@awt('I am','ar') {{$user->First_Name.' '.$user->Last_Name}}</p>
                                    <small class="position mb-30">& @awt('I am a painter of paintings','ar').</small>

                                    <a href="#!viewprotfolio" class="custom-btn waves-effect waves-light">
                                        <i class="fa fa-image" aria-hidden="true"></i> view protfolio
                                    </a>
                                </div>
                                <!-- /.item-child-left -->
                            </div>
                            <!-- coll6 -->

                            <div class="col l6 m6 s12">
                                <div class="item_child_right">
                                    @if($user->user_image != null)
                                    <img src="{{Storage::url($user->user_image)}}" alt="" style="">
                                    @else
                                    <img src="{{url('draftsman')}}/assets/images/doctor.jpg" alt="">
                                    @endif
                                </div>
                                <!-- /.item-child-right -->
                            </div>
                            <!-- coll6 -->

                        </div>
                        <!-- row -->
                    </div>
                </section>
            <!-- ==================== main[-slider-section end ==================== -->

                <!-- ==================== aboutme-section start ==================== -->
                <div data-scroll='1' class="aboutme-section sec-p100-bg-bs mb-30 clearfix" id="about">
                    <div class="Section-title">
                        <h2>
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            @awt('about me','ar')
                            @if(Auth::check())
                                @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                                    <a href="javascript:;" data-toggle="modal" data-target="#about-modal" id="edit-aboutmy"  class="btn btn-icon-only btn-circle red">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endif
                            @endif
                        </h2>
                        <span>@awt('about me','en')</span>

                        <span>
                            @awt('about me','ar')
                        </span>
                        <p id="about_me" >
                            {{$user->Informations_users_de->about_me}}
                        </p>
                        @if(Auth::check())
                            @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                                @include('home.pages.draftsman.about-modal')
                            @endif
                        @endif
                    </div>
                    <!-- /.Section-title -->

                    <div class="personal-details-area">
                        <div class="row">
                            <div class="col l6 m6 s12">
                                <div class="personal-details-left">
                                    <img src="{{url('draftsman/')}}/assets/images/video.jpg" alt="Image">
                                    <a href="https://www.youtube.com/watch?v=Ie7gon15ESg" class="popup_video"><i
                                            class="fa fa-play"></i></a>
                                    <p>Watch My Story</p>
                                </div>
                                <!-- /.personal-details-left -->
                            </div>
                            <!-- colm6 -->

                            <div class="col l6 m6 s12">
                                <div class="personal-details-right">
                                    <h2 class="title">@awt('Personal Details','en')</h2>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="td-w25">@awt('Full Name','en')</td>
                                            <td class="td-w10">:</td>
                                            <td class="td-w65">
                                                {{ $user->First_Name.' '.$user->Last_Name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-w25">@awt('Address','en')</td>
                                            <td class="td-w10">:</td>
                                            <td class="td-w65" id="Address">
                                                {{$user->Informations_users_de->Address}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-w25">@awt('Gender','en')</td>
                                            <td class="td-w10">:</td>
                                            <td class="td-w65" id="Gender">
                                                {{$user->Informations_users_de->Gender}}
                                            </td>
                                        </tr>
                                        <form  method="POST" >

                                            <tr>
                                                <td class="td-w25">@awt('Phone','en')</td>
                                                <td class="td-w10">:</td>
                                                <td class="td-w65" id="Phone">
                                                    {{$user->Informations_users_de->Phone}}
                                                </td>
                                            </tr>
                                        </form>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.personal-details-right -->
                            </div>
                            <!-- colm6 -->
                        </div>
                        <!-- row -->
                    </div>
                    <!-- /.personal-details-area -->

                </div>
                <!-- /.aboutme-section -->

                <!-- ==================== my-skill-section start ==================== -->
                <div data-scroll='2' class="my-skill-section sec-p100-bg-bs mb-30 clearfix" id="skill">
                    <div class="Section-title">
                        <h2>
                            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                            My Skills
                            @if(Auth::check())
                                @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                                    <a href="javascript:;" data-toggle="modal" data-target="#myskills-modal"  class="btn btn-icon-only btn-circle red">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                @endif
                            @endif
                        </h2>
                        <span>My Skills</span>
                        {{--<p>--}}
                            {{--I am enthusiastic and dedicated towards providing a personalised and professional service. Compassion--}}
                            {{--and honesty: A good dentist is also honest and compassionate. Dental problems can affect many areas of a--}}
                            {{--person's life, and dentists need to be sensitive to the problems caused by poor dental health.--}}
                        {{--</p>--}}
                    </div>

                    <!-- /.Section-title -->

                    <div class="professional-skills-area">

                        <div id="graphicdesign">
                            <h2 class="title">Professional Skills</h2>

                            <div class="skill_progress">

                                <div class="row">
                                    @foreach($skills as $skill)
                                        <div class="col l6 m6 s12 {{ 'delete'.$skill->id.'id' }}">
                                        <div class="single_experties">
                                            <div class="skilled-tittle">{{$skill->name}}</div>
                                            <div class="progress">
                                                <div class="progress-bar jquery-bg wow Rx-width-{{$skill->level}} animated" role="progressbar"
                                                     data-wow-duration="1s" data-wow-delay=".15s" aria-valuenow="0"
                                                     aria-valuemin="0" aria-valuemax="{{$skill->level}}">
                                                    <span class="jquery-color">{{$skill->level}}%</span>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- /single_experties -->
                                    </div>
                                    @endforeach


                                    <!-- colm6 -->
                                <div class="dataskillslist"></div>
                                </div>
                                <!-- row -->

                            </div>
                            <!-- /.skill_progress -->
                        </div>

                    </div>

                    <!-- /.professional-skills-area -->

                    @if(Auth::check())
                        @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                            @include('home.pages.draftsman.myskills-modal')
                        @endif
                    @endif
                </div>

                <!-- /.my-skill-section -->
                <!-- ==================== my-skill-section end ==================== -->

                <!-- ==================== my-portfolio-section start ==================== -->

            @if(Auth::check()  &&  Auth::user()->Informations_users_de )
            <div data-scroll='4' class="my-portfolio-section sec-p100-bg-bs mb-30 clearfix" id="!viewprotfolio">

                <div class="Section-title">
                    <h2>
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        @awt('My work','ar')
                        @if(Auth::check())
                            @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                                           <a href="javascript:;" data-toggle="modal" data-target="#portfolio-modal"  class="btn btn-icon-only btn-circle red">
                              <i class="fa fa-edit"></i>
                              </a>
                            @endif
                        @endif
                    </h2>
                    @if(Auth::check())
                        @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                                @include('home.pages.draftsman.portfolio-modal')
                      @endif
                    @endif
                    <span>@awt('My work','ar')</span>
                    <p>
                        {{awtTrans('Here all painters works are displayed from art paintings.','ar')}}
                    </p>
                </div>
                <!-- /.Section-title -->
                <div class="portfolio-area">

                    <div id="filters" class="button-group">
                        <button class="button waves-effect default is-checked" data-filter="*">all</button>
                        {{--<button class="button waves-effect default" data-filter=".metal">Dental</button>--}}
                        @foreach($Post_draftsman as $post)
                            <button class="button waves-effect default" data-filter=".pho{{$post->id}}to">{{$post->title}}</button>
                        @endforeach
                    </div>
                    <div class="grid2">

                    @foreach($Post_draftsman as $post)
                            @foreach($post->file as $file)
                                <div class="element-item transition {{'pho'.$post->id.'to'}}  {{'portfolioimg'.$file->id}} " data-category="transition">
                                    <div class="ei-child">
                                        <img src="{{Storage::url($file->full_path)}}" alt="" >
                                        <a href="{{Storage::url($file->full_path)}}" class="more" >
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                    @endforeach
                    <!-- /.grid -->
                    </div>
                    <hr>
                    {{--<div class="pages" id="remove-row">--}}
                    {{--<button  class="custom-btn waves-effect waves-light" id="btn-more" data-id="{{ $post->id }}" >--}}
                        {{--<i class="fa fa-refresh" aria-hidden="true"></i> load more--}}
                    {{--</button>--}}
                    {{--</div>--}}
                </div>
                <!-- /.portfolio-area -->
            </div>
                @else
                    <div data-scroll='4' class="my-portfolio-section sec-p100-bg-bs mb-30 clearfix" id="portfolio" >

                        <div class="Section-title">
                            <h2>
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                @awt('My work','ar')
                            </h2>

                            <span>@awt('My work','ar')</span>
                            <p>
                                {{awtTrans('Here all painters works are displayed from art paintings.','ar')}}
                            </p>
                        </div>
                        <!-- /.Section-title -->
                        <div class="portfolio-area">

                            <div id="filters" class="button-group">
                                {{--<button class="button waves-effect default is-checked" data-filter="*">all</button>--}}
                                {{--<button class="button waves-effect default" data-filter=".metal">Dental</button>--}}
                                @foreach($Post_draftsman as $post)
                                    <button class="button waves-effect default" data-filter=".ph{{$post->title}}">{{$post->title}}</button>
                                @endforeach
                            </div>

                            @foreach($Post_draftsman as $post)
                                <div class="grid">
                                    @foreach(Post_draftsman($post->id) as $file)
                                        <div class="element-item transition {{'ph'.$post->title}}" data-category="transition">
                                            <div class="ei-child">
                                                <img src="{{Storage::url($file->full_path)}}" alt="" >
                                                <a href="{{Storage::url($file->full_path)}}" class="more">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                <hr>
                                <!-- /.grid -->
                            @endforeach

                            <a href="#!" class="custom-btn waves-effect waves-light">
                                <i class="fa fa-refresh" aria-hidden="true"></i> load more
                            </a>
                        </div>
                        <!-- /.portfolio-area -->
                    </div>
                @endif
            <!-- /.my-portfolio-section -->

            </div>

        </div>
        <!-- ========== ========== right side body end ========== ========== -->

    </div>
    @push('js')

        <!-- jquery and bootstrap.js -->
        {{--<script src="{{url('draftsman/')}}/assets/js/jquery-3.1.1.min.js"></script>--}}
        <script src="{{url('draftsman/')}}/assets/js/materialize.min.js"></script>
        <script src="{{url('draftsman/')}}/assets/js/owl.carousel.min.js"></script>
        <script src="{{url('draftsman/')}}/assets/js/isotope.pkgd.min.js"></script>
        <script src="{{url('draftsman/')}}/assets/js/circle-progress.js"></script>
        <!-- my custom js -->
        <script src="{{url('draftsman/')}}/assets/js/jquery.magnific-popup.js"></script>
        <script src="{{url('draftsman/')}}/assets/js/custom.js"></script>

    @endpush

@stop

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
        <div class="fixed-left-side-body " id="left-side-body">
            <div class="profile">
                <div class="profile-image center-align">
                    @if($user->user_image != null)

                        <img src="{{Storage::url($user->user_image)}}" alt="Image">
                    @else
                        <img src="{{url('draftsman')}}/assets/images/doctor.jpg" alt="Image">

                    @endif
                </div>
                <!-- /.profile-image -->

                <div class="profile-name center-align">
                    <h1 class="user-name">{{$user->First_Name . ' ' . $user->Last_Name}}</h1>
                    <p>
                        <span class="photoshop-color">@awt('Designer of art paintings','ar')</span>
                    </p>
                </div>
                <!-- /.profile-name -->

                <ul class="social-btn">
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-behance" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>

                <div class="discription clearfix">
                    <h2 class="title mb-30">@awt('about me','en')</h2>
                    <p>
                      {{$user->Informations_users_team->Address}}.


                    </p>
                </div>
                <!-- /.discription -->
                <div class="cv-btn">
                    <a href="#!" class="custom-btn waves-effect waves-light">
                    </a>
                </div>
            </div>
            <!-- /.profile -->
        </div>
<!-- ==================== main-slider-section start ==================== -->
<section id="main_profile_section" class="main_profile_section mb-30 clearfix">

    <div class="main_profile">

        <div class="row">

            <div class="col l6 m6 s12">
                <div class="item_child_left left-align">
                    <h2 class="hi">@awt('hello','ar').</h2>

                    <p class="name">@awt('I am','ar') {{$user->First_Name.' '.$user->Last_Name}}

                    </p>
                    <small class="position mb-30">& @awt('I am a member of the site team','en').</small>

                    {{-- <a href="#!" class="custom-btn waves-effect waves-light">
                        <i class="flaticon-tooth-1" aria-hidden="true"></i> view protfolio
                    </a> --}}
                </div>
                <!-- /.item-child-left -->
            </div>
            <!-- coll6 -->

            <div class="col l6 m6 s12">
                <div class="item_child_right">
                    @if($user->user_image != null)

                    <img src="{{Storage::url($user->user_image)}}" alt="Image">
                    @else
                    <img src="{{url('draftsman')}}/assets/images/doctor.jpg" alt="Image">

                    @endif

                </div>
                <!-- /.item-child-right -->
            </div>
            <!-- coll6 -->

        </div>
        <!-- row -->
    </div>


</section>
<!-- /.main-slider-section -->
<!-- ==================== main-slider-section end ==================== -->

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
        <p>
            {{$user->Informations_users_team->about_me}}
        </p>
        @if(Auth::check())
            @if(Auth::user()->Informations_users_de && Auth::user()->username == $user->username)
                @include('home.pages.team.about-modal')
            @endif
        @endif
    </div>
    <!-- /.Section-title -->

    <div class="personal-details-area">
        <div class="row">
            <div class="col l6 m6 s12">
                <div class="personal-details-left">
                    @if($user->user_image != null)

                    <img src="{{Storage::url($user->user_image)}}" alt="Image">
                    @else
                    <img src="{{url('draftsman')}}/assets/images/doctor.jpg" alt="Image">

                    @endif
                    <p>@awt('about me','ar')	</p>
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

</div>
            </div>
        </div>
<!-- /.aboutme-section -->
<!-- ==================== aboutme-section end ==================== -->
            </div>
@stop

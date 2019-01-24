@extends('home.index')

@section('content')
    <!-- HOME -->

    <div style=" background-color: #F2F2F2;">

            <!-- TEAM -->
            <section id="team" style=" padding: 40px 0 0px 0">

                <div class="container">

                    <div class="row">
                        <div class="thumbnail"
                             style="box-shadow: 0 1px 6px rgba(57,73,76,0.35); ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6" style="text-align: left">
                                        <div class="section-title2">
                                            <h2 class="ce">{{trans('admin.draftsmens')}}
                                                <small>View the draftsmen</small>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6" style=" margin-top: 20px; margin-bottom: 10px;">
                                        {!!Form::open(['url'=>url('draftsman/all'),'method'=>'get'])!!}
                                        <div class="form-group">
                                            <div  class="input-group ">

                                                <input type="text" class="form-control " name="search"
                                                       value="{{ old('search') }}"
                                                       placeholder="Search for ...">
                                                <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
      </span>
                                            </div><!-- /input-group -->
                                        </div>
                                        {!!Form::close()!!}
                                    </div>

                                </div>
                        </div>
                        </div>

                        @foreach($users as $user )
                            @if($user->hasRole('Draftsman'))
                            <div class="col-md-3 col-sm-6" >
                                <div class="team-thumb">
                                    <div class="team-image">
                                        @if($user->user_image)
                                            <a href="{{url('draftsman/'.$user->username.'/index/')}}">
                                            <img src="{{Storage::url($user->user_image)}}" class="img-responsive" alt="{{$user->First_Name.' '.$user->Last_Name }}" style="height: 263px;" >
                                            </a>
                                        @else
                                            <a href="{{url('draftsman/'.$user->username.'/index/')}}">
                                            <img src="{{url('blog/-ltr/')}}/images/author-image3.jpg" class="img-responsive" alt="{{$user->First_Name.' '.$user->Last_Name }}" style="height: 263px;" >
                                            </a>
                                        @endif
                                    </div>
                                    <div class="team-info">
                                        <a href="{{url('draftsman/'.$user->username.'/index/')}}">
                                            <h3>{{$user->First_Name.' '.$user->Last_Name }}</h3>
                                        </a>
                                        <span></span>
                                    </div>
                                    <ul class="social-icon">
                                        @if($user->Informations_users_de->facebook)
                                            <li><a href="{{$user->Informations_users_de->facebook}}" target="_blank" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                        @endif
                                        @if($user->Informations_users_de->instagram)
                                            <li><a href="{{$user->Informations_users_de->instagram}}" target="_blank" class="fa fa-instagram"></a></li>
                                        @endif
                                        @if($user->Informations_users_de->twitter)
                                            <li><a href="{{$user->Informations_users_de->twitter}}" target="_blank" class="fa fa-twitter"></a></li>
                                        @endif
                                        @if($user->Informations_users_de->pinterest)
                                            <li><a href="{{$user->Informations_users_de->pinterest}}" target="_blank" class="fa fa-pinterest"></a></li>
                                        @endif
                                        @if($user->Informations_users_de->linkedin)
                                            <li><a href="{{$user->Informations_users_de->linkedin}}" target="_blank" class="fa fa-linkedin"></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @endforeach

                </div>
                    <div class="pager">
                        {!! $users->links() !!}
                    </div>
                </div>
            </section>


    </div>

@stop

<div class="modal fade" id="about-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">@awt('Updating data','en')</h4>
            </div>
            <div class="modal-body">
                <div id="aboutsuccess"></div>
                {{--'url'=>url('/draftsman/about'--}}
                {!! Form::open(['id'=>'formabout-modal','method'=>'post']) !!}

                <input type="hidden" class="dataUrl" value="{{ route('draftsman.about')}}">

                <div class="form-group {{$errors->get('Address') ? 'has-error' : '' }}">
                    <label>{{awtTrans('Address','ar')}}</label>
                    <input type="text" class="form-control" name="Address" id="Address" value="{{$user->Informations_users_de->Address}}"  placeholder="{{awtTrans('Address','ar')}}">
                </div>

                <div class="form-group {{$errors->get('Gender') ? 'has-error' : '' }}">
                    <label for="company">{{ trans('admin.Gender') }}</label>
                    <select class="form-control" id="state" name="Gender">
                        <option
                            value="male"  {{Auth::user()->Informations_users_de->Gender  =='male' ? 'selected' :''}}>{{ trans('admin.Male') }}</option>
                        <option
                            value="female" {{Auth::user()->Informations_users_de->Gender =='female' ? 'selected' :''}}>{{ trans('admin.female') }}</option>
                    </select>
                </div>
                <div class="form-group {{$errors->get('Phone') ? 'has-error' : '' }}">
                    <label for="company">{{ trans('admin.Phone') }}</label>
                    <input class="form-control" name="Phone" value="{{Auth::user()->Informations_users_de->Phone}}"
                           id="firstname" type="text">
                </div>
                <div class="form-group">
                    <label>{{awtTrans('about me','ar')}}</label>
                    {!! Form::textarea('about_me',$user->Informations_users_de->about_me,['class'=>'form-control ckeditor','rows'=>'6','placeholder'=>awtTrans('about me','ar')]) !!}
                </div>
                <p class="text-center">
                    <button type="submit" class="btn btn-primary" data-url="{{ route('draftsman.about')}}" ><i class="fa fa-edit"></i> @awt('Updating data','en')</button>
                </p>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

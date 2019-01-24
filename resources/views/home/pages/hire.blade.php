@extends('home.index')

@section('content')
    <!-- HOME -->

    <div style=" background-color: #F2F2F2;">
        <section id="hire" style=" padding: 30px 0 0px 0;">

            <div class="container">

                <div class="thumbnail"
                     style="box-shadow: 0 1px 6px rgba(57,73,76,0.35); padding: 20px 30px;">
                    <div class="row">
                        <div class="col-md-12 col-sm-10 ">
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-10">
                                        {!!Form::open(['url'=>url('hire'),'method'=>'get'])!!}
                                        <div class="input-group">
                                            <input type="text" class="form-control " name="search"
                                                   value="{{ old('search') }}"
                                        placeholder="{{awTtrans('Search for','en')}}...">
                                            <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
      </span>
                                        </div><!-- /input-group -->
                                        {!!Form::close()!!}
                                    </div>
                                    <div class="col-md-2">
                                            @if(Auth::check())
                                            <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btnaddhire btn-default "
                                                            data-toggle="collapse"
                                                            data-target="#addhire" ><i
                                                            class="fa fa-plus-circle"></i>
                                                        @awt('Add Hire','en')
                                                    </button>
                                                </div>
                                            @else
                                            <div class="btn-group">
                                 <a href="#" class="btn btnaddhire btn-default " data-toggle="modal" data-target="#login-modal">

                                        <i  class="fa fa-plus-circle"></i>
                                        @awt('Add Hire','en')

                                 </a>

                                                </div>
                                            @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-10 col-sm-10 col-sm-offset-0">
                            <div id="addhire" class="collapse">

                                <div class="section-title">
                                    <h2>@awt('hire','en')
                                        <small>{{awTtrans('Request Form Plate','en')}}</small>
                                    </h2>
                                </div>

                                {!!Form::open(['url'=>url('hire/create'),'files'=>true,'method'=>'post'])!!}
                                <div
                                    class="form-group {{$errors->get('title') ? 'has-error' : '' }} ">

                                    <label
                                        for="exampleFormControlInput1">  {{trans('admin.title')}}</label>
                                    <input type="text" name="title" value="{{old('title')}}"
                                           class="form-control "
                                           id="exampleFormControlInput1"
                                           placeholder="{{trans('admin.title')}}">
                                    @if($errors->get('title') )
                                        <span class="help-block">
                                           {{ $errors->first('title') }} </span>
                                    @endif
                                </div>
                                <div
                                    class="form-group {{$errors->get('description') ? 'has-error' : '' }}">
                                    <label
                                        for="exampleFormControlTextarea1">{{trans('admin.desc')}}</label>
                                    <textarea class="form-control ckeditor"
                                              value="{{old('description')}}"
                                              id="exampleFormControlTextarea1"
                                              name="description"
                                              rows="5"></textarea>
                                    @if($errors->get('description') )
                                        <span class="help-block">
                                           {{ $errors->first('description') }} </span>
                                    @endif
                                </div>
                                <div
                                    class="form-group  {{$errors->get('file') ? 'has-error' : '' }}">
                                    <label
                                        for="exampleFormControlFile1">{{trans('admin.Uimage')}}</label>
                                    <input type="file" name="file" class="form-control-fil"
                                           id="exampleFormControlFile1">
                                    @if($errors->get('file') )
                                        <span class="help-block">
                                           {{ $errors->first('file') }} </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-info">{{trans('admin.send')}}</button>
                                </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section id="hire" style=" padding: 0 0 100px 0;">

            <div class="container">

                <div class="thumbnail"
                     style="box-shadow: 0 1px 6px rgba(57,73,76,0.35); padding: 20px 30px;">
                    @foreach ($hires as $hire)
                        <hr/>
                        <div class="row">
                            <div class="col-md-12" style=" padding: 20px 0px 0px 0px ">
                                <div class="item">
                                    <div class="col-md-2">
                                        <div class=""
                                             style=" display: inline-block; vertical-align: middle; margin-bottom: 20px; text-align: left;">
                                            <a href="{{url('hire/post/'.$hire->id)}}">
                                                @if(!$hire->file)
                                                <img class="img-responsive"
                                                     style="width: 180px !important;"
                                                     src="http://www.revista-gadget.es/wp-content/uploads/2016/09/03%C3%87.jpg"
                                                     alt="...">
                                                @else
                                                <img class="img-responsive"
                                                     style="width: 180px !important;"
                                                     src="{{ Storage::url($hire->file) }} "
                                                     alt="...">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="tst-author  ">
                                            <h4 class="job-title m-0-top m-sm-bottom">
                                                <a href="{{url('hire/post/'.$hire->id)}}">{{ $hire->title  }}</a>
                                            </h4>
                                            <div>
                                                    <span><small class="display-inline-block m-md-right">
                                                        <span>
                                                    <time>{{$hire->created_at->toDayDateTimeString()}}</time>
                                                        </span>
                                                        </small>
                                                        </span>
                                            </div>
                                            <span>{!! str_limit($hire->description, 300) !!}</span>
                                            </span>
                                            </span>
                                            <div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pager">
                        {!! $hires->links() !!}
                    </div>
                </div>

            </div>
        </section>

    </div>
    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '.ckeditor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush
@stop

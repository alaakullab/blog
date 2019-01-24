@extends('admin.index')
@section('content')
    <input type="hidden" id="btnlang" value="{{ app("l") }}"  />
    <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a href="{{aurl('post')}}"
                           class="btn btn-circle btn-icon-only btn-default"
                           tooltip="{{trans('admin.show_all')}}"
                           title="{{trans('admin.show_all')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen"
                           href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>

                </div>

                <div class="portlet-body form">
                    <div class="col-md-12">

                            {!! Form::open(['url'=>aurl('/post'),'id'=>'post','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div id="post_en">
                            <div class="form-group">
                                {!! Form::label('title_en',trans('admin.title_en'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('title_en',old('title_en'),['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                {!! Form::label('content_en',trans('admin.content_en'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('content_en',old('content_en'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.content_en')]) !!}
                                </div>
                            </div>

                        </div>

                        <div id="post_ar">
                            <br>
                            <div class="form-group">
                                {!! Form::label('title_ar',trans('admin.title_ar'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::text('title_ar',old('title_ar'),['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                {!! Form::label('content_ar',trans('admin.content_ar'),['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('content_ar',old('content_ar'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.content_ar')]) !!}
                                </div>
                            </div>
                        </div>
                        <br>
                                            <div class="form-group">
                                        <div class="col-md-offset-3 col-md-9">

                    <a href="javascript:;" id="hideshowpostform" class="btn btn-sm btn-primary">
                                                <i class="fa fa-language fa-lg "></i> {{trans('admin.Writing_in_another_language')}}
                                            </a>
                                            <br>
                                            <br>
                        </div>
                        </div>

                        <br>
                        <div class="form-group">
                            {!! Form::label('keyword',trans('admin.keyword'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('keyword',old('keyword'),['class'=>'form-control ckeditor','id'=>'tags','placeholder'=>trans('admin.keyword')]) !!}
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            {!! Form::label('status',trans('admin.status'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <input type="checkbox" checked class="make-switch" name="status" data-size="small"
                                       placeholder="{{trans('admin.status')}}">

                                {{--  {!! Form::checkbox('status',old('status'),['class'=>'make-switch','checked','placeholder'=>trans('admin.status'),'data-size'=>'small']) !!} --}}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('tag_id',trans('admin.tag_id'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::select('tag_id',App\Tag::pluck('name_'.app('l'),'id'),old('tag_id'),['class'=>'form-control','placeholder'=>trans('admin.tag_id_enter')]) !!}
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <br/>
                            {!! Form::label('image_post',trans('admin.image_post'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('image_post', old('image_post'),['class'=>'form-control','placeholder'=>trans('admin.image_post')]) !!}
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <br/>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop


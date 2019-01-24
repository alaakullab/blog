@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <div class="col-md-12">

                        {!! Form::open(['url'=>aurl('/partner/'.partner()->id),'method'=>'put','id'=>'partner','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="form-group">
                            {!! Form::label('title_ar',trans('admin.title_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('title_ar', partner()->title_ar ,['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title_en',trans('admin.title_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('title_en', partner()->title_en ,['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('desc_ar',trans('admin.desc_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('desc_ar',   partner()->desc_ar,['class'=>'form-control ckeditor','placeholder'=>trans('admin.desc_ar')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('desc_en',trans('admin.desc_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('desc_en',	partner()->desc_en,['class'=>'form-control ckeditor','placeholder'=>trans('admin.desc_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('image',trans('admin.image'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('image',old('image'),['class'=>'form-control','placeholder'=>trans('admin.image')]) !!}
                                @if(setting()->image != null)
                                    <br>
                                    <img src="{{ Storage::url( setting()->image ) }}" width="30px"><a
                                        href="{{aurl('setting/image')}}"
                                        class="btn btn-default btn-outlines btn-circle"><i
                                            class="fa fa-trash"></i>{{trans('admin.delete_image')}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-success']) !!}
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


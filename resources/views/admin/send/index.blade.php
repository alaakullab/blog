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

                    {!! Form::open(['url'=>aurl('/send'),'method'=>'post','class'=>'form-horizontal form-row-seperated']) !!}
                    <div class="form-group">
                        {!! Form::label('title',trans('admin.title'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>trans('admin.title')]) !!}
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        {!! Form::label('send_to',trans('admin.send_to'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('email',old('email'),['class'=>'form-control','placeholder'=>trans('admin.send_to')]) !!}
                               <span class="help-block">
@awt('اترك هذا الحقل فارغ للارسال لجميع الايميلات','en') . </span>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        {!! Form::label('desc',trans('admin.desc'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('desc',old('desc'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.desc'),'id'=>'ckeditor']) !!}
                        </div>
                    </div>




                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit(trans('admin.send'),['class'=>'btn btn-success']) !!}
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


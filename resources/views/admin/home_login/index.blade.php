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

                        {!! Form::open(['url'=>aurl('/home_login/'.$home->id),'method'=>'put','id'=>'partner','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="form-group">
                            {!! Form::label('title_ar',trans('admin.title_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('title_ar', $home->title_ar ,['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title_en',trans('admin.title_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('title_en', $home->title_en ,['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-3 control-label" > <i class="fa fa-users"></i>{{trans('admin.title_ar')}} </label>
                            {{-- {!! Form::label('name_title1_en',,['class'=>'']) !!} --}}
                            <div class="col-md-9">
                                {!! Form::text('name_title1_en', $home->name_title1_en ,['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-users"></i>{{trans('admin.title_en')}} </label>

                            <div class="col-md-9">
                                {!! Form::text('name_title1_ar', $home->name_title1_ar ,['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-users"></i>{{trans('admin.desc_ar')}} </label>

                            <div class="col-md-9">
                                {!! Form::textarea('name_desc1_en',   $home->name_desc1_en,['rows'=>'3','class'=>'form-control ','placeholder'=>trans('admin.desc_ar')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-users"></i>{{trans('admin.desc_en')}} </label>

                            <div class="col-md-9">
                                {!! Form::textarea('name_desc1_ar',	$home->name_desc1_ar,['rows'=>'3','class'=>'form-control ','placeholder'=>trans('admin.desc_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-certificate"></i>{{trans('admin.title_ar')}} </label>

                            <div class="col-md-9">
                                {!! Form::text('name_title2_en', $home->name_title2_en ,['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-certificate"></i>{{trans('admin.title_en')}} </label>

                            <div class="col-md-9">
                                {!! Form::text('name_title2_ar', $home->name_title2_ar ,['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-certificate"></i>{{trans('admin.desc_ar')}} </label>

                            <div class="col-md-9">
                                {!! Form::textarea('name_desc2_en',   $home->name_desc2_en,['rows'=>'3','class'=>'form-control ','placeholder'=>trans('admin.desc_ar')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-certificate"></i>{{trans('admin.desc_en')}} </label>

                            <div class="col-md-9">
                                {!! Form::textarea('name_desc2_ar',	$home->name_desc2_ar,['rows'=>'3','class'=>'form-control ','placeholder'=>trans('admin.desc_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-bar-chart-o"></i>{{trans('admin.title_ar')}} </label>

                            <div class="col-md-9">
                                {!! Form::text('name_title3_en', $home->name_title3_en ,['class'=>'form-control','placeholder'=>trans('admin.title_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-bar-chart-o"></i>{{trans('admin.title_en')}} </label>

                            <div class="col-md-9">
                                {!! Form::text('name_title3_ar', $home->name_title3_ar ,['class'=>'form-control','placeholder'=>trans('admin.title_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-bar-chart-o"></i>{{trans('admin.desc_ar')}} </label>

                            <div class="col-md-9">
                                {!! Form::textarea('name_desc3_en',   $home->name_desc3_en,['rows'=>'3','class'=>'form-control ','placeholder'=>trans('admin.desc_ar')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                                <label class="col-md-3 control-label" > <i class="fa fa-bar-chart-o"></i>{{trans('admin.desc_en')}} </label>

                            <div class="col-md-9">
                                {!! Form::textarea('name_desc3_ar',	$home->name_desc1_ar,[ 'rows'=>'3','class'=>'form-control ','placeholder'=>trans('admin.desc_en')]) !!}
                            </div>
                        </div>
                        <br>

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

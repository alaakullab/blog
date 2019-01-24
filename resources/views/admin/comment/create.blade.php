@extends('admin.index')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="widget-extra body-req portlet light bordered">
				<div class="portlet-title">
						<div class="caption">
								<span class="caption-subject bold uppercase font-dark">{{$title}}</span>
						</div>
						<div class="actions">
								<a  href="{{aurl('comment')}}"
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
								
{!! Form::open(['url'=>aurl('/comment'),'id'=>'comment','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('content',trans('admin.content'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content',old('content'),['class'=>'form-control','placeholder'=>trans('admin.content')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('status',trans('admin.status'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('status',old('status'),['class'=>'form-control','placeholder'=>trans('admin.status')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('author',trans('admin.author'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('author',old('author'),['class'=>'form-control','placeholder'=>trans('admin.author')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('url',trans('admin.url'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('url',old('url'),['class'=>'form-control','placeholder'=>trans('admin.url')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('post_id',trans('admin.post_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('post_id',old('post_id'),['class'=>'form-control','placeholder'=>trans('admin.post_id')]) !!}
    </div>
</div>

<div class="form-actions">
    <div class="row">
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
	

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
								<a  href="{{aurl('user')}}"
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

{!! Form::open(['url'=>aurl('/user'),'id'=>'user','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('username',trans('admin.username'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('username',old('username'),['class'=>'form-control','placeholder'=>trans('admin.username')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('First_Name',trans('admin.First_Name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('First_Name',old('First_Name'),['class'=>'form-control','placeholder'=>trans('admin.First_Name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('Last_Name',trans('admin.Last_Name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('Last_Name',old('Last_Name'),['class'=>'form-control','placeholder'=>trans('admin.Last_Name')]) !!}
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
    {!! Form::label('password',trans('admin.password'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">

    												<div class="form-group last password-strength">

											<input type="password" class="form-control" name="password" id="password_strength" value="{{old('password')}}" placeholder="{{trans('admin.password')}}">

										</div>
        {{-- {!! Form::password('password',old('password'),['class'=>'form-control','placeholder'=>trans('admin.password')]) !!} --}}
    </div>
</div>
<br>

<div class="form-group">
		{!! Form::label('role',trans('admin.role'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('role',App\Role::pluck('name','name'),old('role'),['class'=>'form-control','placeholder'=>trans('admin.role_enter')]) !!}
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


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
<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('user/create')}}"
data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.user')}}">
<i class="fa fa-plus"></i>
</a>
<span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.user')}}">
<a data-toggle="modal" data-target="#myModal{{$user->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
<i class="fa fa-trash"></i>
</a>
</span>
<div class="modal fade" id="myModal{{$user->id}}">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close" data-dismiss="modal">x</button>
<h4 class="modal-title">{{trans('{lang}.delete')}}؟</h4>
</div>
<div class="modal-body">
<i class="fa fa-exclamation-triangle"></i>   {{trans('{lang}.ask_del')}} {{trans('{lang}.id')}} ({{$user->id}}) ؟
</div>
<div class="modal-footer">
{!! Form::open([
'method' => 'DELETE',
'route' => ['user.destroy', $user->id]
]) !!}
{!! Form::submit(trans('{lang}.approval'), ['class' => 'btn btn-danger']) !!}
<a class="btn btn-default" data-dismiss="modal">{{trans('{lang}.cancel')}}</a>
{!! Form::close() !!}
</div>
</div>
</div>
</div>
<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('user')}}"
data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.user')}}">
<i class="fa fa-list"></i>
</a>
<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
data-original-title="{{trans('{lang}.fullscreen')}}"
title="{{trans('{lang}.fullscreen')}}">
</a>
</div>
</div>
<div class="portlet-body form">
<div class="col-md-12">

{!! Form::open(['url'=>aurl('/user/'.$user->id),'method'=>'put','id'=>'user','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('username',trans('admin.username'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('username',$user->username,['class'=>'form-control','placeholder'=>trans('admin.username')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('First_Name',trans('admin.First_Name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('First_Name',$user->First_Name,['class'=>'form-control','placeholder'=>trans('admin.First_Name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('Last_Name',trans('admin.Last_Name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('Last_Name',$user->Last_Name,['class'=>'form-control','placeholder'=>trans('admin.Last_Name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
{!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
<div class="col-md-9">
{!! Form::email('email', $user->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
</div>
</div>
<br><div class="form-group">
{!! Form::label('password',trans('admin.password'),['class'=>'col-md-3 control-label']) !!}
<div class="col-md-9">
<input type="password" class="form-control" min="6" name="password" id="password_strength"  placeholder="{{trans('admin.password')}}">
{{--
{!! Form::text('password', $user->password ,['class'=>'form-control','placeholder'=>trans('admin.password')]) !!} --}}
</div>
</div>
<br>
<?php
if ($user->hasRole('User')) {
	$u = 'User';
} elseif ($user->hasRole('Editor')) {

	$u = 'Editor';
} elseif ($user->hasRole('Draftsman')) {
	$u = 'Draftsman';
}

?>
<div class="form-group">
{!! Form::label('role',trans('admin.role'),['class'=>'col-md-3 control-label']) !!}
<div class="col-md-9">
{!! Form::select('role',App\Role::pluck('name','name'), $u ,['class'=>'form-control','placeholder'=>trans('admin.role_enter'),'required']) !!}
</div>
</div>
<br>
<div class="form-group">
{!! Form::label('add_teams',trans('admin.add_teams'),['class'=>'col-md-3 control-label']) !!}
<div class="col-md-9">
<?php if ($user->teams == 'yes') {
	?>
<input type="checkbox" checked class="make-switch" name="teams" data-size="small" placeholder ="{{trans('admin.add_teams')}}">
<?php } else {?>
<input type="checkbox"  class="make-switch" name="teams" data-size="small" placeholder ="{{trans('admin.add_teams')}}">
<?php }?>


{{--  {!! Form::checkbox('status',old('status'),['class'=>'make-switch','checked','placeholder'=>trans('admin.status'),'data-size'=>'small']) !!} --}}
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

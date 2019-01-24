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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('comment/create')}}"
												data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.comment')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.comment')}}">
												<a data-toggle="modal" data-target="#myModal{{$comment->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$comment->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('{lang}.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('{lang}.ask_del')}} {{trans('{lang}.id')}} ({{$comment->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['comment.destroy', $comment->id]
																		]) !!}
																		{!! Form::submit(trans('{lang}.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('{lang}.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('comment')}}"
												data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.comment')}}">
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
										
{!! Form::open(['url'=>aurl('/comment/'.$comment->id),'method'=>'put','id'=>'comment','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('content',trans('admin.content'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content', $comment->content ,['class'=>'form-control','placeholder'=>trans('admin.content')]) !!}
    </div>
</div>
<br>
<div class="form-group">
	{!! Form::label('status',trans('admin.status'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
			<?php if($comment->status == 'yes'){
				?>
	   <input type="checkbox" checked class="make-switch" name="status" data-size="small" placeholder ="{{trans('admin.status')}}">
			<?php }else{ ?>
	   <input type="checkbox"  class="make-switch" name="status" data-size="small" placeholder ="{{trans('admin.status')}}">
	<?php } ?>
	</div>
  
</div>
<br>
<div class="form-group">
    {!! Form::label('author',trans('admin.author'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('author', $comment->author ,['class'=>'form-control','placeholder'=>trans('admin.author')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email', $comment->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('url',trans('admin.url'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('url', $comment->url ,['class'=>'form-control','placeholder'=>trans('admin.url')]) !!}
    </div>
</div>

        {!! Form::hidden('post_id', $comment->post_id ,['class'=>'form-control','placeholder'=>trans('admin.post_id')]) !!}


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
		

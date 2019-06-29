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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('post/create')}}"
                           data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.post')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        <span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.post')}}">
<a data-toggle="modal" data-target="#myModal{{$post->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
<i class="fa fa-trash"></i>
</a>
</span>
                        <div class="modal fade" id="myModal{{$post->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{trans('{lang}.delete')}}؟</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-exclamation-triangle"></i> {{trans('{lang}.ask_del')}} {{trans('{lang}.id')}}
                                        ({{$post->id}}) ؟
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['post.destroy', $post->id]
                                        ]) !!}
                                        {!! Form::submit(trans('{lang}.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('{lang}.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('post')}}"
                           data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.post')}}">
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

                        {!! Form::open(['url'=>aurl('/post/'.$post->id),'method'=>'put','id'=>'post','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="form-group">
                            {!! Form::label('tilte_en',trans('admin.title_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('title_en', $post->title_en ,['class'=>'form-control','placeholder'=>trans('admin.tilte_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('content_en',trans('admin.content_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('content_en', $post->content_en ,['class'=>'form-control ckeditor','placeholder'=>trans('admin.content_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('title_ar',trans('admin.title_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('title_ar', $post->title_ar ,['class'=>'form-control','placeholder'=>trans('admin.tilte_ar')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('content_ar',trans('admin.content_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('content_ar', $post->content_ar ,['class'=>'form-control ckeditor','placeholder'=>trans('admin.content_ar')]) !!}
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

                        <div class="form-group">
                            {!! Form::label('status',trans('admin.status'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                @if($post->status == 'yes')

                                    <input type="checkbox" checked class="make-switch" name="status" data-size="small"
                                           placeholder="{{trans('admin.status')}}">
                                @else

                                    <input type="checkbox" class="make-switch" name="status" data-size="small"
                                           placeholder="{{trans('admin.status')}}">

                                @endif

                                {{--  {!! Form::checkbox('status',old('status'),['class'=>'make-switch','checked','placeholder'=>trans('admin.status'),'data-size'=>'small']) !!} --}}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('tag_id',trans('admin.tag_id'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::select('tag_id',App\Tag::pluck('name_'.app('l'),"id"), $post->tag_id ,['class'=>'form-control','placeholder'=>trans('admin.tag_id')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('image_post',trans('admin.image_post'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('image_post',old('image_post'),['class'=>'form-control','placeholder'=>trans('admin.image_post')]) !!}
                                @if($post->image_post != null)
                                    <br>
                                    <img src="{{ Storage::url( $post->image_post ) }}" width="50px"><a
                                            href="{{aurl('post/image_post/'.$post->id)}}"
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


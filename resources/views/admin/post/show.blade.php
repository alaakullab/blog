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
                           data-toggle="tooltip" title="{{trans('admin.post')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.post')}}">

                        <a data-toggle="modal" data-target="#myModal{{$post->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$post->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['post.destroy', $post->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/post')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.post')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>
                </div>
            <div class="portlet-body form">
				<div class="col-md-12">
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$post->id}}
</div>
<div class="clearfix"></div>
<hr />


@if(app('l') == 'en')
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.title_en')}} :</b>
 {!! $post->title_en !!}
</div>
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.content_en')}} :</b>
 {!! $post->content_en !!}
</div>
@else
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.title_ar')}} :</b>
 {!! $post->title_ar !!}
</div>



<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.content_ar')}} :</b>
 {!! $post->content_ar !!}
</div>

@endif

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.status')}} :</b>
 {!! $post->status !!}
</div>








<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.user_id')}} :</b>
@if(App\User::find($post->user_id)->First_Name)
 {{ App\User::find($post->user_id)->First_Name.' '.App\User::find($post->user_id)->First_Name }}

@else
 {{ App\User::find($post->user_id)->username }}

@endif
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.tag_id')}} :</b>
@if(app('l') == 'en')
  {{ App\Tag::find($post->tag_id)->name_en }}

@else
  {{ App\Tag::find($post->tag_id)->name_ar }}

@endif

</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop
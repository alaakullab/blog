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
                       




                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/service')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.service')}}">
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
<b>{{trans('admin.id')}} :</b> {{$service->id}}
</div>
<div class="clearfix"></div>
<hr />




<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.title_ar')}} :</b>
 {!! $service->title_ar !!}
</div>
<div class="clearfix"></div>
<hr />
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.title_en')}} :</b>
 {!! $service->title_en !!}
</div>
<div class="clearfix"></div>
<hr />
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.desc_en')}} :</b>
 {!! $service->desc_ar !!}
</div>
<div class="clearfix"></div>
<hr />
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.desc_en')}} :</b>
 {!! $service->desc_en !!}
</div>
			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop
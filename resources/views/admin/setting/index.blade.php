@extends('admin.index')
	@section('content')
		@push('css')
<link rel="stylesheet" type="text/css" href="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css">
		@endpush
		@push('js')
<script type="text/javascript" src="{{url('design/admin_panel')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
		@endpush
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

{!! Form::open(['url'=>aurl('/setting'),'method'=>'post','id'=>'setting','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('site_name_en',trans('admin.site_name_en'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('site_name_en', $setting->site_name_en ,['class'=>'form-control','placeholder'=>trans('admin.site_name_en')]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('site_name_ar',trans('admin.site_name_ar'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('site_name_ar', $setting->site_name_ar ,['class'=>'form-control','placeholder'=>trans('admin.site_name_ar')]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('logo',trans('admin.logo'),['class'=>'col-md-3 control-label']) !!}

    <div class="col-md-9">
			<div class="fileinput {{setting()->logo ? 'fileinput-exists' : 'fileinput-new'}}" data-provides="fileinput">
														<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
															@if(!setting()->logo)

																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">



														@endif
														</div>
														<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															@if(setting()->logo)

															<img src="{{ Storage::url( setting()->logo ) }}" alt="">

														@endif
														</div>
														<div>
															<span class="btn default btn-file">
															<span class="fileinput-new">
															@awt('Select image','ar') </span>
															<span class="fileinput-exists">
															@awt('Change','ar') </span>
															<input type="file" name="logo">
															</span>
															@if(setting()->logo != null)

													            <a href="{{aurl('setting/logo')}}" class="btn red fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i>	@awt('Remove','en')</a>
													    @else
															<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i>
															@awt('Remove','en') </a>
															 @endif
														</div>
													</div>
        {{-- {!! Form::file('logo',old('logo'),['class'=>'form-control','placeholder'=>trans('admin.logo')]) !!} --}}
   {{-- @if(setting()->logo != null)
   <br>
           <img src="{{ Storage::url( setting()->logo ) }}" width="30px"><a href="{{aurl('setting/logo')}}" class="btn red fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i>{{trans('admin.delete_image')}}</a>
    @endif  --}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('icon',trans('admin.icon'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
			<div class="fileinput {{setting()->icon ? 'fileinput-exists' : 'fileinput-new'}} " data-provides="fileinput">
														<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
															@if(!setting()->icon)
															<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">

														@endif
														</div>
														<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															@if(setting()->icon)

															<img src="{{ Storage::url( setting()->icon ) }}" alt="">

														@endif
														</div>
														<div>
															<span class="btn default btn-file">
															<span class="fileinput-new">
															@awt('Select image','ar') </span>
															<span class="fileinput-exists">
															@awt('Change','ar') </span>
															<input type="file" name="icon">
															</span>
															@if(setting()->icon != null)
													
													<a href="{{aurl('setting/icon')}}" class="btn red fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i>	@awt('Remove','en')</a>
													@else
															<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
															<i class="fa fa-trash"></i>@awt('Remove','en') </a>
															@endif
														</div>
													</div>
        {{-- {!! Form::file('icon',old('icon'),['class'=>'form-control','placeholder'=>trans('admin.icon')]) !!}
          @if(setting()->icon != null)
        <br>
        <img src="{{ Storage::url( setting()->icon ) }}" width="30px"><a href="{{aurl('setting/icon')}}" class="btn btn-default btn-outlines btn-circle"><i class="fa fa-trash"></i>	@awt('Remove','en')</a>
        @endif --}}
    </div>
</div>
<br>
 <div class="form-group">
    {!! Form::label('site_desc_en',trans('admin.site_desc_en'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('site_desc_en',	$setting->site_desc_en,['class'=>'form-control ckeditor','id'=>'ckeditor','placeholder'=>trans('admin.site_desc'),'id'=>'ckeditor']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_desc_ar',trans('admin.site_desc_ar'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('site_desc_ar',	$setting->site_desc_ar,['class'=>'form-control ckeditor','id'=>'ckeditor','placeholder'=>trans('admin.site_desc')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('copyright',trans('admin.copyright'),['class'=>'col-md-3 control-label']) !!}

 <div class="col-md-9">
        {!! Form::text('copyright', $setting->copyright ,['class'=>'form-control','placeholder'=>trans('admin.copyright')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('mail',trans('admin.mail'),['class'=>'col-md-3 control-label']) !!}

 <div class="col-md-9">
        {!! Form::email('mail', $setting->mail ,['class'=>'form-control','placeholder'=>trans('admin.mail')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('phone',trans('admin.phone'),['class'=>'col-md-3 control-label']) !!}

 <div class="col-md-9">
        {!! Form::text('phone', $setting->phone ,['class'=>'form-control','placeholder'=>trans('admin.phone')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('facebook',trans('admin.facebook'),['class'=>'col-md-3 control-label']) !!}

 <div class="col-md-9">
        {!! Form::text('facebook', $setting->facebook ,['class'=>'form-control','placeholder'=>trans('admin.facebook')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('twitter',trans('admin.twitter'),['class'=>'col-md-3 control-label']) !!}

 <div class="col-md-9">
        {!! Form::text('twitter', $setting->twitter ,['class'=>'form-control','placeholder'=>trans('admin.twitter')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('instagram',trans('admin.instagram'),['class'=>'col-md-3 control-label']) !!}

 <div class="col-md-9">
        {!! Form::text('instagram', $setting->instagram ,['class'=>'form-control','placeholder'=>trans('admin.instagram')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('keyword',trans('admin.keyword'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('keyword',$setting->keyword,['class'=>'form-control ckeditor','id'=>'tags','placeholder'=>trans('admin.keyword')]) !!}
    </div>
</div>
<br>
 <div class="form-group">
    {!! Form::label('Maintenance_message',trans('admin.Maintenance_message'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('Maintenance_message', $setting->Maintenance_message,['class'=>'form-control ckeditor','placeholder'=>trans('admin.Maintenance_message')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('maintenance',trans('admin.maintenance'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
    	<?php if($setting->maintenance == 'open'){
    		?>
   <input type="checkbox" checked class="make-switch" name="maintenance" data-size="small" placeholder ="{{trans('admin.maintenance')}}">
    	<?php }else{ ?>
   <input type="checkbox"  class="make-switch" name="maintenance" data-size="small" placeholder ="{{trans('admin.maintenance')}}">
<?php } ?>


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

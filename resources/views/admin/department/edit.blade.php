@extends('admin.index')
@section('content')

		@push('js')
            <script type="text/javascript">
                // $(function () { $('#jstree_demo_div').jstree(); });
                $(document).ready(function(){
                    $('#jstree').jstree({
                        "core" : {
                            'data' :{!! load_dep(old('department_id'))!!},
                            "themes" : {
                                "variant" : "large"
                            }
                        },
                        "checkbox" : {
                            "keep_selected_style" : false
                        },
                        "plugins" : [ "wholerow" ]
                    });
                });
                $('#jstree').on('changed.jstree',function(e,data){
                    var i ,j ,r = [];
                    for(i =0 ,j=data.selected.length;i<j;i++)
                    {
                        r.push(data.instance.get_node(data.selected[i]).id);
                    }
                    $('.department_id').val(r.join(', '));

                });

            </script>
		@endpush
<div class="row">
	<div class="col-md-12">
		<div class="widget-extra body-req portlet light bordered">
				<div class="portlet-title">
						<div class="caption">
								<span class="caption-subject bold uppercase font-dark">{{$title}}</span>
						</div>
						<div class="actions">
								<a  href="{{aurl('department')}}"
										class="btn btn-circle btn-image_dep-only btn-default"
										tooltip="{{trans('admin.show_all')}}"
										title="{{trans('admin.show_all')}}">
										<i class="fa fa-list"></i>
								</a>
								<a class="btn btn-circle btn-image_dep-only btn-default fullscreen"
										href="#"
										data-original-title="{{trans('admin.fullscreen')}}"
										title="{{trans('admin.fullscreen')}}">
								</a>
						</div>
				</div>
				<div class="portlet-body form">
								<div class="col-md-12">

{!! Form::open(['url'=>aurl('departments/'.$department->id),'method'=>'put','id'=>'department','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('dep_name_ar',trans('admin.dep_name_ar'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('dep_name_ar',$department->dep_name_ar,['class'=>'form-control','placeholder'=>trans('admin.dep_name_ar')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('dep_name_en',trans('admin.dep_name_en'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('dep_name_en',$department->dep_name_en,['class'=>'form-control','placeholder'=>trans('admin.dep_name_en')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('department_id',trans('admin.department_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
    	<input type="hidden" name="department_id" class="department_id" value="{{$department->department_id}}">
    	 <div id="jstree"></div>
</div>

</div>
                                    <br>
                                    <div class="form-group">
                                        {!! Form::label('description_ar',trans('admin.description_ar'),['class'=>'col-md-3 control-label']) !!}
                                        <div class="col-md-9">
                                            {!! Form::textarea('description_ar',$department->description_ar,['class'=>'form-control ckeditor','placeholder'=>trans('admin.description_ar')]) !!}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        {!! Form::label('description_en',trans('admin.description_en'),['class'=>'col-md-3 control-label']) !!}
                                        <div class="col-md-9">
                                            {!! Form::textarea('description_en',$department->description_en,['class'=>'form-control ckeditor','placeholder'=>trans('admin.description_en')]) !!}
                                        </div>
                                    </div>
                                    <br>

<div class="form-group">
    {!! Form::label('keyword',trans('admin.keyword'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('keyword',$department->keyword,['class'=>'form-control','id'=>'tags','placeholder'=>trans('admin.keyword')]) !!}
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('image_dep',trans('admin.image_dep'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('image_dep',['class'=>'form-control','placeholder'=>trans('admin.image_dep')]) !!}
        <img src="{{  Storage::URL($department->image_dep) }}" width="50px">

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


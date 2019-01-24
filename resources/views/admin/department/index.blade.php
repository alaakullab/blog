@extends('admin.index')
		@section('content')

	<div class="modal fade" id="delete_record_departments">
						<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
		<button class="close" data-dismiss="modal">x</button>
												<h4 class="modal-title">{{trans("admin.delete")}} </h4>
										</div>
						{!!Form::open(['url'=>'','method'=>'delete','id'=>'delete_record_departments_form'])!!}

										<div class="modal-body">
<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> {{trans("admin.ask-delete")}} <span id="count"></span> {{trans("admin.record_dep")}} <span id="dep_name"> </span>! </div>
										</div>
										<div class="modal-footer">
												{!! Form::submit(trans("admin.approval"), ["class" => "btn btn-danger delete_done"]) !!}
												<a class="btn btn-default" data-dismiss="modal">{{trans("admin.cancel")}}</a>
										</div>
									
								</div>
						</div>
				</div>
		@push('js')
		<script type="text/javascript">
			// $(function () { $('#jstree_demo_div').jstree(); });
			$(document).ready(function(){
				$('#jstree').jstree({
				  "core" : {
				  	 'data' : {!! load_dep()!!},
				    "themes" : {
				      "variant" : "large"
				    }
				  },
				  "checkbox" : {
				    "keep_selected_style" : true
				  },
				  "plugins" : [ "wholerow" ]//checkbox
				});
			});
					$('#jstree').on('changed.jstree',function(e,data){
				var i ,j ,r = [];
				var name = [];
				for(i =0 ,j=data.selected.length;i<j;i++)
				{
					r.push(data.instance.get_node(data.selected[i]).id);
					name.push(data.instance.get_node(data.selected[i]).text);
				}
				$('#delete_record_departments_form').attr('action','{{aurl('departments')}}/'+r.join(', '));
				// $('#dep_name_test').text('{{aurl('departments')}}'/+r.join(', '));
				$('#dep_name').text(name.join(', '));
				if(r.join(', ') != ' ') 
				{
					$('.dep_show').removeClass('hidden');
					$('.dep_edit').attr('href','{{aurl('departments')}}/'+r.join(', ')+'/edit');
				}else{
					$('.dep_show').addClass('hidden');

				}
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
									<a  href="#"
										class="btn btn-circle btn-icon-only btn-default dep_edit dep_show hidden"
										tooltip="{{trans('admin.edit')}}"
										title="{{trans('admin.edit')}}">
										<i class="fa fa-pencil-square-o"></i>
								</a>	
								<a  href="#"
										class="btn btn-circle btn-icon-only dep_delete btn-default dep_show hidden"
										tooltip="{{trans('admin.delete')}}"
										title="{{trans('admin.delete')}}"
										data-toggle="modal" data-target="#delete_record_departments">
										<i class="fa fa-trash"></i>
								</a>
								<a  href="{{aurl('departments')}}"
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
					{{-- <input type="hidden" name="parent_id" class="parent_id"> --}}
		  <div id="jstree"></div>
								<div class="col-md-12">


</div>
		  			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
		@stop
		
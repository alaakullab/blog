@extends('admin.index')
		@section('content')
		<div class="row">
				<div class="col-md-12">
						<div class="portlet light bordered">
								<div class="portlet-title">
										<div class="caption">
												<span class="caption-subject bold uppercase font-dark">{{$title}}</span>
										</div>
								</div>
                            <div class="portlet-body table-responsive " style="overflow-x: visible;">
                            {!! $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable no-footer"],true) !!}
										<div class="clearfix"></div>
								</div>
						</div>
				</div>

		</div>
		@push('js')
		{!! $dataTable->scripts() !!}
		@endpush
		{!! Form::close() !!}
		@stop

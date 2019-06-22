@extends('admin.index')
@section('content')

    @push('js')
        <script type="text/javascript">
            // $(function () { $('#jstree_demo_div').jstree(); });
            $(document).ready(function(){
                $('#jstree').jstree({
                    "core" : {
                        'data' :{!! load_dep($product->department_id)!!},
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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('product/create')}}"
                           data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.product')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        <span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.product')}}">
												<a data-toggle="modal" data-target="#myModal{{$product->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
                        <div class="modal fade" id="myModal{{$product->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                            <h4 class="modal-title">{{trans('{lang}.delete')}}؟</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-exclamation-triangle"></i>   {{trans('{lang}.ask_del')}} {{trans('{lang}.id')}} ({{$product->id}}) ؟
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['product.destroy', $product->id]
                                        ]) !!}
                                        {!! Form::submit(trans('{lang}.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{trans('{lang}.cancel')}}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('product')}}"
                           data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.product')}}">
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
                        {!! Form::open(['url'=>aurl('/product/'.$product->id),'method'=>'put','id'=>'product','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="form-group">
                            {!! Form::label('product_name_ar',trans('admin.product_name_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('product_name_ar',$product->product_name_ar,['class'=>'form-control','placeholder'=>trans('admin.product_name_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ar',trans('admin.description_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('description_ar',$product->description_ar,['class'=>'form-control','placeholder'=>trans('admin.description_ar')]) !!}
                            </div>
                        </div>
                        <br>
                        {!! Form::open(['url'=>aurl('/product/'.$product->id),'method'=>'put','id'=>'product','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                        <div class="form-group">
                            {!! Form::label('product_name_en',trans('admin.product_name_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('product_name_en',$product->product_name_en,['class'=>'form-control','placeholder'=>trans('admin.product_name_en')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en',trans('admin.description_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('description_en',$product->description_en,['class'=>'form-control','placeholder'=>trans('admin.description_en')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('department_id',trans('admin.department_id'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <input type="hidden" name="department_id" class="department_id" value="{{$product->department_id}}">
                                <div id="jstree"></div>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('qyt',trans('admin.qyt'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::number('qyt',$product->qyt,['class'=>'form-control','placeholder'=>trans('admin.qyt')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('price',trans('admin.price'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::number('price',$product->price,['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('draftsmen',trans('admin.draftsmen'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <select name="draftsmen_id" class="form-control">
                                    <option>
                                        @awt('Enter the name of the painter','en')
                                    </option>
                                    @foreach (User_get() as $user)
                                        @if($user->hasRole('Draftsman'))
                                            <option value="{{$user->id}}" {{$product->draftsmen_id == $user->id ? 'selected' : ' '}}>
                                                @if($user->First_Name != null)
                                                    {{$user->First_Name.' '.$user->Last_Name}}
                                                @else
                                                    {{$user->username}}

                                                @endif
                                            </option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <br>
                        
                        <div class="form-group">
                            {!! Form::label('image_product',trans('admin.image_product'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('image_product[]',['multiple'=>'yes','class'=>'form-control','placeholder'=>trans('admin.image_product')]) !!}

                                @foreach($product->file as $file)
                                    <img src="{{ Storage::url( $file->full_path ) }}" width="80px"><a href="{{aurl('product/image/'.$file->id)}}" class="btn btn-default btn-outlines btn-circle"><i class="fa fa-trash"></i>{{trans('admin.delete_image')}}</a>
                                @endforeach
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

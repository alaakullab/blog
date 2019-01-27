@extends('admin.index')
@section('content')
    @push('js')
        <script type="text/javascript">
            // $(function () { $('#jstree_demo_div').jstree(); });
            $(document).ready(function () {
                $('#jstree').jstree({
                    "core": {
                        'data':{!! load_dep(old('department_id'))!!},
                        "themes": {
                            "variant": "large"
                        }
                    },
                    "checkbox": {
                        "keep_selected_style": false
                    },
                    "plugins": ["wholerow"]
                });
            });
            $('#jstree').on('changed.jstree', function (e, data) {
                var i, j, r = [];
                for (i = 0 , j = data.selected.length; i < j; i++) {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }
                $('.department_id').val(r.join(', '));

            });

        </script>
    @endpush
        <input type="hidden" id="btnlang" value="{{ app("l") }}"  />

    <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark"></span>
                    </div>
                    <div class="actions">
                        <a href="{{aurl('product')}}"
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
                    <div class="col-md-12">
                        {!! Form::open(['url'=>aurl('/product'),'id'=>'product','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}

                                                <div id="product_en">

                        <div class="form-group">
                            {!! Form::label('product_name_en',trans('admin.product_name_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('product_name_en',old('product_name_en'),['class'=>'form-control','placeholder'=>trans('admin.product_name_en')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_en',trans('admin.description_en'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('description_en',old('description_en'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.description_en')]) !!}
                            </div>
                        </div>
                        </div>
                        <br>
                                 <div id="product_ar">

                        <div class="form-group">
                            {!! Form::label('product_name_ar',trans('admin.product_name_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('product_name_ar',old('product_name_ar'),['class'=>'form-control','placeholder'=>trans('admin.product_name_ar')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description_ar',trans('admin.description_ar'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('description_ar',old('description_ar'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.description_ar')]) !!}
                            </div>
                        </div>
                        </div>
                        <br>
                                                <div class="form-group">
                                        <div class="col-md-offset-3 col-md-9">

                    <a href="javascript:;" id="hideshowpostform" class="btn btn-sm btn-primary">
                                                <i class="fa fa-language fa-lg "></i> {{trans('admin.Writing_in_another_language')}}
                                            </a>
                                            <br>
                                            <br>
                        </div>
                        </div>

                        <br>

                        <div class="form-group">
                            {!! Form::label('department_id',trans('admin.department_id'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <input type="hidden" name="department_id" class="department_id"
                                       value="{{old('department_id')}}">
                                <div id="jstree"></div>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('qyt',trans('admin.qyt'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::number('qyt',old('qyt'),['class'=>'form-control','placeholder'=>trans('admin.qyt')]) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('price',trans('admin.price'),['class'=>'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::number('price',old('price'),['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
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
                                      <option value="{{$user->id}}">
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
                                {!! Form::file('file[]',['multiple'=>'yes','class'=>'form-control','placeholder'=>trans('admin.image_product')]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-md-9 col-lg-offset-3">
                            <div class="note note-warning">

                                <div class="row">

                                    <div class="col-md-6">

                                        <p> <strong>{{trans('admin.warning!')}} </strong>{{trans('admin.you_should_upload_image_size:')}}</p> </div>
                                    <div class="col-md-3">
                                  254*269px
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
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


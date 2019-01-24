<div class="modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">@awt('Data plate','en')</h4>
            </div>
            <div class="modal-body">
                {{--'url'=>url('draftsman/add_action')--}}
{{--                {!!Form::open(['id'=>'form-portfolio-modal','method'=>'POST','files'=>true,'class'=>'form-row-seperated'])!!}--}}
                <div id="portfoliosuccess"></div>
                <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <input type="hidden"  name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <input type="text" class="form-control" name="title" class="require"  id="title" placeholder="{{awtTrans('title','ar')}}">
                </div>
                <div class="form-group">
                    {!! Form::file('file[]',['multiple'=>'yes','id'=>'my-file','class'=>'input-file','placeholder'=>trans('admin.image_product')]) !!}

                </div>
                <p class="text-center">
                    <button class="btn btn-primary upload-image" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  &nbsp;{{trans('admin.add')}}</button>
                </p>

                {!!Form::close()!!}
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>img</th>
                        <th>title</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Post_draftsman as $post)
                        @foreach($post->file as $file)
                    <tr class="{{'portfolioimg'.$file->id}}">
                        <td><img src="{{Storage::url($file->full_path)}}" class="img-responsive img-rounded" style="width: 80px"  alt="" ></td>
                        <td>{{$post->title}}</td>
                        <td>
                  {!! Form::open(['class'=>'myportfolioimg','method'=>'post']) !!}
                            <input type="hidden" name="fileid" value="{{$file->id}}" />
                            <button type="submit"  class="btn btn-default  " ><i class="fa fa-trash-o"></i></button>
                   {!!Form::close()!!}
                        </td>
                    </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
                </div>

            </div>
        </div>
    </div>
</div>

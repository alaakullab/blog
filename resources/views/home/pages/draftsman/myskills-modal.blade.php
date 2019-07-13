<div class="modal fade" id="myskills-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">@awt('Data plate','en')</h4>
            </div>
            <div class="modal-body">
                <div id="myskillssuccess"></div>
                    {!! Form::open(['class'=>'myskills-modal','method'=>'post']) !!}

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control " name="name" class="require" required  id="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="sel1">level list:</label>
                        <select class="form-control" name="level" required id="sel1">
                            <option disabled >Select Level</option>
                            <option>45</option>
                            <option>60</option>
                            <option>75</option>
                            <option>80</option>
                            <option>90</option>
                        </select>
                    </div>
                    <p class="text-center">
                        <button class="btn btn-primary upload-image" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>  &nbsp;{{trans('admin.add')}}</button>
                    </p>
                    {!!Form::close()!!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Skills</th>
                                <th>Level</th>
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($skills as $skill)
                                    <tr class="{{ 'delete'.$skill->id.'id' }}">
                                        <td>{{$skill->name}}</td>
                                        <td>{{$skill->level}}</td>
                                        <td>
                                            <a href="javascript:;" id="{{ $skill->id }}" class="btn btn-default btn-sm delete-data" ><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            <tr class="dataskillsmodaltable"></tr>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>
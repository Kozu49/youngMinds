<div class="card card-default">
    <div class="card-header with-border">
{{--        <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>--}}

    </div>
    <div class="card-body">
    {!! Form::open(['method'=>'post','url'=>'admin/slider','files'=>true]) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('slider_title'))?'has-error':'' }}">
            <label>Slider Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Slider Title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <div class="form-group {{ ($errors->has('slider_description'))?'has-error':'' }}">
            <label>Slider Description
                <label class="text-danger"> *</label>
            </label>
        {!! Form::textarea('description',null,['class'=>'form-control','placeholder' => 'Slider Description']) !!}
        {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        {{ Form::label('image', 'Image: ') }}
        {{ Form::file('image') }}

        <!-- /.form group -->
        <div class="card-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.save')}}&nbsp;</button>
            </div>
            <!-- /.card-footer -->

        </div>
        {!! Form::close() !!}

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


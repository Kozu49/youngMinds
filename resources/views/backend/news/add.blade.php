<div class="card card-default">
    <div class="card-header with-border">
        {{--        <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>--}}

    </div>
    <div class="card-body">
    {!! Form::open(['method'=>'post','url'=>'admin/news','files'=>true]) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
        {!! Form::textarea('content',null,['class'=>'form-control','placeholder' => 'Content']) !!}
        {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <div class="form-group {{ ($errors->has('news_date'))?'has-error':'' }}">
            <label>Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('news_date',null,['class'=>'form-control','placeholder' => 'Date']) !!}
        {!! $errors->first('news_date', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

    {{ Form::label('banner_image', 'Image: ') }}
    {{ Form::file('banner_image') }}

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


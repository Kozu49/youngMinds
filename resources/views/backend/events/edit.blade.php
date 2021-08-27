<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['event.update',$edits->id]]) !!}


        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Event Title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('start_date'))?'has-error':'' }}">
            <label>Start Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('start_date',null,['class'=>'form-control','placeholder' => 'Start Date']) !!}
        {!! $errors->first('start_date', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('end_date'))?'has-error':'' }}">
            <label>End Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('end_date',null,['class'=>'form-control','placeholder' => 'End Date']) !!}
        {!! $errors->first('end_date', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('venue'))?'has-error':'' }}">
            <label>Venue
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('venue',null,['class'=>'form-control','placeholder' => 'Venue']) !!}
        {!! $errors->first('venue', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
        {!! Form::textarea('content',null,['class'=>'form-control','placeholder' => 'Content']) !!}
        {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>
        <!-- /.form group -->
        <div class="card-footer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">{{trans('app.update')}}</button>
            </div>
            <!-- /.card-footer -->
        </div>
        {!! Form::close() !!}


    </div>
    <!-- /.card-body -->
</div>

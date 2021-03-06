<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

        {!! Form::model($edits,['method'=>'PUT','route'=>['download.update',$edits->id],'files'=>true]) !!}

        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
            <label>Title44545454
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Download Title']) !!}
        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('created_date'))?'has-error':'' }}">
            <label>Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('created_date',null,['class'=>'form-control','class'=>'cal','id'=>'cal','placeholder' => 'Date']) !!}
        {!! $errors->first('created_date', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        {{ Form::label('file', 'File: ') }}
        {{ Form::file('file') }}



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

@section('js')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#cal').nepaliDatePicker({
                ndpMonth: true,
                ndpYear: true,
            });

        });
    </script>

@endsection

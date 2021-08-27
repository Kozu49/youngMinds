<div class="card card-default">
    <div class="card-header with-border">
        <h3 class="card-title">{{trans('app.edit')}} &nbsp;</h3>

    </div>
    <div class="card-body">

    {!! Form::model($edits,['method'=>'PUT','route'=>['navbar.update',$edits->id]]) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('navbar'))?'has-error':'' }}">
            <label>NavBar Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('navbar',null,['class'=>'form-control','placeholder' => 'Navbar Title']) !!}
        {!! $errors->first('navbar', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="form-group {{ ($errors->has('url'))?'has-error':'' }}">
            <label>Url
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('url',null,['class'=>'form-control','placeholder' => 'Url']) !!}
        {!! $errors->first('url', '<span class="text-danger">:message</span>') !!}

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

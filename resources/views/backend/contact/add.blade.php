<div class="card card-default">
    <div class="card-header with-border">
        {{--        <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>--}}

    </div>
    <div class="card-body">
    {!! Form::open(['method'=>'post','url'=>'admin/contact']) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('location'))?'has-error':'' }}">
            <label>Address
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('location',null,['class'=>'form-control','placeholder' => 'Address']) !!}
        {!! $errors->first('location', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('email'))?'has-error':'' }}">
            <label>Email Address
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('email',null,['class'=>'form-control','placeholder' => 'Email Address']) !!}
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('phone'))?'has-error':'' }}">
            <label>Contact Number
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('phone',null,['class'=>'form-control','placeholder' => 'Contact Number']) !!}
        {!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('website'))?'has-error':'' }}">
            <label>Website Link
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('website',null,['class'=>'form-control','placeholder' => 'Website Link']) !!}
        {!! $errors->first('website', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>


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


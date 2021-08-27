<div class="card card-default">
    <div class="card-header with-border">
        {{--        <h3 class="card-title">{{trans('app.add')}}&nbsp;</h3>--}}

    </div>
    <div class="card-body">
    {!! Form::open(['method'=>'post','url'=>'admin/socialmedia']) !!}


    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('twitter'))?'has-error':'' }}">
            <label>Twitter
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('twitter',null,['class'=>'form-control','placeholder' => 'Twitter']) !!}
        {!! $errors->first('twitter', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('facebook'))?'has-error':'' }}">
            <label>Facebook
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('facebook',null,['class'=>'form-control','placeholder' => 'Facebook']) !!}
        {!! $errors->first('facebook', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('instagram'))?'has-error':'' }}">
            <label>Instagram
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('instagram',null,['class'=>'form-control','placeholder' => 'Instagram']) !!}
        {!! $errors->first('instagram', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('linkedin'))?'has-error':'' }}">
            <label>LinkedIn
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('linkedin',null,['class'=>'form-control','placeholder' => 'LinkedIn']) !!}
        {!! $errors->first('linkedin', '<span class="text-danger">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('skype'))?'has-error':'' }}">
            <label>Skype
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('skype',null,['class'=>'form-control','placeholder' => 'Skype']) !!}
        {!! $errors->first('skype', '<span class="text-danger">:message</span>') !!}

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


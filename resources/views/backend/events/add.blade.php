<style>
    .error {
        color: red;
        border-color: red;
    }
</style>
<div class="card card-default">
    <span id="message_error"></span>
    <div class="card-body">
    {!! Form::open(['method'=>'post','url'=>'admin/event','id'=>'validate']) !!}
        <div class="add_item">
    <!-- /.input group -->
        <div class="form-group {{ ($errors->has('title[]'))?'has-error':'' }}">
            <label>Title
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('title[]',null,['class'=>'form-control','placeholder' => 'Event Title','required']) !!}
        {!! $errors->first('title[]', '<span class="text-danger id="message_error">:message</span>') !!}
        <!-- /.input group -->
        </div>
        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('start_date[]'))?'has-error':'' }}">
            <label>Start Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('start_date[]',null,['class'=>'form-control','placeholder' => 'Start Date','required']) !!}
        {!! $errors->first('start_date[]', '<span class="text-danger" id="message_error">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('end_date[]'))?'has-error':'' }}">
            <label>End Date
                <label class="text-danger"> *</label>
            </label>
        {!! Form::date('end_date[]',null,['class'=>'form-control','placeholder' => 'End Date','required']) !!}
        {!! $errors->first('end_date[]', '<span class="text-danger" id="message_error">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('venue[]'))?'has-error':'' }}">
            <label>Venue
                <label class="text-danger"> *</label>
            </label>
        {!! Form::text('venue[]',null,['class'=>'form-control','placeholder' => 'Venue','required']) !!}
        {!! $errors->first('venue[]', '<span class="text-danger" id="message_error">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <!-- /.input group -->
        <div class="form-group {{ ($errors->has('content[]'))?'has-error':'' }}">
            <label>Content
                <label class="text-danger"> *</label>
            </label>
        {!! Form::textarea('content[]',null,['class'=>'form-control','placeholder' => 'Content','required']) !!}
        {!! $errors->first('content[]', '<span class="text-danger" id="message_error">:message</span>') !!}

        <!-- /.input group -->
        </div>

        <div class="col-md-2 pull-right" style="padding-top:25px;">
            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>

        </div>
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


<!-- //For addition of additional row -->
<div style="visibility:hidden;">

    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">

                <!-- /.input group -->
                <div class="form-group {{ ($errors->has('title[]'))?'has-error':'' }}">
                    <label>Title
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::text('title[]',null,['class'=>'form-control','placeholder' => 'Event Title','required']) !!}
                {!! $errors->first('title[]', '<span class="text-danger" id="message_error">:message</span>') !!}

                <!-- /.input group -->
                </div>

                <!-- /.input group -->
                <div class="form-group {{ ($errors->has('start_date[]'))?'has-error':'' }}">
                    <label>Start Date
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::date('start_date[]',null,['class'=>'form-control','placeholder' => 'Start Date','required']) !!}
                {!! $errors->first('start_date[]', '<span class="text-danger" id="message_error">:message</span>') !!}

                <!-- /.input group -->
                </div>

                <!-- /.input group -->
                <div class="form-group {{ ($errors->has('end_date[]'))?'has-error':'' }}">
                    <label>End Date
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::date('end_date[]',null,['class'=>'form-control','placeholder' => 'End Date','required']) !!}
                {!! $errors->first('end_date[]', '<span class="text-danger" id="message_error">:message</span>') !!}

                <!-- /.input group -->
                </div>

                <!-- /.input group -->
                <div class="form-group {{ ($errors->has('venue[]'))?'has-error':'' }}">
                    <label>Venue
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::text('venue[]',null,['class'=>'form-control','placeholder' => 'Venue','required']) !!}
                {!! $errors->first('venue[]', '<span class="text-danger" id="message_error">:message</span>') !!}

                <!-- /.input group -->
                </div>

                <!-- /.input group -->
                <div class="form-group {{ ($errors->has('content[]'))?'has-error':'' }}">
                    <label>Content
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::textarea('content[]',null,['class'=>'form-control','placeholder' => 'Content'],'required') !!}
                {!! $errors->first('content[]', '<span class="text-danger" id="message_error">:message</span>') !!}

                <!-- /.input group -->
                </div>
                <div class="col-md-2" style="padding-top:25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                </div>


            </div>
        </div>

    </div>
</div>
@section('js')
    <script>
        function blink_text()
        {
            $('#message_error').fadeOut(700);
            $('#message_error').fadeIn(700);
        }
        setInterval(blink_text,1000);
    </script>


    <!-- script validate form -->
    <script>
        $(document).ready(function () {
            $('#validate').validate({
                rules: {
                    'title[]': {
                        required: true,
                    },
                    'start_date[]': {
                        required: true,
                    },
                    'end_date[]': {
                        required: true,
                    },
                    'venue[]': {
                        required: true,
                    },
                    'content[]': {
                        required: true,
                    }
                },
                messages: {
                    'title[]': "Please input Title*",
                    'start_date[]': "Please input Start Date*",
                    'end_date[]': "Please input End Date*",
                    'venue[]': "Please input Venue*",
                    'content[]': "Please input Content*",

                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "title[]" || element.attr("name") == "start_date[]" || element.attr("name") == "end_date[]" || element.attr("name") == "venue[]" || element.attr("name") == "content[]") {
                        $('#message_error').empty();
                        error.appendTo('#message_error')
                    } else {
                        error.insertAfter(element);
                    }
                }

            });
        })
    </script>




    <script type="text/javascript">
        $(document).ready(function(){
            var counter=0;
            $(document).on("click",".addeventmore",function(){

                var whole_extra_item_add=$('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click",".removeeventmore",function(event){
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter-=1
            });

        });

    </script>






@endsection


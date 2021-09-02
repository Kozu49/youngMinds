
    <div class="card card-default">
        <div class="card-body">
             {!! Form::open(['method'=>'post','url'=>'admin/news','files'=>true]) !!}

            <div class="add_item">

                <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
                    <label>Title
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Title']) !!}
                {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">
                    <label>Content
                        <label class="text-danger"> *</label>
                    </label>
                {!! Form::textarea('content',null,['class'=>'form-control','placeholder' => 'Content']) !!}
                {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}
                </div>


                <div class="form-group col-md-12 {{ ($errors->has('news_date'))?'has-error':'' }}">
                    <label>Date</label><label class="text-danger"> *</label>
                    {!! Form::text('news_date',null,['class'=>'cal','id'=>'cal','placeholder'=>'Enter Date','autocomplete'=>'off']) !!}
                    {!! $errors->first('news_date', '<span class="text-danger">:message</span>') !!}
                </div>

               <div>
                   {{ Form::label('banner_image', 'Image: ') }}
                   {{ Form::file('banner_image') }}
               </div>

{{--                <div class="col-md-2 pull-right" style="padding-top:25px;">--}}
{{--                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>--}}

{{--                </div>--}}

            </div>
            <div class="card-footer">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-primary">{{trans('app.save')}}&nbsp;</button>
                </div>
                <!-- /.card-footer -->

            </div>
            {!! Form::close() !!}
        </div>
    </div>




    <!-- //For addition of additional row -->
{{--    <div style="visibility:hidden;">--}}
{{--        <div class="whole_extra_item_add" id="whole_extra_item_add">--}}
{{--            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">--}}
{{--                    <div class="form-row">--}}


{{--                            <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">--}}
{{--                                <label>Title--}}
{{--                                    <label class="text-danger"> *</label>--}}
{{--                                </label>--}}
{{--                            {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Title']) !!}--}}
{{--                            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}--}}
{{--                            </div>--}}

{{--                            <div class="form-group {{ ($errors->has('content'))?'has-error':'' }}">--}}
{{--                                <label>Content--}}
{{--                                    <label class="text-danger"> *</label>--}}
{{--                                </label>--}}
{{--                            {!! Form::textarea('content',null,['class'=>'form-control','placeholder' => 'Content']) !!}--}}
{{--                            {!! $errors->first('content', '<span class="text-danger">:message</span>') !!}--}}
{{--                            </div>--}}

{{--                        <div class="form-group col-md-12 {{ ($errors->has('news_date'))?'has-error':'' }}">--}}
{{--                            <label>Date</label><label class="text-danger"> *</label>--}}
{{--                            {!! Form::date('news_date[]',null,['class'=>'cal','id'=>'cal','placeholder'=>'Enter Date','autocomplete'=>'off']) !!}--}}
{{--                            {!! $errors->first('news_date', '<span class="text-danger">:message</span>') !!}--}}
{{--                        </div>--}}

{{--                             <div>--}}
{{--                                 {{ Form::label('banner_image', 'Image: ') }}--}}
{{--                                 {{ Form::file('banner_image[]') }}--}}
{{--                             </div>--}}

{{--                                <div class="col-md-2" style="padding-top:25px;">--}}
{{--                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>--}}
{{--                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>--}}
{{--                                </div>--}}

{{--                    </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


@section('js')

{{--            <script type="text/javascript">--}}
{{--                $(document).ready(function(){--}}
{{--                    var counter=0;--}}
{{--                    $(document).on("click",".addeventmore",function(){--}}

{{--                        var whole_extra_item_add=$('#whole_extra_item_add').html();--}}
{{--                        $(this).closest(".add_item").append(whole_extra_item_add);--}}
{{--                        counter++;--}}
{{--                    });--}}
{{--                    $(document).on("click",".removeeventmore",function(event){--}}
{{--                        $(this).closest(".delete_whole_extra_item_add").remove();--}}
{{--                        counter-=1--}}
{{--                    });--}}

{{--                });--}}

{{--            </script>--}}


            <script type="text/javascript">
                $(document).ready(function () {
                    $('.cal').nepaliDatePicker({
                        ndpMonth: true,
                        ndpYear: true,
                    });

                });
            </script>

@endsection




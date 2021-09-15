@extends('backend.layouts.app')
@section('title')
    Download
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
{{--                        <h1>{{trans('app.configuration')}}</h1>--}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('backend.message.flash')

                <div class="row">

                    @if(helperPermission()['isAdd'])

                        <div class="col-md-9" id="listing">
                            @else
                                <div class="col-md-12" id="listing">
                                    @endif
                                    <div class="card card-default">
                                        <div class="card-header with-border">
                                            <h3 class="card-title"><i class="fa fa-list"></i> Download</h3>
                                            <?php

                                            $permission = helperPermissionLink(url('admin/download'), url('admin/download'));

                                            $allowEdit = $permission['isEdit'];

                                            $allowDelete = $permission['isDelete'];

                                            $allowAdd = $permission['isAdd'];
                                            ?>
                                        </div>
                                        <div>
                                            @if($allowDelete)
                                            <button type="submit"
                                                    class="btn btn-danger pull-right"
                                                    data-toggle="tooltip"
                                                    id="deleteAllSelected"
                                                    onclick="javascript:return confirm('Are you sure you want to delete selected Download?');">Delete Selected
                                            </button>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="checkAll"></th>
                                                    <th style="width: 10px;">{{trans('app.sn')}}</th>
                                                    <th>Title</th>
                                                    <th>Download File</th>
                                                    <th>Created Date</th>
                                                    <th>User</th>
                                                    <th style="width: 10px" ;
                                                        class="text-right">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i = 1;?>
                                                @forelse($downloads as $download)
                                                    <tr id="sid{{$download->id}}">
                                                        <td><input type="checkbox" name="ids" class="checkItem" value="{{$download->id}}"></td>
                                                        <th scope=row>{{$i}}</th>
                                                        <td>{{$download->title}}</td>
                                                        <td>{{$download->download_file}}</td>
                                                        <td>{{$download->created_date}}</td>
                                                        <td>{{$download->user->name}}</td>
{{--                                                        <td><img src="{{asset($slider->image)}}" style="height:100px;width:100" alt=""></td>--}}
                                                        <td class="text-right row" style="margin-right: 0px;">
                                                            @if($allowEdit)
                                                                <a href="{{route('download.edit',[$download->id])}}"
                                                                   class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                                   data-placement="top" title="Edit" style="margin: 0px 5px;">
                                                                    <i class="fa fa-pencil-square-o"></i>
                                                                </a>
                                                            @endif

                                                            @if($allowDelete)
                                                                {!! Form::open(['method' => 'DELETE', 'route'=>['download.destroy',
                                                                    $download->id],'class'=> 'inline']) !!}
                                                                <button type="submit"
                                                                        class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                        data-toggle="tooltip"
                                                                        data-placement="top" title="Delete"
                                                                        onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>

                                                                {!! Form::close() !!}
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>

                                        </div>

                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                                @if($allowAdd)

                                    <div class="col-md-3">
                                        @if(\Request::segment(4)=='edit')
                                            @include('backend.downloads.edit')
                                        @else
                                            @include('backend.downloads.add')
                                        @endif

                                    </div>
                                @endif

                        </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->


    <script type="text/javascript">
        $(document).ready(function(){
            $('#checkAll').click(function(){
                if($(this).is(':checked')){
                    $('.checkItem').prop("checked",true);
                }else {
                    $(".checkItem").prop("checked",false);
                }
            });


            $("#deleteAllSelected").click(function(e){
                e.preventDefault();
                var allids=[];
                $("input:checkbox[name=ids]:checked").each(function () {
                    allids.push($(this).val());
                });
                $.ajax({
                    url: "{{route('delete.selected.download')}}",
                    type:"DELETE",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids: allids
                    },
                    success:function (response) {
                        $.each(allids,function (key,val) {
                            $("#sid"+val).remove();
                        })
                    }
                });

            })

        });





    </script>

@endsection

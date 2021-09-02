@extends('backend.layouts.app')
@section('title')
    News
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
                                            <h3 class="card-title"><i class="fa fa-list"></i> News</h3>
                                            <?php

                                            $permission = helperPermissionLink(url('admin/news'), url('admin/news'));

                                            $allowEdit = $permission['isEdit'];

                                            $allowDelete = $permission['isDelete'];

                                            $allowAdd = $permission['isAdd'];
                                            ?>
                                        </div>
                                        <div>
{{--                                            <a href="" class="btn btn-danger pull-right" id="deleteAllSelected">Delete Selected</a>--}}
                                            <button type="submit"
                                                    class="btn btn-danger pull-right"
                                                    data-toggle="tooltip"
                                                    id="deleteAllSelected"
                                                    onclick="javascript:return confirm('Are you sure you want to delete selected News?');">Delete Selected
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <div class="card-body">
                                                <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="checkAll"></th>
                                                        <th style="width: 10px;">{{trans('app.sn')}}</th>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Banner Image</th>
                                                        <th>News Date</th>
                                                        <th>User</th>
                                                        <th style="width: 10px" ;
                                                            class="text-right">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1;?>
                                                    @forelse($newses as $news)
                                                        <tr id="sid{{$news->id}}">
                                                            <td><input type="checkbox" name="ids" class="checkItem" value="{{$news->id}}"></td>
                                                            <th scope=row>{{$i}}</th>
                                                            <td>{{$news->title}}</td>
{{--                                                            <td>{{$news->content}}</td>--}}
                                                            <td>{{Str::limit($news->content, 50)}}</td>
                                                            <td><img src="{{asset($news->banner_image)}}" style="height:80px;width:100px;" alt=""></td>
                                                            <td>{{$news->news_date}}</td>
                                                            <td>{{$news->user->name}}</td>
                                                            <td class="text-right row" style="margin-right: 0px;">
                                                                @if($allowEdit)
                                                                    <a href="{{route('news.edit',[$news->id])}}"
                                                                       class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                                       data-placement="top" title="Edit" style="margin: 0px 5px;">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>
                                                                @endif

                                                                @if($allowDelete)
                                                                    {!! Form::open(['method' => 'DELETE', 'route'=>['news.destroy',
                                                                        $news->id],'class'=> 'inline']) !!}
                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                            data-toggle="tooltip"
                                                                            data-placement="top" title="Delete"
                                                                            onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>

                                                                    {!! Form::close() !!}
                                                                @endif

                                                                    <a href="{{route('news.view',$news->id)}}"
                                                                       class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                                       data-placement="top" title="view" style="margin: 0px 5px;">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    </a>

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

                                </div>

                                @if($allowAdd)

                                    <div class="col-md-3">
                                        @if(\Request::segment(4)=='edit')
                                            @include('backend.news.edit')
                                        @else
                                            @include('backend.news.add')
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
                    url: "{{route('delete.selected.news')}}",
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

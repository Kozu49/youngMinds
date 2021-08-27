@extends('backend.layouts.app')
@section('title')
    Notice
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
                                            <h3 class="card-title"><i class="fa fa-list"></i> Notice</h3>
                                            <?php

                                            $permission = helperPermissionLink(url('admin/notice'), url('admin/notice'));

                                            $allowEdit = $permission['isEdit'];

                                            $allowDelete = $permission['isDelete'];

                                            $allowAdd = $permission['isAdd'];
                                            ?>
                                        </div>
                                        <div class="table-responsive">
                                            <div class="card-body">
                                                <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px;">{{trans('app.sn')}}</th>
                                                        <th>Title</th>
                                                        <th>Content</th>
{{--                                                        <th>Notice File</th>--}}
                                                        <th>Notice Banner</th>
                                                        <th>Notice Date</th>
                                                        <th>user</th>
                                                        <th style="width: 10px" ;
                                                            class="text-right">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1;?>
                                                    @forelse($notices as $notice)
                                                        <tr>
                                                            <th scope=row>{{$i}}</th>
                                                            <td>{{$notice->title}}</td>
                                                            <td>{{Str::limit($notice->content, 50)}}</td>
{{--                                                            <td>{{$notice->notice_file}}</td>--}}
                                                            <td><img src="{{asset($notice->notice_banner)}}" style="width:100px;height:100px;"></td>

                                                            <td>{{$notice->notice_date}}</td>

                                                            <td>{{$notice->user->name}}</td>
                                                            <td class="text-right row" style="margin-right: 0px;">
                                                                @if($allowEdit)
                                                                    <a href="{{route('notice.edit',[$notice->id])}}"
                                                                       class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                                                       data-placement="top" title="Edit" style="margin: 0px 5px;">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>
                                                                @endif

                                                                @if($allowDelete)
                                                                    {!! Form::open(['method' => 'DELETE', 'route'=>['notice.destroy',
                                                                        $notice->id],'class'=> 'inline']) !!}
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

                                        </div>

                                @if($allowAdd)

                                    <div class="col-md-3">
                                        @if(\Request::segment(4)=='edit')
                                            @include('backend.notice.edit')
                                        @else
                                            @include('backend.notice.add')
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

@endsection

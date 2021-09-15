@extends('backend.layouts.app')
@section('title')
    Notifications
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

        @foreach($notifications as $notification)
            <ul class="list-group-item">
               @if($notification->type=="App\Notifications\NewsNotification")
                    <strong>{{$notification->data['news_id']['body']}}</strong>
                   @endif

                   <a href="{{route('notification.view',$notification->data['news_id']['id'])}}" class="btn float-right btn-info ">
                       View Notification

                   </a>

            </ul>
        @endforeach

    </div>

@endsection

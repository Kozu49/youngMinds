@extends('frontend.layouts.master_home')
<br>
<section id="notice" class="notice">
    <div class="container-flex" id="test">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                <strong>Notice :</strong>

            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                <marquee>
                    @foreach($notices as $notice)


                        <strong>****  {{$notice->title}}</strong>

                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</section>


    @include('frontend.layouts.body.slider')

    @section('home_content')

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        <div class="container mt-5">

                    <!-- Nav tabs -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#news" role="tab">
                                        <i class="fa fa-newspaper" aria-hidden="true"></i>
                                        Latest News
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                        Notice
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        Events
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
{{--                                        <i class="now-ui-icons ui-2_settings-90"></i> Downloads--}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="news" role="tabpanel">
                                    <table class="table">
                                        <thead>
                                        <tr>

                                            <th scope="col">Latest News</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $new)
                                            <tr>
                                                <td><a href="{{route('news.single.page',$new->slug)}}">{{$new->title}}</a></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <table class="table">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        @foreach($notices as $notice)
                                            <tr>
                                                <td>{{$notice->notice_date}}</td>
                                                <td>{{$notice->title}}</td>
                                                <td><a href="{{$notice->notice_file}}" target="_blank"><strong>Download</strong></a></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    <table class="table">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        @foreach($events as $event)
                                            <tr>
                                                <td>{{$event->start_date}}</td>
                                                <td>{{$event->title}}<br>
                                                    <span>Start Date: <i class="fa fa-calendar" aria-hidden="true"></i>{{$event->start_date}},
                                                        End Date: <i class="fa fa-calendar" aria-hidden="true"></i>{{$event->end_date}}

                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">

                                </div>
                            </div>
                        </div>
                    </div>


</main><!-- End #main -->

@endsection

@extends('frontend.layouts.master_home')
@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Notice</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Notice</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->


    <section id="notice" class="notice">
        <div class="container">

            <div class="row">

                    @foreach($notices as $notice)

                        <article class="entry" data-aos="fade-up">

                            <div class="entry-img">
                                <img src="{{asset($notice->notice_banner)}}" alt="" class="img-fluid" style="width:250px;height:200px;">
                            </div>

                            <h2 class="entry-title">
                                <a href="">{{$notice->title}}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="">{{$notice->user->name}}</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time datetime="2020-01-01">{{$notice->notice_date}}</time></a></li>
{{--                                                                            <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>--}}
                                </ul>
                            </div>

                            <div class="entry-content">
                                {!! $notice->content!!}
                            </div>

                            <button class="btn btn-dark btn-lg float-right"><a href="{{$notice->notice_file}}" target="_blank"><strong>Download</strong></a></button>
                            <br><br>
                            <hr>
                        </article><!-- End blog entry -->
                    <hr>

                    @endforeach
                        <hr>
                </div>
            <div class="blog-pagination">
                <div class="blog-pagination">
                    {{$notices->links()}}
                </div>
            </div>
            </div>

        </div>

    </section>

@endsection

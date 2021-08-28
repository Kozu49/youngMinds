@extends('frontend.layouts.master_home')
@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>News</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>News</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single" data-aos="fade-up">

                        <div class="entry-img">
                            <img src="{{asset($news->banner_image)}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="">{{$news->title}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="">{{$news->user->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time datetime="2020-01-01">{{$news->news_date}}</time></a></li>
{{--                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>--}}
                            </ul>
                        </div>

                        <div class="entry-content">
                           {!! $news->content !!}


                        </div>
                        <br>
                        <div class="sharethis-inline-share-buttons"></div>
                    </article><!-- End blog entry -->
                    <br>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="VDd2COaQ"></script>
                    <div class="fb-comments" data-href="https://www.facebook.com/YoungMindsGroup/" data-width="" data-numposts="8"></div>




                </div><!-- End blog entries list -->


        </div>
        </div>
    </section><!-- End Blog Section -->




@endsection

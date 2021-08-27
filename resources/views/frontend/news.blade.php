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
        <section id="news" class="news">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12 entries">

                       @foreach($newses as $news)

                            <article class="entry" data-aos="fade-up">

                                <div class="entry-img">
                                    <img src="{{asset($news->banner_image)}}" alt="" class="img-fluid" style="width:650px;height:400px;" >
                                </div>

                                <h2 class="entry-title">
                                    <a href="blog-single.html">{{$news->title}}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="">{{$news->user->name}}</a></li>
                                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time datetime="2020-01-01">{{$news->news_date}}</time></a></li>
{{--                                        <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>--}}
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    {!! Str::limit($news->content,400) !!}
                                    <div class="read-more">
                                        <button class="btn btn-dark"> <a href="{{route('news.single.page',$news->id)}}">Read More</a></button>
                                    </div>
                                </div>

                            </article><!-- End blog entry -->
                            <br>
                            <hr>
                        @endforeach


                           <div class="blog-pagination">
                               <div class="blog-pagination">
                               {{$newses->links()}}
                               </div>
                           </div>

                    </div><!-- End blog entries list -->

                </div>

            </div>
        </section><!-- End Blog Section -->


@endsection

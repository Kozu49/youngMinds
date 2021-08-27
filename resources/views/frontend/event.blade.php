@extends('frontend.layouts.master_home')
@section('home_content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Events</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Events</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Events</h2>
            </div>

            <div class="faq-list">
                <ul>
                    @foreach($events as $event)
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse collapsed" href="#faq-list-{{$event->id}}" aria-expanded="false">
                                {{$event->title}} ({{$event->start_date}} To {{$event->end_date}})
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-{{$event->id}}" class="collapse " data-parent=".faq-list">
                               {!! $event->content !!}<br>
                                {{$event->start_date}} To {{$event->end_date}}<br>
                                {{$event->Venue}}
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection

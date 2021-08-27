@php
$social=DB::table('socials')->first();
$contact=DB::table('contacts')->first();
@endphp

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{route('home')}}"><span>Young</span>Minds</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{route('home')}}">Home</a></li>

                @foreach($navbars as $navbar)

                <li><a href="{{$navbar->url}}">{{$navbar->navbar}}</a></li>
                @endforeach
            </ul>
        </nav><!-- .nav-menu -->

        <div class="header-social-links">
            <a href="{{$social->twitter}}" class="twitter" target="_blank"><i class="icofont-twitter"></i></a>
            <a href="{{$social->facebook}}" class="facebook" target="_blank"><i class="icofont-facebook"></i></a>
            <a href="{{$social->instagram}}" class="instagram" target="_blank"><i class="icofont-instagram"></i></a>
            <a href="{{$social->linkedin}}" class="linkedin" target="_blank"><i class="icofont-linkedin"></i></i></a>
        </div>

    </div>
</header><!-- End Header -->


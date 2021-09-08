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
                <li class="active"><a href="{{route('home')}}">{{trans('lang.home')}}</a></li>

                @foreach($navbars as $navbar)
                <li><a href="{{$navbar->url}}">{{trans("lang.".$navbar->navbar)}}</a></li>
                @endforeach
            </ul>
        </nav><!-- .nav-menu -->


        <div class="header-social-links">
            <a href="{{$social->twitter}}" class="twitter" target="_blank"><i class="icofont-twitter"></i></a>
            <a href="{{$social->facebook}}" class="facebook" target="_blank"><i class="icofont-facebook"></i></a>
            <a href="{{$social->instagram}}" class="instagram" target="_blank"><i class="icofont-instagram"></i></a>
            <a href="{{$social->linkedin}}" class="linkedin" target="_blank"><i class="icofont-linkedin"></i></i></a>
        </div>


{{--        @if(session()->get('lang')=="nepali")--}}
{{--            <li class="version"><a href="{{route('lan.eng')}}"><B>English</B></a></li>&nbsp;&nbsp;&nbsp;--}}
{{--            <!-- login-start -->--}}
{{--        @else--}}
{{--            <li class="version"><a href="{{route('lan.nep')}}"><B>Nepali</B></a></li>&nbsp;&nbsp;&nbsp;--}}
{{--        @endif--}}
        <div id="app">
            <div style="background-color: #343a40;">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <ul class="navbar-nav ml-auto">
                            @php $locale = session()->get('locale'); @endphp
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @switch($locale)
                                        @case('us')
                                        <img src="{{asset('img/us.png')}}" style="height:20px;width:20px;"> English
                                        @break
                                        @case('nep')
                                        <img src="{{asset('img/nep.png')}}" style="height:20px;width:20px;"> Nepali
                                        @break
                                        @default
                                        <img src="{{asset('img/us.png')}}" style="height:20px;width:20px;"> English
                                    @endswitch
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/lang','en') }}"><img src="{{asset('img/us.png')}} " style="height:20px;width:20px;"> English</a>
                                    <a class="dropdown-item" href="{{ url('/lang','nep') }}"><img src="{{asset('img/nep.png')}}" style="height:20px;width:20px;"> Nepali</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</header><!-- End Header -->


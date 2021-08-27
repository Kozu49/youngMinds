@extends('frontend.layouts.master_home')
@section('home_content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Download</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Download</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->


    <section id="download" class="download">
        <div class="container">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Download File</th>
                </tr>
                </thead>
                <tbody>
                @foreach($downloads as $download)

                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$download->title}}</td>
                        <td><a href="{{$download->download_file}}" target="_blank">Download</a></td>

                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </section>

@endsection

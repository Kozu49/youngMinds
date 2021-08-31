@extends('backend.layouts.app')
@section('title')
@endsection
@section('content')

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
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-10">

                                    <h3><strong> {{$news->title}}</strong></h3>

                            </div>
                            <div class="col-md-2">
                                <a href="{{route('news.pdf',$news->id)}}" target="_blank"><button class="btn btn-default pull-left" id="exportToPDF"><i
                                            class="fa fa-file-pdf-o text-danger" ></i> Download As PDF
                                    </button></a>

                            </div>

                        </div>
                        <br>
                        <div class="entry-img">
                            <img src="{{asset($news->banner_image)}}" style="height:600px;width:800px;" alt="" >
                        </div>

                        <h2 class="entry-title">
{{--                            {{$news->title}}--}}
                        </h2>

                        <div class="entry-meta">
                            <ul>
{{--                                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="">{{$news->user->name}}</a></li>--}}
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time datetime="2020-01-01"><strong>Date: </strong>{{$news->news_date}}</time></a></li>
                                {{--                                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>--}}
                            </ul>
                        </div>
                        <br>
                        <div class="entry-content">
                            {!! $news->content !!}
                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </section>

    </div>

    @endsection


{{--@section('js')--}}
{{--    <script>--}}

{{--        $("#exportToPDF").click(function (){--}}

{{--            $('.cv-pdf').css('display','block');--}}

{{--            var HTML_Width = $(".cv-pdf").width();--}}
{{--            var HTML_Height = $(".cv-pdf").height();--}}
{{--            var top_left_margin = 30;--}}
{{--            var PDF_Width = HTML_Width+(top_left_margin*3);--}}
{{--            var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);--}}
{{--            var canvas_image_width = HTML_Width;--}}
{{--            var canvas_image_height = HTML_Height;--}}

{{--            var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;--}}

{{--            html2canvas($(".cv-pdf")[0],{allowTaint:true}).then(function(canvas) {--}}
{{--//                canvas.getContext('d');--}}

{{--                console.log(canvas.height + "  " + canvas.width);--}}

{{--                var imgData = canvas.toDataURL('image/jpeg',1.0);--}}
{{--                var pdf = new jsPDF('p', 'pt',[PDF_Width, PDF_Height]);--}}
{{--                pdf.addImage(imgData, 'JPEG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);--}}


{{--                for (var i = 1; i <= totalPDFPages; i++) {--}}
{{--                    pdf.addPage(PDF_Width, PDF_Height);--}}
{{--                    pdf.addImage(imgData, 'JPEG', top_left_margin, -(PDF_Height  i) + (top_left_margin  4), canvas_image_width, canvas_image_height);--}}
{{--                }--}}

{{--                pdf.save("cv_pdf.pdf");--}}

{{--                $('.cv-pdf').css('display','none');--}}

{{--            });--}}
{{--        });--}}

{{--    </script>--}}
{{--@endsection--}}

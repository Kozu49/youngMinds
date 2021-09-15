@extends('backend.layouts.app')
@section('title')
    Report
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{--                                                <h1>{{trans('app.event')}}</h1>--}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('backend.message.flash')
                <h3>News Search</h3>
                <br>
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ url('/admin/report/search') }}" class="forms-sample">
                                @csrf
                                  <div class="row">
                                      <div class="col-md-5">
                                          <div class="form-group">
                                              <label for="exampleInputUsername1">From Date</label>
                                              <input type="date" class="form-control" name="from_date" placeholder="From Date" value="2021-09-05">
                                              @error('from_date')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror
                                          </div>
                                      </div>
                                      <div class="col-md-5">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">To Date</label>
                                              <input type="date" class="form-control" name="to_date" placeholder="To Date" value="2021-09-05">
                                              @error('to_date')
                                              <span class="text-danger">{{$message}}</span>
                                              @enderror
                                          </div>
                                      </div>

                                  </div>
{{--                                <input type="text" name="daterange" />--}}

                                <button type="submit" class="btn btn-primary mr-2 pull-right">Submit</button>
{{--                                <a href=""--}}
{{--                                   class="text-info btn btn-xs btn-default" data-toggle="tooltip"--}}
{{--                                   data-placement="top" title="Edit" style="margin: 0px 5px;">--}}
{{--                                    <i class="fas fa-file-csv"></i>Export To PDF--}}
{{--                                </a>--}}
                                <a href="{{route('export')}}"
                                   class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                   data-placement="top" title="Edit" style="margin: 0px 5px;">
                                    <i class="fas fa-file-csv"></i>Export To CSV
                                </a>

                                <a href="{{route('import.show')}}"
                                   class="text-info btn btn-xs btn-default" data-toggle="tooltip"
                                   data-placement="top" title="Edit" style="margin: 0px 5px;">
                                    <i class="fas fa-file-csv"></i>Import CSV
                                </a>
                            </form>
                            <br>

                        </div>
                    </div>
                </div>


                    <div class="col-md-10">
                        <table class="table  table-hover">
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Author</th>
                            </tr>
                            @foreach($news as $new)
                                <tr>
                                    <td><a href="{{route('news.view',$new ->id)}}">{{$new->title}}</a></td>
                                    <td>{{$new->news_date}}</td>
                                    <td>{{$new->user->name}}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection


@section('js')
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection


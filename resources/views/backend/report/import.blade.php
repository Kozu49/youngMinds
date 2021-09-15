@extends('backend.layouts.app')
@section('title')

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

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Import Excel
                        </div>
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                                @endif
                            @if(isset($errors) && $errors->any())
                                    <div class="alert alert-danger">
                                        {{$errors}}
                                    </div>
                                @endif
                                @if(session('failures'))
                                    <table class="table table-danger">
                                        <tr>
                                            <th>Row</th>
                                            <th>Attributes</th>
                                            <th>Errors</th>
                                            <th>Value</th>
                                        </tr>
                                        @foreach(session()->get('failures') as $validation)
                                            <tr>
                                                <td>{{$validation->row()}}</td>
                                                <td>{{$validation->attribute()}}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($validation->errors() as $e)
                                                            <li>
                                                                {{$e}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    {{$validation->values()[$validation->attribute()]}}
                                                </td>

                                            </tr>

                                        @endforeach
                                    </table>

                                @endif

                                <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" name="file">
                                        <button type="submit" class="btn btn-primary pull-right">Import</button>
                                    </div>
                                </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

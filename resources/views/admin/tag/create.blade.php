@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cтворення тегу:</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Головна </a></li>
                            <li class="breadcrumb-item"> Теги </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label> <h5 class="mb-2">Назва тегу</h5> </label>
                            <input type="text" class="col-4 form-control" name="title" placeholder="введіть тег">
                            @error('title')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                            @enderror
                        </div>
                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Добавити">
                        <a href="{{ route('tags.index') }}" type="button" class="col-2 mt-3 btn btn-block btn-info">Вийти</a>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection












{{--<div class="form-group">--}}
{{--    <label for="exampleInputPassword1">Password</label>--}}
{{--    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--    <label for="exampleInputFile">File input</label>--}}
{{--    <div class="input-group">--}}
{{--        <div class="custom-file">--}}
{{--            <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--            <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--        </div>--}}
{{--        <div class="input-group-append">--}}
{{--            <span class="input-group-text">Upload</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="form-check">--}}
{{--    <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--    <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--</div>--}}
{{--</div>--}}

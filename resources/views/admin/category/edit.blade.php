@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування категорії:</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Головна </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index')}}"> Категорії </a></li>
                            <li class="breadcrumb-item active"> {{ $category->title }} </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label> <h5 class="mb-2">Назва категорії</h5> </label>
                            <input type="text" class="col-4 form-control" name="title" value="{{ $category->title }}" placeholder="введіть категорію">
                            @error('title')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                            @enderror
                        </div>
                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Змінити">
                        <a href="{{ route('categories.index') }}" type="button" class="col-2 mt-3 btn btn-block btn-info">Вийти</a>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection













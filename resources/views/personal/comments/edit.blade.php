@extends('personal.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування коментарія:</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal')}}"> Головна </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('comments.index')}}"> Коментарі </a></li>
                            <li class="breadcrumb-item active"> </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label> <h5 class="mb-2">Текст коментаря</h5> </label>
                            <div>
                                <textarea class="form-control col-5" name="message" cols="80" rows="6">{{ $comment->message }}</textarea>
                            </div>

                            @error('message')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                            @enderror
                        </div>
                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Змінити">
                        <a href="{{ route('comments.index') }}" type="button" class="col-2 mt-3 btn btn-block btn-info">Вийти</a>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection













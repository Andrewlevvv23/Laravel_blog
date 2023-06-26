@extends('personal.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Мої коментарі під постами </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal')}}"> Головна </a></li>
                            <li class="breadcrumb-item"> Пости </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="mt-1">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список моїх коментарів:</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Назва</th>
                                        <th class="text-center">Редагувати</th>
                                        <th class="text-center"> Видалити </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr class="col-6">
                                            <td class="text-center"> {{ $comment->id }} </td>
                                            <td class="text-center"> {{ $comment->message }} </td>
                                            <td class="text-center"> <a href="{{ route('comments.edit', $comment->id) }}" class="text-success" > <i class="fas fa-pencil-alt"></i> </a> </td>                                            <td class="text-center">
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                    @csrf @method('delete')
                                                    <button class="border-0 bg-transparent">
                                                        <i class="text-danger fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="col-2 mt-4">--}}
                {{--                    <a type="button" class="btn btn-block btn-primary" href="{{ route('posts.create') }}"> Добавити </a>--}}
                {{--                </div>--}}
            </div>

        </section>

@endsection

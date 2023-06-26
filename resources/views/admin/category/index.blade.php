@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Категорії </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Головна </a></li>
                            <li class="breadcrumb-item"> Категорії </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="mt-1">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список всіх категорій на сайті</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва категорії</th>
                                        <th class="text-center"> Переглянути </th>
                                        <th class="text-center"> Редагувати </th>
                                        <th class="text-center"> Видалити </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr class="col-3">
                                                <td> {{ $category->id }} </td>
                                                <td> {{ $category->title }} </td>
                                                <td class="text-center"> <a href="{{ route('categories.show', $category->id) }}"> <i class=" far fa-eye"> </i> </a> </td>
                                                <td class="text-center"> <a href="{{ route('categories.edit', $category->id) }}" class="text-success" > <i class="fas fa-pencil-alt"></i> </a> </td>
                                                <td class="text-center">
                                                    <form action="{{route('categories.destroy', $category->id)}}" method="POST">
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
                <div class="col-2 mt-4">
                    <a type="button" class="btn btn-block btn-primary" href="{{ route('categories.create') }}"> Добавити </a>
                </div>
            </div>

        </section>

    </div>

@endsection

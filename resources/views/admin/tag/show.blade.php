@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h2 class="m-0 mr-3"> {{ $tag->title }} </h2>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="text-success" > <i class="fas fa-pencil-alt"></i> </a>
                        <form action="{{route('tags.destroy', $tag->id)}}" method="POST" class="ml-2">
                            @csrf @method('delete')
                            <button class="border-0 bg-transparent">
                                <i class="text-danger fas fa-trash"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Головна </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tags.index')}}"> Теги </a></li>
                            <li class="breadcrumb-item active"> {{ $tag->title }} </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <!-- main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Таблиця даних</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td> ID </td>
                                            <td> {{ $tag->id }} </td>
                                        </tr>
                                        <tr>
                                            <td> Назва </td>
                                            <td> {{ $tag->title }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('tags.index') }}" type="button" class="col-2 mt-3 btn btn-block btn-info">Вийти</a>
                    </div>
                </div>

            </div>

        </section>

    </div>

@endsection

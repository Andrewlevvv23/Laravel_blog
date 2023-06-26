@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування користувачів:</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Головна </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index')}}"> Користувачі </a></li>
                            <li class="breadcrumb-item active"> {{ $user->name }} </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label> <h5 class="mb-2">User name:</h5> </label>
                            <input type="text" class="col-4 form-control" name="name" value="{{ $user->name }}" placeholder="введіть користувача">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> <h5 class="mb-2">Email:</h5> </label>
                            <input type="email" class="col-4 form-control" name="email" value="{{ $user->email }}" placeholder="введіть емейл користувача">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Виберіть рівень доступу:</label>
                            <select class="col-4 form-control" name="role">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == $user->role ? 'selected' : '' }}
                                    > {{ $role }} </option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>

                        <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Змінити">
                        <a href="{{ route('users.index') }}" type="button" class="col-2 mt-3 btn btn-block btn-info">Вийти</a>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection













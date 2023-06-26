@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування поста:</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin')}}"> Головна </a></li>
                            <li class="breadcrumb-item"><a href="{{ route('posts.index')}}"> Пости </a></li>
                            <li class="breadcrumb-item active"> {{ $post->title }} </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


        <!-- main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label> <h5 class="mb-2">Назва поста</h5> </label>
                            <input type="text" class="col-4 form-control" name="title" value="{{ $post->title }}" placeholder="введіть назву">
                            @error('title')
                                <div class="text-danger">Це поле необхідно заповнити</div>
                            @enderror
                        </div>

                        <div class=" mt-4 form-group">
                            <textarea id="summernote" name="content" > {{ $post->content }} </textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile"> Добавлення превʼю: </label>
                            <div class="w-25 mb-4">
                                <img src="{{ Storage::url($post->preview_image) }}" alt="none photo" class="w-75">
                            </div>
                            <div class="input-group w-50">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label" >Добавити jpeg/png</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Завантаження</span>
                                </div>
                            </div>
                            @error('preview_image')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group"  >
                            <label for="exampleInputFile"> Добавлення головного зображення: </label>
                            <div class="w-25 mb-4">
                                <img src="{{ Storage::url($post->main_image) }}" alt="none photo" class="w-75" >
                            </div>
                            <div class="input-group w-50">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label" >Добавити jpeg/png</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Завантаження</span>
                                </div>
                            </div>
                            @error('main_image')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Виберіть категорію</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}
                                    > {{ $category->title }} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Теги для постів</label> <br>
                            <select class="select2 w-50" multiple="multiple" data-placeholder="Виберіть тег" name="tag_ids[]">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ $post->tags->contains($tag->id) ? 'selected' : '' }}
                                    > {{ $tag->title }}  </option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <input type="submit" class="col-2 mt-3 btn btn-block btn-primary" value="Змінити">
                            <a href="{{ route('posts.index') }}" type="button" class="col-2 mt-3 btn btn-block btn-info">Вийти</a>
                        </div>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection












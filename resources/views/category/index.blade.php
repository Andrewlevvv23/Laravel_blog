@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категорії</h1>
            <section class="featured-posts-section card-text">
                <ul class="col-md-12 list-group block-center">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <div>
                                <a href="{{ route('category.post.index', $category->id) }}" class="text-decoration-none"> {{ $category->title }} </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

    </main>
@endsection

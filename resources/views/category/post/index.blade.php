@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post mb-5" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                        </div>

                        <div  class="d-flex justify-content-between">
                            <p class="blog-post-category"> {{ $post->category->title }} </p>
                            <form action="{{ route('post.like.store', $post->id) }}" method="post"> @csrf
                                @auth
                                <span> {{ $post->liked_users_count }} </span>
                                <button class="border-0 bg-transparent">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart"> </i>
                                        @else
                                            <i class="far fa-heart"> </i>
                                        @endif
                                    @endauth
                                    @guest()
                                        <div>
                                            <span> {{ $post->liked_users_count }} </span>
                                            <i class="far fa-heart"> </i>
                                        </div>
                                    @endguest
                                </button>
                            </form>
                        </div>

                        <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink text-decoration-none">
                            <h6 class="blog-post-title shadow-sm p-3 mb-5 bg-white rounded"> {{ $post->title }} </h6>
                        </a>
                    </div>
                    @endforeach
                        <div class="row">
                            <div class="col-md-auto mx-auto mb-5">
                                <div> {{ $posts->withQueryString()->onEachSide(3)->links() }} </div>
                            </div>
                        </div>
                </div>
            </section>

        </div>

    </main>
@endsection

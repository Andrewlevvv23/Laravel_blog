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
                            <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                        </div>
                        <p class="blog-post-category"> {{ $post->category->title }} </p>
                        <a href="#!" class="blog-post-permalink">
                            <h6 class="blog-post-title"> {{ $post->title }} </h6>
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
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                </div>
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                <a href="#!" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Post Lists</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">

                                    <figure class="carousel-item active">
                                        <img src="{{ asset('assets/images/blog_widget_carousel.jpg') }}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Post popular-list</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $post)
                            <li class="post">
                                <a href="#!" class="post-permalink media">
                                    <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection

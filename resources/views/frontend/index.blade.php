@extends('layouts.frontend')

@section('content')

<!-- Page header with logo and tagline-->
<header class="bg-light border-bottom mb-4">
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="{{ asset($feature_post->cover) }}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        {{ $feature_post->created_at->diffForHumans() }}
                    </div>
                    <h2 class="card-title">{{ $feature_post->title }}</h2>
                    <p class="card-text">
                        <?= Str::words($feature_post->description, 20, '...') ?>
                    </p>
                    <a class="btn btn-primary" href="{{ route('DetailPage', $feature_post->id) }}">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{ asset($post->cover) }}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->created_at->diffForHumans() }}</div>
                            <h2 class="card-title h4">{{ $post->title }}</h2>
                            <p class="card-text">
                                <?= Str::words($post->description, 20, '...') ?>
                            </p>
                            <a class="btn btn-primary" href="{{ route('DetailPage', $post->id) }}">Read more →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination-->
            {{ $posts->links() }}
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach ($categories as $category)
                                    <li><a href="{{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>

@endsection

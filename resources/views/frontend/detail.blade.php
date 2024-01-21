@extends('layouts.frontend')

@section('content')

{{-- Page Content  --}}
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            {{-- Post Content  --}}
            <article>
                {{-- Post Header  --}}
                <header class="mb-4">
                    {{-- Post Title  --}}
                    <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                    {{-- Post Meta Content  --}}
                    <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->diffForHumans() }}</div>
                    {{-- Post Categories  --}}
                    <a href="" class="badge bg-secondary text-decoration-none link-light">
                        {{ $post->Category->name }}
                    </a>
                </header>
                {{-- Preview Image  --}}
                <figure class="mb-4">
                    <img src="{{ asset($post->cover) }}" alt="" class="img-fluid rounded">
                </figure>
                {{-- Post Content  --}}
                <section class="mb-5">
                    <p class="fs-5 mb-4">
                        <?= $post->description ?>
                    </p>
                </section>
            </article>

            {{-- Comment Section  --}}
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        {{-- Comment Form  --}}
                        <form action="" class="mb-4">
                            <textarea name="" class="form-control"
                            id="" rows="3" style="resize: none"></textarea>
                        </form>
                        {{-- Comment with nested comment  --}}
                        <div class="d-flex mb-4">
                            {{-- Parent Comment  --}}
                            <div class="flex-shrink-0">
                                <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                alt="" class="rounded-circle">
                            </div>
                            <div class="ms-3">
                                <div class="fw-bold">Commter Name</div>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, neque!

                                {{-- Child Comment 1 --}}
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0">
                                        <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                    alt="" class="rounded-circle">
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commter Name</div>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, neque!

                                        {{--nested Child Comment 1 --}}
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0">
                                                <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                            alt="" class="rounded-circle">
                                            </div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commter Name</div>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, neque!
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Single Comment  --}}
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                            alt="" class="rounded-circle">
                            </div>
                            <div class="ms-3">
                                <div class="fw-bold">Commter Name</div>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, neque!
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
        {{-- Side Widget  --}}
        <div class="col-lg-4">
            {{-- Side widget  --}}
            <div class="card mb-4">
                <div class="card-header">Latest Post</div>
                <div class="card-body">
                    @foreach ($latest_post as $post)
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('DetailPage', $post->id) }}" class="text-primary text-decoration-none text-bold">
                                {{ $post->title }}
                            </a>
                            <small class="text-muted">
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <p>
                            <?= Str::words($post->description, 20, '...') ?>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

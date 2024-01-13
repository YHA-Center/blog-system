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
                    <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                    {{-- Post Meta Content  --}}
                    <div class="text-muted fst-italic mb-2">Posted on January 1,2023</div>
                    {{-- Post Categories  --}}
                    <a href="" class="badge bg-secondary text-decoration-none link-light">Web Design</a>
                    <a href="" class="badge bg-secondary text-decoration-none link-light">Web Design</a>
                </header>
                {{-- Preview Image  --}}
                <figure class="mb-4">
                    <img src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="" class="img-fluid rounded">
                </figure>
                {{-- Post Content  --}}
                <section class="mb-5">
                    <p class="fs-5 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aliquam!</p>
                    <p class="fs-5 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aliquam!</p>
                    <p class="fs-5 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aliquam!</p>
                    <h2 class="fw-bolder mb-4 mt-5">Lorem ipsum dolor sit.</h2>
                    <p class="fs-5 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aliquam!</p>
                    <p class="fs-5 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, aliquam!</p>
                </section>
            </article>
            {{-- Comment Section  --}}
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        {{-- Comment Form  --}}
                        <form action="" class="mb-4">
                            <textarea name="" class="form-control"
                            id="" rows="5" style="resize: none"></textarea>
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
            {{-- Search widget  --}}
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" placeholder="Enter search term..." class="form-control">
                        <button class="btn btn-primary"></button>
                    </div>
                </div>
            </div>
            {{-- Category widget  --}}
            <div class="card-mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Web Design</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Web Design</a></li>
                                <li><a href="">Web Design</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Side widget  --}}
            <div class="card mb-4">
                <div class="card-header">Side widget</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, dolores.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

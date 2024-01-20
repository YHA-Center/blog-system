@extends('layouts.backend')
@section('title', 'Create Post')
@section('content')
    <div class="container-fluid">
        {{-- Page Heading  --}}
        <h1 class="h3 mb-2 text-gray-800">Post</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
        @endif
        {{-- DataTable Example --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
            </div>
            <div class="d-flex p-1 align-items-center justify-content-center">
                <img class="thumbnail-img" width="500" src="{{ asset($post->cover) }}" alt="">
            </div>
            <div class="card-body">
                <form action="{{ route('PostUpdate', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control"
                        value="{{ old('title', $post->title) }}" name="title" placeholder="Movie">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="0">-- Choose Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                @if ($post->category_id == $category->id)
                                    selected
                                @endif    
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="summernote">{{ old('description', $post->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('PostList') }}" class="btn btn-secondary btn-sm btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">Cancel</span>
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-up"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
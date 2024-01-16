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
            <div class="card-body">
                <form action="{{ route('PostStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Movie">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="0" disabled>-- Choose Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="summernote"></textarea>
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
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Create</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
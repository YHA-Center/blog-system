@extends('layouts.backend')
@section('title', 'Create Category')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4 ">
            <div class="card-header">
                <h3 class="m-0 fw-bold text-primary">Edit Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="categoryName" value="{{ $data->name }}" id="categoryName" placeholder="Movie">
                    </div>
                    <div class="mb-3">
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

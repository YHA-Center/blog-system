@extends('layouts.backend')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid">
        {{-- Page Heading  --}}
        <h1 class="h3 mb-2 text-gray-800">Profile</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('val'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('val') }}</li>
                </ul>
            </div>
        @endif
        {{-- DataTable Example --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('UpdateAdminProfile') }}" method="POST">
                    @csrf
                    {{-- Name  --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name"
                        value="{{ old("name", Auth::user()->name) }}" placeholder="Name">
                    </div>
                    {{-- Email  --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"
                        value="{{ old("email", Auth::user()->email) }}" placeholder="Email">
                    </div>

                    {{-- Current Password  --}}
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('cpassword') is-invalid  @enderror"
                        name="cpassword"
                        value="{{ old("cpassword") }}" placeholder="Current Password">
                        @error('cpassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- New Password  --}}
                    <div class="mb-3">
                        <label for="npassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="npassword"
                        value="{{ old("npassword") }}" placeholder="New Password">
                    </div>

                    {{--Confirm New Password  --}}
                    <div class="mb-3">
                        <label for="cnpassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" name="cnpassword"
                        value="{{ old("cnpassword") }}" placeholder="New Password">
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
                            <span class="text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

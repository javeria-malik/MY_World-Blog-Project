<!-- resources/views/admin/edit_category.blade.php -->
@extends('admin.layout') <!-- Assuming you have a common admin layout -->

@section('content')
    <div class="container mt-5">
        <h1>Edit Category</h1>
        
        <!-- Display any success or error messages -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Edit Category Form -->
        <form action="{{ route('admin.updateCategory', $category->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Spoof PUT method for Laravel to treat this as a PUT request -->
            
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
        
        <a href="{{ route('categories') }}" class="btn btn-secondary mt-3">Back to Categories</a>
    </div>
@endsection

@extends('layouts.backend.master')

@section('header','Subcategory Create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Create Subcategory</h3>
            </div>
            <form action="{{ route('admin.subcategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Subcategory Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="choose Category">Choose Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">Selected Subcategory</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


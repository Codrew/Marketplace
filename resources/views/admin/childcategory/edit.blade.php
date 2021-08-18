@extends('layouts.backend.master')

@section('header','Childcategory Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit Childcategory</h3>
            </div>
            <form action="{{ route('admin.childcategory.update',$childcategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $childcategory->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="choose Category">Choose Subcategory</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="subcategory_id">
                            <option value="">Selected Subcategory</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ $childcategory->subcategory_id == $subcategory->id ? 'selected': '' }}>
                                {{ $subcategory->name }}
                            </option>
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
                    <a href="{{ route('admin.childcategory.index') }}" class="btn btn-danger">back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
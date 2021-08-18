@extends('layouts.backend.master')

@section('header','Subcategory Create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Create Childcategory</h3>
            </div>
            <form action="{{ route('admin.childcategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Childcategory Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="choose Category">Choose Category</label>
                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                            <option value="">Selected Category</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
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


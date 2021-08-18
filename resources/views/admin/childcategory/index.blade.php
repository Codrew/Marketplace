@extends('layouts.backend.master')

@section('content')
<div class="row">
    <div class="col-12">
        <x-message/>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subcategory</th>
                            <th scope="col">Childcategory</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($childcategories as $childcategory)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $childcategory->subcategory->name}}</td>
                            <td>{{ $childcategory->name }}</td>
                            <td>
                                <a href="{{ route('admin.childcategory.edit',$childcategory->id) }}" class="btn btn-primary"><i
                                        class="fas fa-pen"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $childcategory->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $childcategory->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="{{ route('admin.childcategory.destroy',$childcategory->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this <p class="text-danger" style="display:inline">{{ $childcategory->name }}</p> category
                                                    ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <td>No Subcategory</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
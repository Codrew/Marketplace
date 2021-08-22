@extends('layouts.app')

@push('css')
    <style>
        .vertical-menu a {
            background-color: #fff;
            color: #000;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: red;
            color: #fff;
        }

        .vertical-menu a.active {
            background-color: red;
            color: #fff
        }

    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ads as $key=>$ad)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <div id="carouselExampleControls{{ $ad->id }}" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ Storage::url($ad->feature_image) }}" width="200">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ Storage::url($ad->first_image) }}" width="200">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ Storage::url($ad->second_image) }}" width="200">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev"
                                                    href="#carouselExampleControls{{ $ad->id }}" role="button"
                                                    data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next"
                                                    href="#carouselExampleControls{{ $ad->id }}" role="button"
                                                    data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $ad->name }}</td>
                                        <td class="text-danger">Rp. {{ $ad->price }}</td>
                                        <td>
                                            @if ($ad->published == 1)
                                                <span class="badge badge-success">Published</span>
                                            @else
                                                <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('ads.edit', $ad->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a></td>
                                        <td>
                                            <button class="btn btn-secondary btn-sm">View</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $ad->id }}">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $ad->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('ads.destroy', $ad->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Yes, delete
                                                                    it</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td> You don't have any ads </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

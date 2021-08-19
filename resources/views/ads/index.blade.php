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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ads as $key=>$ad)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{ Storage::url($ad->feature_image) }}" width="80">
                                    <img src="{{ Storage::url($ad->first_image) }}" width="80">
                                    <img src="{{ Storage::url($ad->second_image) }}" width="80">
                                </td>
                                <td>{{ $ad->name }}</td>
                                <td class="text-danger">Rp. {{ $ad->price }}</td>
                                <td>
                                    @if($ad->published ==1)
                                    <span class="badge badge-success">Published</span>
                                    @else
                                    <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('ads.edit',$ad->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td><button class="btn btn-secondary btn-sm">View</button></td>
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
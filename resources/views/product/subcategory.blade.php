@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color:red">Filter:</div>
                    <div class="card-body">
                        @foreach ($filterBychildCategory as $filter)
                            <p>
                                <a
                                    href="{{ url()->current() }}/{{ $filter->childcategory->slug ?? '' }}">{{ $filter->childcategory->name ?? '' }}</a>
                            </p>
                        @endforeach
                    </div>
                </div>
                <br>
                <form action="{{ url()->current() }}" method="get">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Minimun Price</label>
                                <input type="text" class="form-control" name="minPrice">
                            </div>
                            <div class="form-group">
                                <label>Max Price</label>
                                <input type="text" class="form-control" name="maxPrice">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse($ads as $ad)
                        <div class="col-3">
                            <a href="{{ route('product.show', [$ad->id, $ad->slug]) }}">
                                <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail">
                                <p class="text-center  card-footer" style="color: blue;">
                                    {{ $ad->name }} / USD {{ $ad->price }}
                                </p>
                            </a>
                        </div>
                    @empty
                        Sorry, we are unable to find product based on this category
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

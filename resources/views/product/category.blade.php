@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color:red">Filter:</div>
                    <div class="card-body">
                        @foreach ($filterBySubcategory as $filter)
                            <p>
                                <a
                                    href="{{ url()->current() }}/{{ $filter->slug ?? '' }}">{{ $filter->name ?? '' }}</a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse($ads as $ad)
                        <div class="col-3">
                            <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail">
                            <p class="text-center  card-footer" style="color: blue;">
                                {{ $ad->name }} / USD {{ $ad->price }}
                            </p>
                        </div>
                    @empty
                        Sorry, we are unable to find product based on this category
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

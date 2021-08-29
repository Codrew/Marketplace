@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ Storage::url($ads->feature_image) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ Storage::url($ads->first_image) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ Storage::url($ads->second_image) }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <p>{!! $ads->description !!}</p>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">More Info</div>
                <div class="card-body">
                    <p>Country : {{ $ads->country->name }}</p>
                    <p>State : {{ $ads->state->name }}</p>
                    <p>City : {{ $ads->city->name }}</p>
                    <p>Product Condition : {{ $ads->product_condition }}</p>
                </div>
            </div>
            <hr>
            
            <div class="card">
                <div class="card-body">
                    {!! $ads->displayVideo() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $ads->name }}</h1>
            <p>Price : {{ $ads->price }} USD, {{ $ads->price_status }}</p>
            <p>Posted : {{ $ads->created_at->diffForHumans() }}</p>
            <p>Listing Location : {{ $ads->listing_location }}</p>
            <hr>
            @if(!$ads->user->avatar)
            <img src="/img/man.jpg" width="120">
            @else
            <img src="{{ Storage::url($ads->user->avatar) }}" width="120">
            @endif
            <p>
                {{ $ads->user->name }}
                @If(Auth::check())
                <span>
                    <message
                    seller-name = "{{ $ads->user->name }}" 
                    :user-id = "{{ auth::user()->id }}"
                    :reciver-id = "{{ $ads->user->id }}"
                    :ad-id = "{{ $ads->id }}"
                    />
                </span>
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="slider" style="margin-top: -25px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/slider/slider1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/slider2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/slider3.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <span>
        <h1>Game</h1>
        <a href="{{ route('category.show',$category->slug) }}" class="float-right">View all</a>
    </span>
    <br>
    <div id="carouselExampleFade{{ $category->id }}" class="carousel slide" data-ride="carousel" data-interval="2500">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="row">
                    @forelse($ads as $key=>$ad)
                    <div class="col-3">
                        <a href="{{ route('product.show',[$ad->id,$ad->slug]) }}">
                        <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail">
                        <p class="text-center  card-footer" style="color: blue;">
                            {{ $ad->name }} <span class="text-danger">${{ $ad->price }}<span>
                        </p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    @forelse($ads2 as $key=>$ad)
                    <div class="col-3">
                        <a href="{{ route('product.show',[$ad->id,$ad->slug]) }}">
                        <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail">
                        <p class="text-center  card-footer" style="color: blue;">
                            {{ $ad->name }} <span class="text-danger">${{ $ad->price }}<span>
                        </p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade{{ $category->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade{{ $category->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <span>
        <h1>Movie</h1>
        <a href="{{ route('category.show',$categoryMovie->slug) }}" class="float-right">View all</a>
    </span>
    <br>
    <div id="carouselExampleFade{{ $categoryMovie->id }}" class="carousel slide" data-ride="carousel" data-interval="2500">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="row">
                    @forelse($adsMovie as $key=>$ad)
                    <div class="col-3">
                        <a href="{{ route('product.show',[$ad->id,$ad->slug]) }}">
                        <img src="{{ Storage::url($ad->feature_image) }}" class="img-thumbnail">
                        <p class="text-center  card-footer" style="color: blue;">
                            {{ $ad->name }} <span class="text-danger">${{ $ad->price }}<span>
                        </p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    @forelse($ads2Movie as $key=>$adMovie)
                    <div class="col-3">
                        <a href="{{ route('product.show',[$adMovie->id,$adMovie->slug]) }}">
                        <img src="{{ Storage::url($adMovie->feature_image) }}" class="img-thumbnail">
                        <p class="text-center  card-footer" style="color: blue;">
                            {{ $adMovie->name }} <span class="text-danger">${{ $adMovie->price }}<span>
                        </p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade{{ $categoryMovie->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade{{ $categoryMovie->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection
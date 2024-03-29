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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        @foreach ($errors->all() as $errorMessage)
                            <li>{{ $errorMessage }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-white" style="background-color: red">
                        Post your ads.
                    </div>
                    <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <label><b>Upload 3 images</b></label>
                            <div class="form-group form-inline">
                                <div class="col-4">
                                    <image-preview />
                                </div>
                                <div class="col-4">
                                    <first-preview />
                                </div>
                                <div class="col-4">
                                    <second-preview />
                                </div>
                            </div>
                            <label><b>Choose Category</b></label>
                            <div class="form-group">
                                <category-dropdown />
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control" id="mytextarea" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label>Price Status</label>
                                <select class="form-control" name="price_status">
                                    <option value="negotiable">Negotiable</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Condition</label>
                                <select class="form-control" name="product_condition">
                                    <option value="">Select</option>
                                    <option value="new">New</option>
                                    <option value="likenew">Looks like New</option>
                                    <option value="heavilyused">Heavily Used</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Listing location</label>
                                <input type="text" class="form-control" name="listing_location">
                            </div>
                            <label><b>Choose Address</b></label>
                            <div class="form-group">
                                <address-dropdown />
                            </div>
                            <div class="form-group">
                                <label>Seller Contact Number</label>
                                <input type="number" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label>Demo link of product(e:youtube)</label>
                                <input type="text" class="form-control" name="link">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Publish</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        $("#state1").change(function() {
            var val2 = $("option:selected", this).data("state2");
            $("#state2").val(val2);
        });
    </script>
@endpush

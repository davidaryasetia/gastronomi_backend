{{-- @php 
dump($food->toArray())
@endphp --}}

@push('css')
    <style>
        .justified-text {
            text-align: justify;
        }
    </style>
@endpush


@extends('layouts.main')
@section('row')
    <div class="container-fluid background-color">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between align-items-center mb-9">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <a href="{{ route('food.index') }}" class="d-flex align-items-center"><i
                                            class="ti ti-arrow-left me-3" style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Detail Food : {{ $food->name }} |
                                        @foreach ($food->tag_foods as $tag_food)
                                            {{ $tag_food->nametag }},
                                        @endforeach </span>
                                </div>
                            </div>
                        </div>

                        {{-- Main Section --}}
                        <div class="row mb-4">
                            <div class="col-lg-2 text-center text-lg-left">
                                @if ($food->photo_path)
                                    <img src="{{ asset('storage/' . $food->photo_path) }}" alt="Food Photo"
                                        class="img-fluid rounded" width="164px">
                                @else
                                    <p>No Photo Available</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h5>Name Food</h5>
                                <p> {{ $food->name }} </p>
                            </div>
                            <div class="col-md-6">
                                <h5>Category Of Food</h5>
                                <p> {{ $food->category }} </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 justified-text">
                                <h5>Description Of Food</h5>
                                <p> {{ $food->description }} </p>
                            </div>
                            <div class="col-md-6 justified-text">
                                <h5>History Of Food</h5>
                                <p> {{ $food->food_historical }} </p>
                            </div>
                        </div>
                        <div class="row mb-2 justified-text">
                            <div class="col-md-6">
                                <h5>Nutrition Of Food</h5>
                                <p> {{ $food->nutrition }} </p>
                            </div>
                            <div class="col-md-6">
                                <h5>URL Youtube Direction Of Food</h5>
                                <p> <a href="{{ $food->url_youtube }}" target="_blank">{{ $food->url_youtube }}</a> </p>
                            </div>
                        </div>
                        <div class="row mb-2 justified-text">
                            <div class="col-md-6">
                                <h5>Ingredients</h5>
                                <p> {!! $food->ingredients !!} </p>
                            </div>
                            <div class="col-md-6 justified-text">
                                <h5>Directions</h5>
                                <p> {!! $food->directions !!} </p>
                            </div>
                        </div>
                        <div class="row mb-2 justified-text">
                            <div class="col-md-6">
                                <h5>Detail Food Foto</h5>
                                @foreach ($food->food_photos as $food_photo)
                                    <img src="{{ asset('storage/' . $food_photo->photo_path) }}" alt="Food Photo"
                                        width="128px">
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <h5>Detail Historical Photo</h5>
                                @foreach ($food->photos as $photo)
                                    <img src="{{ asset('storage/' . $photo->photo) }}" alt="History foto" width="128px">
                                @endforeach
                            </div>
                        </div>

                        {{-- END Main Section --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

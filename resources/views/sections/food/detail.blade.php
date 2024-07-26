@push('css')
    <style>
        .justified-text{
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
                                    <a href="/food" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Detail Food : {{ $food->name }} </span>
                                </div>

                            </div>
                        </div>

                        {{-- Main Section --}}
                            <div class="row mb-4">
                                <div class="col-12">
                                    @if ($food->photo_path)
                                        <img src="{{ asset('storage/' . $food->photo_path) }}" alt="Food Photo"
                                            class="img-fluid rounded" width="128px">
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
                                    <p> {{ $food->url_youtube }} </p>
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
                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>

    @push('script')
    @endpush
@endsection

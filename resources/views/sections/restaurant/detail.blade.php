{{-- @php
    dump($restaurant->toArray());
@endphp --}}


@push('css')
    <style>
        .justified-text {
            text-align: justify;
        }

        .label {
            display: inline-block;
            min-width: 100px;
            color: black;
        }

        .food-section-list {
            list-style-type: disc;
            padding-left: 14px;
            margin-left: 0;
        }

        .food-section-list li {
            margin-left: 14px;
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
                                    <a href="{{ route('restaurant.index') }}" class="d-flex align-items-center"><i
                                            class="ti ti-arrow-left me-3" style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Detail Restaurant :
                                        {{ $restaurant->name_restaurant }}
                                        | <span style="color: green">Available On : </span> {{ $restaurant->open_at }} -
                                        {{ $restaurant->close_at }} </span>
                                </div>
                            </div>
                        </div>

                        {{-- Main Section --}}
                        <div class="row mb-4">
                            <div class="col-lg-2 text-center text-lg-left">
                                @if ($restaurant->photo_path)
                                    <img src="{{ asset('storage/' . $restaurant->photo_path) }}" alt="Food Photo"
                                        class="img-fluid rounded" width="164px">
                                @else
                                    <p>No Photo Available</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h5>Name Restaurant</h5>
                                <p> {{ $restaurant->name_restaurant }} </p>
                            </div>
                            <div class="col-md-6">
                                <h5>Address</h5>
                                <p> {{ $restaurant->address }} </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 justified-text">
                                <h5>Latitude Of Restaurant</h5>
                                <p> {{ $restaurant->latitude }} </p>
                            </div>

                            <div class="col-md-6 justified-text">
                                <h5>Longitude Of Restaurant</h5>
                                <p> {{ $restaurant->longitude }} </p>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="row mb-2">
                            <div class="col-md-6 justified-text">
                                <h5>Description About Restaurant</h5>
                                <p> {{ $restaurant->description }} </p>
                            </div>

                            <div class="col-md-6 justified-text">
                                <h5>URL Link Map Restaurant</h5>
                                <p> <a href="{{ $restaurant->url_link_map }}"
                                        target="_blank">{{ $restaurant->url_link_map }}</a> </p>

                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="mb-4">
                                    <span style="color: rgb(85, 85, 85); font-size: 24px">List Menu Of Restaurant</span>
                                </div>
                                <div class="col-md-6 justified-text">
                                    <h5>Food Section</h5>
                                    <ul class="food-section-list">
                                        @foreach ($restaurant->menus as $data_menu)
                                            @if ($data_menu['type_food'] == 'Food')
                                                <li>
                                                    <p> {{ $data_menu->name }} </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6 justified-text">
                                    <h5>Drink Sections</h5>
                                    <ul class="food-section-list">
                                        @foreach ($restaurant->menus as $data_menu)
                                            @if ($data_menu['type_food'] == 'Drink')
                                                <li>
                                                    <p> {{ $data_menu->name }} </p>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                            <hr>
                            {{-- <hr> --}}
                            <div class="row mb-2 justified-text">
                                <div class="col-md-12">
                                    <h5>Detail Restaurant Photo</h5>
                                    @foreach ($restaurant->restaurant_photos as $restaurant_photo)
                                        <img src="{{ asset('storage/' . $restaurant_photo->photo_path) }}"
                                            alt="Restaurant Photo" width="128px">
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

{{-- @php
    dump($village->toArray());
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
                                    <a href="/village" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Detail Culture : {{ $village->name_village }}
                                        | <span style="color: green">Available On : </span> {{ $village->open_at }} -
                                        {{ $village->close_at }} </span>
                                </div>
                            </div>
                        </div>

                        {{-- Main Section --}}
                        <div class="row mb-4">
                            <div class="col-lg-2 text-center text-lg-left">
                                @if ($village->photo_path)
                                    <img src="{{ asset('storage/' . $village->photo_path) }}" alt="Food Photo"
                                        class="img-fluid rounded" width="164px">
                                @else
                                    <p>No Photo Available</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h5>Name Culture</h5>
                                <p> {{ $village->name_village }} </p>
                            </div>
                            <div class="col-md-6">
                                <h5>Address</h5>
                                <p> {{ $village->address }} </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 justified-text">
                                <h5>Description Of Food</h5>
                                <p> {{ $village->description }} </p>
                            </div>

                            <div class="col-md-6 justified-text">
                                <h5>Fasility Of Description</h5>
                                <p> {{ $village->fasility }} </p>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="row mb-2">
                            <div class="col-md-6 justified-text">
                                <h5>Mandatory Of Equipment</h5>
                                <p> {{ $village->mandatory_equipment }} </p>
                            </div>

                            <div class="col-md-6 justified-text d-flex flex-column">
                                <div class="mb-2">
                                    <h5>Contact Information About Village : </h5>
                                </div>
                                <div class="">
                                    <p> <span class="label" style="color: black"> URL Website </span><span
                                            style="color: black">:</span><a href=" {{ $village->url_website }}"
                                            target="_blank">{{ $village->url_website }}</a> </p>
                                </div>
                                <div class="">
                                    <p> <span class="label" style="color: black"> URL Facebook </span><span
                                            style="color: black">:</span><a href=" {{ $village->url_facebook }}"
                                            target="_blank">{{ $village->url_facebook }}</a> </p>
                                </div>
                                <div class="">
                                    <p> <span class="label" style="color: black"> URL Instagram </span><span
                                            style="color: black">:</span><a href=" {{ $village->url_instagram }}"
                                            target="_blank">
                                            {{ $village->url_instagram }}</a></p>
                                </div>
                                <div class="">
                                    <p> <span class="label" style="color: black"> URL Twitter </span><span
                                            style="color: black">:</span><a href=" {{ $village->url_twitter }}"
                                            target="_blank">
                                            {{ $village->url_twitter }}</a> </p>
                                </div>


                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="row mb-2 justified-text">
                            <div class="col-md-12">
                                <h5>Detail Village Photo</h5>
                                @foreach ($village->village_photos as $village_photo)
                                    <img src="{{ asset('storage/' . $village_photo->photo_path) }}" alt="Food Photo"
                                        width="128px">
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


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
                                    <a href="/culture" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Detail Culture : {{ $culture->name_culture }} </span>
                                </div>
                            </div>
                        </div>

                        {{-- Main Section --}}
                            <div class="row mb-4">
                                <div class="col-lg-2 text-center text-lg-left">
                                    @if ($culture->photo_path)
                                        <img src="{{ asset('storage/' . $culture->photo_path) }}" alt="Food Photo"
                                            class="img-fluid rounded" width="164px">
                                    @else
                                        <p>No Photo Available</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <h5>Name Culture</h5>
                                    <p> {{ $culture->name_culture }} </p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Youtube About Culture</h5>
                                    <p> <a href="{{ $culture->url_youtube }}" target="_blank">{{ $culture->url_youtube }}</a> </p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 justified-text">
                                    <h5>Description Of Food</h5>
                                    <p> {{ $culture->description }} </p>
                                </div>
                                
                            </div>
                            
                            <div class="row mb-2 justified-text">
                                <div class="col-md-12">
                                    <h5>Detail Culture Foto</h5>
                                    @foreach($culture->culture_photos as $culture_photo)
                                        <img src="{{asset('storage/' . $culture_photo->photo_path)}}" alt="Food Photo" width="128px">
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

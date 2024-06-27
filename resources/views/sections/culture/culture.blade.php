@extends('layouts.main')

@section('row')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="d-flex align-items-center mb-3 mb-sm-0">
                                <div class="me-3">
                                    <span class="card-title fw-semibold">List Of Culture People</span>
                                </div>
                                <div class="me-2">
                                    <a href="unit_kerja/create" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Culture</a>
                                </div>

                            </div>
                        </div>

                        {{-- Main Section --}}
                        <div class="col-lg-12">
                            @foreach($culture as $data_culture)
                                <div class="shadow-none border mb-3">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="me-3">
                                            <img src="{{ asset('storage/' . $data_culture->photo_path) }}" class=""
                                                alt="..." style="border-radius: 8px" width="128px">
                                        </div>

                                        <div class="col-lg-9">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title" style="font-weight: 400"> {{$data_culture->name_culture}}
                                                </h5>
                                            </div>
                                            <p class="card-text"> {{ Str::limit($data_culture->description, 140) }} </p>
                                            <span><a href="">Detail Culture......</a></span>
                                        </div>
                                        <div class="col-lg-1">
                                            <p class="mb-0 fw-normal text-center"><a href=""><i
                                                        class="ti ti-pencil"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

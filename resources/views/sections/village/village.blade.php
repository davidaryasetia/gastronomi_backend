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
                                    <span class="card-title fw-semibold">List Of Village Destination</span>
                                </div>
                                <div class="me-2">
                                    <a href="unit_kerja/create" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Village Destination</a>
                                </div>

                            </div>
                        </div>

                        {{-- Main Section --}}
                        <div class="col-lg-12">
                            @foreach($village as $data_village)
                            <div class="shadow-none border mb-3">
                                <div class="card-body d-flex align-items-center">
                                    @if($data_village->village_photos->isNotEmpty())
                                    @php 
                                    $first_photo = $data_village->village_photos->first();
                                    @endphp
                                    <div class="me-3">
                                        <img src="{{ asset('storage/' . $first_photo->photo_path ) }}" class="" alt="..."
                                            style="border-radius: 8px" width="146px">
                                    </div>
                                    @endif
                                  
                                    <div class="col-lg-9">
                                        <h5 class="card-title" style="font-weight: 400"> {{$data_village->name_village}} </h5>
                                       <p class="cart-text"><i class="ti ti-map-pin text-primary"></i><span class="text-primary">
                                        {{$data_village->address}} </span></p>
                                        <p class="card-text"> {{Str::limit($data_village->fasility, 140 )}} </p>
                                        <span><a href="">Detail....</a></span>
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

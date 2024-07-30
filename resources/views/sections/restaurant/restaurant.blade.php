@php 
dump($restaurant->toArray());
@endphp
@dd($restaurant->toArray());
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
                                    <span class="card-title fw-semibold">List Restaurant Destination</span>
                                </div>
                                <div class="me-2">
                                    <a href="{{ route('restaurant.create') }}" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Restaurant</a>
                                </div>
                            </div>

                            {{-- Alert Message --}}
                            <div class="alert-container">
                                @if (session('success'))
                                    <div class="alert alert-primary" style="" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" style="" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            <script>
                                setTimeout(function() {
                                    document.querySelectorAll('.alert').forEach(function(alert) {
                                        alert.style.display = "none";
                                    });
                                }, 5000)
                            </script>
                        </div>

                        <!-- Main Section -->
                        <div class="col-lg-12">
                            <div id="foodContainer">
                                @foreach ($restaurant as $data_restaurant)
                                    <div class="shadow-none border mb-3 food-item">
                                        <div
                                            class="card-body d-flex flex-column justify-content-between flex-md-row align-items-center">
                                            <div class="me-3 mb-3 mb-md-0">
                                                <img src="{{ asset('storage/' . $data_restaurant->photo_path) }}"
                                                    class="img-fluid" alt="..." style="border-radius: 8px"
                                                    width="128px">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="card-title" style="font-weight: 400"> {{ $data_restaurant->name_restaurant }}
                                                    </h5>
                                                </div>
                                                <p class="card-text"> {{ Str::limit($data_restaurant->description, 140) }} </p>
                                                <span><a href="{{ route('restaurant.show', $data_restaurant->restaurant_id) }}">Detail
                                                        Food......</a></span>
                                            </div>
                                            <div class="col-md-1 text-center d-flex align-items-center">
                                                <p class="mb-0 fw-normal me-2"><a
                                                        href="{{ route('restaurant.edit', $data_restaurant->restaurant_id) }}"><i
                                                            class="ti ti-pencil"></i></a>
                                                <div class="divider"></div>
                                                <form action="{{ route('restaurant.destroy', $data_restaurant->restaurant_id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Can You Sure To Delete Restaurant : {{ $data_restaurant->name_restaurant }} ? ')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- END Main Section -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    @push('script')
    @endpush
@endsection

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
                                    <span class="card-title fw-semibold">List Food Culinary</span>
                                </div>
                                <div class="me-2">
                                    <a href="{{ route('food.create') }}" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Food</a>
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
                                @foreach ($food as $data_food)
                                    <div class="shadow-none border mb-3 food-item">
                                        <div
                                            class="card-body d-flex flex-column justify-content-between flex-md-row align-items-center">
                                            <div class="me-3 mb-3 mb-md-0">
                                                <img src="{{ asset('storage/' . $data_food->photo_path) }}"
                                                    class="img-fluid" alt="..." style="border-radius: 8px"
                                                    width="128px">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="card-title" style="font-weight: 400"> {{ $data_food->name }}
                                                    </h5>
                                                </div>
                                                <p class="card-text"> {{ Str::limit($data_food->description, 200) }} </p>
                                                <span><a href="{{ route('food.show', $data_food->food_id) }}">Detail
                                                        Food......</a></span>
                                            </div>
                                            <div class="col-md-1 text-center d-flex align-items-center">
                                                <p class="mb-0 fw-normal me-2"><a
                                                        href="{{ route('food.edit', $data_food->food_id) }}"><i
                                                            class="ti ti-pencil"></i></a>
                                                <div class="divider"></div>
                                                <form action="{{ route('food.destroy', $data_food->food_id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Can You Sure To Delete This Food : {{ $data_food->name }} ? ')">
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

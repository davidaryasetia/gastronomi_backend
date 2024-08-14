@push('css')
    <style>
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
                                    <span class="card-title fw-semibold me-3">Tambah Data Menu Restaurant</span>
                                </div>


                            </div>
                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data"
                            id="VillageForm">
                            @csrf

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name_restaurant" class="form-label">Name Restaurant</label>
                                    <input type="text"
                                        class="form-control @error('name_restaurant') is-invalid @enderror"
                                        id="name_restaurant" name="name_restaurant" aria-describedby="emailHelp"
                                        value="{{ old('name_restaurant') }}" placeholder="Input Name Of Restaurant...."
                                        required />
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="address" class="form-label">address Of Restaurant</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" aria-describedby="emailHelp"
                                        value="{{ old('address') }}" placeholder="Input Address Of Restaurant...."
                                        required />
                                    @error('address')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="open_at" class="form-label">Open At</label>
                                    <div class="form-group">
                                        <div class="input-group time" id="timepicker1">
                                            <input type="text" class="form-control" name="open_at" id="timepicker-input1"
                                                placeholder="Select Input Time Open Village...." required />
                                            <span class="input-group-text"><i class="ti ti-clock"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="open at" class="form-label">Close At</label>
                                    <div class="form-group">
                                        <div class="input-group time" id="timepicker2">
                                            <input type="text" class="form-control" name="close_at"
                                                id="timepicker-input2" placeholder="Select Input Time Close Village...."
                                                required />
                                            <span class="input-group-text"><i class="ti ti-clock"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="latitude" class="form-label">Latitude Of Restaurant</label>
                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                        id="latitude" name="latitude" aria-describedby="emailHelp"
                                        value="{{ old('latitude') }}"
                                        placeholder="Input Latitude Location Of Restaurant...." required />


                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="longitude" class="form-label">Longitude Of Restaurant</label>
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                        id="longitude" name="longitude" aria-describedby="emailHelp"
                                        value="{{ old('longitude') }}"
                                        placeholder="Input Longitude Location Of Restaurant...." required />
                                    @error('longitude')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="description" class="form-label">Description Of Restaurant</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="6" aria-describedby="emailHelp"
                                        placeholder="Input Description About This Restaurant..." required autofocus>{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_link_map" class="form-label">URL Link Map Restaurant</label>
                                    <textarea type="text" class="form-control @error('url_link_map') is-invalid @enderror" id="url_link_map"
                                        name="url_link_map" rows="6" aria-describedby="emailHelp"
                                        placeholder="Input URL Link Map About Restaurant..." required autofocus>{{ old('url_link_map') }}</textarea>
                                    @error('url_link_map')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            {{-- Restaurant Menus.* --}}
                            {{-- Restaurant Menus.* --}}
                            <div class="ikuk-fields">
                                <div class="d-flex align-items-center mb-4">
                                    <span for="menus" class="me-2" style="color: black">List Of Menu
                                        Restaurant</span>
                                    <button type="button" class="btn btn-sm rounded-pill btn-primary" id="addData">
                                        <span class=""><i class="ti ti-plus me-1"></i>Add Menu</span>
                                    </button>
                                </div>
                                <div class="ikuk-template">
                                    <div class="row mb-3 align-items-center">
                                        <div class="mb-2 col-lg-4">
                                            <label for="menu" class="form-label">Menu</label>
                                            <input type="text" class="form-control @error('menu') is-invalid @enderror"
                                                id="menu" name="menu[]" aria-describedby="emailHelp"
                                                value="{{ old('menu') }}" placeholder="Input menu......." required />
                                            @error('menu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-2 col-lg-4">
                                            <label for="type_food" class="form-label">Type Food</label>
                                            <select id="type_food" name="type_food[]"
                                                class="form-select @error('type_food') is-invalid @enderror">
                                                <option value="">Choice Type Food....</option>
                                                <option value="Food" {{ old('type_food') == 'Food' ? 'selected' : '' }}>
                                                    Food
                                                </option>
                                                <option value="Drink"
                                                    {{ old('type_food') == 'Drink' ? 'selected' : '' }}>
                                                    Drink
                                                </option>
                                            </select>
                                            @error('type_food')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="mb-2 col-lg-2">
                                            <label for="is_traditional" class="form-label">Is Traditional Food ?</label>
                                            <select id="is_traditional" name="is_traditional[]"
                                                class="form-select @error('is_traditional') is-invalid @enderror">
                                                <option value="">Select Option....</option>
                                                <option value="1"
                                                    {{ old('is_traditional') == true ? 'selected' : '' }}>
                                                    True
                                                </option>
                                                <option value="0"
                                                    {{ old('is_traditional') == false ? 'selected' : '' }}>
                                                    False
                                                </option>
                                            </select>
                                            @error('is_traditional')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-danger remove-btn">x</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr>

                            <div class="row mb-3">
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="photo_path" class="form-label">Restaurant Cover Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="photo_path" id="fileInput2" class="file-input" />
                                        <label for="fileInput2" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList2" class="file-list"></div>
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="detail_restaurant_photos" class="form-label">Detail Restaurant
                                        Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_restaurant_photos[]" id="fileInput3"
                                            class="file-input" multiple />
                                        <label for="fileInput3" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList3" class="file-list"></div>
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#timepicker1, #timepicker2, #timepicker3').each(function() {
                    var $this = $(this);
                    var timepickerInput = $this.find('input');

                    $this.timepicker({
                        showMeridian: false,
                        minuteStep: 1,
                        secondStep: 1,
                        showSeconds: true,
                        defaultTime: 'current',
                        icons: {
                            up: 'ti ti-chevron-up',
                            down: 'ti ti-chevron-down'
                        }
                    }).on('changeTime.timepicker', function(e) {
                        timepickerInput.val(e.time.value);
                    });
                });
            });
        </script>
        <script src="{{ asset('assets/js/customize-input-image.js') }}"></script>
        <script src="{{ asset('assets/js/customize-form-repeater.js') }}"></script>
    @endpush
@endsection

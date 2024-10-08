{{-- @php
    dump($restaurant->toArray());
@endphp --}}

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
                                    <span class="card-title fw-semibold me-3">Edit Data Menu Restaurant</span>
                                </div>


                            </div>
                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('restaurant.update', $restaurant->restaurant_id) }}" method="POST"
                            enctype="multipart/form-data" id="VillageForm">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name_restaurant" class="form-label">Name Restaurant</label>
                                    <input type="text"
                                        class="form-control @error('name_restaurant') is-invalid @enderror"
                                        id="name_restaurant" name="name_restaurant" aria-describedby="emailHelp"
                                        value="{{ $restaurant->name_restaurant }}"
                                        placeholder="Input Name Of Restaurant...." required />
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="address" class="form-label">address Of Restaurant</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" aria-describedby="emailHelp"
                                        value="{{ $restaurant->address }}" placeholder="Input Address Of Restaurant...."
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
                                                value="{{ $restaurant->open_at }}"
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
                                                value="{{ $restaurant->close_at }}" required />
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
                                        value="{{ $restaurant->latitude }}"
                                        placeholder="Input Latitude Location Of Restaurant...." required />


                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="longitude" class="form-label">Longitude Of Restaurant</label>
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                        id="longitude" name="longitude" aria-describedby="emailHelp"
                                        value="{{ $restaurant->longitude }}"
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
                                        placeholder="Input Description About This Restaurant..." required autofocus> {{ $restaurant->description }} </textarea>

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
                                        placeholder="Input URL Link Map About Restaurant..." required autofocus> {{ $restaurant->url_link_map }} </textarea>
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

                                @foreach ($restaurant->menus as $menu)
                                    <div class="ikuk-template">
                                        <div class="row mb-3 align-items-center">
                                            <div class="mb-2 col-lg-4">
                                                <label for="menu" class="form-label">Menu</label>
                                                <input type="text"
                                                    class="form-control @error('menu') is-invalid @enderror"
                                                    id="menu" name="menu[]" aria-describedby="emailHelp"
                                                    value="{{ $menu->name }}" placeholder="Input menu......."
                                                    required />
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
                                                    <option value="Food"
                                                        {{ $menu->type_food == 'Food' ? 'selected' : '' }}>
                                                        Food
                                                    </option>
                                                    <option value="Drink"
                                                        {{ $menu->type_food == 'Drink' ? 'selected' : '' }}>
                                                        Drink
                                                    </option>
                                                </select>
                                                @error('type_food')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                            <div class="mb-2 col-lg-2">
                                                <label for="is_traditional" class="form-label">Is Traditional Food
                                                    ?</label>
                                                <select id="is_traditional" name="is_traditional[]"
                                                    class="form-select @error('is_traditional') is-invalid @enderror">
                                                    <option value="">Select Option....</option>
                                                    <option value="1"
                                                        {{ $menu->is_traditional == true ? 'selected' : '' }}>
                                                        True
                                                    </option>
                                                    <option value="0"
                                                        {{ $menu->is_traditional == false ? 'selected' : '' }}>
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
                                @endforeach
                            </div>


                            <hr>

                            <div class="row mb-3">
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="cover_photo_path" class="form-label">Restaurant Cover Photo</label>
                                    <div class="cover-file-input-container mb-3">
                                        <input type="file" name="photo_path" id="coverFileInput"
                                            class="cover-file-input" />
                                        <label for="coverFileInput" class="cover-file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="coverFileList" class="cover-file-list">
                                        <img src="{{ asset('storage/' . $restaurant->photo_path) }}"
                                            alt="Restaurant Cover Photo" width="164px" id="coverCurrentPhoto">
                                    </div>
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Detail Restaurant Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_restaurant_photos[]" id="fileInput3"
                                            class="file-input" multiple />
                                        <label for="fileInput3" class="file-input-label">Drag & Drop your files or
                                            <span>Browse</span></label>
                                    </div>
                                    <div id="fileList3" class="file-list">
                                        @foreach ($restaurant->restaurant_photos as $restaurant_photo)
                                            <div class="file-item existing-file-item"
                                                data-id="{{ $restaurant_photo->restaurant_photo_id }}">
                                                <img src="{{ asset('storage/' . $restaurant_photo->photo_path) }}"
                                                    alt="Restaurant Photo" width="128px">
                                                <button type="button" class="delete-btn"
                                                    data-id="{{ $restaurant_photo->restaurant_photo_id }}">&times;</button>
                                                <input type="hidden" name="existing_restaurant_photo[]"
                                                    value="{{ $restaurant_photo->restaurant_photo_id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="delete_restaurant_photos" id="deletePhotosInput3"
                                        value="[]">
                                </div>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>

    @push('script')
        <script src="{{ asset('assets/js/customize-form-repeater.js') }}"></script>

        {{-- Logic For Update Image --}}
        <script src="{{ asset('assets/js/customize-edit-cover-image.js') }}"></script>
        <script src="{{ asset('assets/js/customize-edit-detail-image.js') }}"></script>
        <script src="{{ asset('assets/js/customize-time-picker.js') }}"></script>
    @endpush
@endsection

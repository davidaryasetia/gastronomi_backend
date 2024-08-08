{{-- @php
    dump($village->toArray());
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
                                    <a href="/food" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Edit Village Destination</span>
                                </div>
                            </div>
                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('village.update', $village->village_id) }}" method="POST"
                            enctype="multipart/form-data" id="VillageForm">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name_village" class="form-label">Name Of Village</label>
                                    <input type="text" class="form-control @error('name_village') is-invalid @enderror"
                                        id="name_village" name="name_village" aria-describedby="emailHelp"
                                        value="{{ $village->name_village }}" placeholder="Input Village Name..." required
                                        autofocus>
                                    @error('name_village')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="address" class="form-label">Address Of Village</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" aria-describedby="emailHelp"
                                        value="{{ $village->address }}" placeholder="Input Address Of Village" required
                                        autofocus>
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
                                                value="{{ $village->open_at }}"
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
                                                id="timepicker-input2" value="{{ $village->close_at }}"
                                                placeholder="Select Input Time Close Village...." required />
                                            <span class="input-group-text"><i class="ti ti-clock"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="8" aria-describedby="emailHelp" placeholder="Input Description About This Village..."
                                        required autofocus> {{ $village->description }} </textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="fasility" class="form-label">Fasility Description</label>
                                    <textarea type="text" class="form-control @error('fasility') is-invalid @enderror" id="fasility" name="fasility"
                                        rows="8" aria-describedby="emailHelp" placeholder="Input Description Of Fasility About This Village..."
                                        required autofocus> {{ $village->description }} </textarea>
                                    @error('fasility')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-12">
                                    <label for="mandatory equipment" class="form-label">Mandatory Equipment</label>
                                    <textarea type="text" class="form-control @error('mandatory_equipment') is-invalid @enderror"
                                        id="mandatory_equipment" name="mandatory_equipment" aria-describedby="emailHelp"
                                        placeholder="Input Mandatory Equipment About This Village..." required autofocus> {{ $village->mandatory_equipment }} </textarea>
                                    @error('mandatory_equipment')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="row mb-2">
                                <span>
                                    <p>Village Social Media Information</p>
                                </span>

                                <div class="mb-2 col-lg-6">
                                    <label for="url_website" class="form-label">URL Of Website</label>
                                    <input type="text" class="form-control @error('url_website') is-invalid @enderror"
                                        id="url_website" name="url_website" aria-describedby="emailHelp"
                                        value="{{ $village->url_website }}" placeholder="Input Website Of Village..."
                                        required autofocus>
                                    @error('url_website')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_facebook" class="form-label">URL Of Facebook</label>
                                    <input type="text" class="form-control @error('url_facebook') is-invalid @enderror"
                                        id="url_facebook" name="url_facebook" aria-describedby="emailHelp"
                                        value="{{ $village->url_facebook }}"
                                        placeholder="Input URL Facebook This Village..." required autofocus>
                                    @error('url_facebook')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_instagram" class="form-label">URL Of Instagram</label>
                                    <input type="text"
                                        class="form-control @error('url_instagram') is-invalid @enderror"
                                        id="url_instagram" name="url_instagram" aria-describedby="emailHelp"
                                        value="{{ $village->url_instagram }}" placeholder="Input URL Of Instagram...."
                                        required autofocus>
                                    @error('url_instagram')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_twitter" class="form-label">URL Of twitter</label>
                                    <input type="text" class="form-control @error('url_twitter') is-invalid @enderror"
                                        id="url_twitter" name="url_twitter" aria-describedby="emailHelp"
                                        value="{{ $village->url_twitter }}" placeholder="Input URL Of Twitter...."
                                        required autofocus>
                                    @error('url_twitter')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="row mb-3">
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="cover_photo_path" class="form-label">Village Cover Photo</label>
                                    <div class="cover-file-input-container mb-3">
                                        <input type="file" name="photo_path" id="coverFileInput"
                                            class="cover-file-input" />
                                        <label for="coverFileInput" class="cover-file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="coverFileList" class="cover-file-list">
                                        <img src="{{ asset('storage/' . $village->photo_path) }}"
                                            alt="Village Cover Photo" width="164px" id="coverCurrentPhoto">
                                    </div>
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Detail Village Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_village_photos[]" id="fileInput3"
                                            class="file-input" multiple />
                                        <label for="fileInput3" class="file-input-label">Drag & Drop your files or
                                            <span>Browse</span></label>
                                    </div>
                                    <div id="fileList3" class="file-list">
                                        @foreach ($village->village_photos as $village_photo)
                                            <div class="file-item existing-file-item"
                                                data-id="{{ $village_photo->village_photo_id }}">
                                                <img src="{{ asset('storage/' . $village_photo->photo_path) }}"
                                                    alt="village Photo" width="128px">
                                                <button type="button" class="delete-btn"
                                                    data-id="{{ $village_photo->village_photo_id }}">&times;</button>
                                                <input type="hidden" name="existing_village_photo[]"
                                                    value="{{ $village_photo->village_photo_id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="delete_village_photos" id="deletePhotosInput3"
                                        value="[]">
                                </div>
                            </div>


                            {{-- Upload Image File --}}
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
        <script src="{{ asset('assets/js/customize-edit-cover-image.js') }}"></script>
        <script src="{{ asset('assets/js/customize-edit-detail-image.js') }}"></script>
        <script src="{{ asset('assets/js/customize-time-picker.js') }}"></script>
    @endpush
@endsection

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
                                    <span class="card-title fw-semibold me-3">Edit Culture Of Lombok</span>
                                </div>
                            </div>
                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('culture.update', $culture->culture_id) }}" method="POST"
                            enctype="multipart/form-data" id="FoodForm">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name_culture" class="form-label">Culture Name</label>
                                    <input type="text" class="form-control @error('name_culture') is-invalid @enderror"
                                        id="name_culture" name="name_culture" aria-describedby="emailHelp"
                                        value="{{ $culture->name_culture }}" placeholder="Input Culture Name..." required
                                        autofocus>
                                    @error('name_culture')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="unit" class="form-label">URL Youtube Culture</label>
                                    <input type="text" class="form-control @error('url_youtube') is-invalid @enderror"
                                        id="url_youtube" name="url_youtube" aria-describedby="emailHelp"
                                        value="{{ $culture->url_youtube }}" placeholder="Input URL Youtube About Culture..."
                                        required autofocus>
                                    @error('url_youtube')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="6" aria-describedby="emailHelp" placeholder="Input Food Culinary..." required
                                        autofocus>{{ $culture->description }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">

                                {{-- Food Cover secion --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="cover_photo_path" class="form-label">Culture Cover Photo</label>
                                    <div class="cover-file-input-container mb-3">
                                        <input type="file" name="photo_path" id="coverFileInput"
                                            class="cover-file-input" />
                                        <label for="coverFileInput" class="cover-file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="coverFileList" class="cover-file-list">
                                        <img src="{{ asset('storage/' . $culture->photo_path) }}" alt="Culter Cover Photo"
                                            width="164px" id="coverCurrentPhoto">
                                    </div>
                                </div>

                                {{-- Detail Culture Section --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Detail Culture Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_culture_photos[]" id="fileInput3" class="file-input"
                                            multiple />
                                        <label for="fileInput3" class="file-input-label">Drag & Drop your files or
                                            <span>Browse</span></label>
                                    </div>
                                    <div id="fileList3" class="file-list">
                                        @foreach ($culture->culture_photos as $culture_photo)
                                            <div class="file-item existing-file-item"
                                                data-id="{{ $culture_photo->culture_photo_id }}">
                                                <img src="{{ asset('storage/' . $culture_photo->photo_path) }}"
                                                    alt="Detail Culture Photo" width="164px">
                                                <button type="button" class="delete-btn"
                                                    data-id="{{ $culture_photo->culture_photo_id }}">&times;</button>
                                                <input type="hidden" name="existing_culture_photo[]"
                                                    value="{{ $culture_photo->culture_photo_id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="delete_culture_photos" id="deletePhotosInput3" value="[]">
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
         {{-- Logic For Update Image --}}
         <script src="{{ asset('assets/js/customize-edit-cover-image.js') }}"></script>
         <script src="{{ asset('assets/js/customize-edit-detail-image.js') }}"></script>
    @endpush
@endsection

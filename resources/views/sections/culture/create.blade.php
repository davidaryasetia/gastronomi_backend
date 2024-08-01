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
                                    <a href="/culture" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Add Culture Data Of Lombok</span>
                                </div>

                            </div>
                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('culture.store') }}" method="POST" enctype="multipart/form-data"
                            id="FoodForm">
                            @csrf

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name_culture" class="form-label">Name Of Culture</label>
                                    <input type="text" class="form-control @error('name_culture') is-invalid @enderror"
                                        id="name_culture" name="name_culture" aria-describedby="emailHelp"
                                        value="{{ old('name_culture') }}" placeholder="Input Culture Name..." required
                                        autofocus>
                                    @error('name_culture')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="url_youtube" class="form-label">Url Of Youtube Culture</label>
                                    <input type="text" class="form-control @error('url_youtube') is-invalid @enderror"
                                        id="url_youtube" name="url_youtube" aria-describedby="emailHelp"
                                        value="{{ old('url_youtube') }}" placeholder="Input Url Youtube About Culture..."
                                        required autofocus>
                                    @error('url_youtube')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-12">
                                    <label for="description" class="form-label">Description About Culture</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="6" aria-describedby="emailHelp" placeholder="Input Description About Culture......"
                                        required autofocus>{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Culture Cover Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="photo_path" id="fileInput2" class="file-input" />
                                        <label for="fileInput2" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>

                                    <div id="fileList2" class="file-list"></div>
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Detail Culture Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_culture_photos[]" id="fileInput3"
                                            class="file-input" multiple />
                                        <label for="fileInput3" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList3" class="file-list"></div>
                                </div>
                            </div>


                            {{-- Upload Image File --}}

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
        {{-- Customize Input Image Function --}}
        <script src="{{ asset('assets/js/customize-input-image.js') }}"></script>
    @endpush
@endsection

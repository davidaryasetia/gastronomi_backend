{{-- @php
    dump($food->toArray());
@endphp --}}

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
                                    <a href="/food" class="d-flex align-items-center"><i class="ti ti-arrow-left me-3"
                                            style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Edit Food Culinary</span>
                                </div>

                            </div>

                            <div class="alert-container">
                                @if (session('success'))
                                    <div class="alert alert-primary" style role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" style role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            <script>
                                setTimeout(function() {
                                    document.querySelectorAll('.alert').forEach(function(alert) {
                                        alert.style.display = "none";
                                    });
                                }, 5000);
                            </script>

                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('food.update', $food->food_id) }}" method="POST"
                            enctype="multipart/form-data" id="FoodForm">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name" class="form-label">Food Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" aria-describedby="emailHelp"
                                        value="{{ $food->name }}" placeholder="Input Food Name..." required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="unit" class="form-label">Category Food</label>
                                    <select id="category" name="category"
                                        class="form-select @error('category') is-invalid @enderror">
                                        <option value="">Choice category....</option>
                                        <option value="Traditional Food"
                                            {{ $food->category == 'Traditional Food' ? 'selected' : '' }}>Traditional Food
                                        </option>
                                        <option value="Traditional Drink"
                                            {{ $food->category == 'Traditional Drink' ? 'selected' : '' }}>Traditional Drink
                                        </option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="6" aria-describedby="emailHelp" placeholder="Input Food Culinary..." required
                                        autofocus>{{ $food->description }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="history" class="form-label">History of Food</label>
                                    <textarea type="text" class="form-control @error('food_historical') is-invalid @enderror" id="food_historical"
                                        name="food_historical" rows="6" aria-describedby="emailHelp" placeholder="Input Food History..." required
                                        autofocus> {{ $food->food_historical }} </textarea>
                                    @error('food_historical')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="nutrition" class="form-label">Nutrition</label>
                                    <textarea type="text" class="form-control @error('nutrition') is-invalid @enderror" id="nutrition" name="nutrition"
                                        aria-describedby="emailHelp" placeholder="Input Nutrition Of Food..." required autofocus> {{ $food->nutrition }} </textarea>
                                    @error('nutrition')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_youtube" class="form-label">URL Youtube Directions</label>
                                    <textarea type="text" class="form-control @error('url_youtube') is-invalid @enderror" id="url_youtube"
                                        name="url_youtube" aria-describedby="emailHelp" placeholder="Input Url Youtube" required autofocus> {{ $food->url_youtube }} </textarea>
                                    @error('url_youtube')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Ingredients</label>
                                    <!-- Create the editor container -->
                                    <div id="ingredients" style="height: 300px">
                                        <p>Input Ingredients Here......</p>
                                    </div>
                                    <input type="hidden" name="ingredients" id="ingredients-input">
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="directions" class="form-label">Directions</label>
                                    <!-- Create the editor container -->
                                    <div id="directions" style="height: 300px">
                                        <p>Input Directions Here......</p>
                                    </div>
                                    <input type="hidden" name="directions" id="directions-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- Add Taggination --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Foods Tags</label>
                                    <div class="galery-container">
                                        <input name='tag_foods' class='tagify--custom-dropdown'
                                            placeholder='Type an English letter' value=''>
                                    </div>
                                </div>

                                {{-- History Food Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">History Foods Fotos</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_historical_photos[]" id="fileInput1"
                                            class="file-input" multiple />
                                        <label for="fileInput1" class="file-input-label">Drag & Drop your files or
                                            <span>Browse</span></label>
                                    </div>
                                    <div id="fileList1" class="file-list">
                                        @foreach ($food->photos as $historical_photo)
                                            <div class="file-item existing-file-item"
                                                data-id="{{ $historical_photo->food_historical_photo_id }}">
                                                <img src="{{ asset('storage/' . $historical_photo->photo) }}"
                                                    alt="Food Photo" width="164px">
                                                <button type="button" class="delete-btn"
                                                    data-id="{{ $historical_photo->food_historical_photo_id }}">&times;</button>
                                                <input type="hidden" name="existing_photos[]"
                                                    value="{{ $historical_photo->food_historical_photo_id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="delete_historical_photos" id="deletePhotosInput1"
                                        value="[]">
                                </div>


                                <div class="row mb-3">

                                    {{-- Food Cover secion --}}
                                    <div class="mb-2 col-lg-6">
                                        <label for="cover_photo_path" class="form-label">Food Cover Photo</label>
                                        <div class="cover-file-input-container mb-3">
                                            <input type="file" name="photo_path" id="coverFileInput"
                                                class="cover-file-input" />
                                            <label for="coverFileInput" class="cover-file-input-label">
                                                Drag & Drop your files or <span>Browse</span>
                                            </label>
                                        </div>
                                        <div id="coverFileList" class="cover-file-list">
                                            <img src="{{ asset('storage/' . $food->photo_path) }}" alt="Food Cover Photo"
                                                width="164px" id="coverCurrentPhoto">
                                        </div>
                                    </div>

                                    {{-- Detail Food Section --}}
                                    <div class="mb-2 col-lg-6">
                                        <label for="ingredients" class="form-label">Detail Food Photo</label>
                                        <div class="file-input-container">
                                            <input type="file" name="detail_food_photos[]" id="fileInput3"
                                                class="file-input" multiple />
                                            <label for="fileInput3" class="file-input-label">Drag & Drop your files or
                                                <span>Browse</span></label>
                                        </div>
                                        <div id="fileList3" class="file-list">
                                            @foreach ($food->food_photos as $food_photo)
                                                <div class="file-item existing-file-item"
                                                    data-id="{{ $food_photo->food_photo_id }}">
                                                    <img src="{{ asset('storage/' . $food_photo->photo_path) }}"
                                                        alt="Detail Food Photo" width="164px">
                                                    <button type="button" class="delete-btn"
                                                        data-id="{{ $food_photo->food_photo_id }}">&times;</button>
                                                    <input type="hidden" name="existing_food_photo[]"
                                                        value="{{ $food_photo->food_photo_id }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="delete_food_photos" id="deletePhotosInput3"
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
        {{-- Quill Text Editor --}}
        <script>
            var editoringredients = new Quill("#ingredients", {
                theme: "snow",
            });
            var editordirections = new Quill("#directions", {
                theme: "snow",
            });

            var ingredientsData = `{!! $food->ingredients !!}`;
            var directionsData = `{!! $food->directions !!}`;

            editoringredients.clipboard.dangerouslyPasteHTML(ingredientsData);
            editordirections.clipboard.dangerouslyPasteHTML(directionsData);
        </script>
        <script>
            document.getElementById('FoodForm').onsubmit = function() {
                // Copy HTML content from Quill editor to hidden input
                document.getElementById('ingredients-input').value = editoringredients.root.innerHTML;
                document.getElementById('directions-input').value = editordirections.root.innerHTML;
            };
        </script>

        <script>
            var initialTags = [
                @foreach ($food->tag_foods as $tag_food)
                    "{{ $tag_food->nametag }}",
                @endforeach
            ];

            var input = document.querySelector('input[name="tag_foods"]'),
                tagify = new Tagify(input, {
                    whitelist: [
                        "Hallal", "Spicy", "Hot", "Vegetarian", "Vegan", "Gluten-Free", "Grilled", "Baked", "Fried",
                        "Steamed", "Smoked", "Barbeque", "Gluten Free"
                    ],
                    maxTags: 10,
                    dropdown: {
                        maxItems: 20,
                        classname: 'tags-look',
                        enabled: 0,
                        closeOnSelect: false
                    }
                });

            tagify.addTags(initialTags);

            tagify.on('change', function(e) {
                var tags = tagify.value.map(tag => tag.value);
                input.value = JSON.stringify(tags);
            })
        </script>

        {{-- Logic For Update Image --}}
        <script src="{{ asset('assets/js/customize-edit-cover-image.js') }}"></script>
        <script src="{{ asset('assets/js/customize-edit-detail-image.js') }}"></script>
    @endpush
@endsection

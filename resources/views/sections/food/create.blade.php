@push('css')
    <style>
        /* Style Custom */
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
                                    <a href="{{ route('food.index') }}" class="d-flex align-items-center"><i
                                            class="ti ti-arrow-left me-3" style="font-size: 20px; color: black"></i>
                                    </a>
                                </div>
                                <div>
                                    <span class="card-title fw-semibold me-3">Add Food Culinary</span>
                                </div>

                            </div>
                        </div>

                        {{-- Main Section --}}
                        <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data"
                            id="FoodForm">
                            @csrf
                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name" class="form-label">Food Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" aria-describedby="emailHelp"
                                        value="{{ old('name') }}" placeholder="Input Food Name..." required autofocus>
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
                                            {{ old('category') == 'Traditional Food' ? 'selected' : '' }}>Traditional Food
                                        </option>
                                        <option value="Traditional Drink"
                                            {{ old('category') == 'Traditional Drink' ? 'selected' : '' }}>Traditional Drink
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
                                        autofocus>{{ old('description') }}</textarea>

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
                                        autofocus>{{ old('food_historical') }}</textarea>
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
                                        aria-describedby="emailHelp" placeholder="Input Nutrition Of Food..." required autofocus>{{ old('nutrition') }}</textarea>
                                    @error('nutrition')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_youtube" class="form-label">URL Youtube Directions</label>
                                    <textarea type="text" class="form-control @error('url_youtube') is-invalid @enderror" id="url_youtube"
                                        name="url_youtube" aria-describedby="emailHelp" placeholder="Input Url Youtube" required autofocus>{{ old('url_youtube') }}</textarea>
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

                            {{-- Add Taggination --}}
                            <div class="row mb-3">
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Foods Tags</label>
                                    <div class="galery-container">
                                        <input name='tag_foods' class='tagify--custom-dropdown'
                                            placeholder='Type an English letter' value='Hallal'>
                                    </div>
                                </div>

                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">History Foods Fotos</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_historical_photos[]" id="fileInput1"
                                            class="file-input" multiple />
                                        <label for="fileInput1" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList1" class="file-list"></div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Food Cover Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="photo_path" id="fileInput2" class="file-input" />
                                        <label for="fileInput2" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>

                                    <div id="fileList2" class="file-list"></div>
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Detail Food Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_food_photos[]" id="fileInput3"
                                            class="file-input" multiple />
                                        <label for="fileInput3" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList3" class="file-list"></div>
                                </div>
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
        {{-- Quill Text Editor --}}
        <script>
            var editoringredients = new Quill("#ingredients", {
                theme: "snow",
            });
            var editordirections = new Quill("#directions", {
                theme: "snow",
            });
        </script>
        <script>
            document.getElementById('FoodForm').onsubmit = function() {
                // Copy HTML content from Quill editor to hidden input
                document.getElementById('ingredients-input').value = editoringredients.root.innerHTML;
                document.getElementById('directions-input').value = editordirections.root.innerHTML;
            };
        </script>

        <script>
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

            tagify.on('change', function(e) {
                var tags = tagify.value.map(tag => tag.value);
                input.value = JSON.stringify(tags);
            })
        </script>

        {{-- Customize Input Image.js --}}
        <script src="{{ asset('assets/js/customize-input-image.js') }}"></script>
    @endpush
@endsection

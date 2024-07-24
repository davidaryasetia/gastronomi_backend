@push('css')
    <style>
        /* Invalid Style */
        .is-invalid {
            border-color: red;
        }

        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: red;
        }

        .is-invalid~.invalid-feedback {
            display: block;
            /* Tampilkan pesan error ketika input invalid */
        }

        .tags-look .tagify__dropdown__item {
            display: inline-block;
            vertical-align: middle;
            border-radius: 3px;
            padding: .3em .5em;
            border: 1px solid #CCC;
            background: #F3F3F3;
            margin: .2em;
            font-size: .85em;
            color: black;
            transition: 0s;
        }

        .tags-look .tagify__dropdown__item--active {
            border-color: black;
        }

        .tags-look .tagify__dropdown__item:hover {
            background: lightyellow;
            border-color: gold;
        }

        .tags-look .tagify__dropdown__item--hidden {
            max-width: 0;
            max-height: initial;
            padding: .3em 0;
            margin: .2em 0;
            white-space: nowrap;
            text-indent: -20px;
            border: 0;
        }

        .col-lg-6 .tagify {
            width: 100%;
        }
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
                                    <span class="card-title fw-semibold me-3">Add Food Culinary</span>
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
                                        name="description" rows="4" aria-describedby="emailHelp" placeholder="Input Food Culinary..." required
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
                                        name="food_historical" rows="4" aria-describedby="emailHelp" placeholder="Input Food History..." required
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
                                    {{-- This is FilePound --}}
                                    <div class="galery-container">
                                        <input name='tag_foods' class='tagify--custom-dropdown'
                                            placeholder='Type an English letter' value='Hallal'>
                                    </div>
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">History Foods Fotos</label>
                                    {{-- This is FilePound --}}
                                    <div class="galery-container">
                                        <input type="file" class="form-control-file filepond"
                                            name="detail_historical_photos[]" id="historical_photos" multiple>
                                    </div>
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

        {{-- Filepond Input Image Data --}}
        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);

            // FilePond options
            const pondOptions = {
                allowMultiple: true,
                server: {
                    process: 'food/store',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    }
                }
            };


            // Initialize FilePond for specific file inputs
            FilePond.create(document.querySelector('#historical_photos'), pondOptions);
        </script>


        {{-- Tagify Form Data --}}
        <!-- Tagify Script -->
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
            });
        </script>
    @endpush
@endsection

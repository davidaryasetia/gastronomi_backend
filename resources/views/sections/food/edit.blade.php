{{-- @php
    dump($food->toArray());
@endphp --}}

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

        /* Upload Image */
        .file-input-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-label {
            font-size: 16px;
            color: #333;
        }

        .file-input-label span {
            color: #007bff;
            text-decoration: none;
            /* Remove underline */
            cursor: pointer;
        }

        .file-input:focus+.file-input-label {
            outline: 2px solid #007bff;
            outline-offset: -10px;
        }

        .file-list {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .file-item {
            position: relative;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            border-radius: 4px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 120px;
        }

        .file-item img {
            max-width: 80px;
            max-height: 80px;
            margin-bottom: 5px;
            border-radius: 4px;
        }

        .delete-btn {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: white;
            color: red;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            line-height: 20px;
            padding: 0;
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

                            {{-- Add Taggination --}}
                            <div class="row mb-3">
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Foods Tags</label>
                                    <div class="galery-container">
                                        <input name='tag_foods' class='tagify--custom-dropdown'
                                            placeholder='Type an English letter' value=''>
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
                                    <div id="fileList1" class="file-list">
                                        @foreach ($food->photos as $historical_photo)
                                            <div class="file-item existing-file-item">
                                                <img src="{{ asset('storage/' . $historical_photo->photo) }}"
                                                    alt="Food Photo" width="164px">
                                                <button type="button" class="delete-btn"
                                                    data-id="{{ $historical_photo->food_historical_photo_id }}">&times;</button>
                                                <button type="button" class="edit-btn"
                                                    data-id="{{ $historical_photo->food_historical_photo_id }}"><i
                                                        class="ti ti-pencil"></i></button>
                                                <input type="hidden" name="existing_photos[]"
                                                    value="{{ $historical_photo->food_historical_photo_id }}">
                                            </div>
                                        @endforeach
                                    </div>
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

        {{-- JS For Image Process --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fileInputsState = {};

                // Initialize fileInputsState with existing files
                document.querySelectorAll('.file-input').forEach(input => {
                    const fileListId = 'fileList' + input.id.replace('fileInput', '');
                    const existingFiles = Array.from(document.querySelectorAll(
                        `#${fileListId} .existing-file-item img`)).map(img => ({
                        name: img.src.split('/').pop(), // Get the filename from the URL
                        url: img.src
                    }));

                    fileInputsState[input.id] = existingFiles;

                    input.addEventListener('change', function() {
                        const fileListId = 'fileList' + this.id.replace('fileInput', '');
                        const fileList = document.getElementById(fileListId);

                        Array.from(this.files).forEach(file => {
                            if (file.type.startsWith('image/') && !fileInputsState[this.id]
                                .some(existingFile => existingFile.name === file.name)) {
                                fileInputsState[this.id].push({
                                    name: file.name,
                                    url: URL.createObjectURL(file)
                                });
                            }
                        });

                        renderFileList(fileList, fileInputsState[this.id]);
                    });
                });

                function renderFileList(fileList, files) {
                    fileList.innerHTML = '';

                    files.forEach((file, index) => {
                        const fileItem = document.createElement('div');
                        fileItem.className = 'file-item';

                        const img = document.createElement('img');
                        img.src = file.url;
                        img.onload = () => URL.revokeObjectURL(img.src); // Clean up URL

                        const deleteBtn = document.createElement('button');
                        deleteBtn.className = 'delete-btn';
                        deleteBtn.innerHTML = '&times;';
                        deleteBtn.addEventListener('click', () => {
                            files.splice(index, 1);
                            renderFileList(fileList, files);
                        });

                        const editBtn = document.createElement('button');
                        editBtn.className = 'edit-btn';
                        editBtn.innerHTML = '✎';
                        editBtn.addEventListener('click', () => {
                            const newFile = promptForFile();
                            newFile.then(file => {
                                files[index] = {
                                    name: file.name,
                                    url: URL.createObjectURL(file)
                                };
                                renderFileList(fileList, files);
                            });
                        });

                        fileItem.appendChild(img);
                        fileItem.appendChild(deleteBtn);
                        fileItem.appendChild(editBtn);
                        fileList.appendChild(fileItem);
                    });
                }

                function promptForFile() {
                    return new Promise(resolve => {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.accept = 'image/*';
                        input.click();
                        input.onchange = () => {
                            const file = input.files[0];
                            if (file && file.type.startsWith('image/')) {
                                resolve(file);
                            }
                        };
                    });
                }

                // Add event listener for existing delete buttons
                document.querySelectorAll('.existing-file-item .delete-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const fileId = this.getAttribute('data-id');
                        this.parentElement.remove();
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'delete_photos[]';
                        hiddenInput.value = fileId;
                        document.querySelector('form').appendChild(hiddenInput);
                    });
                });

                // Add event listener for existing edit buttons
                document.querySelectorAll('.existing-file-item .edit-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const fileId = this.getAttribute('data-id');
                        const newFile = promptForFile();
                        newFile.then(file => {
                            const img = this.parentElement.querySelector('img');
                            img.src = URL.createObjectURL(file);
                            img.onload = () => URL.revokeObjectURL(img.src);
                            // Update the file state if needed
                        });
                    });
                });
            });
        </script>
        {{-- JS For Image Process  --}}
    @endpush
@endsection

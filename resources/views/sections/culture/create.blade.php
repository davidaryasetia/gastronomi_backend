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
                                        value="{{ old('name_culture') }}" placeholder="Input Culture Name..." required autofocus>
                                    @error('name_culture')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="url_youtube" class="form-label">Url Of Youtube Culture</label>
                                    <input type="text" class="form-control @error('url_youtube') is-invalid @enderror"
                                        id="url_youtube" name="url_youtube" aria-describedby="emailHelp"
                                        value="{{ old('url_youtube') }}" placeholder="Input Url Youtube About Culture..." required autofocus>
                                    @error('url_youtube')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-12">
                                    <label for="description" class="form-label">Description About Culture</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="6" aria-describedby="emailHelp" placeholder="Input Description About Culture......" required
                                        autofocus>{{ old('description') }}</textarea>

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
        <script>
            // Create an object to hold files for each input
            const fileInputsState = {};

            document.querySelectorAll('.file-input').forEach(input => {
                // Initialize file state for each input
                fileInputsState[input.id] = [];

                input.addEventListener('change', function() {
                    const fileListId = 'fileList' + this.id.replace('fileInput', '');
                    const fileList = document.getElementById(fileListId);

                    // Add new files to the existing files array
                    Array.from(this.files).forEach(file => {
                        if (file.type.startsWith('image/')) {
                            fileInputsState[this.id].push(
                                file); // Add new files to the corresponding input
                        }
                    });

                    renderFileList(fileList, fileInputsState[this.id]); // Render the updated file list
                });
            });

            function renderFileList(fileList, files) {
                fileList.innerHTML = ''; // Clear the previous file list

                files.forEach((file, index) => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-item';

                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.onload = () => URL.revokeObjectURL(img.src); // Free memory

                    const fileName = document.createElement('span');
                    fileName.textContent = file.name;

                    const deleteBtn = document.createElement('button');
                    deleteBtn.className = 'delete-btn';
                    deleteBtn.innerHTML = '&times;';
                    deleteBtn.addEventListener('click', () => {
                        files.splice(index, 1); // Remove the file from the files array
                        renderFileList(fileList, files); // Re-render the file list
                    });

                    fileItem.appendChild(img);
                    fileItem.appendChild(fileName);
                    fileItem.appendChild(deleteBtn);
                    fileList.appendChild(fileItem);
                });
            }
        </script>
    @endpush
@endsection

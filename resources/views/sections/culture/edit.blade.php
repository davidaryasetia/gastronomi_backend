
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
                                        value="{{ $culture->name_culture }}" placeholder="Input Culture Name..." required autofocus>
                                    @error('name_culture')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="unit" class="form-label">URL Youtube Culture</label>
                                    <input type="text" class="form-control @error('url_youtube') is-invalid @enderror"
                                        id="url_youtube" name="url_youtube" aria-describedby="emailHelp"
                                        value="{{ $culture->url_youtube }}" placeholder="Input URL Youtube About Culture..." required autofocus>
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

                            
                            {{-- Add Taggination --}}
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="ingredients" class="form-label">Detail Culture Fotos</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_culture_photos[]" id="fileInput1"
                                            class="file-input" multiple />
                                        <label for="fileInput1" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList1" class="file-list"></div>
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
            const fileInputsState = {};

            document.querySelectorAll('.file-input').forEach(input => {
                fileInputsState[input.id] = [];

                input.addEventListener('change', function() {
                    const fileListId = 'fileList' + this.id.replace('fileInput', '');
                    const fileList = document.getElementById(fileListId);

                    Array.from(this.files).forEach(file => {
                        if (file.type.startsWith('image/')) {
                            fileInputsState[this.id].push(file);
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
                    img.src = URL.createObjectURL(file);
                    img.onload = () => URL.revokeObjectURL(img.src);

                    const fileName = document.createElement('span');
                    fileName.textContent = file.name;

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
                        if (newFile) {
                            files[index] = newFile;
                            renderFileList(fileList, files);
                        }
                    });

                    fileItem.appendChild(img);
                    fileItem.appendChild(fileName);
                    fileItem.appendChild(deleteBtn);
                    fileItem.appendChild(editBtn);
                    fileList.appendChild(fileItem);
                });
            }

            function promptForFile() {
                const input = document.createElement('input');
                input.type = 'file';
                input.accept = 'image/*';
                input.click();
                return new Promise(resolve => {
                    input.onchange = () => {
                        const file = input.files[0];
                        if (file && file.type.startsWith('image/')) {
                            resolve(file);
                        }
                    };
                });
            }
        </script>
    @endpush
@endsection

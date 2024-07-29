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

        /* Time Picker */
        .input-group.time .input-group-text {
            cursor: pointer;
        }

        .bootstrap-timepicker-widget table td input {
            width: 40px;
            text-align: center;
        }

        .bootstrap-timepicker-widget .btn {
            margin-top: 10px;
        }

        .bootstrap-timepicker-widget .timepicker-hour,
        .bootstrap-timepicker-widget .timepicker-minute,
        .bootstrap-timepicker-widget .timepicker-second {
            display: inline-block;
        }

        .bootstrap-timepicker-widget .timepicker-picker {
            text-align: center;
        }

        .bootstrap-timepicker-widget .btn {
            padding: 2px 5px;
        }

        .bootstrap-timepicker-widget .input-group-append .btn {
            height: 32px;
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
                                    <span class="card-title fw-semibold me-3">Add Village Destination</span>
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
                        <form action="{{ route('village.store') }}" method="POST" enctype="multipart/form-data"
                            id="VillageForm">
                            @csrf

                            <div class="row mb-2">
                                <div class="mb-2 col-lg-6">
                                    <label for="name_village" class="form-label">Name Of Village</label>
                                    <input type="text" class="form-control @error('name_village') is-invalid @enderror"
                                        id="name_village" name="name_village" aria-describedby="emailHelp"
                                        value="{{ old('name_village') }}" placeholder="Input Village Name..." required
                                        autofocus>
                                    @error('name_village')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-2 col-lg-6">
                                    <label for="address" class="form-label">Address Of Village</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" aria-describedby="emailHelp"
                                        value="{{ old('address') }}" placeholder="Input Address Of Village" required
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
                                                required />
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
                                        required autofocus>{{ old('description') }}</textarea>

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
                                        required autofocus>{{ old('fasility') }}</textarea>
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
                                        placeholder="Input Mandatory Equipment About This Village..." required autofocus>{{ old('mandatory_equipment') }}</textarea>
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
                                        value="{{ old('url_website') }}" placeholder="Input Website Of Village..."
                                        required autofocus>
                                    @error('url_website')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_facebook" class="form-label">URL Of Facebook</label>
                                    <input type="text" class="form-control @error('url_facebook') is-invalid @enderror"
                                        id="url_facebook" name="url_facebook" aria-describedby="emailHelp"
                                        value="{{ old('url_facebook') }}"
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
                                        value="{{ old('url_instagram') }}" placeholder="Input URL Of Instagram...."
                                        required autofocus>
                                    @error('url_instagram')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="url_twitter" class="form-label">URL Of twitter</label>
                                    <input type="text" class="form-control @error('url_twitter') is-invalid @enderror"
                                        id="url_twitter" name="url_twitter" aria-describedby="emailHelp"
                                        value="{{ old('url_twitter') }}" placeholder="Input URL Of Twitter...." required
                                        autofocus>
                                    @error('url_twitter')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>

                            <div class="row mb-3">
                                {{-- Input File Image --}}
                                <div class="mb-2 col-lg-6">
                                    <label for="photo_path" class="form-label">Village Cover Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="photo_path" id="fileInput2" class="file-input" />
                                        <label for="fileInput2" class="file-input-label">
                                            Drag & Drop your files or <span>Browse</span>
                                        </label>
                                    </div>
                                    <div id="fileList2" class="file-list"></div>
                                </div>
                                <div class="mb-2 col-lg-6">
                                    <label for="detail_village_photos" class="form-label">Detail Village Photo</label>
                                    <div class="file-input-container">
                                        <input type="file" name="detail_village_photos[]" id="fileInput3"
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
        <script></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#timepicker1, #timepicker2, #timepicker3').each(function() {
                    var $this = $(this);
                    var timepickerInput = $this.find('input');

                    $this.timepicker({
                        showMeridian: false,
                        minuteStep: 1,
                        secondStep: 1,
                        showSeconds: true,
                        defaultTime: 'current',
                        icons: {
                            up: 'ti ti-chevron-up',
                            down: 'ti ti-chevron-down'
                        }
                    }).on('changeTime.timepicker', function(e) {
                        timepickerInput.val(e.time.value);
                    });
                });
            });
        </script>
    @endpush
@endsection

@extends('layouts.main')

@section('row')
    <div class="container-fluid">
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
                        <form action="/food" method="POST" enctype="multipart/form-data" id="FoodForm">
                            @csrf
                            <div class="ikuk-fields">
                                <div class="ikuk-template">
                                    <div class="row mb-2">
                                        <div class="mb-2 col-lg-6">
                                            <label for="food" class="form-label">Food Culinary</label>
                                            <input type="text"
                                                class="form-control @error('nama_unit') is-invalid @enderror" id="food"
                                                name="food" aria-describedby="emailHelp"
                                                placeholder="Input Food Culinary..." required autofocus>
                                            
                                        </div>
                                        <div class="mb-2 col-lg-6">
                                            <label for="unit" class="form-label">Category Food</label>
                                            <input type="text"
                                                class="form-control @error('nama_unit') is-invalid @enderror" id="category"
                                                name="category" aria-describedby="emailHelp"
                                                placeholder="Input Category Food..." required autofocus>
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="mb-2 col-lg-6">
                                            <label for="food" class="form-label">Description</label>
                                            <textarea type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="description" name="description"
                                                aria-describedby="emailHelp" placeholder="Input Food Culinary..." required autofocus></textarea>
                                           
                                        </div>
                                        <div class="mb-2 col-lg-6">
                                            <label for="unit" class="form-label">Food History</label>
                                            <textarea type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="food_historical" name="food_historical"
                                                aria-describedby="emailHelp" placeholder="Input Food History..." required autofocus></textarea>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
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
                                                <p>Input Directions Here.......</p>

                                                <input type="hidden" name="directions" id="directions-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- <script>
        document.getElementById('FoodForm').onsubmit = function() {
            // Copy HTML content from Quill editor to hidden input
            document.getElementById('ingredients').value = editoringredients.root.innerHTML;
            document.getElementById('directions').value = editordirections.root.innerHTML;
        };
    </script> --}}
@endsection

@php
dd($user->toArray());
@endphp

@extends('layouts.main')

@section('row')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="d-flex align-items-center mb-3 mb-sm-0">
                                <div class="me-3">
                                    <span class="card-title fw-semibold">List Of User</span>
                                </div>
                                <div class="me-2">
                                    <a href="{{ route('food.create') }}" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add User</a>
                                </div>
                            </div>

                            {{-- Alert Message --}}
                            <div class="alert-container">
                                @if (session('success'))
                                    <div class="alert alert-primary" style="" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" style="" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            <script>
                                setTimeout(function() {
                                    document.querySelectorAll('.alert').forEach(function(alert) {
                                        alert.style.display = "none";
                                    });
                                }, 5000)
                            </script>
                        </div>

                        <!-- Main Section -->
                        <div class="col-lg-12">
                            <div id="foodContainer">
                                {{-- Content --}}
                                
                                {{-- Content --}}
                            </div>
                        </div>
                        <!-- END Main Section -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    @push('script')
    @endpush
@endsection

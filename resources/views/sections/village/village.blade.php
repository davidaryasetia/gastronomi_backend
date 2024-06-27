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
                                    <span class="card-title fw-semibold">List Of Village Destination</span>
                                </div>
                                <div class="me-2">
                                    <a href="unit_kerja/create" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Village Destination</a>
                                </div>

                            </div>
                        </div>

                        {{-- Main Section --}}

                        {{-- END Main Section --}}

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@php 
@dd($monthly_visitors->toArray());
@endphp

@extends('layouts.main')
@push('css')
<style>
   #myChart {
    width: 100%;
    height: 100%; /* Atur tinggi myChart agar memenuhi container */
}
    .card-body{
        height: 100%;
    }
</style>
@endpush

@section('row')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Tourist Overview Visitors</h5>
                            </div>
                            <div>
                                <select id="monthSelector" class="form-select">
                                    <option value="all">Semua Bulan</option>
                                    <option value="1">Januari 2024</option>
                                    <option value="2">Februari 2024</option>
                                    <option value="3">Maret 2024</option>
                                    <option value="4">April 2024</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <canvas id="myChart" style="height: 380px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-9 fw-semibold">Weekly Number Of Visitors</h5>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="fw-semibold mb-3"> {{ $amount_weekly_visitor }} </h4>
                                        <div class="d-flex align-items-center mb-3">
                                            {{-- <span
                                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-up-left text-successs"> </i>
                                        </span> --}}
                                            {{-- <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                        <p class="fs-3 mb-0">last year</p> --}}
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="me-4">
                                                <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                <span class="fs-2"> {{ $date }} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold"> Mountly Number Of Visitors</h5>
                                        <h4 class="fw-semibold mb-3"> {{ $amount_monthly_visitor }} </h4>
                                        <div class="d-flex align-items-center pb-1">
                                            <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span>
                                            {{-- <p class="text-dark me-1 fs-3 mb-0">+9%</p> --}}
                                            <p class="fs-3 mb-0"> {{ $date }} </p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end">
                                            <div
                                                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-timeline fs-6"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="earning"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Row Table 2 --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <div class="card-title fw-semibold">
                                    Tracking Access Of IP Address Data Visitors in : <a
                                        href="https://gastronomi.projectbase.site/"
                                        target="_blank">https://gastronomi.projectbase.site/</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table-visitors"
                                class="table table-hover table-bordered text-nowrap mb-0 align-middle">
                                <thead class="text-dart fs-4">
                                    <tr style="color: black">
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                IP Address
                                            </div>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Visit Date
                                            </div>
                                        </th>
                                      
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Location
                                            </div>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Country
                                            </div>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Timezone
                                            </div>
                                        </th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($visitor as $data_visitor)
                                        <tr>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> {{ $no++ }} </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> {{ $data_visitor->ip_address }} </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> {{ $data_visitor->visit_date }} </h6>
                                            </td>
                                            
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> {{$data_visitor->city}}, {{$data_visitor->region}} </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> {{ $data_visitor->country }} </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> {{ $data_visitor->timezone }} </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('script')
        <script>
            //    ----------- Home ------------------------------
            $('#table-visitors').DataTable({
                responsive: true,

                columns: [{
                        width: '2px'
                    },
                   
                    {
                        width: '32px'
                    },
                    {
                        width: '32px'
                    },
                    {
                        width: '32px'
                    },
                    {
                        width: '12px'
                    },
                    {
                        width: '32px'
                    },

                ]
            });
        </script>
         <script src="{{ asset('assets/js/customize-line-chart.js') }}"></script>
    @endpush
@endsection

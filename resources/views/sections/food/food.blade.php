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
                                    <span class="card-title fw-semibold">List Food Culinary</span>
                                </div>
                                <div class="me-2">
                                    <a href="food/create" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Food</a>
                                </div>

                            </div>
                        </div>

                        <!-- Main Section -->
                        <div class="col-lg-12">
                            <div id="foodContainer">
                                @foreach ($food as $data_food)
                                    <div class="shadow-none border mb-3 food-item">
                                        <div class="card-body d-flex flex-column flex-md-row align-items-center">
                                            <div class="me-3 mb-3 mb-md-0">
                                                <img src="{{ asset('storage/' . $data_food->photo_path) }}"
                                                    class="img-fluid" alt="..." style="border-radius: 8px"
                                                    width="128px">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="card-title" style="font-weight: 400"> {{ $data_food->name }}
                                                    </h5>
                                                </div>
                                                <p class="card-text"> {{ Str::limit($data_food->description, 140) }} </p>
                                                <span><a href="">Detail Food......</a></span>
                                            </div>
                                            <div class="col-md-1 text-center d-flex">
                                                <p class="mb-0 fw-normal me-2"><a href=""><i
                                                            class="ti ti-pencil"></i></a>
                                                <div class="divider"></div>
                                                <p class="mb-0 fw-normal ms-2"><a href=""><i class="ti ti-trash"
                                                            style="color: red"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="pagination" class="mt-3"></div>
                        </div>
                        <!-- END Main Section -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                // Initialize pagination
                const itemsPerPage = 5;
                const items = $(".food-item");
                const numItems = items.length;

                items.slice(itemsPerPage).hide();

                $("#pagination").pagination({
                    items: numItems,
                    itemsOnPage: itemsPerPage,
                    cssStyle: 'light-theme',
                    onPageClick: function(pageNumber) {
                        const start = (pageNumber - 1) * itemsPerPage;
                        const end = start + itemsPerPage;
                        items.hide().slice(start, end).show();
                    }
                });
            });
        </script>
    @endpush
@endsection

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
                                    <a href="{{ route('daftar-user.create') }}" type="button" class="btn btn-primary"><i
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
                        <div class="table-responsive">
                            <table id="table-user" class="table table-hover table-bordered text-nowrap mb-0 align-middle">

                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0 text-center" style="width: 10px">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 text-left">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 text-center">Email</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Edit</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Delete</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($dataUser as $datauser): ?>
                                    <tr>
                                        <td class="border-bottom-0 text-center" style="width: 12px">
                                            <h6 class="fw-semibold mb-0">{{ $no++ }}</h6>
                                        </td>
                                        <td class="border-bottom-0"
                                            style="width: 100%; white-space: pre-line; word-wrap: break-word; text-align: justify; color: black">
                                            <span class="d-flex align-items-center" style="text-align: center;">
                                                {{ $datauser['name'] }} </span>
                                        </td>

                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal text-center">{{ $datauser['email'] }}
                                            </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal text-center"><a href=""><i
                                                        class="ti ti-pencil"></i></a>
                                            </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <form action="" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this data <?php echo $datauser['name']; ?> ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Main Section -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    @push('script')
        <script>
            //    ----------- Home ------------------------------
            $('#table-user').DataTable({
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
                ]
            });
        </script>
    @endpush
@endsection

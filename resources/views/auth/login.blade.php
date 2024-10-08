<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login - GapuloApp</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/asset_gastronomi/ic_icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('assets/images/asset_gastronomi/ic_icon.png') }}" width="128px"
                                        alt="">
                                </a>
                                <p class="text-center">Hello Welcome To GapuloApp</p>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            aria-describedby="emailHelp" placeholder="Input Email....." required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="Password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Input Password.....">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</button>
                                </form>
                            </div>
                        </div>
                        {{-- Failed Login Message --}}
                        <div class="position-absolute top-0 end-0 p-3">
                            @if (session('success'))
                                <div class="alert alert-primary" style role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('login_failed'))
                                <div class="alert alert-danger" style role="alert">
                                    {{ session('login_failed') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" style role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        {{-- End Failed Login Message --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.display = "none";
            });
        }, 5000);
    </script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

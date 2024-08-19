<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Registration</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/asset_gastronomi/ic_icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customize.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-pagination.js/1.6/simplePagination.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simple-pagination.js/1.6/jquery.simplePagination.min.js"></script>
    <!-- Tagify -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
</head>

<body>
    <div class="d-flex flex-row align-items-center mt-4" style="padding-left: 24px;">
        <a href="../index.php"><i class='bx bx-left-arrow-alt text-black me-2' style="font-size: 26px;"></i></a>
        <span class="" style="font-size: 24px;">This Is Secret Registration</span>
    </div>
    <div class="container mt-4">
        <form id="DataUserForm" method="POST" action="{{ route('daftar-user.store') }}">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Name</label>
                    <input class="form-control" type="text" placeholder="Input Name......" id="nama"
                        value="{{ old('name') }}" name="name" autofocus />
                </div>
                @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Input Email...." />
                </div>
                @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password"
                        value="{{ old('password') }}" placeholder="Input Password..." />
                    <span id="password_error" style="color: red; display: none">Password do not
                        match.</span>
                </div>
                @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <div class="mb-3 col-md-6">
                    <label for="password" clas s="form-label">Password</label>
                    <input class="form-control" type="password" id="confirm_password" name="confirm_password"
                        placeholder="Input Confirm Password...." />
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Tambah Data</button>
            </div>
        </form>
    </div>

    <script>
        function validatePasswords() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var passwordError = document.getElementById('password_error');

            if (password !== confirmPassword) {
                passwordError.style.display = 'block';
                document.getElementById('password').style.borderColor = 'red';
                document.getElementById('confirm_password').style.borderColor = 'red';
            } else {
                passwordError.style.display = 'none';
                document.getElementById('password').style.borderColor = '';
                document.getElementById('confirm_password').style.borderColor = '';
            }
        }

        document.getElementById('DataUserForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var passwordError = document.getElementById('password_error');

            if (password !== confirmPassword) {
                passwordError.style.display = 'block';
                document.getElementById('password').style.borderColor = 'red';
                document.getElementById('confirm_password').style.borderColor = 'red';
                event.preventDefault();
            } else {
                passwordError.style.display = 'none';
                document.getElementById('password').style.borderColor = '';
                document.getElementById('confirm_password').style.borderColor = '';
            }
        });

        document.getElementById('password').addEventListener('input', validatePasswords);
        document.getElementById('confirm_password').addEventListener('input', validatePasswords);
    </script>
</body>

</html>

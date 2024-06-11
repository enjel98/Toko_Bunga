<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .vh-100 {
            min-height: 100vh;
        }

        .gradient-custom-3 {
            background: rgba(0, 0, 0, 0.5);
        }

        .gradient-custom-4 {
            background: linear-gradient(to right, #ff616d, #ee9ca7);
        }

        .card {
            border-radius: 15px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-lg {
            font-size: 1rem;
        }

        .card-footer {
            padding-top: 0;
        }
    </style>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('assets/img/background.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-5 col-lg-12 col-md-9">
                        <div class="card">
                            @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            @endif

                            @if(session()->has('gagal'))
                            <div class="alert alert-danger">
                                {{ session()->get('gagal') }}
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                        style="width: 150px;" alt="logo">
                                    <h1 class="h1 text-gray-900 mb-4 font-weight-bold">Register With</h1>
                                </div>

                                <form method="POST" action="{{ route('register.proceed') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Masukkan Nama Anda" required />
                                    </div>

                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Masukkan Email Anda" required />
                                    </div>

                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Masukkan Password Anda" required />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-danger btn-user btn-block w-100 mt-3 mb-0">
                                            Register
                                        </button>
                                    </div>

                                    <div class="card-footer text-center">
                                        <p class="mb-3 text-sm mx-auto">
                                            Sudah Punya Akun?
                                            <br> <a type="button" class="text-danger text-gradient " href="/login">Sign
                                                in</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(function () {
        @if(Session::has('gagal'))
        toastr.error('{{ Session::get('gagal') }}', 'Login Error');
        @endif

        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}', 'Success');
        @endif
    });
    </script>
</body>

</html>
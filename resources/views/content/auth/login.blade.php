<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .vh-100 {
            min-height: 100vh;
        }

        .gradient-custom-3 {
            background: rgba(0, 0, 0, 0.5);
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
                            <div class="card-body">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                        style="width: 150px;" alt="logo">
                                    <h1 class="h1 text-gray-900 mb-4 font-weight-bold">Welcome Back</h1>
                                </div>

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

                                <p>Silahkan Login Ke Akun Anda</p>
                                <form class="user" method="post" action="/login/verify">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email address"
                                            required="" autofocus="" autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            placeholder="Password" required autocomplete="current-password">
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-danger btn-user btn-block w-100 mt-3 mb-0">Sign in</button>
                                    </div>
                                </form>
                                <div class="d-flex align-items-center justify-content-center pt-3">
                                    <p class="mb-0 me-2">Belum Punya Akun?</p>
                                    <a href="/register" class="text-danger text-gradient">Sign up</a>
                                </div>
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
</body>

</html>
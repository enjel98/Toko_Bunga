@extends('layout.login')

@section('judul','Login')

@section('content')
    <p class="login-box-msg" style="color: #0a0e14">Silahkan Login</p>
    <form action="/login/verify" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
                <br>
                <span style="color: #0f401b">Belum punya akun/ <a href="/register">Register</a></span>
            </div>
        </div>

    </form>
@endsection

@push('js')

@endpush


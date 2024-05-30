@extends('layout.login')

@section('judul','Login')

@section('content')
    <p class="login-box-msg">Silahkan Login</p>
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
        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
        <a href="/register" class="btn btn-info btn-block">Register</a>

    </form>
@endsection

@push('js')

@endpush


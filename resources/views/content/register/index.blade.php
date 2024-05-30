@extends('layout.login')
@section('judul','Register User Baru')

@section('content')
    <p class="login-box-msg" style="color: #0a0e14">Registrasi User Baru</p>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control" placeholder="Nama">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <div class="col-md-12">
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Register</button>
                <br>
                <a href="/login">Kembali</a>
            </div>
        </div>
    </form>
@endsection

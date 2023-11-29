@extends('layouts.auth.halaman-layout')

@section('konten')

<div class="card">
    <div class="card-header">
        <h3>Masuk</h3>
    </div>
    <div class="card-body">
        <form action="{{route('loginRequest')}}" method="POST">
            @csrf

            <div class="input-group form-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                
            </div>
            <div class="input-group form-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Masukkan password" name="password">
            </div>

            {{-- <div class="row align-items-center remember mb-4">
                <input type="checkbox" name="remember" checked="1">Tetap masuk
            </div> --}}

            <div class="form-group">
                <button type="submit" class="btn float-right login_btn"> Masuk </button>
            </div>

        </form>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center links">
            Sudah punya akun?<a href="{{ route('register') }}">Daftar</a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#">Lupa password?</a>
        </div>
    </div>
</div>

@endsection
@extends('Layout.login')
@section('container')

<div class="row justify-content-center align-items-center">
    <div class="col-md-4">
        <h3 class="text-center">Login ke Inventaris App </h3>
        <p class="text-center mb-5">Silakan masukkan informasi login Anda di bawah ini. Perhatikan bahwa ada tiga peran yang tersedia: karyawan, pemimpin, dan admin.</p>
        @if (session()->has('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success')  }}
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger fade show" role="alert">
                {{ session('loginError')  }}
            </div>
        @endif

        <form action="{{ route('login')}}" method="post">
        @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid
                @enderror" name="username" id="username" placeholder="Masukkan Nama Anda" autofocus required value="{{ old('username')}}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid
                @enderror" name="password" id="password" placeholder="Masukkan Password Anda" autofocus required >
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" name="role" id="role" required>
                    <option value="">Pilih Role</option>
                    <option value="karyawan">Karyawan</option>
                    <option value="pemimpin">Pemimpin</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary container-fluid mt-3">Login</button>
        </form>
        <div class="text-hero-regular">Belum punya akun? <a href="{{ route('register')}}">Daftar disini</a> </div>
    </div>
</div>
@endsection
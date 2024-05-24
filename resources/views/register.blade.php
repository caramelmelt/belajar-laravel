@extends('Layout.main')
@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">
        <h3 class="text-center">{{ $title }}</h3>
        <form action="{{ route('register')}}" method="post">
        @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" name="name" id="name" placeholder="Masukkan Nama Anda" autofocus required value="{{ old('name')}}">
                <label for="name">Nama</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
                <input type="email" class="form-control @error('email') is-invalid
                @enderror" name="email" id="email" placeholder="Masukkan Nama Anda" autofocus required value="{{ old('email')}}">
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid
                @enderror" name="password" id="password" placeholder="Masukkan Nama Anda" autofocus required value="{{ old('password')}}">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('jabatan') is-invalid
                @enderror" name="jabatan" id="jabatan" placeholder="Masukkan Nama Anda" autofocus required value="{{ old('jabatan')}}">
                <label for="jabatan">Jabatan</label>
                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" name="role_id" id="role_id" required>
                    <option value="">Pilih Role</option>
                    <option value="2">Karyawan</option>
                    <option value="3">Pemimpin</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success container-fluid mt-3">Register</button>
        </form>
        <div class="text-hero-regular">Sudah punya akun? <a href="{{ route('login')}}">Login disini</a> </div>
    </div>
</div>
@endsection
@extends('Layout.main')
@section('container')

<div class="wrapper">

<h4 class="mb-4">{{ $title }}</h4>

<!-- Button Tambah Data -->
<button type="button" class="btn text-white" style="background-color:var(--accent)" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="bi bi-plus-square"></i> Tambah Data
</button>

<!-- Generate Laporan-->
<a href="{{ route('user.laporan')}}"><button type="button" class="btn text-white float-end" style="background-color:var(--primary)" onclick="confirm('Apakah anda yakin ingin mencetak laporan?')">
    <i class="bi bi-printer"></i> Generate Laporan
</button></a>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah {{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap.." name="name" value="{{ old('name') }}">
                <label for="floatingInput">Nama Lengkap</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username anda..." name="username" value="{{ old('username') }}">
                <label for="floatingInput">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="password" id="floatingInput" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password anda..." name="password" value="{{ old('password') }}">
                <label for="floatingInput">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email anda..." name="email" value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Masukkan jabatan anda..." name="jabatan" value="{{ old('jabatan') }}">
                <label for="floatingInput">Jabatan</label>
                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="role_id" id="floatingSelect" class="form-control  @error('role_id') is-invalid @enderror">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->level }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Role</label>
                @error('role_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-accent">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Data -->
@foreach ($users as $record)
<div class="modal fade" id="editModal{{ $record->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit {{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.edit', $record->id)}}" method="post">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap.." name="name" value="{{ old('name', $record->name) }}">
                <label for="floatingInput">Nama Lengkap</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username anda..." name="username" value="{{ old('username', $record->username) }}">
                <label for="floatingInput">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="password" id="floatingInput" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password anda..." name="password">
                <label for="floatingInput">Password (kosongkan jika tidak ingin diubah)</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email anda..." name="email" value="{{ old('email', $record->email) }}">
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Masukkan jabatan anda..." name="jabatan" value="{{ old('jabatan', $record->jabatan) }}">
                <label for="floatingInput">Jabatan</label>
                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="role_id" id="floatingSelect" class="form-control  @error('role_id') is-invalid @enderror">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $record->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->level }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Role</label>
                @error('role_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-accent">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- ALERT -->
@if (session()->has('Success'))
    <div class="alert alert-success mt-2" role="alert">
        {{ session('Success') }}
    </div>
@endif

<div class="col-md-12 mt-3">

                <table class="table caption-top">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Role</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        @if ($users->isNotEmpty())
                        @foreach ($users as $key => $record)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $record->name}}</td>
                            <td>{{ $record->username}}</td>
                            <td>{{ $record->email}}</td>
                            <td>{{ $record->jabatan}}</td>
                            <td>{{ $record->role->level}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$record->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </td>
                            <td>
                                    <form action="{{ route('user.delete', $record) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Apakah anda yakin?')"><i class="bi bi-trash3"></i></button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                                <tr>
                                    <td colspan="6">Tidak ada data yang ditemukan.</td>
                                </tr>
                        @endif
                    </tbody>
            </table>
    </div>
</div>
@endsection
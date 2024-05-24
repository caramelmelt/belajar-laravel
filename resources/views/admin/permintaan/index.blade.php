@extends('Layout.main')
@section('container')

<div class="wrapper">

<h4 class="mb-4">{{ $title }}</h4>

@cannot('isPemimpin')
<!-- Button Tambah Data -->
<button type="button" class="btn text-white" style="background-color:var(--accent)" data-bs-toggle="modal" data-bs-target="#addModal">
    <i class="bi bi-plus-square"></i> Tambah Data
</button>
@endcannot

<!-- Generate Laporan-->
<a href="{{ route('permintaan.laporan')}}"><button type="button" class="btn text-white float-end" style="background-color:var(--primary)" onclick="confirm('Apakah anda yakin ingin mencetak laporan?')">
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
        <form action="{{ route('permintaan.store') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <select name="users_id" id="floatingSelect" class="form-control  @error('users_id') is-invalid @enderror">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Nama Anda</label>
                @error('users_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan nama barang.." name="nama_barang" value="{{ old('nama_barang') }}">
                <label for="floatingInput">Nama Barang</label>
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="number" id="floatingInput" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan jumlah barang.." name="jumlah" value="{{ old('jumlah') }}">
                <label for="floatingInput">Jumlah Barang</label>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <textarea id="floatingTextarea2" class="form-control @error('alasan') is-invalid @enderror" placeholder="Berikan alasan/keterangan anda.." name="alasan" rows="6" value="{{ old('alasan') }}"></textarea>
                <label for="floatingTextarea2">Alasan</label>
                @error('alasan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="status" id="floatingSelect" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                    <option value="Pending">Pending</option>
                    <option value="Disetujui">Disetujui</option>
                    <option value="Ditolak">Ditolak</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Dibatalkan">Dibatalkan</option>
                </select>
                <label for="floatingSelect">Pilih Status</label>
                @error('status')
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
@foreach ($permintaan as $record)
<div class="modal fade" id="editModal{{ $record->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit {{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('permintaan.edit', $record->id)}}" method="post">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <select name="users_id" id="floatingSelect" class="form-control  @error('users_id') is-invalid @enderror">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $record->users_id == $user->id ? 'selected' :'' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Nama Anda</label>
                @error('users_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan nama barang.." name="nama_barang" value="{{ old('nama_barang', $record->nama_barang) }}">
                <label for="floatingInput">Nama Barang</label>
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="number" id="floatingInput" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan jumlah barang.." name="jumlah" value="{{ old('jumlah', $record->jumlah) }}">
                <label for="floatingInput">Jumlah Barang</label>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            <div class="form-floating mb-3">
                <textarea id="floatingTextarea2" class="form-control @error('alasan') is-invalid @enderror" placeholder="Berikan alasan/keterangan anda.." name="alasan" value="{{ old('alasan',$record->alasan) }}">{{ $record->alasan}}</textarea>
                <label for="floatingTextarea2">Alasan</label>
                @error('alasan')
                <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="status" id="floatingSelect" class="form-control @error('status') is-invalid @enderror">
                    <option value="{{ $record->status}}" selected readonly>{{ $record->status}}</option>
                    <option value="Pending">Pending</option>
                    <option value="Disetujui">Disetujui</option>
                    <option value="Ditolak">Ditolak</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Dibatalkan">Dibatalkan</option>
                </select>
                <label for="floatingSelect">Pilih Status</label>
                @error('status')
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
                        <th>Nama Orang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        @cannot('isPemimpin')
                        <th colspan="2">Aksi</th>
                        @endcannot
                    </tr>
                </thead>
                    <tbody>
                        @if ($permintaan->isNotEmpty())
                        @foreach ($permintaan as $key => $record)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $record->users->name}}</td>
                            <td>{{ $record->nama_barang}}</td>
                            <td>{{ $record->jumlah}}</td>
                            <td>{{ $record->alasan}}</td>
                            <td>{{ $record->status}}</td>
                            <td>{{ \Carbon\Carbon::parse($record->created_at)->format('d-m-Y') }}</td>
                            @cannot('isPemimpin')
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$record->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </td>
                            <td>
                                    <form action="{{ route('permintaan.delete', $record) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Apakah anda yakin?')"><i class="bi bi-trash3"></i></button>
                                    </form>
                            </td>
                            @endcannot
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
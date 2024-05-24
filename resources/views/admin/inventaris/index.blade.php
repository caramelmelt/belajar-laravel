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
<a href="{{ route('inventaris.laporan')}}"><button type="button" class="btn text-white float-end" style="background-color:var(--primary)" onclick="confirm('Apakah anda yakin ingin mencetak laporan?')">
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
        <form action="{{ route('inventaris.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Masukkan kode barang.." name="kode_barang" value="{{ old('kode_barang')}}">
                <label for="floatingInput">Kode Barang</label>
                @error('kode_barang')
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
                <select name="category_id" id="floatingSelect" class="form-control  @error('category_id') is-invalid @enderror">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Pilih Kategori</label>
                @error('category_id')
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
                <select name="users_id" id="floatingSelect" class="form-control  @error('users_id') is-invalid @enderror">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Pilih Pengguna</label>
                @error('users_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="date" id="floatingInput" class="form-control @error('tgl_akuisisi') is-invalid @enderror" placeholder="Masukkan tanggal akuisisi.." name="tgl_akuisisi" value="{{ old('tgl_akuisisi') }}">
                <label for="floatingInput">Tanggal Akuisisi</label>
                @error('tgl_akuisisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="status" id="floatingSelect" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                    <option value="Digunakan">Digunakan</option>
                    <option value="Disimpan">Disimpan</option>
                    <option value="Proses pengadaan">Proses pengadaan</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Dalam perbaikan">Dalam perbaikan</option>
                    <option value="Rusak">Rusak</option>
                </select>
                <label for="floatingSelect">Pilih Status</label>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="file" id="floatingInput" class="form-control @error('image-inventaris') is-invalid @enderror" id="image-inventaris" name="image-inventaris" onchange="previewImage()">
                <label for="floatingInput">Gambar</label>
                @error('image-inventaris')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <img class="img-preview img-fluid col-sm-5">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-accent">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


@foreach ($inventaris as $record)    
<!-- Modal Edit Data -->
<div class="modal fade" id="editModal{{$record->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel{{$record->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModal{{$record->id}}">Edit {{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('inventaris.update', $record->id) }}" method="post">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Masukkan kode barang..." name="kode_barang" value="{{ old('kode_barang' , $record->kode_barang)}}">
                <label for="floatingInput">Kode Barang</label>
                @error('kode_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" id="floatingInput" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukkan nama barang..." name="nama_barang" value="{{ old('nama_barang', $record->nama_barang) }}">
                <label for="floatingInput">Nama Barang</label>
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select name="category_id" id="floatingSelect" class="form-control  @error('category_id') is-invalid @enderror">
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}" {{ $record->category_id == $category->id ? 'selected' : '' }} >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelectt">Pilih Kategori</label>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="number" id="floatingInput" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan jumlah barang..." name="jumlah" value="{{ old('jumlah', $record->jumlah) }}">
                <label for="floatingInput">Jumlah Barang</label>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="users_id" id="floatingSelect" class="form-control @error('users_id') is-invalid @enderror">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $record->users_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <label for="floatingSelect">Pilih Pengguna</label>
                @error('users_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="date" id="floatingInput" class="form-control @error('tgl_akuisisi') is-invalid @enderror" name="tgl_akuisisi" value="{{ old('tgl_akuisisi', $record->tgl_akuisisi) }}">
                <label for="floatingInput">Tanggal Akuisisi</label>
                @error('tgl_akuisisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <select name="status" id="floatingSelect" class="form-control @error('status') is-invalid @enderror">
                    <option value="{{ $record->status}}" selected>{{ $record->status }}</option>
                    <option value="Digunakan">Digunakan</option>
                    <option value="Disimpan">Disimpan</option>
                    <option value="Proses pengadaan">Proses pengadaan</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Dalam perbaikan">Dalam perbaikan</option>
                    <option value="Rusak">Rusak</option>
                </select>
                <label for="floatingSelect">Status</label>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="file" id="floatingInput" class="form-control @error('file') is-invalid @enderror" id="formFile">
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

    <!-- MODAL PREVIEW GAMBAR -->
    <div class="modal" id="prev-image-inventaris" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center align-items-center">
                    <img src="" class="img-fluid" style="max-height: 70vh;" id="modal-image" alt="Preview Gambar">
                </div>
            </div>
        </div>
    </div>

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
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Pengguna</th>
                        <th>Tgl Akuisisi</th>
                        <th>Status</th>
                        @cannot('isPemimpin')
                        <th colspan="2">Aksi</th>
                        @endcannot
                        <th>Gambar</th>
                    </tr>
                </thead>
                    <tbody>
                        @if ($inventaris->isNotEmpty())
                        @foreach ($inventaris as $key => $record)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $record->kode_barang}}</td>
                            <td>{{ $record->nama_barang}}</td>
                            <td>{{ $record->category->name}}</td>
                            <td>{{ $record->jumlah}}</td>
                            <td>{{ $record->users->name}}</td>
                            <td>{{ \Carbon\Carbon::parse($record->tgl_akuisisi)->format('d-m-Y') }}</td>
                            <td>{{ $record->status}}</td>
                            @cannot('isPemimpin')
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$record->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </td>
                            <td>
                                    <form action="{{ route('inventaris.delete', $record) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="confirm('Apakah anda yakin?')"><i class="bi bi-trash3"></i></button>
                                    </form>
                            </td>
                            @endcannot
                            <td>
                                @if ($record->image)
                                    <img src="{{ asset('storage/' . $record->image) }}" class="img-thumbnail" style="cursor:pointer;max-width:40px;" alt="Gambar barang" data-bs-toggle="modal" data-bs-target="#prev-image-inventaris" data-src="{{ asset('storage/' . $record->image) }}">
                                @else
                                    <p class="center">Tidak Ada</p>
                                @endif
                            </td>
                                </tr>
                        @endforeach
                        @else
                                <tr>
                                    <td colspan="6">Tidak ada data yang ditemukan.</td>
                                </tr>
                        @endif
                    </tbody>
                    </tbody>
                  </table>
            </div>
</div>

<script>
    document.querySelectorAll('.img-thumbnail').forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const src = this.getAttribute('data-src');
            document.getElementById('modal-image').setAttribute('src', src);
        });
    });

    function previewImage(){
        const image = document.querySelector('#image-inventaris');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload =function(oFREvent){
            imgPreview.src =oFREvent.target.result;
        }
    }
</script>
@endsection


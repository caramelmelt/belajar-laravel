@extends('Layout.main')

@section('container')

    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0" style="background-color: #023047;">
                    <div class="card-body">
                        <h5 class="card-title text-white">{{$title}} | Anda login sebagai {{ Auth::user()->role->level }} !</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-5">
                <div class="card border-primary">
                    <h1><i class="bi bi-file-earmark-text-fill"></i></h1>
                    <div class="card-body">
                        <h1 class="card-text">70</h1>
                        <h5 class="card-text">Barang</h5>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card border-danger">
                    <h1><i class="bi bi-file-earmark-text-fill"></i></h1>
                    <div class="card-body">
                        <h1 class="card-text">4</h1>
                        <h5 class="card-text">Permintaan</h5>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card border-success">
                    <h1><i class="bi bi-file-earmark-text-fill"></i></h1>
                    <div class="card-body">
                        <h1 class="card-text">25</h1>
                        <h5 class="card-text">Pengguna</h5>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card border-warning">
                    <h1><i class="bi bi-file-earmark-text-fill"></i></h1>
                    <div class="card-body">
                        <h1 class="card-text">2</h1>
                        <h5 class="card-text">Laporan</h5>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection


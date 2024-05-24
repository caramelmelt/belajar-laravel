@extends('Layout.main')

@section('container')

    <div class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0" style="background-color:var(--accent);">
                    <div class="card-body">
                        <h5 class="card-title text-white">{{$title}} | Anda login sebagai {{ Auth::user()->role->level }} !</h5>
                    </div>
                </div>
            </div>

            <div class="grey-bg container-fluid">
                <section id="minimal-statistics">
                <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">statistik inventaris</h4>
                    <p>Total data sementara.</p>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3"> 
                                            <i class="icon-pencil primary font-large-2"></i>
                                        </div>
                                        <div class="text-end">
                                            <h3>{{ $totalinventaris }}</h3>
                                            <span>Inventaris</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3"> 
                                            <i class="icon-speech warning font-large-2"></i>
                                        </div>
                                        <div class="text-end">
                                            <h3>{{ $totalpermintaan }}</h3>
                                            <span>Permintaan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3"> 
                                            <i class="icon-graph success font-large-2"></i>
                                        </div>
                                        <div class="text-end">
                                            <h3>{{  $totaluser }}</h3>
                                            <span>Users</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white font-medium-3" style="background-color:var(--accent)">
                                Selamat Datang di InventarisPlus
                            </div>
                                <div class="card-body px-5 py-4">
                                 <span>Aplikasi ini bertujuan untuk melakukan manajemen barang atau aset perusahaan dengan lebih efisien dan terstruktur.</span><br><br>
                                 <span class="font-medium-1 ">Fitur Utama :</span>
                                 <ul>
                                    <li>Pencatatan Inventaris: <br> Mencatat barang/aset baru ke dalam sistem dengan informasi terkait seperti nama, kategori, jumlah, dan deskripsi tambahan.</li>
                                    <li>Pengajuan Permintaan: <br> Pengguna dapat mengakses fitur pengajuan inventaris dan melacak status pengajuan.</li>
                                    <li>Pembuatan Laporan: <br> Membuat laporan inventaris baik keseluruhan maupun khusus berdasarkan kategori, lokasi, atau waktu tertentu.</li>
                                 </ul>
                                 <span class="font-medium-1">Bantuan dan Dukungan :</span><br>
                                 <span>Jika Anda mengalami masalah atau membutuhkan bantuan dalam menggunakan aplikasi, jangan ragu untuk menghubungi tim dukungan kami di [email protected] atau melalui layanan chat yang tersedia di aplikasi.</span>
                                </div>
                            </div>
                    </div>
                </div>
                </section>
            </div>

        </div>
    </div>

@endsection


@extends('Layout.login')
@section('container')
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copy" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <div class="text-label">
                        Selamat Datang !
                    </div>
                    <div class="text-hero-bold">
                        Aplikasi Inventaris <br>PT. Sinergi Nusantara
                    </div>
                    <div class="text-hero-reguler">
                        Silahkan login untuk mengakses layanan Kami.
                    </div>
                    <div class="cta">
                        <a href="{{ route('login') }}" class="btn-explore">Login Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <img src="{{ asset('img/inventory.png') }}" class="img-fluid" alt="img" style="width: 80%;height:auto;">
            </div>
        </div>
    </div>
</section>

<div class="card-landing text-white" id="layanan" style="background-color: var(--accent);">
    <h3  data-aos="fade-down" data-aos-duration="800">WHAT WE DO?</h3>
    <div class="text-hero-regular text-white">
        <div class="row">
            <div class="col-md-4 px-5">
                <figure class="mt-5"  data-aos="fade-up-right" data-aos-duration="800">
                    <i class="bi bi-journal-arrow-down mb-5" style="font-size: 6rem;"></i>
                    <figcaption class="mt-3">Membantu Karyawan mengajukan permintaan pengajuan Inventaris.</figcaption>
                </figure>
            </div>
            <div class="col-md-4 px-5">
                <figure class="mt-5"  data-aos="fade-up" data-aos-duration="800">
                    <i class="bi bi-boxes" style="font-size: 6rem;"></i>
                    <figcaption class="mt-3">Membantu perusahaan mengelola inventaris kantor dengan mudah dan efisien.</figcaption>
                </figure>
            </div>
            <div class="col-md-4 px-5">
                <figure class="mt-5"  data-aos="fade-up-left" data-aos-duration="800">
                    <i class="bi bi-file-pdf" style="font-size: 6rem;"></i>
                    <figcaption class="mt-3">Memudahkan pimpinan perusahaan memantau laporan secara efektif.</figcaption>
                </figure>
            </div>
        </div>
    </div>
</div>

<div class="card-landing" id="tentang-kami" style="background-color:var(--gray-2)">
    <div class="row">
        <div class="col-md-12 text-center mt-3 mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h3>Tentang Kami</h3>
            <p>Selamat datang di aplikasi inventaris PT. Sinergi Nusantara. Aplikasi ini dirancang untuk membantu perusahaan kami dalam mengelola inventaris dengan lebih efisien dan akurat dengan upaya untuk menjaga kelancaran operasional perusahaan.</p>
        </div>
        <div class="col-md-12 text-center mb-4" data-aos="fade-up" data-aos-duration="1000">
            <h5>Tujuan Kami</h5>
            <ul style="list-style:none;">
                <li>Memastikan semua barang inventaris tercatat dengan baik dan mudah diakses.</li>
                <li>Meningkatkan efisiensi dalam pengelolaan dan pengadaan barang.</li>
                <li>Menyediakan laporan dan analisis yang membantu pengambilan keputusan.</li>
            </ul>
        </div>
    </div>
</div>

<div class="card-landing text-white" id="hubungi-kami" style="background-color:var(--secondary);">
    <div class="row">
    <div class="col-md-4" data-aos="fade-right" data-aos-duration="800">
            <h5>Hubungi Kami</h5>
            <p class="text-footer text-white">Jika Anda mengalami masalah atau memiliki pertanyaan terkait penggunaan aplikasi ini, tim support kami siap membantu Anda.</p>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-duration="800">
            <h5>Informasi Kontak</h5>
            <ul class="text-footer text-white">
                <li><strong>Bagian IT:</strong> support@perusahaan.com</li>
                <li><strong>Telepon:</strong> 021-12345678 (ext. 1234)</li>
            </ul>
        </div>
        <div class="col-md-4" data-aos="fade-left" data-aos-duration="800">
            <h5>Jam Operasional Dukungan</h5>
            <ul class="text-footer text-white">
                <li>Senin - Jumat: 09.00 - 17.00</li>
                <li>Sabtu: 09.00 - 14.00</li>
                <li>Minggu dan Hari Libur Nasional: Tutup</li>
            </ul>
        </div>
        <div class="col-md-12 text-center mt-3">
            <span class="text-footer">&copy;Copyright 2024 PT. Sinergi Nusantara</span>
        </div>
    </div>
</div>
@endsection

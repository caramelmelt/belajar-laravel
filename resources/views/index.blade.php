@extends('Layout.main')
@section('container')
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="copy" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <div class="text-label">
                        Your Bussines Partner
                    </div>
                    <div class="text-hero-bold">
                        Grow Up Your Company with Us
                    </div>
                    <div class="text-hero-reguler">
                        There are so many variations passages of management Your mindset about bussines in your company or agency
                    </div>
                    <div class="cta">
                        <a href="#" class="btn btn-primary">Explore Now</a>
                        <a href="#" class="btn btn-secondary">See Pricing</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <img src="{{ asset('img/img2.jpg') }}" class="img-fluid" alt="img" style="width: 100%;height:auto;">
            </div>
        </div>
    </div>
</section>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-5 text-center">
                <div class="copy" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <div class="text-hero-reguler">
                        <h3>Komitmen Kami</h3>
                    </div>
                    <div class="text-hero-reguler">
                        <span>Dalam mengimplementasikan Rancangan Produk ,kami berkomitment menciptakan produk inovatif khususnya dalam dunia digitalisasi yang berdampak positif pada ekonomi masyarakat kota maupun pedesaan.</span><br>
                        <span>Dalam perencanaan Arsitektural , kami berkomitment menciptakan sebuah konsep arsitektural yang berkelanjutan serta ramah terhadap lingkungan </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

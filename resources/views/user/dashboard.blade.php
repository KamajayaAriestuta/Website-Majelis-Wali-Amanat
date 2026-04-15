@extends('user.layouts.base')
@section('content')
<!-- Carousel Start -->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <video autoplay muted loop playsinline>
                <source src="{{ asset('template_user/img/video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

</div>
<!-- Carousel End -->


<!-- Feature Start-->
<div class="feature wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-worker"></i>
                    </div>
                    <div class="feature-text">
                        <h3>16 Anggota</h3>
                        <p>Majelis Wali Amanat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-address"></i>
                    </div>
                    <div class="feature-text">
                        <h3>PP 108</h3>
                        <p>Perguruan Tinggi Badan Hukum Universitas Brawijaya</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="flaticon-worker"></i>
                    </div>
                    <div class="feature-text">
                        <h3>5 Anggota</h3>
                        <p>Komite Audit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->

<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
            <h2>Pimpinan</h2>
            <p>Majelis Wali Amanat</p>
        </div>
        <div class="row">
            @foreach ($pimpinan as $pimpinanMWA)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{ asset('storage/' . $pimpinanMWA->foto) }}" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>{{ $pimpinanMWA->nama }}</h2>
                        <p>{{ $pimpinanMWA->jabatan }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Blog Start -->
<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <h2>Kegiatan</h2>
            <p>Majelis Wali Amanat</p>
        </div>
        <div class="row">
            @foreach ($kegiatan as $kegiatanMWA)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="{{ asset('storage/'.$kegiatanMWA->thumbnail) }}" alt="Image">
                    </div>
                    <div class="blog-title">
                        <h3>{{ $kegiatanMWA->judul }}</h3>
                        <a class="btn" href="/kegiatan/{{ $kegiatanMWA->id }}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
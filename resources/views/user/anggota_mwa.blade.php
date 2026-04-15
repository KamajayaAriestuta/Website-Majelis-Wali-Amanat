@extends('user.layouts.base')
@section('content')

<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
        <h2>Pimpinan</h2>
        <p>Majelis Wali Aamanat</p>
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
                        <p class="text-secondary">Unsur {{ $pimpinanMWA->unsur }}</p>
                    </div>
                    <div class="team-social">
                        <a class="text-white" href=""><i class="fa-solid fa-user"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="team">
    <div class="container">
        <div class="section-header text-center">
        <h2>Anggota</h2>
        <p>Majelis Wali Aamanat</p>
        </div>
        <div class="row">
            @foreach ($anggota as $anggotaMWA)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{ asset('storage/' . $anggotaMWA->foto) }}" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>{{ $anggotaMWA->nama }}</h2>
                        <p>{{ $anggotaMWA->jabatan }}</p>
                        <p class="text-secondary">Unsur {{ $anggotaMWA->unsur }}</p>
                    </div>
                    <div class="team-social">
                        <a class="text-white" href=""><i class="fa-solid fa-user"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

@endsection
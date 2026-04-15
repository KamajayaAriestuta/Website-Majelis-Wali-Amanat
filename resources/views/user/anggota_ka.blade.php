@extends('user.layouts.base')
@section('content')

<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center">
        <h2>Anggota</h2>
        <p>Komite Audit</p>
        </div>
        <div class="row">
            @foreach ($anggota as $anggotaKA)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{ asset('storage/' . $anggotaKA->foto) }}" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>{{ $anggotaKA->nama }}</h2>
                        <p>{{ $anggotaKA->jabatan }}</p>
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
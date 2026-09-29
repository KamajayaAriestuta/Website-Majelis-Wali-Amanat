@extends('user.layouts.base')

@section('content')
<!-- Page Header Start -->
<x-user.page-header judul="Komite Audit" label="Anggota Komite Audit"
    deskripsi="Komite yang dibentuk Majelis Wali Amanat untuk membantu pelaksanaan fungsi pengawasan di bidang nonakademik Universitas Brawijaya.">
    <div><strong>{{ $pimpinan->count() + $anggota->count() }}</strong><span>Total Anggota</span></div>
    <div><strong>{{ $pimpinan->count() }}</strong><span>Pimpinan</span></div>
    <a href="{{ route('user.mwateam') }}" class="mw-hero-link">
        <strong><i class="fa fa-users"></i></strong><span>Lihat Anggota MWA <i class="fa fa-arrow-right"></i></span>
    </a>
</x-user.page-header>
<!-- Page Header End -->

<!-- Pimpinan Start -->
<section class="hm-section">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Pimpinan</span>
                <h2 class="hm-title">Pimpinan Komite Audit</h2>
            </div>
        </div>
        <div class="row">
            @forelse ($pimpinan as $pimpinanKA)
            <div class="col-lg-3 col-sm-6 mb-4">
                @include('user.partials.kartu_anggota', ['orang' => $pimpinanKA, 'label' => $pimpinanKA->jabatan, 'keterangan' => 'Komite Audit'])
            </div>
            @empty
            <div class="col-12">
                <div class="hm-empty">Data pimpinan belum tersedia.</div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Pimpinan End -->

<!-- Anggota Start -->
<section class="hm-section hm-section-alt">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Anggota</span>
                <h2 class="hm-title">Anggota Komite Audit</h2>
            </div>
        </div>
        <div class="row">
            @forelse ($anggota as $anggotaKA)
            <div class="col-lg-3 col-sm-6 mb-4">
                @include('user.partials.kartu_anggota', ['orang' => $anggotaKA, 'label' => $anggotaKA->jabatan, 'keterangan' => 'Komite Audit'])
            </div>
            @empty
            <div class="col-12">
                <div class="hm-empty">Data anggota belum tersedia.</div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Anggota End -->
@endsection

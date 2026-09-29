@extends('user.layouts.base')

@php
    $tugas = [
        'Menetapkan kebijakan umum nonakademik UB',
        'Menetapkan Peraturan MWA',
        'Menyetujui usul perubahan Statuta UB',
        'Menetapkan norma dan tolok ukur kinerja UB bersama SAU',
        'Menetapkan rencana induk pengembangan, rencana strategis, dan rencana anggaran tahunan yang diusulkan Rektor',
        'Mengawasi pengelolaan dan pengendalian umum atas pengelolaan nonakademik UB',
        'Mengangkat dan memberhentikan ketua dan/atau anggota KA',
        'Mengangkat dan memberhentikan anggota kehormatan MWA',
        'Mengangkat dan memberhentikan Rektor',
        'Melakukan penilaian tahunan atas kinerja Rektor',
        'Membuat keputusan tertinggi terhadap permasalahan yang tidak dapat diselesaikan oleh Rektor dan SAU',
        'Membangun dan membina jejaring dengan individu, institusi, dan/atau organisasi di luar UB',
        'Memberikan pertimbangan dan melakukan pengawasan dalam rangka mengembangkan kekayaan dan menjaga kesehatan keuangan UB',
        'Menyusun dan menyampaikan laporan tahunan kepada Menteri bersama Rektor',
    ];
@endphp

@section('content')
<x-user.page-header judul="Tentang Majelis Wali Amanat" label="Tentang"
    deskripsi="Kedudukan, fungsi, dan tugas Majelis Wali Amanat sebagai organ Universitas Brawijaya menurut PP 108 Tahun 2021." />

<!-- Profil Start -->
<section class="hm-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="hm-about-img">
                    <img src="{{ asset('template_user/img/about.jpg') }}" alt="Rapat Majelis Wali Amanat Universitas Brawijaya" loading="lazy">
                    <div class="hm-about-badge">
                        <strong>PP 108</strong>
                        <span>Tahun 2021 tentang PTN-BH Universitas Brawijaya</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-lg-5">
                <span class="hm-kicker">Menurut PP 108 Tahun 2021</span>
                <h2 class="hm-title">Apa itu Majelis Wali Amanat?</h2>
                <p class="hm-lead">
                    Majelis Wali Amanat yang selanjutnya disingkat MWA adalah organ UB yang menyusun,
                    merumuskan, dan menetapkan kebijakan, memberikan pertimbangan pelaksanaan kebijakan
                    umum, serta melaksanakan pengawasan di bidang nonakademik.
                </p>
                <div class="mw-pillars">
                    <div class="mw-pillar">
                        <i class="fa fa-landmark"></i>
                        <div>
                            <strong>Kebijakan</strong>
                            <span>Menyusun, merumuskan, dan menetapkan kebijakan</span>
                        </div>
                    </div>
                    <div class="mw-pillar">
                        <i class="fa fa-comments"></i>
                        <div>
                            <strong>Pertimbangan</strong>
                            <span>Memberikan pertimbangan pelaksanaan kebijakan umum</span>
                        </div>
                    </div>
                    <div class="mw-pillar">
                        <i class="fa fa-search"></i>
                        <div>
                            <strong>Pengawasan</strong>
                            <span>Melaksanakan pengawasan di bidang nonakademik</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Profil End -->

<!-- Tugas Start -->
<section class="hm-section hm-section-alt">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Tugas</span>
                <h2 class="hm-title">Tugas Majelis Wali Amanat</h2>
            </div>
        </div>
        <ol class="mw-duties">
            @foreach ($tugas as $butir)
            <li>{{ $butir }}</li>
            @endforeach
        </ol>
    </div>
</section>
<!-- Tugas End -->

<!-- CTA Start -->
<section class="hm-cta">
    <div class="container">
        <div class="hm-cta-inner">
            <div>
                <h2>Kenali anggota Majelis Wali Amanat</h2>
                <p>Lihat susunan pimpinan, anggota, dan Komite Audit beserta dasar pengangkatannya.</p>
            </div>
            <a href="{{ route('user.mwateam') }}" class="hm-btn hm-btn-dark">Lihat Anggota</a>
        </div>
    </div>
</section>
<!-- CTA End -->
@endsection

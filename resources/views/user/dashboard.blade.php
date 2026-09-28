@extends('user.layouts.base')

@push('styles')
<link href="{{ asset('template_user/css/home.css') }}" rel="stylesheet">
@endpush

@php
    $formatTanggal = fn ($tanggal) => rescue(
        fn () => \Carbon\Carbon::parse($tanggal)->locale('id')->translatedFormat('d F Y'),
        $tanggal,
        false
    );
@endphp

@section('content')
<!-- Hero Start -->
<section class="hm-hero">
    <video class="hm-hero-video" autoplay muted loop playsinline preload="metadata"
           poster="{{ asset('template_user/img/dashboard.jpg') }}">
        <source src="{{ asset('template_user/img/video.mp4') }}" type="video/mp4">
    </video>
    <div class="hm-hero-overlay"></div>
    <div class="container hm-hero-content">
        <h1>Majelis Wali Amanat</h1>
        <p>
            Organ Universitas Brawijaya yang menyusun, merumuskan, dan menetapkan kebijakan,
            memberikan pertimbangan pelaksanaan kebijakan umum, serta melaksanakan pengawasan
            di bidang nonakademik.
        </p>
        <div class="hm-hero-actions">
            <a href="{{ route('user.about') }}" class="hm-btn hm-btn-primary">Tentang MWA</a>
            <a href="{{ route('user.peraturan') }}" class="hm-btn hm-btn-ghost">Produk Hukum</a>
        </div>
    </div>
</section>
<!-- Hero End -->

<!-- Statistik Start -->
<section class="hm-stats">
    <div class="container">
        <div class="hm-stats-grid">
            <a href="{{ route('user.mwateam') }}" class="hm-stat">
                <i class="fa fa-users"></i>
                <strong>{{ $statistik['anggota_mwa'] }}</strong>
                <span>Anggota MWA</span>
            </a>
            <a href="{{ route('user.kateam') }}" class="hm-stat">
                <i class="fa fa-user-shield"></i>
                <strong>{{ $statistik['anggota_ka'] }}</strong>
                <span>Anggota Komite Audit</span>
            </a>
            <a href="{{ route('user.peraturan') }}" class="hm-stat">
                <i class="fa fa-balance-scale"></i>
                <strong>{{ $statistik['produk_hukum'] }}</strong>
                <span>Produk Hukum</span>
            </a>
            <a href="{{ route('user.kegiatan') }}" class="hm-stat">
                <i class="fa fa-calendar-check"></i>
                <strong>{{ $statistik['kegiatan'] }}</strong>
                <span>Kegiatan</span>
            </a>
        </div>
    </div>
</section>
<!-- Statistik End -->

<!-- Tentang Start -->
<section class="hm-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="hm-about-img">
                    <img src="{{ asset('template_user/img/about.jpg') }}" alt="Rapat Majelis Wali Amanat Universitas Brawijaya" loading="lazy">
                    <div class="hm-about-badge">
                        <strong>PP 108</strong>
                        <span>Tahun 2021 tentang PTN-BH Universitas Brawijaya</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-lg-5">
                <span class="hm-kicker">Tentang Kami</span>
                <h2 class="hm-title">Mengawal tata kelola Universitas Brawijaya</h2>
                <p class="hm-lead">
                    Sebagai organ tertinggi PTN Badan Hukum, MWA menetapkan arah kebijakan nonakademik
                    dan memastikan pengelolaan universitas berjalan akuntabel.
                </p>
                <ul class="hm-checklist">
                    <li>Menetapkan kebijakan umum nonakademik dan Peraturan MWA</li>
                    <li>Menetapkan rencana strategis dan anggaran tahunan yang diusulkan Rektor</li>
                    <li>Mengangkat, memberhentikan, dan menilai kinerja Rektor</li>
                    <li>Mengawasi pengelolaan keuangan dan kekayaan universitas</li>
                </ul>
                <a href="{{ route('user.about') }}" class="hm-link">Lihat seluruh tugas MWA <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Tentang End -->

<!-- Pimpinan Start -->
<section class="hm-section hm-section-alt">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Pimpinan</span>
                <h2 class="hm-title">Pimpinan Majelis Wali Amanat</h2>
            </div>
            <a href="{{ route('user.mwateam') }}" class="hm-link">Lihat seluruh anggota <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="row">
            @forelse ($pimpinan as $pimpinanMWA)
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="hm-person">
                    <div class="hm-person-photo">
                        @if ($pimpinanMWA->foto)
                            <img src="{{ asset('storage/' . $pimpinanMWA->foto) }}" alt="{{ $pimpinanMWA->nama }}" loading="lazy">
                        @else
                            <div class="hm-placeholder"><i class="fa fa-user"></i></div>
                        @endif
                        <span class="hm-person-role">{{ $pimpinanMWA->jabatan }}</span>
                    </div>
                    <div class="hm-person-body">
                        <h3>{{ $pimpinanMWA->nama }}</h3>
                        <p>{{ $pimpinanMWA->unsur }}</p>
                    </div>
                </div>
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

<!-- Kegiatan Start -->
<section class="hm-section">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Kabar Terbaru</span>
                <h2 class="hm-title">Kegiatan &amp; Pengumuman</h2>
            </div>
            <a href="{{ route('user.kegiatan') }}" class="hm-link">Lihat semua kegiatan <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="row">
            @forelse ($kegiatan as $kegiatanMWA)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('user.kegiatan.detail', $kegiatanMWA->id) }}" class="hm-news">
                    <div class="hm-news-img">
                        @if ($kegiatanMWA->thumbnail)
                            <img src="{{ asset('storage/' . $kegiatanMWA->thumbnail) }}" alt="{{ $kegiatanMWA->judul }}" loading="lazy">
                        @else
                            <div class="hm-placeholder"><i class="fa fa-image"></i></div>
                        @endif
                        @if ($kegiatanMWA->kategori)
                            <span class="hm-badge">{{ $kegiatanMWA->kategori }}</span>
                        @endif
                    </div>
                    <div class="hm-news-body">
                        <span class="hm-date"><i class="far fa-calendar"></i> {{ $formatTanggal($kegiatanMWA->tanggal) }}</span>
                        <h3>{{ $kegiatanMWA->judul }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($kegiatanMWA->text), 110) }}</p>
                        <span class="hm-news-more">Baca selengkapnya <i class="fa fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="hm-empty">Belum ada kegiatan yang dipublikasikan.</div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Kegiatan End -->

<!-- Produk Hukum Start -->
<section class="hm-section hm-section-alt">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Produk Hukum</span>
                <h2 class="hm-title">Peraturan &amp; Keputusan Terbaru</h2>
            </div>
        </div>
        <div class="row">
            @foreach ([
                ['judul' => 'Peraturan MWA', 'data' => $peraturanTerbaru, 'route' => 'user.peraturan', 'icon' => 'fa-book'],
                ['judul' => 'Keputusan MWA', 'data' => $keputusanTerbaru, 'route' => 'user.keputusan', 'icon' => 'fa-gavel'],
            ] as $kelompok)
            <div class="col-lg-6 mb-4">
                <div class="hm-docs">
                    <div class="hm-docs-head">
                        <h3><i class="fa {{ $kelompok['icon'] }}"></i> {{ $kelompok['judul'] }}</h3>
                        <a href="{{ route($kelompok['route']) }}" class="hm-link">Semua <i class="fa fa-arrow-right"></i></a>
                    </div>
                    @forelse ($kelompok['data'] as $dokumen)
                    <a class="hm-doc" href="{{ $dokumen->dokumen ? asset('storage/' . $dokumen->dokumen) : route($kelompok['route']) }}"
                       @if ($dokumen->dokumen) target="_blank" rel="noopener" @endif>
                        <i class="far fa-file-pdf"></i>
                        <div>
                            <strong>{{ $dokumen->perihal }}</strong>
                            <span>Nomor {{ $dokumen->nomor }} &middot; {{ $formatTanggal($dokumen->tanggal_ditetapkan) }}</span>
                        </div>
                    </a>
                    @empty
                    <div class="hm-empty hm-empty-sm">Belum ada {{ strtolower($kelompok['judul']) }} yang dipublikasikan.</div>
                    @endforelse
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Produk Hukum End -->

<!-- Kontak Start -->
<section class="hm-cta">
    <div class="container">
        <div class="hm-cta-inner">
            <div>
                <h2>Ada pertanyaan untuk Majelis Wali Amanat?</h2>
                <p>Sekretariat MWA melayani Senin&ndash;Jumat, pukul 08.00&ndash;16.00 WIB.</p>
            </div>
            <a href="{{ route('user.kontak') }}" class="hm-btn hm-btn-dark">Hubungi Kami</a>
        </div>
    </div>
</section>
<!-- Kontak End -->
@endsection

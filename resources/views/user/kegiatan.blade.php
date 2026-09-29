@extends('user.layouts.base')

@section('content')
<x-user.page-header judul="Kegiatan & Pengumuman" label="Kegiatan"
    deskripsi="Kabar terbaru mengenai rapat, agenda, dan kegiatan Majelis Wali Amanat Universitas Brawijaya." />

<!-- Kegiatan Start -->
<section class="hm-section">
    <div class="container">
        <div class="mw-toolbar">
            <form method="GET" action="{{ route('user.kegiatan') }}" class="mw-search" role="search">
                @if ($kategori)
                    <input type="hidden" name="kategori" value="{{ $kategori }}">
                @endif
                <i class="fa fa-search"></i>
                <input type="search" name="q" value="{{ $cari }}" placeholder="Cari judul kegiatan..." aria-label="Cari judul kegiatan">
                <button type="submit" class="hm-btn hm-btn-dark">Cari</button>
            </form>

            @if ($daftarKategori->count() > 1)
            <div class="mw-filter mw-filter-inline" aria-label="Filter kategori">
                <a href="{{ route('user.kegiatan', array_filter(['q' => $cari])) }}" class="mw-chip {{ $kategori ? '' : 'is-active' }}">Semua</a>
                @foreach ($daftarKategori as $item)
                <a href="{{ route('user.kegiatan', array_filter(['q' => $cari, 'kategori' => $item])) }}"
                   class="mw-chip {{ $kategori === $item ? 'is-active' : '' }}">{{ $item }}</a>
                @endforeach
            </div>
            @endif
        </div>

        @if ($cari !== '' || $kategori)
        <p class="mw-result-info">
            {{ $kegiatan->total() }} kegiatan ditemukan
            @if ($cari !== '') untuk &ldquo;{{ $cari }}&rdquo; @endif
            @if ($kategori) dalam kategori {{ $kategori }} @endif
            &middot; <a href="{{ route('user.kegiatan') }}">Hapus filter</a>
        </p>
        @endif

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
                        <span class="hm-date"><i class="far fa-calendar"></i> <x-user.tanggal :value="$kegiatanMWA->tanggal" /></span>
                        <h3>{{ $kegiatanMWA->judul }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($kegiatanMWA->text), 110) }}</p>
                        <span class="hm-news-more">Baca selengkapnya <i class="fa fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="hm-empty">
                    {{ $cari !== '' || $kategori ? 'Tidak ada kegiatan yang cocok dengan pencarian.' : 'Belum ada kegiatan yang dipublikasikan.' }}
                </div>
            </div>
            @endforelse
        </div>

        @if ($kegiatan->hasPages())
        <div class="mw-pagination">
            {{ $kegiatan->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div>
        @endif
    </div>
</section>
<!-- Kegiatan End -->
@endsection

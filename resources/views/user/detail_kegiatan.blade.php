@extends('user.layouts.base')

@section('content')
<x-user.page-header :judul="$kegiatan->judul" :label="\Illuminate\Support\Str::limit($kegiatan->judul, 40)"
    :jejak="['Kegiatan' => route('user.kegiatan')]">
    <x-slot:meta>
        <span><i class="far fa-calendar"></i> <x-user.tanggal :value="$kegiatan->tanggal" /></span>
        @if ($kegiatan->kategori)
            <span><i class="fa fa-tag"></i> {{ $kegiatan->kategori }}</span>
        @endif
    </x-slot:meta>
</x-user.page-header>

<!-- Detail Start -->
<section class="hm-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <article class="mw-article">
                    @if ($kegiatan->thumbnail)
                    <a href="{{ asset('storage/' . $kegiatan->thumbnail) }}" data-lightbox="kegiatan" class="mw-article-img">
                        <img src="{{ asset('storage/' . $kegiatan->thumbnail) }}" alt="{{ $kegiatan->judul }}">
                    </a>
                    @endif
                    <div class="mw-article-body">
                        {!! $kegiatan->text !!}
                    </div>
                </article>
                <a href="{{ route('user.kegiatan') }}" class="hm-link mt-4"><i class="fa fa-arrow-left"></i> Kembali ke daftar kegiatan</a>
            </div>

            <aside class="col-lg-4">
                <div class="mw-sidebar">
                    <h3>Kegiatan Lainnya</h3>
                    @forelse ($kegiatanLain as $item)
                    <a href="{{ route('user.kegiatan.detail', $item->id) }}" class="mw-mini-news">
                        <div class="mw-mini-news-img">
                            @if ($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="" loading="lazy">
                            @else
                                <div class="hm-placeholder"><i class="fa fa-image"></i></div>
                            @endif
                        </div>
                        <div>
                            <strong>{{ $item->judul }}</strong>
                            <span><x-user.tanggal :value="$item->tanggal" /></span>
                        </div>
                    </a>
                    @empty
                    <div class="hm-empty hm-empty-sm">Belum ada kegiatan lain.</div>
                    @endforelse
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- Detail End -->
@endsection

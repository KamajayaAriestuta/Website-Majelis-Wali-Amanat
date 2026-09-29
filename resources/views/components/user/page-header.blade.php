@props([
    'judul',
    'deskripsi' => null,
    'jejak' => [],
])
{{-- $jejak: ['Label' => url] untuk breadcrumb di antara Beranda dan halaman ini --}}
<section class="mw-hero">
    <div class="container">
        <nav class="mw-breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('user.dashboard') }}">Beranda</a>
            @foreach ($jejak as $label => $url)
                <a href="{{ $url }}">{{ $label }}</a>
            @endforeach
            <span>{{ $attributes->get('label', $judul) }}</span>
        </nav>
        <h1>{{ $judul }}</h1>
        @if ($deskripsi)
            <p>{{ $deskripsi }}</p>
        @endif
        @isset($meta)
            <div class="mw-meta">{{ $meta }}</div>
        @endisset
        @if ($slot->isNotEmpty())
            <div class="mw-hero-stats">
                {{ $slot }}
            </div>
        @endif
    </div>
</section>

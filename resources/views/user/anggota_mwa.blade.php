@extends('user.layouts.base')

@php
    $semua = $pimpinan->concat($anggota);
    $jumlahExOfficio = $semua->where('nomor_sk', 'Ex-Officio')->count();
    $unsurAnggota = $anggota->groupBy('unsur')->map->count();
@endphp

@section('content')
<!-- Page Header Start -->
<x-user.page-header judul="Anggota Majelis Wali Amanat" label="Anggota MWA"
    deskripsi="Susunan pimpinan dan anggota Majelis Wali Amanat Universitas Brawijaya beserta unsur keterwakilan dan dasar pengangkatannya.">
    <div><strong>{{ $semua->count() }}</strong><span>Total Anggota</span></div>
    <div><strong>{{ $pimpinan->count() }}</strong><span>Pimpinan</span></div>
    <div><strong>{{ $jumlahExOfficio }}</strong><span>Ex-Officio</span></div>
    <div><strong>{{ $semua->pluck('unsur')->unique()->count() }}</strong><span>Unsur</span></div>
</x-user.page-header>
<!-- Page Header End -->

<!-- Pimpinan Start -->
<section class="hm-section">
    <div class="container">
        <div class="hm-section-head">
            <div>
                <span class="hm-kicker">Pimpinan</span>
                <h2 class="hm-title">Pimpinan Majelis Wali Amanat</h2>
            </div>
        </div>
        <div class="row">
            @forelse ($pimpinan as $pimpinanMWA)
            <div class="col-lg-3 col-sm-6 mb-4">
                @include('user.partials.kartu_anggota', ['orang' => $pimpinanMWA, 'label' => $pimpinanMWA->jabatan, 'keterangan' => 'Unsur ' . $pimpinanMWA->unsur])
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
                <h2 class="hm-title">Anggota Majelis Wali Amanat</h2>
            </div>
        </div>

        @if ($unsurAnggota->count() > 1)
        <div class="mw-filter" role="group" aria-label="Filter berdasarkan unsur">
            <button type="button" class="mw-chip is-active" data-unsur="" aria-pressed="true">
                Semua <span>{{ $anggota->count() }}</span>
            </button>
            @foreach ($unsurAnggota as $unsur => $jumlah)
            <button type="button" class="mw-chip" data-unsur="{{ $unsur }}" aria-pressed="false">
                {{ $unsur }} <span>{{ $jumlah }}</span>
            </button>
            @endforeach
        </div>
        @endif

        <div class="row">
            @forelse ($anggota as $anggotaMWA)
            <div class="col-lg-3 col-sm-6 mb-4" data-unsur="{{ $anggotaMWA->unsur }}">
                @include('user.partials.kartu_anggota', ['orang' => $anggotaMWA, 'label' => $anggotaMWA->unsur, 'keterangan' => $anggotaMWA->jabatan])
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

@push('scripts')
<script>
    document.querySelectorAll('.mw-filter .mw-chip').forEach(function (chip, _, semuaChip) {
        chip.addEventListener('click', function () {
            var unsur = chip.dataset.unsur;
            semuaChip.forEach(function (c) {
                c.classList.toggle('is-active', c === chip);
                c.setAttribute('aria-pressed', c === chip);
            });
            document.querySelectorAll('.row > [data-unsur]').forEach(function (kolom) {
                kolom.hidden = unsur !== '' && kolom.dataset.unsur !== unsur;
            });
        });
    });
</script>
@endpush

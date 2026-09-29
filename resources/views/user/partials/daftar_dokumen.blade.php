{{-- Parameter: $dokumen (koleksi), $jenis ('Peraturan MWA' / 'Keputusan MWA'), $aktif ('peraturan' / 'keputusan') --}}
@php
    $tahunDari = fn ($item) => $item->tanggal_ditetapkan ? \Carbon\Carbon::parse($item->tanggal_ditetapkan)->year : null;
    $daftarTahun = $dokumen->map($tahunDari)->filter()->unique()->sortDesc()->values();
@endphp

<section class="hm-section">
    <div class="container">
        <div class="mw-tabs">
            <a href="{{ route('user.peraturan') }}" class="{{ $aktif === 'peraturan' ? 'is-active' : '' }}"><i class="fa fa-book"></i> Peraturan MWA</a>
            <a href="{{ route('user.keputusan') }}" class="{{ $aktif === 'keputusan' ? 'is-active' : '' }}"><i class="fa fa-gavel"></i> Keputusan MWA</a>
        </div>

        @if ($dokumen->isNotEmpty())
        <div class="mw-toolbar">
            <div class="mw-search">
                <i class="fa fa-search"></i>
                <input type="search" id="cariDokumen" placeholder="Cari nomor atau perihal..." aria-label="Cari nomor atau perihal">
            </div>
            @if ($daftarTahun->count() > 1)
            <select id="tahunDokumen" class="mw-select" aria-label="Filter tahun">
                <option value="">Semua tahun</option>
                @foreach ($daftarTahun as $tahun)
                <option value="{{ $tahun }}">{{ $tahun }}</option>
                @endforeach
            </select>
            @endif
        </div>
        <p class="mw-result-info" id="infoDokumen" aria-live="polite">{{ $dokumen->count() }} dokumen</p>
        @endif

        <div class="mw-doc-list">
            @forelse ($dokumen as $item)
            @php $tahun = $tahunDari($item); @endphp
            <div class="mw-doc" data-tahun="{{ $tahun }}"
                 data-cari="{{ \Illuminate\Support\Str::lower($item->nomor . ' ' . $item->perihal . ' ' . $tahun) }}">
                <div class="mw-doc-icon"><i class="far fa-file-pdf"></i></div>
                <div class="mw-doc-body">
                    <span class="mw-doc-number">{{ $jenis }} Nomor {{ $item->nomor }}@if ($tahun) Tahun {{ $tahun }}@endif</span>
                    <h3>{{ $item->perihal }}</h3>
                    <span class="mw-doc-date"><i class="far fa-calendar"></i> Ditetapkan <x-user.tanggal :value="$item->tanggal_ditetapkan" /></span>
                </div>
                @if ($item->dokumen)
                <div class="mw-doc-actions">
                    <a href="{{ asset('storage/' . $item->dokumen) }}" target="_blank" rel="noopener" class="mw-btn-sm">
                        <i class="far fa-eye"></i> Lihat
                    </a>
                    <a href="{{ asset('storage/' . $item->dokumen) }}" download class="mw-btn-sm mw-btn-sm-gold">
                        <i class="fa fa-download"></i> Unduh
                    </a>
                </div>
                @endif
            </div>
            @empty
            <div class="hm-empty">Belum ada {{ \Illuminate\Support\Str::lower($jenis) }} yang dipublikasikan.</div>
            @endforelse
            <div class="hm-empty" id="kosongDokumen" hidden>Tidak ada dokumen yang cocok dengan pencarian.</div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function () {
        var cari = document.getElementById('cariDokumen');
        if (!cari) return;
        var tahun = document.getElementById('tahunDokumen');
        var info = document.getElementById('infoDokumen');
        var kosong = document.getElementById('kosongDokumen');
        var semua = document.querySelectorAll('.mw-doc');

        function saring() {
            var kata = cari.value.trim().toLowerCase();
            var th = tahun ? tahun.value : '';
            var tampil = 0;
            semua.forEach(function (el) {
                var cocok = (!kata || el.dataset.cari.indexOf(kata) !== -1) && (!th || el.dataset.tahun === th);
                el.hidden = !cocok;
                if (cocok) tampil++;
            });
            info.textContent = (kata || th) ? tampil + ' dari ' + semua.length + ' dokumen' : semua.length + ' dokumen';
            kosong.hidden = tampil !== 0;
        }

        cari.addEventListener('input', saring);
        if (tahun) tahun.addEventListener('change', saring);
    })();
</script>
@endpush

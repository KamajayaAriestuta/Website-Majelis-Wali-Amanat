@php
    $exOfficio = $orang->nomor_sk === 'Ex-Officio';
    $adaNomorSk = ! $exOfficio && ! in_array(trim((string) $orang->nomor_sk), ['', '-'], true);
@endphp
<div class="hm-person mw-person">
    <div class="hm-person-photo">
        @if ($orang->foto)
            <img src="{{ asset('storage/' . $orang->foto) }}" alt="{{ $orang->nama }}" loading="lazy">
        @else
            <div class="hm-placeholder"><i class="fa fa-user"></i></div>
        @endif
        <span class="hm-person-role">{{ $label }}</span>
    </div>
    <div class="hm-person-body">
        <h3>{{ $orang->nama }}</h3>
        <p>{{ $keterangan }}</p>
    </div>
    <div class="mw-person-foot">
        @if ($exOfficio)
            <span class="mw-tag mw-tag-gold">Ex-Officio</span>
        @elseif ($adaNomorSk)
            <span class="mw-tag" title="{{ $orang->nomor_sk }}">Diangkat melalui SK</span>
        @else
            <span></span>
        @endif
        @if ($orang->sk_pengangkatan)
            <a href="{{ asset('storage/' . $orang->sk_pengangkatan) }}" target="_blank" rel="noopener"
               class="mw-sk-link" title="{{ $adaNomorSk ? $orang->nomor_sk : 'SK Pengangkatan' }}">
                <i class="far fa-file-pdf"></i> SK
            </a>
        @endif
    </div>
</div>

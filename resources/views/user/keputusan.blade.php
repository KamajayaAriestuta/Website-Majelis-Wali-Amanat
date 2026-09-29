@extends('user.layouts.base')

@section('content')
<x-user.page-header judul="Keputusan MWA"
    deskripsi="Daftar Keputusan Majelis Wali Amanat Universitas Brawijaya yang telah ditetapkan beserta dokumennya.">
    <div><strong>{{ $keputusan->count() }}</strong><span>Keputusan</span></div>
</x-user.page-header>

@include('user.partials.daftar_dokumen', ['dokumen' => $keputusan, 'jenis' => 'Keputusan MWA', 'aktif' => 'keputusan'])
@endsection

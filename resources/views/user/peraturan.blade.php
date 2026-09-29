@extends('user.layouts.base')

@section('content')
<x-user.page-header judul="Peraturan MWA"
    deskripsi="Daftar Peraturan Majelis Wali Amanat Universitas Brawijaya yang telah ditetapkan beserta dokumennya.">
    <div><strong>{{ $peraturan->count() }}</strong><span>Peraturan</span></div>
</x-user.page-header>

@include('user.partials.daftar_dokumen', ['dokumen' => $peraturan, 'jenis' => 'Peraturan MWA', 'aktif' => 'peraturan'])
@endsection

@extends('user.layouts.base')

@section('title', '')
@section('header', '')
@section ('content')

<!-- About Start -->
<div class="container-fluid about">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-8">
                <div class="h-100">
                    <img src="{{ asset('storage/'.$kegiatan->thumbnail) }}" class="img-fluid w-100" style="object-fit: cover;" alt="Image">
                    <p class="text-dark text-justify mt-3"> {!! $kegiatan->text !!}</p>
                </div>
            </div>
            <div class="col-xl-4">
                <h5 class="text-uppercase text-primary">Berita dan Kegiatan</h5>
                <h1 class="mb-4">Majelis Wali Amanat Lainnya</h1>
                <div class="tab-class p-4 bg-dark">
                    <ul class="nav d-flex mb-2">
                    </ul>
                    <div class="tab-content">
                        @foreach ($semuaKegiatan as $data_semuaKegiatan)
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="text-start my-auto">
                                            <h5 class="text-uppercase text-white mb-3">{{$data_semuaKegiatan->judul}}</h5>
                                            <div class="d-flex align-items-center justify-content-start">
                                                <a class="btn-hover-bg btn btn-primary text-white py-2 px-4 mb-5" href="{{ route('user.kegiatan.detail', $data_semuaKegiatan->id) }}" target="_blank">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



@endsection
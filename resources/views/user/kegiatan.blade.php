@extends('user.layouts.base')
@section('content')
<!-- Blog Start -->
<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <h2>Kegiatan</h2>    
            <p>Majelis Wali Amanat</p>
        </div>
        <div class="row blog-page">
            @foreach ($kegiatan as $kegiatanMWA)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="{{ asset('storage/' . $kegiatanMWA->thumbnail) }}" alt="Image">
                    </div>
                    <div class="blog-title">
                        <h3>{{ $kegiatanMWA->judul }}</h3>
                        <a class="btn" href="">+</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> 
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection

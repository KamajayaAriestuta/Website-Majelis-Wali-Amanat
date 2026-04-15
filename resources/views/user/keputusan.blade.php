@extends('user.layouts.base')
@section('content')
<!-- FAQs Start -->
<div class="faqs">
    <div class="container">
        <div class="section-header text-center">
            <h2>Daftar Keputusan</h2>
            <p>Majelis Wali Amanat</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="accordion-1">
                    @foreach ($keputusan as $data_keputusan)
                    <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                               Keputusan MWA Nomor {{ $data_keputusan->nomor }} tahun {{ date('Y', strtotime($data_keputusan->tanggal_ditetapkan)) }} tentang {{ $data_keputusan->perihal }}
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                <a href="{{ asset('storage/' . $data_keputusan->dokumen) }}">{{ $data_keputusan->perihal }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQs End -->

@endsection
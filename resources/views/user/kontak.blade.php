@extends('user.layouts.base')

@section('content')
<x-user.page-header judul="Hubungi Kami" label="Kontak"
    deskripsi="Sampaikan pertanyaan atau keperluan Anda kepada Sekretariat Majelis Wali Amanat Universitas Brawijaya." />

<!-- Kontak Start -->
<section class="hm-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <span class="hm-kicker">Kontak Divisi Hukum</span>
                <h2 class="hm-title">Informasi Kontak</h2>
                <div class="mw-contact-list">
                    <div class="mw-contact">
                        <i class="fa fa-map-marker-alt"></i>
                        <div>
                            <strong>Lokasi</strong>
                            <span>Auditorium Universitas Brawijaya</span>
                            <a href="https://www.google.com/maps/search/?api=1&query=Auditorium+Universitas+Brawijaya" target="_blank" rel="noopener">Petunjuk arah <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <a class="mw-contact" href="tel:+6281216722886">
                        <i class="fa fa-phone-alt"></i>
                        <div>
                            <strong>Telepon</strong>
                            <span>+62 812-1672-2886</span>
                        </div>
                    </a>
                    <a class="mw-contact" href="mailto:mwa@ub.ac.id">
                        <i class="fa fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <span>mwa@ub.ac.id</span>
                        </div>
                    </a>
                    <div class="mw-contact">
                        <i class="far fa-clock"></i>
                        <div>
                            <strong>Jam Layanan</strong>
                            <span>Senin&ndash;Jumat, 08.00&ndash;16.00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mw-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.449940444515!2d112.61344437516163!3d-7.952367679232753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78830062102b87%3A0x551a14acb76d49c2!2sAuditorium%20Universitas%20Brawijaya!5e0!3m2!1sen!2sid!4v1761899096550!5m2!1sen!2sid"
                            title="Peta lokasi Auditorium Universitas Brawijaya" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kontak End -->
@endsection

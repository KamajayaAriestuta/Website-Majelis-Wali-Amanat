@extends('user.layouts.base')
@section('content')
<!-- Contact Start -->
<div class="contact wow fadeInUp">
    <div class="container">
        <div class="section-header text-center">
            <p>Hubungi Kami</p>
            <h2>Kontak Divisi Hukum</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="flaticon-address"></i>
                        <div class="contact-text">
                            <h2>Location</h2>
                            <p>Auditorium Universitas Brawijaya</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="flaticon-call"></i>
                        <div class="contact-text">
                            <h2>Phone</h2>
                            <p>+62 812-1672-2886</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="flaticon-send-mail"></i>
                        <div class="contact-text">
                            <h2>Email</h2>
                            <p>mwa@ub.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <div id="success"></div>
                    <div id="map" style="width: 100%; height: 400px;">
                        <!-- Google Maps iframe -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.449940444515!2d112.61344437516163!3d-7.952367679232753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78830062102b87%3A0x551a14acb76d49c2!2sAuditorium%20Universitas%20Brawijaya!5e0!3m2!1sen!2sid!4v1761899096550!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
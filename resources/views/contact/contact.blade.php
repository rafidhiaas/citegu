@extends('layouts.master')

@section('content')
<main class="main">

    <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up" style="padding-top: 100px;" >
            <h2>Contact</h2>
            <h3>"Jangan ragu untuk menghubungi kami! Tim ahli kami siap membantu Anda menemukan solusi TIK terbaik untuk kebutuhan bisnis Anda."</h3>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-5">
                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Gedung Plaza 89, Lantai 12, Unit 1207,</p>
                                <p>Jl. H.R Rasuna Said Kav. X-7 No. 6,Karet Kuningan, SetiaBudi, Jakarta 12940 – Indonesia </p>
                            </div>
                        </div>
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Telepon Kami</h3>
                                <p>+62 877-7716-5190</p>
                            </div>
                        </div>
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Kami</h3>
                                <p>Sales@citegu.id</p>
                            </div>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2414.4102215547423!2d106.82832506892638!3d-6.217937899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f403a6b4363b%3A0xd3757d9844afcf6e!2sPlaza%2089!5e1!3m2!1sid!2sid!4v1754302403485!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="{{ route('contact.submit') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Nama Anda</label>
                                <input type="text" name="name" id="name-field" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Email Anda</label>
                                <input type="email" class="form-control" name="email" id="email-field" required>
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subjek</label>
                                <input type="text" class="form-control" name="subject" id="subject-field" required>
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Pesan</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                {{-- TAMPILKAN PESAN SUKSES DARI LARAVEL --}}
                                @if(session('success'))
                                    <div class="alert alert-success mt-3" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger mt-3" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <button type="submit">Kirim Pesan</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection
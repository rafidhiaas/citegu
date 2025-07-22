@extends('layouts.master')

@section('content')
<main class="main">

    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('landing/assets/img/bg-1.jpg') }}" alt="" data-aos="fade-in" class="">
        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>PT. CIPTA TEKNOLOGI GURITA</h2>
                    <p>"Solusi IT dan dapat disesuaikan untuk kebutuhan bisnis Anda."</p>
                </div>
            </div>
        </div>
    </section>

    <section id="stats" class="stats section accent-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="10000" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Workers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="why-us" class="why-us section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"> <div class="why-box">
                    <h3>Why Choose Our Products?</h3>
                    <p>
                        We are a trusted technology partner offering comprehensive and innovative end-to-end IT solutions,
                        designed to address your most complex infrastructure challenges and digital needs.
                    </p>
                    <div class="text-center">
                        <a href="{{ route('contact.index') }}" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="row gy-4 justify-content-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"> {{-- Bagian Solusi End-to-End yang diubah menjadi tampilan kartu --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="icon-box solution-card-style d-flex flex-column justify-content-top align-items-center text-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800"> <i class="bi bi-boxes"></i>
                            <h4>Solusi End-to-End</h4>
                            <p>
                                Kami menyediakan solusi IT lengkap dari hulu ke hilir. Mulai dari perencanaan, implementasi, hingga pemeliharaan, kami adalah mitra terpercaya Anda.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="icon-box solution-card-style d-flex flex-column justify-content-top align-items-center text-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                            <i class="bi bi-clipboard-data"></i>
                            <h4>Solusi Infrastruktur Lengkap</h4>
                            <p>
                                Dapatkan satu sumber terpadu untuk Networking, Server (X64/Arm64), Storage, Sistem Operasi, hingga Data Center modern.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="icon-box solution-card-style d-flex flex-column justify-content-top align-items-center text-center" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">
                            <i class="bi bi-gem"></i>
                            <h4>Inovasi & Performa Tinggi</h4>
                            <p>
                                Siap menghadapi beban kerja intensif dengan Immersion Cooling, Secure VDI, High Performance Storage, HPC Server, ML/AI, dan Cloud Computing.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="icon-box solution-card-style d-flex flex-column justify-content-top align-items-center text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                            <i class="bi bi-inboxes"></i>
                            <h4>Pengembangan Solusi Digital</h4>
                            <p>
                                Ahli dalam Software Development, ML/AI Development, dan BigData Development Solution untuk mendorong pertumbuhan bisnis Anda.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="icon-box solution-card-style d-flex flex-column justify-content-top align-items-center text-center" data-aos="fade-up" data-aos-delay="700" data-aos-duration="800">
                            <i class="bi bi-file-lock"></i>
                            <h4>Keamanan & Keandalan Data</h4>
                            <p>
                                Solusi Keamanan, CCTV & Analytics, dan Backup System memastikan data Anda aman, terlindungi, dan selalu tersedia.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="icon-box solution-card-style d-flex flex-column justify-content-top align-items-center text-center" data-aos="fade-up" data-aos-delay="800" data-aos-duration="800">
                            <i class="bi bi-database"></i>
                            <h4>Manajemen Data & Analitik</h4>
                            <p>
                                Kelola, analisis, dan manfaatkan data Anda secara efektif dengan database management, data warehousing, dan business intelligence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="call-to-action" class="call-to-action section dark-background">
        <img src="{{ asset('landing/assets/img/bg-2.jpg') }}" alt="">

        <div class="container">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-9 text-center text-xl-start">
                    <h3>Ready to Transform Your Business?</h3>
                    <p>With our end-to-end ICT services, you no longer need to worry about the complexity of infrastructure and development. Trust your Networking, Server, Storage, to modern Data Center solutions to us, so you can focus on core business innovation.</p>
                </div>
                <div class="col-xl-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                </div>
            </div>
        </div>
    </section>

<section id="about" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('landing/assets/img/citegulogo.png') }}" class="img-fluid" alt="CITEGU">
                </div>

                <div class="col-lg-6 content order-last order-lg-first" data-aos="fade-up" data-aos-delay="100">
                    <div class="container" data-aos="fade-up">
                        <h2 class="section-title">About The Company</h2>
                    </div>
                    <ul>
                        <li>
                            <i class="bi bi-tags"></i>
                            <div>
                                <h5> VISION <br></h5>
                                <h5>To provide ICT (Information and Communication Technology) solutions with the best value for our customers.</h5>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-shield-fill-check"></i>
                            <div>
                                <h5> MISION <br></h5>
                                <h5>To help our customers achieve their business goals with environmentally friendly, high-performance, and state-of-the-art technology.</h5>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-pin-map-fill"></i>
                            <div>
                                <br><h5>Establish in 2024 in JAKARTA - INDONESIA</h5>
                            </div>
                        </li>
                        <li>
                            <i class="bi bi-person-lines-fill"></i>
                            <div>
                                {{-- Mengarahkan ke halaman contact.blade.php yang baru --}}
                                <h5><a href="{{ route('contact.index') }}" class="contact-button">Contact Us</a></h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial sections -->
    <section id="testimonials" class="testimonials section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        }
                    }
                </script>
                <div class="swiper-wrapper">

                    {{-- PASTIKAN HANYA ADA BLOK @forelse ini di dalam swiper-wrapper --}}
                    @forelse($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>{{ $testimonial->content }}</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>{{ $testimonial->author_name }}</h3>
                                        <h4>
                                            @if($testimonial->author_role){{ $testimonial->author_role }}@endif
                                            @if($testimonial->author_role && $testimonial->author_company), @endif
                                            @if($testimonial->author_company){{ $testimonial->author_company }}@endif
                                        </h4>
                                        <div class="stars">
                                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                            @for ($i = $testimonial->rating; $i < 5; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="testimonial-item text-center">
                            <p>Belum ada testimonial yang disetujui untuk ditampilkan saat ini.</p>
                        </div>
                    </div>
                    @endforelse

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- kirim testimonial -->
    <div class="text-center my-5" data-aos="fade-up">
    <p><h1>Punya pengalaman luar biasa dengan kami? Bagikan kisah Anda!</p></h1>
    <a href="{{ route('testimonials.create') }}" class="btn btn-info">Kirim Testimonial Anda</a>
</div>
</main>
@endsection

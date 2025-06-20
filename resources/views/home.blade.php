@extends('layouts.master')

@section('content')
<main class="main">

    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('landing/assets/img/bg-1.jpg') }}" alt="" data-aos="fade-in" class="">

      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2>PT. CIPTA TEKNOLOGI GURITA</h2>
            <p>"Menyediakan solusi IT dan dapat disesuaikan untuk kebutuhan bisnis Anda."</p>
            <a href="#about" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>

    </section><section id="clients" class="clients section light-background">
  <div class="container" data-aos="fade-up">
    <h2 class="section-title">Our Partners</h2> <div class="row gy-4">
      </div>
  </div>

  <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.sonicwall.com" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/sonicwall-logo.png') }}" class="img-fluid" alt="SonicWall Logo">
          </a>
        </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.ruijie.com/en-global/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/Ruijie-logo.png') }}" class="img-fluid" alt="Ruijie Logo">
          </a>
        </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.cisco.com/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/cisco-logo.png') }}" class="img-fluid" alt="cisco Logo">
          </a>
        </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.shell.com/business-customers/lubricants-for-business/process-oils/immersion-cooling-fluids.html" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/shell-logo.png') }}" class="img-fluid" alt="shell Logo">
          </a>
        </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.microsoft.com/id-id" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/Microsoft-logo.png') }}" class="img-fluid" alt="Microsoft Logo">
          </a>
        </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.vmware.com/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/vmware-logo.png') }}" class="img-fluid" alt="vmware Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.vmware.com/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/giga-computing.png') }}" class="img-fluid" alt="giga computing Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.seagate.com/id/id/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/seagate-logo.png') }}" class="img-fluid" alt="seagate Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.volktek.com/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/voltek.png') }}" class="img-fluid" alt="voltek Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.fortinet.com/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/fortinet-logo.png') }}" class="img-fluid" alt="fortinet Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://vates.tech/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/vates-logo.png') }}" class="img-fluid" alt="vates Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.synology.com/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/synology-logo.png') }}" class="img-fluid" alt="synology Logo">
          </a>
          </div><div class="col-xl-2 col-md-3 col-6 client-logo">
          <a href="https://www.indorack.co.id/" target="_blank">
          <img src="{{ asset('landing/assets/img/clients/indocase-logo.png') }}" class="img-fluid" alt="indocase Logo">
          </a>
          </div></div>

      </div>

    </section><section id="stats" class="stats section accent-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="10000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div></div>

      </div>

    </section><section id="why-us" class="why-us section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Our Products?</h3>
              <p>
                We are a trusted technology partner offering comprehensive and innovative end-to-end IT solutions,
                designed to address your most complex infrastructure challenges and digital needs.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><div class="col-lg-12 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-12">
                <div class="icon-box d-flex flex-column justify-content-top align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Solusi End-to-End yang Lengkap</h4>
                   <p style="text-align: justify;">
                    Dengan kami, Anda mendapatkan satu sumber terpadu untuk seluruh kebutuhan IT Anda.
                    Kami menyediakan beragam solusi, mulai dari infrastruktur dasar seperti Networking,
                    Server (X64/Arm64), Storage, dan Sistem Operasi, hingga fasilitas Pusat Data (Data Center)
                    modern yang inovatif seperti Liquid Cooling, RDX, dan Access Door. Ini artinya,
                    Anda tidak perlu repot mencari vendor berbeda untuk setiap komponen. Kami memastikan
                    semua sistem Anda terintegrasi dengan sempurna, sehingga operasional menjadi lebih efisien dan efektif. </p>
                </div>
              </div><div class="col-xl-12" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-top align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Fokus pada Inovasi dan Performa Tinggi</h4>
                  <p style="text-align: justify;">
                    Kami berada di garis depan teknologi dengan menawarkan solusi seperti Immersion Cooling,
                    Secure VDI, High Performance Storage, HPC Server, ML/AI Solution, dan Cloud Computing.
                    Ini menjamin infrastruktur Anda siap menghadapi beban kerja yang paling intensif dan mendukung
                    inovasi bisnis Anda.</p>
                </div>
              </div><div class="col-xl-12 col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-top align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Keahlian dalam Pengembangan Solusi Digital</h4>
                  <p style="text-align: justify;">
                    Selain infrastruktur, kami juga ahli dalam Software Development, ML/AI Development,
                    dan BigData Development Solution. Ini memungkinkan kami tidak hanya membangun fondasi yang kuat,
                    tetapi juga membantu Anda mengembangkan aplikasi dan sistem cerdas yang mendorong pertumbuhan bisnis.</p>
                </div>
              </div><div class="col-xl-12 col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-top align-items-center">
                  <i class="bi bi-file-lock"></i>
                  <h4>Keamanan dan Keandalan Data</h4>
                  <p style="text-align: justify;">
                    Dengan penawaran Security Solution, CCTV & Analytics, dan Backup System Solution, kami memastikan data dan operasional Anda aman, terlindungi, dan selalu tersedia, meminimalkan risiko kerugian dan downtime.</p>
                </div>
              </div><div class="col-xl-12 col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-top align-items-center">
                  <i class="bi bi-database"></i>
                  <h4>....</h4>
                  <p style="text-align: justify;">
                    Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div></div>
          </div>

        </div>

      </div>

    </section><section id="call-to-action" class="call-to-action section dark-background">

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

    </section><section id="services" class="services section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Nesciunt Mete</h3>
              </a>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
            </div>
          </div><div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-map"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Data Center Design</h3>
              </a>
              <p>"Create the digital infrastructure of the future with custom data center designs from CITEGU.
                We integrate the latest technologies such as liquid cooling and advanced access management for unmatched performance and security."</p>
            </div>
          </div><div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Ledo Markt</h3>
              </a>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
            </div>
          </div><div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Asperiores Commodit</h3>
              </a>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Velit Doloremque</h3>
              </a>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <a href="service-details.html" class="stretched-link">
                <h3>Dolori Architecto</h3>
              </a>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div></div>

      </div>

    </section><section id="testimonials" class="testimonials section light-background">

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

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Goodman</h3>
                      <h4>Ceo & Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Larson</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div></div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><section id="about" class="about section">

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
        <img src="{{ asset('landing/assets/img/citegulogo.png') }}" class="img-fluid" alt="CITEGU">
      </div>

      <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
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
              <h5>Membantu pelanggan kami dalam mencapai tujuan bisnis dengan teknologi yang ramah lingkungan, berkinerja tinggi, dan terbaru.To help our customers achieve their business goals with environmentally friendly, high-performance, and state-of-the-art technology.</h5>
            </div>
          </li>
          <li>
            <i class="bi bi-pin-map-fill"></i>
            <div>
              <br><h5>Establish in 2024 in JAKARTA - INDONESIA</h5>
            </div>
          </li>
        </ul>
      </div>

    </div>

  </div>

</section><section id="contact" class="contact section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <h3>"Don't hesitate to contact us! Our team of experts is ready to help you find the best ICT solution for your business needs."</h3>
      </div><div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Menara Kuningan Lt. 30 Jl. HR Rasuna Said Kav5 BlokX/7 Karet  kuningan, Kec. Setiabudi
                  Jakarta 12910 – Indonesia </p>
                </div>
              </div><div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+62 000 000 000 00</p>
                </div>
              </div><div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>Example@citegu.com</p>
                </div>
              </div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4813.322173082548!2d106.8280123113507!3d-6.21845449374356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f352e1886cff%3A0x14234709c5055ac2!2svOffice%20-%20Menara%20Kuningan%20(Virtual%20Office%20%7C%20Serviced%20Office%20%7C%20Meeting%20Room)!5e1!3m2!1sid!2sid!4v1750235818243!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{ asset('public/landing/forms/contact.php') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div></div>

      </div>

    </section></main>
@endsection
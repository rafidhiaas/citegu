@extends('layouts.master')

@section('content')
<main class="main">
    <section id="portfolio" class="portfolio section">

        <div class="container section-title" data-aos="fade-up" style="padding-top: 100px;">
            <h2>Products and Solutions</h2>
        </div>

    <!-- revisi filter -->
        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                     <li data-filter="*" class="filter-active"></li>
                    <li data-filter=".filter-hardware">Data Center Hardware Facility</li>
                    <li data-filter=".filter-software">Data Center Software Facility</li>
                    <li data-filter=".filter-design">Design Data Center</li>
                    <li data-filter=".filter-apps">Apps</li>
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <!-- Filter: Data Center Design (filter-design) -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/software/dcdesign1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/software/dcdesign.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Data Center Design </a></h4>
                                <p style="text-align: align;">
                                    Designing a data center is a monumental task, demanding expertise across various engineering and IT disciplines.
                                    It's about creating a highly available, efficient, secure, and scalable environment for an organization's critical IT infrastructure.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/software/dcdesign1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/software/dcdesign1.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Data Center Design 2</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/dcdesign.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/dcdesign.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">dc design</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/dcdesign.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/dcdesign.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">dc design 2</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter: Data Center Software Facility (filter-software) -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-software">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/vmware-logo.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/vmware-logo.png') }}" class="img-fluid" alt="">VMware</a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">VM ware</a></h4>
                                <p style="text-align: align;">
                                    "Optimalkan infrastruktur IT Anda dengan teknologi virtualisasi terkemuka dari VMware untuk efisiensi, skalabilitas, dan keamanan yang tak tertandingi."</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-software">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/cloud.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/cloud.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Cloud</a></h4>
                                <p style="text-align: align;">
                                    "Transformasi bisnis Anda dengan solusi cloud yang fleksibel dan tangguh. Nikmati skalabilitas sesuai permintaan dan akses sumber daya komputasi di mana saja."</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter: Data Center Hardware Facility (filter-hardware) -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/Immersion-Cooling.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/Immersion-Cooling.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Immersion Cooling Solution</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/hps.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/hps.png') }}" class="img-fluid" alt="High Performance Storage"></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">High Performance Storage</a></h4>
                                <p style="text-align: align;">
                                    This is the physical foundation of a high-performance system. Without powerful hardware, software cannot perform at its peak.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/RDX.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/RDX.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Rear Door Heat Exchanger Solution (RDX)</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/hk.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/hk.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Access Door For Data Center Solution</a></h4>
                                <p>Hikvision offers various access door solutions for data centers, including controllers, terminals, and software.
                                    These solutions can be integrated with other security systems, such as card readers, fingerprint readers, and locks.
                                    Hikvision's access control system provides a comprehensive and flexible solution for managing and securing entry to data centers. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/coling.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/coling.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">Cooling System for DataCenter Solution</a></h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/hpc.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/hpc.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">HPC server Solution</a></h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/HPC System Server Solution.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/HPC System Server Solution.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">HPC System Server Solution</a></h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/h262-p60overview.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/h262-p60.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">GIGABYTE High Density Server</a></h4>
                                <p>MODEL H262-P60</p>
                                <p>High Density Arm Server - Ampere® Altra® Max - 2U 4-Node 24-Bay SATA</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/h262-p61overview.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/h262-p61.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">GIGABYTE High Density Server</a></h4>
                                <p>MODEL H262-P61</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/g242-p33overview.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/g242-p33gpu.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">GIGABYTE GPU SERVER</a></h4>
                                <p>MODEL G242-P33</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/g242-p34overview.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/g242-p34gpu.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">GIGABYTE GPU SERVER</a></h4>
                                <p>MODEL G242-P34</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/g242-p35overview.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/g242-p35.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">GIGABYTE GPU SERVER</a></h4>
                                <p>MODEL G242-P35</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/g242-p36overview.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/g242-p36.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details">GIGABYTE GPU SERVER</a></h4>
                                <p>MODEL G242-P36</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hardware">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/perangkat/cablebreakcout.png') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/perangkat/cablebreakout.png') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="landing/portfolio-details.html" title="More Details"> Cable BreakOut</a></h4>
                                <p>Cable BreakOut</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter: Apps (filter-apps) -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-apps">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/app-1.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">app-1</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-apps">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/app-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/app-3.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">app-3</a></h4>
                                <p style="text-align: align;">
                                    Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-apps">
                        <div class="portfolio-content h-100">
                            <a href="{{ asset('landing/assets/img/portfolio/app-3.jpg') }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                <img src="{{ asset('landing/assets/img/portfolio/app-3.jpg') }}" class="img-fluid" alt=""></a>
                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html" title="More Details">app3</a></h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>
</main>
@endsection
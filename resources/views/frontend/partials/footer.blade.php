<!-- footer -->
<footer class="footer-bg footer-p mb-50 mt-50">
    <div class="footer-top pt-90"
        style="background-image: url({{ asset('assets/img/bg/footer-bg.webp') }}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title mb-10">
                            <img src="{{ asset('assets/img/logo/roydon_mep_no_bg.webp') }}"
                                alt="Roydon MEP Contracting - Hospital MEP Contractors South India"
                                style="max-height: 85px; margin-left: -10px;">
                        </div>
                        <p class="pr-90">End-to-end hospital MEP contracting. OT HVAC, MGPS, Electrical, Plumbing,
                            Fire Fighting. NABH compliant. Hyderabad.</p>
                        <div class="footer-social mt-30">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Quick Links</h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="{{ route('home') }}" aria-label="Home"><i class="fa-solid fa-house"></i></a>
                                </li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('projects') }}">Projects</a></li>
                                <li><a href="{{ route('standards') }}">Standards</a></li>
                                <li><a href="{{ route('offices') }}">Offices</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Services</h2>
                        </div>
                        <div class="footer-link">
                            <ul>
                                @foreach($headerServices as $serv)
                                    <li><a href="{{ route('services.show', $serv->slug) }}">{{ $serv->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="f-contact">
                            <ul>
                                <li>
                                    <i class="icon fal fa-phone"></i>
                                    <span><a href="tel:+917330756745">+91-7330756745</a></span>
                                </li>
                                <li><i class="icon fal fa-envelope"></i>
                                    <span>
                                        <a href="mailto:info@roydonmep.com">info@roydonmep.com</a>
                                    </span>
                                </li>
                                <li>
                                    <i class="icon fal fa-map-marker-check"></i>
                                    <span>N Square, Hitec City, Plot 34B,<br> Hyderabad, Telangana, 500081</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-12 col-md-12">
                        Copyright &amp; Design By <a href="#">©Roydon MEP Contracting</a> - 2026. All Rights
                        Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->

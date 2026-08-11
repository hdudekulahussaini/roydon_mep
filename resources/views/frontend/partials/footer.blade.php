<!-- footer -->
<footer class="footer-bg footer-p mb-50 mt-50">
    <div class="footer-top pt-90"
        style="background-image: url({{ asset('frontend/assets/img/bg/footer-bg.webp') }}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title mb-10">
                            <img src="{{ asset('frontend/assets/img/logo/roydon_mep_no_bg.webp') }}"
                                alt="Roydon MEP Contracting - Hospital MEP Contractors South India"
                                style="max-height: 85px; margin-left: -10px;">
                        </div>
                        <p class="pr-90">{{ $footerData?->description }}</p>
                        <div class="footer-social mt-30">
                            @if($footerData && is_array($footerData->social_links))
                                @foreach($footerData->social_links as $link)
                                    <a href="{{ $link['url'] ?? '#' }}"><i class="{{ $link['icon'] ?? 'fas fa-link' }}"></i></a>
                                @endforeach
                            @endif
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
                                    <span><a href="tel:{{ optional($contactSetting)->phone }}">{{ optional($contactSetting)->phone }}</a></span>
                                </li>
                                <li><i class="icon fal fa-envelope"></i>
                                    <span>
                                        <a href="mailto:{{ optional($contactSetting)->email }}">{{ optional($contactSetting)->email }}</a>
                                    </span>
                                </li>
                                <li>
                                    <i class="icon fal fa-map-marker-check"></i>
                                    <span>{{ optional($contactSetting)->address }}</span>
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

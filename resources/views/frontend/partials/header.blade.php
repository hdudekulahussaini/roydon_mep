<!-- header -->
<header class="header-area header-two">
    <div id="header-sticky3" class="menu-area">
        <div class="container-fluid pl-50 pr-50">

            <div class="container">
                <div class="second-menu">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-5">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/roydon_mep_no_bg.webp') }}"
                                        alt="Roydon MEP Contracting - Hospital MEP Contractors South India"
                                        style="max-height: 90px; transition: all 0.3s ease;"></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">

                            <div class="main-menu text-right">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="{{ route('home') }}" aria-label="Home"><i
                                                    class="fa-solid fa-house"></i></a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li class="has-sub">
                                            <a href="#">Services</a>
                                            <ul>
                                                <li><a href="{{ route('services.hvac') }}">Hospital HVAC Systems</a></li>
                                                <li><a href="{{ route('services.medical-gas') }}">Medical Gas Pipeline (MGPS)</a></li>
                                                <li><a href="{{ route('services.electrical') }}">Hospital Electrical Systems</a></li>
                                                <li><a href="{{ route('services.plumbing') }}">Plumbing & Sanitation</a></li>
                                                <li><a href="{{ route('services.fire-fighting') }}">Fire Fighting & Life Safety</a></li>
                                                <li><a href="{{ route('services.turnkey') }}">Turnkey Hospital MEP</a></li>
                                                <li><a href="{{ route('services.civil-works') }}">Civil Works</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub">
                                            <a href="#">Specialisations</a>
                                            <ul>
                                                <li><a href="{{ route('specialisations.ot-mep') }}">Operation Theatre (OT) MEP</a></li>
                                                <li><a href="{{ route('specialisations.icu-mep') }}">ICU, NICU & CCU MEP</a></li>
                                                <li><a href="{{ route('specialisations.cath-lab') }}">Cath Lab MEP</a></li>
                                                <li><a href="{{ route('specialisations.clean-room') }}">Clean Room MEP</a></li>
                                                <li><a href="{{ route('specialisations.diagnostic') }}">Diagnostic Centre MEP</a></li>
                                                <li><a href="{{ route('specialisations.cssd') }}">CSSD & Sterile Services</a></li>
                                                <li><a href="{{ route('specialisations.modular-ot') }}">Modular & Prefabricated OT</a></li>
                                                <li><a href="{{ route('specialisations.nabh') }}">NABH Compliance</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('projects') }}">Projects</a></li>
                                        <li><a href="{{ route('standards') }}">Standards</a></li>
                                        <li><a href="{{ route('process') }}">Process</a></li>
                                        <li><a href="{{ route('offices') }}">Offices</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 d-none d-lg-block text-right">
                            <a href="{{ route('contact') }}"
                                style="background: #0E9B9B; color: #fff !important; padding: 10px 25px; border-radius: 50px; display: inline-block; line-height: normal; font-weight: 500;">Get
                                a Quote</a>
                        </div>

                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- header-end -->

<!-- offcanvas-area -->
<div class="offcanvas-menu">
    <span class="menu-close"><i class="fas fa-times"></i></span>
    <form role="search" method="get" id="searchform" class="searchform" action="#">
        <input type="text" name="s" id="search" placeholder="Search" />
        <button><i class="fa fa-search"></i></button>
    </form>
    <div id="cssmenu2" class="menu-one-page-menu-container">
        <ul id="menu-one-page-menu-12" class="menu">
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a
                    href="tel:+917330756745"><span>+91-7330756745</span></a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a
                    href="mailto:info@roydonmep.com"><span>info@roydonmep.com</span></a></li>
        </ul>
    </div>
</div>
<div class="offcanvas-overly"></div>
<!-- offcanvas-end -->

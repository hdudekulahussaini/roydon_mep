@extends('layouts.frontend.app')


@push('styles')
    <style>
        .contact-hero {
            position: relative;
            padding: 160px 0 100px;
            background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
            color: #fff;
            text-align: center;
        }

        .contact-hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #fff;
        }

        .contact-hero-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .breadcrumb-nav {
            color: #0E9B9B;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .breadcrumb-nav a {
            color: #fff;
            text-decoration: none;
        }

        .breadcrumb-nav a:hover {
            color: #0E9B9B;
        }

        .contact-main-section {
            padding: 100px 0;
            background: #F6FAFA;
        }

        .quote-form-box {
            background: #fff;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        .form-section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #0F2044;
            margin-bottom: 10px;
        }

        .form-section-desc {
            font-size: 1rem;
            color: #4B5F70;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 700;
            color: #0F2044;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            width: 100%;
            height: 52px;
            padding: 12px 20px;
            font-size: 1rem;
            color: #0F2044;
            background: #F8FAFC;
            border: 1.5px solid #E2E8F0;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        textarea.form-control {
            height: 140px;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus {
            background: #fff;
            border-color: #0E9B9B;
            box-shadow: 0 0 0 4px rgba(14, 155, 155, 0.1);
            outline: none;
        }

        .btn-submit {
            display: inline-block;
            width: 100%;
            height: 55px;
            line-height: 55px;
            text-align: center;
            background: #0E9B9B;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: #086b6b;
            box-shadow: 0 10px 25px rgba(14, 155, 155, 0.3);
        }

        .contact-info-box {
            background: #fff;
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .info-section-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0F2044;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: rgba(14, 155, 155, 0.1);
            color: #0E9B9B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .info-content h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0F2044;
            margin-bottom: 5px;
        }

        .info-content p,
        .info-content a {
            font-size: 1rem;
            color: #4B5F70;
            margin-bottom: 0;
            text-decoration: none;
        }

        .info-content a:hover {
            color: #0E9B9B;
        }

        .help-text {
            font-size: 0.85rem !important;
            color: #8C9BA5 !important;
            margin-top: 4px;
        }

        .process-box {
            background: #F8FAFC;
            padding: 30px;
            border-radius: 12px;
            margin-top: 30px;
            border-left: 4px solid #0E9B9B;
        }

        .process-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .process-list li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 12px;
            font-size: 0.95rem;
            color: #4B5F70;
            font-weight: 600;
        }

        .process-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #0E9B9B;
            font-weight: 900;
        }

        .metrics-bar {
            padding: 60px 0;
            background: #0F2044;
            color: #fff;
        }

        .metric-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        .mb-num {
            font-size: 3rem;
            font-weight: 900;
            color: #0E9B9B;
            margin-bottom: 5px;
        }

        .mb-label {
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.8);
        }
    </style>
@endpush

@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="contact-hero">
            <div class="container">
                <div class="breadcrumb-nav">
                    <a href="{{ route('home') }}">Home</a> / Get a Quote
                </div>
                <h1 class="contact-hero-title">Get a Quote for Your<br>Hospital MEP Project</h1>
                <p class="contact-hero-subtitle">Fill in the form and we will respond within one business day with a
                    preliminary approach, indicative programme and commercial framework.</p>
            </div>
        </section>

        <!-- Main Contact Section -->
        <section class="contact-main-section">
            <div class="container">
                <div class="row">
                    <!-- Left Column: Form -->
                    <div class="col-lg-7">
                        <div class="quote-form-box wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="form-section-title">Tell us about your project</h2>
                            <p class="form-section-desc">The more detail you share, the more specific our response. All
                                information is kept strictly confidential.</p>

                            <form action="{{ route('enquiries.store') }}" method="POST">
                                @csrf

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Your Name *</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" placeholder="N. Sreedhar Reddy" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Hospital / Organisation *</label>
                                        <input type="text" name="organisation" value="{{ old('organisation') }}"
                                            class="form-control" placeholder="Hospital Name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="name@hospital.com" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Phone / WhatsApp *</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}"
                                            class="form-control" placeholder="+91 9XXXXXXXXX" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Project City *</label>
                                        <input type="text" name="city" value="{{ old('city') }}"
                                            class="form-control" placeholder="Hyderabad, Bengaluru, etc." required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Bed Count (approx)</label>
                                        <select name="bed_count" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.bed_count') as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('bed_count') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Project Type</label>
                                        <select name="project_type" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.project_type') as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('project_type') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Expected Programme</label>
                                        <select name="expected_programme" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.expected_programme') as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('expected_programme') == $option ? 'selected' : '' }}>
                                                    {!! $option !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Project Details & Requirements</label>
                                    <textarea name="details" class="form-control"
                                        placeholder="Tell us about the scope — clinical areas required (OT, ICU, NICU, clean room, MGPS, etc.), floor area if known, standards required (NABH, NFPA, ASHRAE), and anything else that will help us respond precisely.">{{ old('details') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Budget Range (optional)</label>
                                        <select name="budget_range" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.budget_range') as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('budget_range') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">How did you hear about us?</label>
                                        <select name="referral_source" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.referral_source') as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('referral_source') == $option ? 'selected' : '' }}>
                                                    {{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" class="btn-submit">Submit Enquiry &rarr;</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Right Column: Info & Process -->
                    <div class="col-lg-5">
                        <div class="contact-info-box wow fadeInRight" data-wow-delay="0.2s">
                            <h3 class="info-section-title">Contact us directly</h3>

                            <div class="info-item">
                                <div class="info-icon"><i class="fa-light fa-phone"></i></div>
                                <div class="info-content">
                                    <h4>Phone / WhatsApp</h4>
                                    <a
                                        href="tel:{{ optional($contactSetting)->phone }}">{{ optional($contactSetting)->phone ?? '+91-73307 56745' }}</a>
                                    <p class="help-text">
                                        {{ optional($contactSetting)->phone ? 'Mon–Sat 9am–7pm IST. WhatsApp 24/7 for urgent enquiries.' : 'Mon–Sat 9am–7pm IST.' }}
                                    </p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="fa-light fa-envelope"></i></div>
                                <div class="info-content">
                                    <h4>Email</h4>
                                    <a
                                        href="mailto:{{ optional($contactSetting)->email }}">{{ optional($contactSetting)->email ?? 'info@roydonmep.com' }}</a>
                                    <p class="help-text">All project enquiries responded to within one business day.</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="fa-light fa-location-dot"></i></div>
                                <div class="info-content">
                                    <h4>Head Office</h4>
                                    <p>{{ optional($contactSetting)->address ? substr(optional($contactSetting)->address, 0, 40) : 'Hyderabad, Telangana' }}
                                    </p>
                                    <p class="help-text">
                                        {{ optional($contactSetting)->address ?? 'N Square, Hitec City, Plot 34B, Hyderabad – 500081' }}
                                    </p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="fa-light fa-clock"></i></div>
                                <div class="info-content">
                                    <h4>Response Time</h4>
                                    <p>{{ optional($contactSetting)->response_time ?? 'Within 1 Business Day' }}</p>
                                    <p class="help-text">For urgent projects, call or WhatsApp directly.</p>
                                </div>
                            </div>

                            <div class="process-box">
                                <h3 class="info-section-title mb-4" style="font-size:1.5rem;">What happens after you
                                    submit?</h3>
                                <ul class="process-list">
                                    @if (optional($contactSetting)->process)
                                        @foreach (explode("\n", optional($contactSetting)->process) as $step)
                                            <li>{{ $step }}</li>
                                        @endforeach
                                    @else
                                        <li>We review your project requirements carefully</li>
                                        <li>We contact you within one business day</li>
                                        <li>We arrange a site visit or video call</li>
                                        <li>We provide a detailed technical proposal and commercial offer</li>
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Metrics Bar -->
        <section class="metrics-bar">
            <div class="container">
                <div class="metric-row">
                    @php $metrics = collect(optional($contactSetting)->metrics ?? []); @endphp

                    @forelse($metrics as $m)
                        <div class="wow fadeInUp" data-wow-delay="{{ number_format(($loop->index + 1) * 0.1, 1) }}s">
                            <div class="mb-num">{{ $m['value'] ?? '' }}</div>
                            <div class="mb-label">{{ $m['label'] ?? '' }}</div>
                        </div>
                    @empty
                        <div class="wow fadeInUp" data-wow-delay="0.1s">
                            <div class="mb-num">8+</div>
                            <div class="mb-label">Hospital Projects</div>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="mb-num">0</div>
                            <div class="mb-label">Missed Handovers</div>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <div class="mb-num">24/7</div>
                            <div class="mb-label">Warranty Response</div>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <div class="mb-num">100%</div>
                            <div class="mb-label">Zero Defect Rate</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection

@extends('layouts.frontend.app')

@push('styles')
    <style>
        .contact-hero {
            position: relative;
            padding: 145px 0 90px;
            background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
            color: #fff;
            text-align: center;
        }

        .contact-hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin: 0 auto 20px;
            max-width: 850px;
            line-height: 1.25;
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
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1rem;
        }

        .breadcrumb-nav a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: #0E9B9B;
        }

        @media (max-width: 767px) {
            .contact-hero {
                padding: 130px 0 70px;
            }

            .contact-hero-title {
                font-size: 2.2rem;
            }
        }

        .contact-main-section {
            padding: 100px 0;
            background: #F8FBFB;
        }

        /* Form Styles */
        .quote-form-box {
            background: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
        }

        .form-section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #0F2044;
            margin-bottom: 15px;
        }

        .form-section-desc {
            color: #4B5F70;
            margin-bottom: 40px;
            font-size: 1.05rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #0F2044;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 15px 20px;
            border: 1px solid #E0E7E7;
            border-radius: 8px;
            background: #F8FBFB;
            color: #0F2044;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0E9B9B;
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(14, 155, 155, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .help-text {
            font-size: 0.85rem;
            color: #8C9CA6;
            margin-top: 8px;
            display: block;
        }

        .btn-submit {
            background: #0E9B9B;
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 18px 40px;
            border: none;
            border-radius: 30px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: #086b6b;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(14, 155, 155, 0.3);
        }

        /* Direct Contact Styles */
        .contact-info-box {
            padding-left: 40px;
        }

        @media (max-width: 991px) {
            .contact-info-box {
                padding-left: 0;
                margin-top: 60px;
            }

            .quote-form-box {
                padding: 30px;
            }
        }

        .info-section-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0F2044;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 35px;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: rgba(14, 155, 155, 0.1);
            color: #0E9B9B;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .info-content h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0F2044;
            margin-bottom: 5px;
        }

        .info-content p,
        .info-content a {
            color: #4B5F70;
            font-size: 1rem;
            margin: 0;
            text-decoration: none;
        }

        .info-content a {
            font-weight: 600;
            color: #0E9B9B;
        }

        .info-content a:hover {
            text-decoration: underline;
        }

        /* Process Timeline */
        .process-box {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: 50px;
        }

        .process-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .process-list li {
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            color: #4B5F70;
            font-weight: 500;
        }

        .process-list li:last-child {
            margin-bottom: 0;
        }

        .process-list li::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Pro', 'FontAwesome';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: #0E9B9B;
            font-size: 1.2rem;
        }

        /* Metrics Bar */
        .metrics-bar {
            background: #0F2044;
            padding: 60px 0;
            color: #fff;
        }

        .metric-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .metric-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px 20px;
            }
        }

        .mb-num {
            font-size: 2.8rem;
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
                <h1 class="contact-hero-title">{!! $banner?->heading !!}</h1>
                <p class="contact-hero-subtitle">{!! nl2br(e($banner?->description)) !!}</p>
            </div>
        </section>

        <!-- Main Contact Section -->
        <section class="contact-main-section" id="contact">
            <div class="container">
                <div class="row">
                    <!-- Left Column: Form -->
                    <div class="col-lg-7">
                        <div class="quote-form-box wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="form-section-title">Tell us about your project</h2>
                            <p class="form-section-desc">The more detail you share, the more specific our response. All information is kept strictly confidential.</p>

                            <form action="{{ route('enquiries.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Your Name *</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="N. Sreedhar Reddy" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Hospital / Organisation *</label>
                                        <input type="text" name="organisation" value="{{ old('organisation') }}" class="form-control" placeholder="Hospital Name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@hospital.com" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Phone / WhatsApp *</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+91 9XXXXXXXXX" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Project City *</label>
                                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="Hyderabad, Bengaluru, etc." required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Bed Count (approx)</label>
                                        <select name="bed_count" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.bed_count') as $option)
                                                <option value="{{ $option }}" {{ old('bed_count') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
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
                                                <option value="{{ $option }}" {{ old('project_type') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Expected Programme</label>
                                        <select name="expected_programme" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.expected_programme') as $option)
                                                <option value="{{ $option }}" {{ old('expected_programme') == $option ? 'selected' : '' }}>
                                                    {!! $option !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Project Details & Requirements</label>
                                    <textarea name="details" class="form-control" placeholder="Tell us about the scope — clinical areas required (OT, ICU, NICU, clean room, MGPS, etc.), floor area if known, standards required (NABH, NFPA, ASHRAE), and anything else that will help us respond precisely.">{{ old('details') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Budget Range (optional)</label>
                                        <select name="budget_range" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.budget_range') as $option)
                                                <option value="{{ $option }}" {{ old('budget_range') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">How did you hear about us?</label>
                                        <select name="referral_source" class="form-select">
                                            <option value="">— Select —</option>
                                            @foreach (config('enquiry.referral_source') as $option)
                                                <option value="{{ $option }}" {{ old('referral_source') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
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

                            @if(optional($contactSetting)->phone)
                                <div class="info-item">
                                    <div class="info-icon"><i class="fa-light fa-phone"></i></div>
                                    <div class="info-content">
                                        <h4>Phone / WhatsApp</h4>
                                        <a href="tel:{{ $contactSetting->phone }}">{{ $contactSetting->phone }}</a>
                                        <p class="help-text">Mon–Sat 9am–7pm IST. WhatsApp 24/7 for urgent enquiries.</p>
                                    </div>
                                </div>
                            @endif

                            @if(optional($contactSetting)->email)
                                <div class="info-item">
                                    <div class="info-icon"><i class="fa-light fa-envelope"></i></div>
                                    <div class="info-content">
                                        <h4>Email</h4>
                                        <a href="mailto:{{ $contactSetting->email }}">{{ $contactSetting->email }}</a>
                                        <p class="help-text">All project enquiries responded to within one business day.</p>
                                    </div>
                                </div>
                            @endif

                            @if(optional($contactSetting)->address)
                                <div class="info-item">
                                    <div class="info-icon"><i class="fa-light fa-location-dot"></i></div>
                                    <div class="info-content">
                                        <h4>Head Office</h4>
                                        <p>{{ $contactSetting->address }}</p>
                                    </div>
                                </div>
                            @endif

                            @if(optional($contactSetting)->response_time)
                                <div class="info-item">
                                    <div class="info-icon"><i class="fa-light fa-clock"></i></div>
                                    <div class="info-content">
                                        <h4>Response Time</h4>
                                        <p>{{ $contactSetting->response_time }}</p>
                                        <p class="help-text">For urgent projects, call or WhatsApp directly.</p>
                                    </div>
                                </div>
                            @endif

                            @if(optional($contactSetting)->process)
                                <div class="process-box">
                                    <h3 class="info-section-title mb-4" style="font-size: 1.5rem;">What happens after you submit?</h3>
                                    <ul class="process-list">
                                        @foreach (explode("\n", $contactSetting->process) as $step)
                                            @if(trim($step))
                                                <li>{{ trim($step) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Metrics Bar -->
        @php
            $metrics = collect(optional($contactSetting)->metrics ?? [])->filter(fn($m) => !empty($m['value']) || !empty($m['label']));
        @endphp

        @if($metrics->count() > 0)
            <section class="metrics-bar">
                <div class="container">
                    <div class="metric-row">
                        @foreach($metrics as $m)
                            <div class="wow fadeInUp" data-wow-delay="{{ number_format(($loop->index + 1) * 0.1, 1) }}s">
                                <div class="mb-num">{{ $m['value'] ?? '' }}</div>
                                <div class="mb-label">{{ $m['label'] ?? '' }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection

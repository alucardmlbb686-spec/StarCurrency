@extends('layouts.app')

@section('title', $mode === 'register' ? 'Create an account | StarCurrency' : 'Log in | StarCurrency')

@section('content')
<section class="auth-shell">
    <div class="container">
        <div class="auth-layout">
            <div class="auth-visual panel">
                <div class="auth-visual-inner">
                    <span class="eyebrow mb-4 d-inline-flex">Institutional access</span>
                    <h1 class="mb-3">{{ $mode === 'register' ? 'Open a StarCurrency account.' : 'Welcome back.' }}</h1>
                    <p class="auth-copy">
                        {{ $mode === 'register'
                            ? 'Create a secure client account built for treasury operations, portfolio monitoring, and institutional-grade crypto workflows.'
                            : 'Sign in to continue your treasury workflow, portfolio watchlist, and market intelligence platform.' }}
                    </p>

                    <div class="auth-metric-row">
                        <div>
                            <div class="auth-metric-value">$4.8B+</div>
                            <div class="auth-metric-label">Assets monitored</div>
                        </div>
                        <div>
                            <div class="auth-metric-value">24/7</div>
                            <div class="auth-metric-label">Client support</div>
                        </div>
                    </div>

                    <ul class="auth-feature-list">
                        <li><i class="bi bi-check-circle-fill"></i> Multi-layer security and role management</li>
                        <li><i class="bi bi-check-circle-fill"></i> Real-time portfolio and market insight</li>
                        <li><i class="bi bi-check-circle-fill"></i> Trusted onboarding for institutional teams</li>
                    </ul>
                </div>
            </div>

            <div class="auth-card panel">
                <div class="auth-switch" role="tablist" aria-label="Authentication mode selector">
                    <a href="{{ route('login') }}" class="auth-tab {{ $mode === 'login' ? 'is-active' : '' }}" role="tab" aria-selected="{{ $mode === 'login' ? 'true' : 'false' }}">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" class="auth-tab {{ $mode === 'register' ? 'is-active' : '' }}" role="tab" aria-selected="{{ $mode === 'register' ? 'true' : 'false' }}">
                        Sign up
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert auth-alert" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert auth-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($mode === 'login')
                    @php
                        $googleAuthLogo = file_exists(public_path('images/auth/google.png'))
                            ? asset('images/auth/google.png')
                            : (file_exists(public_path('images/auth/google.jpg')) ? asset('images/auth/google.jpg') : null);
                        $phoneAuthLogo = file_exists(public_path('images/auth/phone.png'))
                            ? asset('images/auth/phone.png')
                            : (file_exists(public_path('images/auth/phone.jpg')) ? asset('images/auth/phone.jpg') : null);
                    @endphp

                    <div class="auth-header">
                        <p class="eyebrow mb-2 d-inline-flex">Access portal</p>
                        <h2>Welcome back</h2>
                        <p>Sign in to your account</p>
                    </div>

                    <div class="auth-socials">
                        <a href="{{ route('auth.google') }}" class="btn btn-social btn-google" aria-label="Continue with Google">
                            @if ($googleAuthLogo)
                                <img src="{{ $googleAuthLogo }}" alt="Google" class="social-brand-logo" />
                            @else
                                <span class="social-icon social-google">G</span>
                            @endif
                            Continue with Google
                        </a>
                        <a href="{{ route('auth.phone') }}" class="btn btn-social btn-phone" aria-label="Continue with phone">
                            @if ($phoneAuthLogo)
                                <img src="{{ $phoneAuthLogo }}" alt="Phone" class="social-brand-logo" />
                            @else
                                <span class="social-icon social-phone"><i class="bi bi-telephone"></i></span>
                            @endif
                            Continue with phone
                        </a>
                    </div>

                    <div class="auth-divider"><span>or continue with email</span></div>

                    <form method="POST" action="{{ route('login.submit') }}" class="auth-form">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@company.com" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" value="1">
                                <label class="form-check-label text-slate" for="remember">Keep me signed in</label>
                            </div>
                            <a href="#" class="small text-gold">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-gold w-100">Sign in</button>
                    </form>
                @else
                    @php
                        $googleAuthLogo = file_exists(public_path('images/auth/google.png'))
                            ? asset('images/auth/google.png')
                            : (file_exists(public_path('images/auth/google.jpg')) ? asset('images/auth/google.jpg') : null);
                        $phoneAuthLogo = file_exists(public_path('images/auth/phone.png'))
                            ? asset('images/auth/phone.png')
                            : (file_exists(public_path('images/auth/phone.jpg')) ? asset('images/auth/phone.jpg') : null);
                    @endphp

                    <div class="auth-header">
                        <p class="eyebrow mb-2 d-inline-flex">Client onboarding</p>
                        <h2>Create your account</h2>
                        <p>Open a StarCurrency account</p>
                    </div>

                    <div class="auth-socials">
                        <a href="{{ route('auth.google.register') }}" class="btn btn-social btn-google" aria-label="Sign up with Google">
                            @if ($googleAuthLogo)
                                <img src="{{ $googleAuthLogo }}" alt="Google" class="social-brand-logo" />
                            @else
                                <span class="social-icon social-google">G</span>
                            @endif
                            Sign up with Google
                        </a>
                        <a href="{{ route('auth.phone.register') }}" class="btn btn-social btn-phone" aria-label="Sign up with phone">
                            @if ($phoneAuthLogo)
                                <img src="{{ $phoneAuthLogo }}" alt="Phone" class="social-brand-logo" />
                            @else
                                <span class="social-icon social-phone"><i class="bi bi-telephone"></i></span>
                            @endif
                            Sign up with phone
                        </a>
                    </div>

                    <div class="auth-divider"><span>or create with email</span></div>

                    <form method="POST" action="{{ route('register.submit') }}" class="auth-form">
                        @csrf

                        <div class="mb-3">
                            <label for="register_name" class="form-label">Full name</label>
                            <input id="register_name" type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Alex Morgan" required>
                        </div>

                        <div class="mb-3">
                            <label for="register_email" class="form-label">Work email</label>
                            <input id="register_email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@company.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" name="country" class="form-select" required>
                                <option value="">Select your country</option>
                                @foreach ($countries as $countryName => $countryCode)
                                    <option value="{{ $countryName }}" data-country-code="{{ $countryCode }}" {{ old('country') === $countryName ? 'selected' : '' }}>{{ $countryName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone number</label>
                            <div class="phone-input-wrap">
                                <span id="phone_country_code" class="phone-country-code">+1</span>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone', '') }}" class="form-control phone-input" placeholder="555 123 4567">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="register_password" class="form-label">Password</label>
                            <input id="register_password" type="password" name="password" class="form-control" placeholder="Create a secure password" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Repeat your password" required>
                        </div>

                        <button type="submit" class="btn btn-gold w-100">Create account</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const countrySelect = document.getElementById('country');
        const phoneCode = document.getElementById('phone_country_code');
        const phoneInput = document.getElementById('phone');
        const form = document.querySelector('form[action="{{ route('register.submit') }}"]');

        if (!countrySelect || !phoneCode || !phoneInput) {
            return;
        }

        const normalizeLocalNumber = (value) => {
            return value.replace(/^[+\s]*/, '').replace(/[^\d\s]/g, '').trim();
        };

        const syncPhoneCountryCode = () => {
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const code = selectedOption && selectedOption.dataset.countryCode ? selectedOption.dataset.countryCode : '+1';
            phoneCode.textContent = code;

            const current = normalizeLocalNumber(phoneInput.value);
            if (current) {
                phoneInput.value = current;
            }
        };

        phoneInput.addEventListener('input', function () {
            this.value = normalizeLocalNumber(this.value);
        });

        if (form) {
            form.addEventListener('submit', function () {
                const code = phoneCode.textContent.trim();
                const localNumber = normalizeLocalNumber(phoneInput.value);
                phoneInput.value = localNumber ? code + ' ' + localNumber : code;
            });
        }

        const selectedCountry = countrySelect.value;
        if (selectedCountry) {
            syncPhoneCountryCode();
        }

        countrySelect.addEventListener('change', syncPhoneCountryCode);
    });
</script>
@endsection

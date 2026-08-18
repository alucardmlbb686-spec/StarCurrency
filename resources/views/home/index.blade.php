@extends('layouts.app')

@section('title', 'StarCurrency — Institutional-grade crypto, made simple')

@section('content')

{{-- ============================= HERO ============================= --}}
<section class="hero">
    @php
        $brandSlides = [
            [
                'name' => 'Meridian Capital',
                'tag' => 'Treasury operations',
                'image' => asset('images/slide-1.png'),
                'accent' => 'Treasury at scale',
            ],
            [
                'name' => 'Northbridge Advisory',
                'tag' => 'Risk & compliance',
                'image' => asset('images/slide-2.png'),
                'accent' => 'Controls built in',
            ],
            [
                'name' => 'Atlas Trade',
                'tag' => 'Global settlement',
                'image' => asset('images/slide-3.png'),
                'accent' => 'Live market access',
            ],
        ];
    @endphp

    <div class="hero-bg-slider" data-slider>
        @foreach ($brandSlides as $slide)
            <div class="hero-bg-slide {{ $loop->first ? 'active' : '' }}">
                <img src="{{ $slide['image'] }}" alt="{{ $slide['name'] }}" draggable="false">
            </div>
        @endforeach
    </div>

    <div class="container position-relative">
        <div class="row align-items-center gy-5">
            <div class="col-lg-12">
                <span class="eyebrow mb-4 d-inline-flex">Regulated digital asset infrastructure</span>
                <h1 class="mb-4">Currency should move at the speed of trust, <span class="text-gold">not hype.</span></h1>
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('register') }}" class="btn btn-cta">
                        <span>Get started</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="hero-stat">
                            <div class="value">$4.8B+</div>
                            <div class="label">Assets under custody</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="hero-stat">
                            <div class="value">120+</div>
                            <div class="label">Countries served</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="hero-stat">
                            <div class="value">99.99%</div>
                            <div class="label">Platform uptime</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= FEATURES ============================= --}}
<section class="section section-border-top" id="features">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7">
                <span class="eyebrow mb-3 d-inline-flex">Why StarCurrency</span>
                <h2 class="mb-3" style="font-size: clamp(1.9rem, 3vw, 2.6rem);">Built for the team that has to explain it to compliance.</h2>
                <p class="lede">Every control we ship exists because a real finance or risk team asked for it.</p>
            </div>
        </div>

        <div class="row g-4" data-reveal-group>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-shield-lock fs-5"></i></div>
                    <h5 class="mb-2">Segregated cold custody</h5>
                    <p class="text-slate mb-0">Client assets are held in geographically distributed, multi-signature cold storage — fully segregated from company funds.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-bank fs-5"></i></div>
                    <h5 class="mb-2">Licensed & audited</h5>
                    <p class="text-slate mb-0">Independent quarterly proof-of-reserves and annual SOC 2 Type II audits, published to every business account.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-diagram-3 fs-5"></i></div>
                    <h5 class="mb-2">Programmable treasury</h5>
                    <p class="text-slate mb-0">Approval thresholds, role-based permissions, and API-driven payouts that mirror how your finance team already works.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-lightning-charge fs-5"></i></div>
                    <h5 class="mb-2">Same-day settlement</h5>
                    <p class="text-slate mb-0">Move between fiat and digital assets with same-day settlement rails across 40+ currencies.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-graph-up-arrow fs-5"></i></div>
                    <h5 class="mb-2">Institutional market access</h5>
                    <p class="text-slate mb-0">Deep liquidity across major and emerging assets with transparent, tiered pricing — no hidden spreads.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 reveal">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-headset fs-5"></i></div>
                    <h5 class="mb-2">A team that answers</h5>
                    <p class="text-slate mb-0">Dedicated account management and a support desk staffed by people who understand settlement, not just tickets.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= MARKET SNAPSHOT ============================= --}}
<section class="section section-border-top">
    <div class="container">
        <div class="row mb-5 align-items-end">
            <div class="col-lg-7">
                <span class="eyebrow mb-3 d-inline-flex">Market</span>
                <h2 style="font-size: clamp(1.9rem, 3vw, 2.6rem);">Today's snapshot.</h2>
            </div>
            <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('market') }}" class="btn btn-outline-ivory">Open full market <i class="bi bi-arrow-up-right ms-1"></i></a>
            </div>
        </div>

        <div class="panel p-2 p-md-4">
            <div class="table-responsive">
                <table class="market-table" id="live-market-table">
                    <thead>
                        <tr>
                            <th>Asset</th>
                            <th>Price</th>
                            <th>24h change</th>
                            <th class="d-none d-md-table-cell">Market cap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coins as $coin)
                            <tr class="live-market-row" data-symbol="{{ strtolower($coin->symbol) }}">
                                <td>
                                    <img class="coin-symbol" src="{{ asset($coin->badgePath()) }}" alt="{{ $coin->symbol }} logo" loading="lazy">
                                    <span>{{ $coin->name }}</span>
                                </td>
                                <td class="font-mono live-price" data-field="price">${{ number_format($coin->price, 2) }}</td>
                                <td>
                                    <span class="change-pill {{ $coin->isPositive() ? 'up' : 'down' }}">
                                        <i class="bi {{ $coin->isPositive() ? 'bi-arrow-up-right' : 'bi-arrow-down-right' }}"></i>
                                        <span class="live-change">{{ $coin->isPositive() ? '+' : '' }}{{ number_format($coin->change_24h, 2) }}%</span>
                                    </span>
                                </td>
                                <td class="d-none d-md-table-cell font-mono text-slate live-market-cap" data-field="market_cap">
                                    @php
                                        $cap = $coin->market_cap ?? 0;
                                        $capLabel = $cap >= 1000000000 ? '$' . number_format($cap / 1000000000, 2) . 'B' : '$' . number_format($cap / 1000000, 2) . 'M';
                                    @endphp
                                    {{ $capLabel }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- ============================= HOW IT WORKS (genuine sequence) ============================= --}}
<section class="section section-border-top">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <span class="eyebrow mb-3 d-inline-flex">Onboarding</span>
                <h2 class="mb-3" style="font-size: clamp(1.9rem, 3vw, 2.6rem);">From application to first settlement in days, not months.</h2>
                <p class="text-slate">Our onboarding is a fixed sequence — each step unlocks the next, so your team always knows where an application stands.</p>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="process-step">
                    <div class="eyebrow mb-2">Step 01</div>
                    <h5>Apply & verify</h5>
                    <p class="text-slate mb-0">Submit your business details; our compliance team completes KYB verification within 48 hours.</p>
                </div>
                <div class="process-step">
                    <div class="eyebrow mb-2">Step 02</div>
                    <h5>Configure your treasury</h5>
                    <p class="text-slate mb-0">Set approval thresholds, add signers, and connect banking rails for fiat on/off-ramp.</p>
                </div>
                <div class="process-step">
                    <div class="eyebrow mb-2">Step 03</div>
                    <h5>Fund your account</h5>
                    <p class="text-slate mb-0">Move assets into segregated custody via wire, ACH, or an existing wallet.</p>
                </div>
                <div class="process-step">
                    <div class="eyebrow mb-2">Step 04</div>
                    <h5>Go live</h5>
                    <p class="text-slate mb-0">Start trading, settling, and reporting — with a dedicated account manager on call.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= STATS BAND ============================= --}}
<section class="section-border-top py-5">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3"><div class="stat-block"><div class="num">$4.8B+</div><div class="cap">Under custody</div></div></div>
            <div class="col-6 col-md-3"><div class="stat-block"><div class="num">1,400+</div><div class="cap">Business clients</div></div></div>
            <div class="col-6 col-md-3"><div class="stat-block"><div class="num">40+</div><div class="cap">Settlement currencies</div></div></div>
            <div class="col-6 col-md-3"><div class="stat-block"><div class="num">99.99%</div><div class="cap">Platform uptime</div></div></div>
        </div>
    </div>
</section>

{{-- ============================= TESTIMONIALS ============================= --}}
<section class="section section-border-top">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7">
                <span class="eyebrow mb-3 d-inline-flex">Trusted by finance teams</span>
                <h2 style="font-size: clamp(1.9rem, 3vw, 2.6rem);">What clients tell their boards.</h2>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <span class="quote-mark">&ldquo;</span>
                        <p class="text-slate mb-4">{{ $testimonial->quote }}</p>
                        <div class="name">{{ $testimonial->name }}</div>
                        <div class="role">{{ $testimonial->role }}, {{ $testimonial->company }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= CTA ============================= --}}
<section class="section section-border-top">
    <div class="container">
        <div class="cta-band">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <h2 class="mb-2" style="font-size: clamp(1.8rem, 3vw, 2.3rem);">Ready to give your treasury a real home for digital assets?</h2>
                    <p class="text-slate mb-0">Talk to our team about custody, settlement, and reporting built for how finance actually works.</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-gold">Open a business account</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= NEWSLETTER ============================= --}}
<section class="section-border-top py-5">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-lg-6">
                <h5 class="mb-1">Weekly market briefing</h5>
                <p class="text-slate mb-0">A concise, no-hype read on digital asset markets — every Monday.</p>
            </div>
            <div class="col-lg-6">
                @if (session('status'))
                    <div class="alert alert-success py-2 small mb-2" style="background: rgba(85,212,168,0.1); border: 1px solid rgba(85,212,168,0.3); color: var(--sc-mint);">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('newsletter.store') }}" method="POST" class="d-flex input-inline">
                    @csrf
                    <input type="email" name="email" class="form-control" placeholder="you@company.com" required>
                    <button type="submit" class="btn btn-gold" style="border-radius: 0 8px 8px 0;">Subscribe</button>
                </form>
                @error('email')
                    <div class="text-rose small mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</section>

@endsection

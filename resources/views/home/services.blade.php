@extends('layouts.app')

@section('title', 'Services — StarCurrency')

@section('content')

<section class="hero pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="eyebrow mb-4 d-inline-flex">Services</span>
                <h1 class="mb-4">Four products. One ledger.</h1>
                <p class="lede">Custody, treasury, settlement, and market access — built to work together, priced without surprises.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="panel p-4 p-lg-5 h-100">
                    <div class="icon-mark mb-4"><i class="bi bi-shield-lock fs-4"></i></div>
                    <h4 class="mb-3">Custody</h4>
                    <p class="text-slate mb-4">Segregated, multi-signature cold storage across geographically distributed vaults, with insurance coverage and quarterly proof-of-reserves.</p>
                    <ul class="list-unstyled text-slate">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Multi-signature, geographically distributed vaults</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Insured against theft and loss of keys</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Independent quarterly proof-of-reserves</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel p-4 p-lg-5 h-100">
                    <div class="icon-mark mb-4"><i class="bi bi-diagram-3 fs-4"></i></div>
                    <h4 class="mb-3">Treasury</h4>
                    <p class="text-slate mb-4">Role-based permissions, configurable approval thresholds, and full audit trails that mirror how your finance team already operates.</p>
                    <ul class="list-unstyled text-slate">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Multi-signer approval workflows</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Granular, role-based permissions</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Exportable audit trail for every action</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel p-4 p-lg-5 h-100">
                    <div class="icon-mark mb-4"><i class="bi bi-lightning-charge fs-4"></i></div>
                    <h4 class="mb-3">Settlement</h4>
                    <p class="text-slate mb-4">Move between fiat and digital assets with same-day settlement across 40+ currencies, via wire, ACH, or SEPA.</p>
                    <ul class="list-unstyled text-slate">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Same-day fiat on/off-ramp</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>40+ settlement currencies</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Transparent, tiered pricing</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel p-4 p-lg-5 h-100">
                    <div class="icon-mark mb-4"><i class="bi bi-graph-up-arrow fs-4"></i></div>
                    <h4 class="mb-3">Market access</h4>
                    <p class="text-slate mb-4">Deep liquidity across major and emerging digital assets, with API access for programmatic trading and reporting.</p>
                    <ul class="list-unstyled text-slate">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Institutional-grade liquidity</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>REST & WebSocket trading API</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Real-time portfolio reporting</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-7">
                <span class="eyebrow mb-3 d-inline-flex">Pricing</span>
                <h2 style="font-size: clamp(1.9rem, 3vw, 2.6rem);">Plans that scale with your treasury.</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="feature-card d-flex flex-column">
                    <h6 class="text-slate text-uppercase mb-2" style="letter-spacing:0.08em; font-size:0.78rem;">Growth</h6>
                    <div class="mb-3"><span class="font-mono" style="font-size:2rem;">0.35%</span> <span class="text-slate">/ settlement</span></div>
                    <p class="text-slate mb-4">For teams getting their first digital asset controls in place.</p>
                    <ul class="list-unstyled text-slate mb-4">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Up to 5 signers</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Standard custody</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Email support</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-outline-ivory mt-auto">Get started</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card d-flex flex-column" style="border-color: var(--sc-border-strong);">
                    <h6 class="text-gold text-uppercase mb-2" style="letter-spacing:0.08em; font-size:0.78rem;">Enterprise — most popular</h6>
                    <div class="mb-3"><span class="font-mono" style="font-size:2rem;">0.20%</span> <span class="text-slate">/ settlement</span></div>
                    <p class="text-slate mb-4">For finance teams running real volume across entities.</p>
                    <ul class="list-unstyled text-slate mb-4">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Unlimited signers</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Dedicated account manager</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Priority settlement</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-gold mt-auto">Talk to sales</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card d-flex flex-column">
                    <h6 class="text-slate text-uppercase mb-2" style="letter-spacing:0.08em; font-size:0.78rem;">Custom</h6>
                    <div class="mb-3"><span class="font-mono" style="font-size:2rem;">Custom</span></div>
                    <p class="text-slate mb-4">For banks, funds, and platforms building on StarCurrency's rails.</p>
                    <ul class="list-unstyled text-slate mb-4">
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>White-label options</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>Custom SLAs</li>
                        <li class="mb-2"><i class="bi bi-check2 text-gold me-2"></i>On-site onboarding</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-outline-ivory mt-auto">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

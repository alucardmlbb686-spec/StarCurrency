@extends('layouts.app')

@section('title', 'Contact — StarCurrency')

@section('content')

<section class="hero pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="eyebrow mb-4 d-inline-flex">Contact</span>
                <h1 class="mb-4">Let's talk about your treasury.</h1>
                <p class="lede">Whether you're opening your first account or migrating from another custodian, our team responds within one business day.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex gap-3">
                        <div class="icon-mark flex-shrink-0"><i class="bi bi-envelope fs-5"></i></div>
                        <div>
                            <h6 class="mb-1">Email</h6>
                            <p class="text-slate mb-0">support@starcurrency.com</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="icon-mark flex-shrink-0"><i class="bi bi-telephone fs-5"></i></div>
                        <div>
                            <h6 class="mb-1">Phone</h6>
                            <p class="text-slate mb-0">+44 20 7946 0958</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="icon-mark flex-shrink-0"><i class="bi bi-geo-alt fs-5"></i></div>
                        <div>
                            <h6 class="mb-1">Headquarters</h6>
                            <p class="text-slate mb-0">One Ledger Square, London EC2A, United Kingdom</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="panel p-4 p-lg-5">
                    @if (session('status'))
                        <div class="alert py-2 small mb-4" style="background: rgba(85,212,168,0.1); border: 1px solid rgba(85,212,168,0.3); color: var(--sc-mint);">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Full name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')<div class="text-rose small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Work email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')<div class="text-rose small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" placeholder="e.g. Opening a business account">
                                @error('subject')<div class="text-rose small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="message">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')<div class="text-rose small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-gold">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

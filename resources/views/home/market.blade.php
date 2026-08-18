@extends('layouts.app')

@section('title', 'Market — StarCurrency')

@section('content')

<section class="hero pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="eyebrow mb-4 d-inline-flex">Live market</span>
                <h1 class="mb-4">Prices, without the noise.</h1>
                <p class="lede">Live crypto prices sourced from CoinGecko and refreshed in real time for custody, settlement, and treasury monitoring.</p>
            </div>
            <div class="col-lg-4 text-lg-end align-self-end">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill border border-white-10 bg-dark-subtle text-white-50 small fw-semibold">
                    <span class="status-dot"></span>
                    Live data · CoinGecko
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="panel p-2 p-md-4">
            <div class="table-responsive">
                <table class="market-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Price</th>
                            <th>24h change</th>
                            <th>Market cap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coins as $index => $coin)
                            <tr>
                                <td class="text-slate font-mono">{{ $index + 1 }}</td>
                                <td>
                                    <img class="coin-symbol" src="{{ asset($coin->badgePath()) }}" alt="{{ $coin->symbol }} logo" loading="lazy">
                                    <span>{{ $coin->name }}</span>
                                    <span class="text-slate ms-1">{{ $coin->symbol }}</span>
                                </td>
                                <td class="font-mono">${{ number_format($coin->price, 2) }}</td>
                                <td>
                                    <span class="change-pill {{ $coin->isPositive() ? 'up' : 'down' }}">
                                        <i class="bi {{ $coin->isPositive() ? 'bi-arrow-up-right' : 'bi-arrow-down-right' }}"></i>
                                        {{ $coin->isPositive() ? '+' : '' }}{{ number_format($coin->change_24h, 2) }}%
                                    </span>
                                </td>
                                <td class="font-mono text-slate">${{ number_format($coin->market_cap / 1000000000, 2) }}B</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <p class="text-slate small mt-4 mb-0">
            Market values are pulled from the live CoinGecko market feed. If the upstream service is briefly unavailable, the app will automatically fall back to the last stored market data.
        </p>
    </div>
</section>

@endsection

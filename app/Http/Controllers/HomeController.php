<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrency;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Throwable;

class HomeController extends Controller
{
    /**
     * Landing page.
     */
    public function index(): View
    {
        $coins = $this->getMarketData();
        $testimonials = Testimonial::orderBy('sort_order')->get();

        return view('home.index', compact('coins', 'testimonials'));
    }

    /**
     * About page.
     */
    public function about(): View
    {
        return view('home.about');
    }

    /**
     * Services page.
     */
    public function services(): View
    {
        return view('home.services');
    }

    /**
     * Live market page.
     */
    public function market(): View
    {
        $coins = $this->getMarketData();

        return view('home.market', compact('coins'));
    }

    public function liveMarketJson()
    {
        try {
            $coins = $this->fetchLiveMarketData();
            if (!empty($coins) && $coins->count() > 0) {
                return response()->json(
                    $coins->map(function ($coin) {
                        return [
                            'name' => $coin->name,
                            'symbol' => $coin->symbol,
                            'price' => (float) $coin->price,
                            'change_24h' => (float) $coin->change_24h,
                            'market_cap' => (float) $coin->market_cap,
                        ];
                    })->values()
                );
            }
        } catch (Throwable $e) {
            \Log::error('liveMarketJson error: ' . $e->getMessage());
        }

        $coins = $this->getMarketData();
        return response()->json(
            $coins->map(function ($coin) {
                return [
                    'name' => $coin->name,
                    'symbol' => $coin->symbol,
                    'price' => (float) $coin->price,
                    'change_24h' => (float) $coin->change_24h,
                    'market_cap' => (float) $coin->market_cap,
                ];
            })->values()
        );
    }

    protected function getMarketData()
    {
        $liveCoins = $this->fetchLiveMarketData();

        if (! empty($liveCoins)) {
            return $liveCoins;
        }

        return Cryptocurrency::orderBy('sort_order')->get();
    }

    protected function fetchLiveMarketData()
    {
        $cacheKey = 'live_market_data';

        if (Cache::has($cacheKey)) {
            $cached = Cache::get($cacheKey);
            if (!empty($cached)) {
                return $cached;
            }
        }

        try {
            \Log::info('Fetching live market data from CoinGecko...');

            $response = Http::timeout(10)
                ->retry(2, 500)
                ->withoutVerifying()
                ->get('https://api.coingecko.com/api/v3/coins/markets', [
                    'vs_currency' => 'usd',
                    'ids' => 'bitcoin,ethereum,solana,cardano,polkadot',
                    'order' => 'market_cap_desc',
                    'per_page' => 250,
                    'page' => 1,
                    'sparkline' => false,
                    'price_change_percentage' => '24h',
                ]);

            if (!$response->successful()) {
                \Log::error('CoinGecko API error status: ' . $response->status());
                return [];
            }

            $items = collect($response->json());
            \Log::info('CoinGecko returned ' . $items->count() . ' coins');

            $starToken = Cryptocurrency::where('symbol', 'STAR')->first();
            if ($starToken) {
                $items->push([
                    'name' => $starToken->name,
                    'symbol' => $starToken->symbol,
                    'current_price' => (float) $starToken->price,
                    'price_change_percentage_24h' => (float) $starToken->change_24h,
                    'market_cap' => (float) $starToken->market_cap,
                ]);
            }

            $coins = $items->map(function ($coin, $index) {
                $symbol = strtoupper($coin['symbol'] ?? '');
                $model = Cryptocurrency::updateOrCreate(
                    ['symbol' => $symbol],
                    [
                        'name' => $coin['name'] ?? '',
                        'price' => (float) ($coin['current_price'] ?? 0),
                        'change_24h' => (float) ($coin['price_change_percentage_24h'] ?? 0),
                        'market_cap' => (float) ($coin['market_cap'] ?? 0),
                        'sort_order' => $index,
                    ]
                );

                return $model;
            });

            $coins = $coins->values();
            Cache::put($cacheKey, $coins, now()->addSeconds(30));

            \Log::info('Successfully updated ' . $coins->count() . ' coins from CoinGecko');
            return $coins;
        } catch (Throwable $e) {
            \Log::error('CoinGecko fetch error: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());
            return Cache::get($cacheKey, []);
        }
    }
}

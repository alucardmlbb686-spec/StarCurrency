<?php

namespace Database\Seeders;

use App\Models\Cryptocurrency;
use Illuminate\Database\Seeder;

class CryptocurrencySeeder extends Seeder
{
    public function run(): void
    {
        $coins = [
            ['name' => 'Bitcoin', 'symbol' => 'BTC', 'price' => 96420.55, 'change_24h' => 2.34, 'market_cap' => 1900000000000],
            ['name' => 'Ethereum', 'symbol' => 'ETH', 'price' => 5230.10, 'change_24h' => 1.12, 'market_cap' => 630000000000],
            ['name' => 'Solana', 'symbol' => 'SOL', 'price' => 268.75, 'change_24h' => -1.85, 'market_cap' => 128000000000],
            ['name' => 'StarCurrency', 'symbol' => 'STAR', 'price' => 0, 'change_24h' => 0, 'market_cap' => 0],
            ['name' => 'Cardano', 'symbol' => 'ADA', 'price' => 1.14, 'change_24h' => -0.62, 'market_cap' => 41000000000],
            ['name' => 'Polkadot', 'symbol' => 'DOT', 'price' => 9.86, 'change_24h' => 0.91, 'market_cap' => 14200000000],
        ];

        foreach ($coins as $index => $coin) {
            Cryptocurrency::updateOrCreate(
                ['symbol' => $coin['symbol']],
                $coin + ['sort_order' => $index]
            );
        }
    }
}

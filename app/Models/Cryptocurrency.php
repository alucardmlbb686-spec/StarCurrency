<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;

    protected $table = 'cryptocurrencies';

    protected $fillable = [
        'name',
        'symbol',
        'price',
        'change_24h',
        'market_cap',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'change_24h' => 'decimal:2',
        'market_cap' => 'decimal:2',
    ];

    public function badgePath(): string
    {
        $symbol = strtolower((string) $this->symbol);
        $candidates = [
            "images/crypto/{$symbol}.png",
            "images/crypto/{$symbol}.jpg",
            "images/crypto/{$symbol}.jpeg",
        ];

        foreach ($candidates as $path) {
            if (file_exists(public_path($path))) {
                return $path;
            }
        }

        return "images/crypto/{$symbol}.png";
    }

    public function isPositive(): bool
    {
        return $this->change_24h >= 0;
    }
}

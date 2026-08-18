<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Amara Okafor',
                'role' => 'Chief Investment Officer',
                'company' => 'Northbridge Capital',
                'quote' => 'StarCurrency gave our treasury desk a single, trustworthy view of digital assets. Settlement that used to take a day now clears before the next standup.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Daniel Reyes',
                'role' => 'Founder',
                'company' => 'Reyes & Partners',
                'quote' => 'The custody controls and audit trail are the reason our compliance team finally said yes to holding crypto on the balance sheet.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Priya Chandran',
                'role' => 'Head of Treasury',
                'company' => 'Meridian Freight Group',
                'quote' => 'We moved cross-border supplier payments to StarCurrency and cut settlement time from four days to under an hour.',
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name'], 'company' => $testimonial['company']],
                $testimonial
            );
        }
    }
}

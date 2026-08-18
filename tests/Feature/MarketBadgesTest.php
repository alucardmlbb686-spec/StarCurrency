<?php

namespace Tests\Feature;

use Tests\TestCase;

class MarketBadgesTest extends TestCase
{
    public function test_home_page_uses_local_crypto_badges(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('/images/crypto/btc.png', false);
        $response->assertSee('/images/crypto/eth.png', false);
        $response->assertSee('/images/crypto/sol.png', false);
        $response->assertSee('/images/crypto/star.png', false);
        $response->assertSee('/images/crypto/ada.png', false);
        $response->assertSee('/images/crypto/dot.png', false);
    }
}

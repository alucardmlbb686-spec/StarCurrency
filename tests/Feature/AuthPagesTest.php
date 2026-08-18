<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    public function test_login_page_loads(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertSee('Welcome back');
        $response->assertSee('Sign in to your account');
        $response->assertSee('/auth/google');
        $response->assertSee('/auth/phone');
    }

    public function test_register_page_loads(): void
    {
        $response = $this->get('/register');

        $response->assertOk();
        $response->assertSee('Create your account');
        $response->assertSee('Open a StarCurrency account');
        $response->assertSee('/auth/google/register');
        $response->assertSee('/auth/phone/register');
    }
}

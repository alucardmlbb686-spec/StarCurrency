<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    public function test_admin_login_redirects_to_dashboard(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@123'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
            ]
        );

        $response = $this->post('/login', [
            'email' => 'admin@123',
            'password' => 'admin123',
        ]);

        $response->assertRedirect('/admin');
    }

    public function test_admin_dashboard_displays_sections(): void
    {
        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@123'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
            ]
        );

        $this->actingAs($admin);

        $response = $this->get('/admin');

        $response->assertOk();
        $response->assertSee('Admin Dashboard');
        $response->assertSee('Overview');
        $response->assertSee('Manage Users');
        $response->assertSee('User Activity');
    }
}

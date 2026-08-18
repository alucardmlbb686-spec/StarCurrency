<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $users = User::query()->latest()->get();

        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        $stats = [
            'total_users' => $users->count(),
            'active_users' => $users->where('status', 'active')->count(),
            'suspended_users' => $users->where('status', 'suspended')->count(),
            'new_users_this_week' => $users->filter(fn ($user) => $user->created_at && $user->created_at->greaterThanOrEqualTo(now()->subDays(7)))->count(),
        ];

        $userActivities = $users->take(8)->map(function ($user, $index) {
            $templates = [
                ['type' => 'Login', 'label' => 'Signed in from a new device', 'status' => 'success'],
                ['type' => 'Profile', 'label' => 'Updated account details', 'status' => 'info'],
                ['type' => 'Verification', 'label' => 'Completed identity review', 'status' => 'success'],
                ['type' => 'Security', 'label' => 'Reset access credentials', 'status' => 'warning'],
            ];

            $activity = $templates[$index % count($templates)];

            return [
                'user' => $user->name,
                'email' => $user->email,
                'type' => $activity['type'],
                'label' => $activity['label'],
                'status' => $activity['status'],
                'time' => $user->created_at?->copy()->subMinutes(8 + ($index * 11))->diffForHumans() ?? 'recently',
            ];
        })->values();

        return view('admin.dashboard', compact('users', 'stats', 'userActivities'));
    }

    public function toggleUserStatus(User $user): RedirectResponse
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        $user->status = $user->status === 'active' ? 'suspended' : 'active';
        $user->save();

        return back()->with('success', 'User status updated successfully.');
    }
}

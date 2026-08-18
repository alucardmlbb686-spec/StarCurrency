<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:180', 'unique:subscribers,email'],
        ], [
            'email.unique' => 'That email is already on the list — we will be in touch soon.',
        ]);

        Subscriber::create($validated);

        return back()->with('status', 'You are subscribed. Watch your inbox for market briefings.');
    }
}

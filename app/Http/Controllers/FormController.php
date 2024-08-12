<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function show()
    {
        return inertia('Dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|min:3|max:50|email',
            'message' => 'required|string|min:3|max:255',
        ]);

        Log::info('Contact form submission', $request->all());

        return to_route('dashboard')->with('message', 'Thanks for your message');
    }
}

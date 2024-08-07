<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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

        Session::flash('message', 'Thanks for your message');

        // Log::info('Contact form submission', $request->all());

        return to_route('dashboard');
    }
}

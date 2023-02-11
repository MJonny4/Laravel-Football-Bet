<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Les credencials no són vàlides'
            ]);
        }

        if (auth()->user()->actiu == 0) {
            auth()->logout();
            throw ValidationException::withMessages([
                'email' => 'El compte no està activat'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/')->with('status', 'Has iniciat sessió!');
    }

    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Has tancat sessió!');
    }
}

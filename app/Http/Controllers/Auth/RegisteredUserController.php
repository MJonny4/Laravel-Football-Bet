<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:4', 'max:255', 'confirmed']
        ]);

        $usuari = User::create([
            'email' => $request->email,
            'nom' => $request->nom,
            'password' => bcrypt($request->password),
            'actiu' => 0,
            'rol' => '0',
            'token' => Str::random(60),
        ]);

        $usuari->sendEmail();

        return redirect()->route('inici')->with('status', 'User creat correctament. Revisa el teu correu per activar el compte.');
    }

    public function activar($token)
    {
        $usuari = User::where('token', $token)->firstOrFail();
        $usuari->actiu = 1;
        $usuari->token = null;
        $usuari->save();

        return redirect()->route('inici')->with('status', 'User activat correctament. Ara pots iniciar sessió.');
    }
}

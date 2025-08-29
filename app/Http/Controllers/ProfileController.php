<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
            'date_of_birth' => ['required', 'date', 'before:' . now()->subYears(18)->toDateString()],
        ]);
        
        auth()->user()->update($validated);
        
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}

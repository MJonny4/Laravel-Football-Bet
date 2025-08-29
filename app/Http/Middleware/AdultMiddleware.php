<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdultMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        if ($user && (!$user->date_of_birth || $user->date_of_birth->age < 18)) {
            return redirect()->route('age-verification')->with('error', 'You must be 18 or older to access this betting platform.');
        }
        
        return $next($request);
    }
}

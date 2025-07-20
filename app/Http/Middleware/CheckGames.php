<?php

namespace App\Http\Middleware;

use App\Models\Tournament;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGames
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tournaments=Tournament::all();
        foreach ($tournaments as $tournament) {
            if ($tournament->games_count>=3) {
                return redirect()->route('results.index');
            }
        }
        return $next($request);
    }
}

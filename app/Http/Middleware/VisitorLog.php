<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class VisitorLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log visitor information
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'referer' => $request->headers->get('referer'),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'country' => Location::get($request->ip())->countryName ?? null,
            'region' => Location::get($request->ip())->regionName ?? null,
            'city' => Location::get($request->ip())->cityName ?? null,
            'latitude' => Location::get($request->ip())->latitude ?? null,
            'longitude' => Location::get($request->ip())->longitude ?? null,
        ]);
        return $next($request);
    }
}

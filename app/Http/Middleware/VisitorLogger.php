<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;

class VisitorLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Abaikan route tertentu (misal: admin, api, dll)
        if ($request->is('admin-isma/*') || $request->is('api/*')) {
            return $next($request);
        }
        $agent = new Agent();
        try {
            $ip = $request->ip();
            $location = geoip()->getLocation($ip);
            \Log::info('VisitorMiddleware: lokasi', [
                'ip' => $ip,
                'country' => $location->country ?? null,
                'city' => $location->city ?? null,
                'lat' => $location->lat ?? null,
                'lng' => $location->lon ?? null,
            ]);

            Visitor::create([
                'ip'       => $ip,
                'country'  => $location->country ?? null,
                'city'     => $location->city ?? null,
                'device'   => $agent->device() ?: ($agent->isDesktop() ? 'Desktop' : ($agent->isPhone() ? 'Mobile' : 'Unknown')),
                'browser'  => $agent->browser(),
                'platform' => $agent->platform(),
                'page'     => $request->path(),
                'lat'      => $location->lat ?? null,
                'lng'      => $location->lon ?? null,
            ]);
        } catch (\Throwable $e) {
            \Log::info('GeoIP Driver: ' . config('geoip.service'));
            \Log::error('VisitorMiddleware ERROR: ' . $e->getMessage());
        }
        return $next($request);
    }
}

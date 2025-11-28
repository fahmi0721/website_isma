<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
         // Range 30 hari terakhir
        $startDate = Carbon::now()->subDays(29)->startOfDay();
        $endDate   = Carbon::now()->endOfDay();

        // Total visitors
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();
        $monthVisitors = Visitor::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->count();

        // Pengunjung harian (30 hari terakhir)
        $dailyVisitors = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // By country
        $byCountry = Visitor::selectRaw('country, COUNT(*) as total')
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // By browser
        $byBrowser = Visitor::selectRaw('browser, COUNT(*) as total')
            ->whereNotNull('browser')
            ->groupBy('browser')
            ->orderByDesc('total')
            ->get();

        // By device
        $byDevice = Visitor::selectRaw('device, COUNT(*) as total')
            ->whereNotNull('device')
            ->groupBy('device')
            ->orderByDesc('total')
            ->get();

        // Lokasi untuk map (ambil yang ada lat & lng)
        $locations = Visitor::select('lat', 'lng', 'country', 'city')
            ->whereNotNull('lat')
            ->whereNotNull('lng')
            ->limit(500) // batasi biar map nggak terlalu berat
            ->get();

        return view('dashboard', [
            'totalVisitors' => $totalVisitors,
            'todayVisitors' => $todayVisitors,
            'monthVisitors' => $monthVisitors,
            'dailyVisitors' => $dailyVisitors,
            'byCountry'     => $byCountry,
            'byBrowser'     => $byBrowser,
            'byDevice'      => $byDevice,
            'locations'     => $locations,
            'startDate'     => $startDate,
            'endDate'       => $endDate,
        ]);
    }

}

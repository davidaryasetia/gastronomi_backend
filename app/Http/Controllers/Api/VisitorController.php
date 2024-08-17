<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VisitorResource;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VisitorController extends Controller
{
    public function index()
    {
        $visitor = Visitor::all();
        return VisitorResource::collection($visitor);
    }

    public function store(Request $request)
    {
        $ipAddress = $request->ip();

        // Get location data from IP address
        $locationData = $this->getLocationFromIp($ipAddress);
        $visitDateTime = Carbon::now($locationData['timezone']);
        $visitDate = $visitDateTime->toDateString();


        // If no record exists for this IP on the current day, create a new one
            $visitor = Visitor::create([
                'visit_date' => $visitDateTime,
                'ip_address' => $ipAddress,
                'city' => $locationData['city'],
                'country' => $locationData['country'],
                'region' => $locationData['region'],
                'timezone' => $locationData['timezone'],
            ]);

        return new VisitorResource($visitor);
    }


    // Fungsi GetLocation IP Address dengan IP Info
    private function getLocationFromIp($ip)
    {
        $response = Http::get("https://ipinfo.io/{$ip}?token=12d62dc0bbfec9");
        if ($response->successful()) {
            return [
                'city' => $response->json()['city'] ?? 'Unknown City',
                'country' => $response->json()['country'] ?? 'Unknown Country',
                'region' => $response->json()['region'] ?? 'Unknown Region',
                'timezone' => $response->json()['timezone'] ?? 'UTC',
            ];
        }

        return [
            'city' => 'Unknown City',
            'country' => 'Unknown Country',
            'region' => 'Unknown Region',
            'timezone' => 'Unknown Timezone',
        ];
    }


    public function show($id)
    {
        $visitor = Visitor::findOrFail($id);
        return new VisitorResource($visitor);
    }

    public function dailyVisitors()
    {
        $today = Carbon::today()->toDateString();
        $visitors = Visitor::where('visit_date', $today)->count();

        return response()->json(['daily_visitors' => $visitors], 200);
    }

    public function monthlyAverageVisitors()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $totalDays = Carbon::now()->daysInMonth;
        $visitors = Visitor::where('visit_date', 'like', "$currentMonth%")->count();
        $averageVisitors = $visitors / $totalDays;

        return response()->json(['monthly_average_visitors' => $averageVisitors]);
    }

    public function monthlyVisitors(Request $request, $year, $month)
    {
        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        $visitors = Visitor::whereBetween('visit_date', [$startDate, $endDate])
            ->selectRaw('DATE(visit_date) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($visitors, 200);
    }
}

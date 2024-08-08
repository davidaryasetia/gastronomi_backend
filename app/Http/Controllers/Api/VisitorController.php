<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VisitorResource;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $visitDate = Carbon::today()->toDateString();

        // Cek apakah sudah ada record untuk ip ini
        $visitor = Visitor::where('ip_address', $ipAddress)
            ->where('visit_date', $visitDate)
            ->first();

        if (!$visitor) {
            $visitor = Visitor::create([
                'visit_date' => $visitDate,
                'ip_address' => $ipAddress,
            ]);
        }

        return new VisitorResource($visitor);
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

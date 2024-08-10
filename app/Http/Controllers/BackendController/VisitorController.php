<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        // Tahun dan bulan
        $year = Carbon::now()->year();
        $month = Carbon::now()->month();
        $date = Carbon::now()->translatedFormat('d F Y');
        $visitDateTime = Carbon::now();


        $visitor = $this->visitors();
        $amount_daily_visitor = $this->DailyVisitors();
        $amount_week_visitor = $this->WeeklyVisitors();
        $amount_monthly_visitor = $this->MonthlyVisitors();

        $monthly_average_visitor = $this->CalculateMonthlyAverageVisitors();
        $monthly_visitors = $this->getMonthlyVisitors($year, $month);

        return view('sections.dashboard.dashboard', [
            'title' => 'Dashboard Ok',
            'visitor' => $visitor,
            'amount_daily_visitor' => $amount_daily_visitor,
            'amount_weekly_visitor' => $amount_week_visitor,
            'amount_monthly_visitor' => $amount_monthly_visitor,

            'monthly_average_visitor' => $monthly_average_visitor,
            'monthly_visitors' => $monthly_visitors,
            'date' => $date,
            'time' => $visitDateTime,
        ]);
    }

    // Semua Data Visitor 
    private function Visitors()
    {
        $visitors = Visitor::all();
        $visitors = $visitors->map(function ($visitor) {
            $visitor->visit_date = Carbon::parse($visitor->visit_date)->translatedFormat('l, d F Y');
            return $visitor;
        });

        return $visitors;
    }

    // Total Daily Visitors
    private function DailyVisitors()
    {
        $today = Carbon::today()->toDateString();
        return Visitor::where('visit_date', $today)->count();
    }

    // Total Weeks Visitors
    private function WeeklyVisitors()
    {
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->endOfWeek()->toDateString();

        return Visitor::whereBetween('visit_date', [$startOfWeek, $endOfWeek])->count();
    }

    // Total Monthly Visitors 
    private function MonthlyVisitors()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        return Visitor::whereBetween('visit_date', [$startOfMonth, $endOfMonth])->count();
    }

    private function CalculateMonthlyAverageVisitors()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $totalDays = Carbon::now()->daysInMonth;
        $visitors = Visitor::where('visit_date', 'like', "$currentMonth%")->count();
        return  $visitors / $totalDays;
    }

    private function getMonthlyVisitors($year, $month)
{
    $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
    $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

    return Visitor::whereBetween('visit_date', [$startDate, $endDate])
        ->selectRaw('DATE(visit_date) as date, count(*) as count')
        ->groupBy('date')
        ->orderBy('date')
        ->get();
}

}

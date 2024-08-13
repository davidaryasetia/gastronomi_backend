<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
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

        // Logic untuk set date&time
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

    public function store(Request $request)
    {
        dd($request->all());
        $year = $request->input('year', Carbon::now()->year());
        $month = $request->input('month', Carbon::now()->month());

        // Fetch monthly visitors based on selected month and year
        $monthly_visitors = $this->getMonthlyVisitors($year, $month);

        if ($request->ajax()) {
            return response()->json(['monthly_visitors' => $monthly_visitors]);
        }

        return view('sections.dashboard.dashboard', [
            'title' => 'Dashboard Ok',
            'count_monthly_visitors' => $monthly_visitors,
            'selectedYear' => $year,
            'selectedMonth' => $month,
        ]);
    }

    // Semua Data Visitor 
    private function Visitors()
    {
        $visitors = Visitor::all();
        $visitors = $visitors->map(function ($visitor) {
            $visitor->visit_date = Carbon::parse($visitor->visit_date)->translatedFormat('l, d F Y, H:i:s');
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
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $visitorCount = Visitor::whereBetween('visit_date', [$startOfWeek->toDateString(), $endOfWeek->toDateString()])->count();
        $formattedStartOfWeek = $startOfWeek->format('d F Y');
        $formattedEndOfWeek = $endOfWeek->format('d F Y');

        return [
            'count' => $visitorCount,
            'range' => $formattedStartOfWeek . ' - ' . $formattedEndOfWeek,
        ];
    }


    // Total Monthly Visitors 
    // Total Monthly Visitors
    private function MonthlyVisitors()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $visitorCount = Visitor::whereBetween('visit_date', [$startOfMonth->toDateString(), $endOfMonth->toDateString()])->count();
        $formattedStartOfMonth = $startOfMonth->format('d F Y');
        $formattedEndOfMonth = $endOfMonth->format('d F Y');

        return [
            'count' => $visitorCount,
            'range' => $formattedStartOfMonth . ' - ' . $formattedEndOfMonth,
        ];
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
        // Mendapatkan awal bulan dan akhir bulan
        $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        // Ambil data pengunjung yang ada
        $visitors = Visitor::whereBetween('visit_date', [$startDate, $endDate])
            ->selectRaw('DATE(visit_date) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date'); // Mengubah hasil menjadi keyed collection berdasarkan tanggal

        // Inisialisasi array untuk menyimpan hasil akhir
        $results = [];

        // Iterasi dari awal bulan hingga akhir bulan
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');
            $results[] = [
                'date' => $formattedDate,
                'count' => $visitors->get($formattedDate)->count ?? 0, // Ambil jumlah jika ada, jika tidak, 0
            ];
        }

        return collect($results); // Mengembalikan hasil dalam bentuk koleksi
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reception;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index() {
        $today = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $oneYearAgo = $now->copy()->subMonths(11);

        $receptions = Reception::whereDate('reception_data', $today)
                                    ->orderBy('reception_data', 'asc')
                                    ->paginate(5); 
        $total = $receptions->total();

        $monthlyReceptions = Reception::where('reception_data', '>=', $oneYearAgo)
                                        ->selectRaw('COUNT(*) as count, DATE_FORMAT(reception_data, "%Y-%m") as month')
                                        ->groupBy('month')
                                        ->orderBy('month', 'asc')
                                        ->get();

        return view('admin.home', compact('receptions', 'total', 'monthlyReceptions'));

    }
}

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
        $receptions = Reception::whereDate('reception_data', $today)
                                    ->orderBy('reception_data', 'desc')
                                    ->paginate(15); 
        $total = $receptions->total();

        return view('admin.home', compact('receptions', 'total'));

    }
}

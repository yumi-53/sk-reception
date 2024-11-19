<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use App\Http\Requests\admin\ReseptionRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ReceptionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
            $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
            $receptionsData = Reception::whereBetween('reception_data', [$startDate, $endDate]);
        } else {
            $today = Carbon::now()->format('Y-m-d');
            $receptionsData = Reception::whereDate('reception_data', $today);
        }
        $receptions = $receptionsData->orderBy('reception_data', 'asc')
                                    ->paginate(15); 
        $total = $receptions->total();

        return view('admin.reception.index', compact('receptions', 'total'));
    }

    public function create()
    { 
        return view('admin.reception.create');
    }

    public function store(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $today = Carbon::now()->format('Y-m-d');
        $duplication = Reception::where('user_id', $user_id)
                                ->whereDate('reception_data', $today)
                                ->first();

        if (!User::where('id', $user_id)->exists()) {
            return redirect()->route('admin.reception.index')->with('flash_message',  "会員情報が見当たりません。");
        } elseif ($duplication){
            return redirect()->route('admin.reception.index')->with('flash_message',  $user->name ."様、本日はすでに受付済みです");
        } else {
        Reception::create([
            'user_id' => $user_id,
            'reception_data' => Carbon::now(),
        ]);
        return redirect()->route('admin.reception.index')->with('flash_message',  $user->name ."様の受付完了しました。");
        }
    }

    public function destroy($id)
    {
		Reception::find($id)->delete();
		return redirect()->route('admin.reception.index')->with('flash_message', '受付を取消しました。');
    }
}

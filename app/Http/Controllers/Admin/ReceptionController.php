<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;

class ReceptionController extends Controller
{
    public function store(User $user)
    {
        Reception::create([
            'user_id' => $user->id,
            'reception_data' => Carbon::now(),
        ]);
        session()->flash('message',  $user->name ."様の受付完了");
    }
}

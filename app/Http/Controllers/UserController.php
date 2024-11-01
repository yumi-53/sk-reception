<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function edit(User $user)
    {
        if (Auth::id() !== $user->id) {
			return redirect()->route('user.index')->with('error_message', '不正なアクセスです。');
		}
        return view('user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        if (Auth::id() !== $user->id) {
			return redirect()->route('user.index')->with('flash_message', '会員情報を編集しました。');
        }
        
		User::updateOrCreate(
			['id' => $user->id],[
			'name' => $request->input('name'),
            'kana' =>  $request->input('kana'),
            'email' => $request->input('email'),
			],
		);
		return redirect()->route('user.index')->with('flash_message', '会員情報を編集しました。');
		
    }

    public function destroy(User $user)
    {
        if (Auth::id() !== $user->id) {
            return redirect()->route('user.index')->with('error_message', '不正なアクセスです。');
        }
	
        $user->delete();
		return redirect()->route('user.index')->with('flash_message', '会員情報を削除しました。');
    }
}

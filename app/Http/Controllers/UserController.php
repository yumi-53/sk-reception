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

    public function edit($id)
    {
        if (Auth::id() == $id) {
            $user = User::find($id);
			return view('user.edit', compact('user'));
        } else {
			return redirect()->route('user.index')->with('error_message', '不正なアクセスです。');
		}
    }

    public function update(UserRequest $request, $id)
    {
        if (Auth::id() == $id) {
			User::updateOrCreate(
				['id' => $id],[
				'name' => $request->input('name'),
                'kana' =>  $request->input('kana'),
                'email' => $request->input('email'),
				],
			);
			return redirect()->route('user.index')->with('flash_message', '会員情報を編集しました。');
		} else {
			return redirect()->route('user.index')->with('error_message', '不正なアクセスです。');
		}
    }

    public function destroy($id)
    {
        if (Auth::id() == $id) {
			User::find($id)->delete();
			return redirect()->route('user.index')->with('flash_message', '会員情報を削除しました。');
		} else {
			return redirect()->route('user.index')->with('error_message', '不正なアクセスです。');
		}
    }
}

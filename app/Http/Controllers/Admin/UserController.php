<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {   
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'kana' => ['required', 'string', 'regex:/\A[ァ-ヴー\s]+\z/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);

		User::updateOrCreate(
			['id' => $id],[
			'name' => $request->input('name'),
            'kana' =>  $request->input('kana'),
            'email' => $request->input('email'),
			],
		);
		return redirect()->route('admin.users.index')->with('flash_message', '会員情報を編集しました。');
    }

    public function destroy($id)
    {
		User::find($id)->delete();
		return redirect()->route('admin.users.index')->with('flash_message', '会員情報を削除しました。');
    }
}

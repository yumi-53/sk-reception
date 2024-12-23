<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\admin\UserRequest;


class UserController extends Controller
{
    public function index(Request $request)
    {   
        $keyword = $request->keyword;
        $users = User::paginate(15);

        if ($keyword == null) {
            $users = User::paginate(15);
        } else {
            $users = User::where('name', 'like', "%{$keyword}%")
                        ->orWhere('kana', 'like', "%{$keyword}%")
                        ->paginate(15);
        }
        $total = $users->total();        
        
        return view('admin.users.index', compact('users', 'total', 'keyword'));
    }
    
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
		User::updateOrCreate(
			['id' => $user->id],[
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

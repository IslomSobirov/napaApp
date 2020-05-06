<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin/index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin/userEdit', ['user' => $user]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()
                    ->back()
                    ->with('msg', 'Пользователь удалено успешно');
    }

    public function userUpdate(Request $request, $id)
    {

    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->type = 'admin';
        $user->save();

        return redirect()
                    ->back()
                    ->with('msg', 'Выполнено');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = \DB::table('users')->where([
            // ['type', '=', 'default',],
            ['name', 'LIKE', '%%']
        ])->get();
        
        return response()->json(['users' => $users]);
    }
}

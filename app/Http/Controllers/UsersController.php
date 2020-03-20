<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $alerts = $user->alerts()->orderBy('created_at', 'desc')->paginate(10);
        $rescues = $user->rescues()->orderBy('created_at', 'desc')->paginate(10);
        $locations = $user->locations()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'alerts' => $alerts,
            'rescues' => $rescues,
            'locations' => $locations,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back();
    }
}


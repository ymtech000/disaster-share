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

        $data = [
            'user' => $user,
            'alerts' => $alerts,
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
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'alerts' => $favorites,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
    
    public function favoritings($id)
    {
        $user = User::find($id);
        $favoritings = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'alerts' => $favoritings,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
    
    public function image(Request $request) {
        dd($request);
        $validatedData = $request->validate([
          "thefile" => "required|image"
        ]);
        
         //画像ファイル受け取り処理
        $filename='';
        if ($request->file('thefile')->isValid([])) {
            $filename = $request->file('thefile')->store('img');
            
            //s3アップロード開始
            $image = $request->file('thefile');
            // バケットの`pogtor528`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('pogtor528', $image, 'public');
            // アップロードした画像のフルパスを取得
            $url = Storage::disk('s3')->url($path);
        }
        
        $user = new User;
        $user->image = $url;
       
        $user->save();
            
        return back();
    }
}

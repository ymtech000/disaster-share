<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Auth;
use Hash;

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
    
    public function image(Request $request, $id) {
       
        $this->validate($request, [
            'thefile' => [
               'required',
               'file',
               'image',
               'mimes:jpeg,png',
            ]
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
        
        $user = User::find($id);
        $user->image = $url;
       
        $user->save();
            
        return redirect()->route('users.show', ['id' => Auth::user()->id]);
    }
    
    public function edit($id)
     {
    
        $user = Auth::user();
        
        return view('users.edit',[ 'user' => $user ]);
    
     }
     
     public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:6|confirmed',
        ]);
            
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        
        if(Hash::check($request->current_password, Auth::user()->password)){
            $user->password = Hash::make($request->password);
        }
        else{
            return back();
        }
        
        $user->save();
        
        return redirect()->route('users.show', ['id' => Auth::user()->id]);
    }
}

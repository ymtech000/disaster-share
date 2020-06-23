<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Auth;
use Hash;
use App\Http\Requests\StoreUser;

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
        if(Auth::id() ==1){
            return back()->with('error', 'ゲストユーザーは退会することができません。');
        }
        $user->delete();

        return back();
    }
    
    public function followings($id)
    {
        // dd($id);
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
    
    public function edit($id)
     {
        $user = Auth::user();
        
        return view('users.edit',[ 'user' => $user ]);
     }
     
    public function update(StoreUser $request, $id)
    {
        $filename='';
        if( request()->hasFile('thefile')){
            //画像ファイル受け取り処理
            if (request()->file('thefile')->isValid([])) {
                $filename = $request->file('thefile')->store('img');
                //s3アップロード開始
                $image = $request->file('thefile');
                // バケットの`pogtor528`フォルダへアップロード
                $path = Storage::disk('s3')->putFile('pogtor528', $image, 'public');
                // アップロードした画像のフルパスを取得
                $url = Storage::disk('s3')->url($path);
            }
            
            $user = User::find($id);
            $user->introduction = $request->introduction;
            $user->image = $url;
            if(Auth::id() !==1){
                // if(DB::table(users)->where(email, $request->email)->exists()){
                //     return back()->with('error', 'そのメールアドレスは既に使用されています。');
                // }
                $user->name = $request->name;
                $user->email = $request->email;
                if($request->password !== null){
                    if(Hash::check($request->current_password, Auth::user()->password)){
                        $user->password = Hash::make($request->password);
                    }
                    else{
                        return back()->with('error', '現在のパスワードが間違っています。');
                    }
                }
            }
            else if($request->password !== null){
                return back()->with('error', 'ゲストユーザーは氏名, メールアドレス, パスワードの変更ができません。');
            }
            else if($user->name !== $request->name){
                return back()->with('error', 'ゲストユーザーは氏名, メールアドレス, パスワードの変更ができません。');
            }
            else if($user->email !== $request->email){
                return back()->with('error', 'ゲストユーザーは氏名, メールアドレス, パスワードの変更ができません。');
            }
            else{
                $user->name = $request->name;
                $user->email = $request->email;
            }
            
            $user->save();
        }
        else{
            $user = User::find($id);
            $user->introduction = $request->introduction;
            if(Auth::id() !==1){
                $user->name = $request->name;
                $user->email = $request->email;
                if($request->password !== null){   
                    if(Hash::check($request->current_password, Auth::user()->password)){
                        $user->password = Hash::make($request->password);
                    }
                    else{
                        return back()->with('error', '現在のパスワードが間違っています。');
                    }
                }
            }
            else if($request->password !== null){
                return back()->with('error', 'ゲストユーザーは氏名, メールアドレス, パスワードの変更ができません。');
            }
            else if($user->name !== $request->name){
                return back()->with('error', 'ゲストユーザーは氏名, メールアドレス, パスワードの変更ができません。');
            }
            else if($user->email !== $request->email){
                return back()->with('error', 'ゲストユーザーは氏名, メールアドレス, パスワードの変更ができません。');
            }
            else{
                $user->name = $request->name;
                $user->email = $request->email;
            }
            
            $user->save();
        }
        return redirect()->route('users.show', ['id' => Auth::id()]);
    }
}

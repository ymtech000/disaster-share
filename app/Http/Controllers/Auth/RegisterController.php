<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/alerts';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'icon' => [
            //   'required',
            //   'file',
            //   'image',
            //   'mimes:jpeg,png',
            // ]
        ]);
    }

    protected function create(array $data)
    {
        // //  画像ファイル受け取り処理
        // $filename='';
        // if ($request->file('icon')->isValid([])) {
        //     $filename = $request->file('icon')->store('img');
            
        //     //s3アップロード開始
        //     $image = $request->file('icon');
        //     // バケットの`pogtor528`フォルダへアップロード
        //     $path = Storage::disk('s3')->putFile('pogtor528', $image, 'public');
        //     // アップロードした画像のフルパスを取得
        //     $url = Storage::disk('s3')->url($path);
        // }
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            // 'icon' => $data['icon'],
        ]);
    }
}
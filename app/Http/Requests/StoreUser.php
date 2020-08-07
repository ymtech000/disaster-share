<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|string|email|max:30',
            'password' => 'nullable|string|min:6|confirmed',
            'introduction' => 'nullable|string|max:300',
            'thefile' => [
                'nullable',
                'file',
                'image',
                'mimes:jpeg,png',
            ],
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください。',
            'name.max' => '名前は15字以内で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.max' => 'メールアドレスは30字以内で入力してください。',
            'email.email' => 'メールアドレスが正しくありません。',
            'password.min' => 'パスワードは6字以上で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            'introduction.max' => '自己紹介は300字以内で入力してください。'
        ];
    }
}
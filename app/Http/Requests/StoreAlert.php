<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'content' => 'required|max:140',
            'title' => 'required|max:15',
            'location' => 'required|max:15',
            'lat' => 'required',
            'area' => 'required',
            'city' => 'required',
            'thefile' => [
               'required',
               'file',
               'image',
               'mimes:jpeg,png',
            ]
        ];
    }
    
    public function messages()
    {
        return [
            'content.required' => 'メッセージを入力してください。',
            'content.max' => 'メッセージは140字以内で入力してください。',
            'title.required' => 'タイトルを入力してください。',
            'title.max' => 'タイトルは15字以内で入力してください。',
            'location.required' => '場所を入力してください。',
            'location.max' => '場所は15字以内で入力してください',
            'lat.required' => '共有したい場所にピンを立ててください。',
            'thefile.required' => '画像を選択してください。',
        ];
    }
}

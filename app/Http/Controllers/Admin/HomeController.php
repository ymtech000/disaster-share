<?php
namespace App\Http\Controllers\Admin;  // Adminの追加
use App\Http\Controllers\Controller;   // 追加
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');   // 管理者用のテンプレート
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        // ログインユーザーを取得
        $user = Auth::user();

        // ログインユーザーに日もづくフォルダを一つ取得
        $folder = $user->folders()->first();

        if(is_null($folder)){
            return view('home');
        }

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}

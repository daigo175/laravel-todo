<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DivideController extends Controller
{
    /**
     * ログイン後判定
     * ユーザに紐づくフォルダの存在有無でリダイレクト先を振り分け
     */
    public function index(): RedirectResponse
    {
        $user = Auth::user();
        $first_folder = $user->folders->first();

        if (!is_null($first_folder)) {
            // フォルダ一覧画面
            return redirect()->route('tasks.index', [$first_folder]);
        } else {
            // フォルダ作成画面
            return redirect()->route('folder.create');
        }
    }

}

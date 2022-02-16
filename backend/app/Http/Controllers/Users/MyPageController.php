<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function __invoke()
    {
        // TODO 複数のユーザーがログインしている場合は全員のユーザーのidを取得してしまうのではないか？
        // 指定のuser_idのユーザーを取得する
        $userId = Auth::id();
        $memos = Memo::where('user_id', $userId)->get();

        return view('mypage', [
            'memos' => $memos,
        ]);
    }
}

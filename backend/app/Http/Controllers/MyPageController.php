<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function __invoke()
    {
        // TODO 複数のユーザーがログインしている場合は全員のユーザーのidを取得してしまうのではないか？
        // 指定のuser_idのユーザーを取得する
        $userId = Auth::id();
        $books = Book::where('user_id', $userId)->get();

        return view('mypage', [
            'books' => $books,
        ]);
    }
}

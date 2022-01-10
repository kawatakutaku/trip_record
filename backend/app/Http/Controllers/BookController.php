<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
     // TODO Book用のFormRequestを作成して、バリデーションの設定をする(value objectを使用する)
    //  TODO bookのcontrollerを完成させる
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 旅行作成の入力画面を表示する処理
        return view('books.create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        // Bookモデルのインスタンスを作成する
        $book = new Book();

        // TODO セッションなどから、ユーザー情報を取得する方法を採用する(今の状態だと、認証中の全ユーザーを取得してしまう)
        // TODO userIdはconstructorなどで、取得できないか検討(以前はできなかった->nullが返ってくる)
        $userId = Auth::id();

        // TODO imgの定義を検討する
        // requestから渡ってきた値をモデルのインスタンスに登録している
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->book_img = $request->input('book_img');
        $book->user_id = $userId;
        // TODO genre_idを取得する方法を検討する
        $book->genre_id = $userId;

        // DBに保存している
        $book->save();

        return redirect()->route('mypage');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', compact("book"));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $book = Book::find($id);

        return view('books.edit', compact("book"));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $book = Book::find($id);
        $userId = Auth::id();

        // TODO imgの定義を検討する
        // requestから渡ってきた値をモデルのインスタンスに登録している
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->book_img = $request->input('book_img');
        $book->user_id = $userId;
        // TODO genre_idを取得する方法を検討する
        $book->genre_id = $userId;

        $book->save();

        return redirect()->route('mypage');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('mypage');
    }
}

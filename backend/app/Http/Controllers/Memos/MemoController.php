<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Memos\StoreMemoRequest;
use App\Http\Requests\Memos\UpdateMemoRequest;
use App\Models\Memo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * メモの一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Memo::all();
        return view("memos.index", ["memos" => $memos]);
    }

    /**
     * メモの新規作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memos.create');
    }

    /**
     * メモの保存処理
     *
     * @param  \App\Http\Requests\StoreMemoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoRequest $request, string $cityId)
    {
        // TODO: ログインと都市の選択をする機能を先に作らないとエラーが発生する

        $memo = new Memo();

        $memo->memo = $request->memo;
        $memo->img = $request->img;
        // TODO: user_idとcity_idはどうやって取得するのか検討
        $userId = Auth::id();
        $memo->user_id = $userId;
        $memo->city_id = $cityId;
        $memo->created_at = Carbon::now();
        $memo->updated_at = Carbon::now();
        $memo->save();

        return redirect('memos.index');
    }

    /**
     * メモの詳細画面
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        return view('memos.show', [ "memo" => $memo ]);
    }

    /**
     * メモの編集画面
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        return view('memos.edit', [ 'memo' => $memo ]);
    }

    /**
     * メモの更新処理
     *
     * @param  \App\Http\Requests\UpdateMemoRequest  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoRequest $request, Memo $memo, string $cityId)
    {
        // TODO: ログインと都市の選択をする機能を先に作らないとエラーが発生する
        $memo = Memo::find($memo);

        $memo->memo = $request->memo;
        $memo->img = $request->img;
        // TODO: user_idとcity_idはどうやって取得するのか検討
        $userId = Auth::id();
        $memo->user_id = $userId;
        $memo->city_id = $cityId;
        $memo->created_at = Carbon::now();
        $memo->updated_at = Carbon::now();
        $memo->save();

        return redirect(route('memos.show', [ 'memo' => $memo ]));
    }

    /**
     * メモの削除処理
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect(route('memos.index'));
    }
}

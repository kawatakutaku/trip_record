<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Memos\StoreMemoRequest;
use App\Http\Requests\Memos\UpdateMemoRequest;
use App\Models\City;
use App\Models\Memo;
use App\Models\MemoGood;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MemoController extends Controller
{
    /**
     * メモの一覧画面
     * @param Illuminate\Http\Request
     * @return Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $memos = Memo::where('city_id', $request->cityId)->get();
        return view("memos.index", [City::CITY_ID_NAME => $request->cityId, Memo::MULTIPLE_MEMOS => $memos]);
    }

    /**
     * メモの新規作成画面
     * @param Illuminate\Http\Request
     * @return Illuminate\View\View
     */
    public function create(Request $request): View
    {
        return view('memos.create', [City::CITY_ID_NAME => $request->cityId]);
    }

    /**
     * メモの保存処理
     * @param  \App\Http\Requests\StoreMemoRequest  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreMemoRequest $request): RedirectResponse
    {
        $memo = new Memo();

        $memo->memo = $request->memo;
        $memo->img = $request->img;
        // TODO: user_idとcity_idはどうやって取得するのか検討
        // TODO: user_idを取得する部分を共通化する
        $user = app(User::class);
        $userId = $user->getAuthAccountId();

        $memo->user_id = $userId;
        $memo->city_id = $request->cityId;
        $memo->created_at = Carbon::now();
        $memo->updated_at = Carbon::now();

        $memo->save();

        return redirect(route("memos.index", [City::CITY_ID_NAME => $request->cityId]));
    }

    /**
     * メモの詳細画面
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\View\View
     */
    public function show(Request $request, Memo $memo): View
    {
        return view('memos.show', [ City::CITY_ID_NAME => $request->cityId, Memo::MEMO_ID_NAME => $memo]);
    }

    /**
     * メモの編集画面
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\View\View
     */
    public function edit(Request $request, Memo $memo): View
    {
        return view('memos.edit', [ City::CITY_ID_NAME => $request->cityId, Memo::MEMO_ID_NAME => $memo ]);
    }

    /**
     * メモの更新処理
     *
     * @param  \App\Http\Requests\UpdateMemoRequest  $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemoRequest $request, Memo $memo): RedirectResponse
    {
        // TODO: ログインと都市の選択をする機能を先に作らないとエラーが発生する

        $memo->memo = $request->memo;
        $memo->img = $request->img;
        // TODO: user_idとcityIdはどうやって取得するのか検討
        $user = app(User::class);
        $userId = $user->getAuthAccountId();
        $memo->user_id = $userId;
        $memo->city_id = $request->cityId;
        $memo->updated_at = Carbon::now();

        $memo->save();

        return redirect(route('memos.show', [ City::CITY_ID_NAME => $request->cityId, Memo::MEMO_ID_NAME => $memo]));
    }

    /**
     * メモの削除処理
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Memo $memo): RedirectResponse
    {
        $memo->delete();

        return redirect(route('memos.index', [City::CITY_ID_NAME => $request->cityId]));
    }
}

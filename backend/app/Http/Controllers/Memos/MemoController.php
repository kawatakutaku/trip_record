<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Memos\StoreMemoRequest;
use App\Http\Requests\Memos\UpdateMemoRequest;
use App\Models\Memo;
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
        if ($request->cityId)
        {
            $memos = Memo::where('city_id', $request->cityId)->get();

            return view("memos.index", ["memos" => $memos, "cityId" => $request->cityId]);
        }
        $memos = Memo::all();
        return view("memos.index", ["memos" => $memos]);
    }

    /**
     * メモの新規作成画面
     * @param Illuminate\Http\Request
     * @return Illuminate\View\View
     */
    public function create(Request $request): View
    {
        return view('memos.create', ["cityId" => $request->cityId]);
    }

    /**
     * メモの保存処理
     * @param  \App\Http\Requests\StoreMemoRequest  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreMemoRequest $request): RedirectResponse
    {
        // TODO: ログインと都市の選択をする機能を先に作らないとエラーが発生する

        $memo = new Memo();

        $memo->memo = $request->memo;
        // TODO: migrationファイルで、imgをnull許可するように変更する
        $memo->img = $request->img;
        // TODO: user_idとcity_idはどうやって取得するのか検討
        $userId = Auth::id();
        $memo->user_id = $userId;
        $memo->city_id = $request->cityId;
        $memo->created_at = Carbon::now();
        $memo->updated_at = Carbon::now();

        $memo->save();

        return redirect(route("memos.index", ['cityId' => $request->cityId]));
    }

    /**
     * メモの詳細画面
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\View\View
     */
    public function show(Request $request, Memo $memo): View
    {
        return view('memos.show', [ "memo" => $memo, 'cityId' => $request->cityId ]);
    }

    /**
     * メモの編集画面
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\View\View
     */
    public function edit(Request $request, Memo $memo): View
    {
        return view('memos.edit', [ 'memo' => $memo, 'cityId' => $request->cityId ]);
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
        $userId = Auth::id();
        $memo->user_id = $userId;
        $memo->city_id = $request->cityId;
        $memo->updated_at = Carbon::now();

        $memo->save();

        return redirect(route('memos.show', [ 'memo' => $memo, 'cityId' => $request->cityId ]));
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

        return redirect(route('memos.index', ['cityId' => $request->cityId]));
    }
}

<?php

namespace App\Http\Controllers\Memos;

use App\Domain\UseCases\Memo\DestroyUseCase;
use App\Domain\UseCases\Memo\StoreUseCase;
use App\Domain\UseCases\Memo\UpdateUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Memos\StoreMemoRequest;
use App\Http\Requests\Memos\UpdateMemoRequest;
use App\Models\City;
use App\Models\Memo;
use App\Models\MemoLike;
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
     * @param  \App\Http\Requests\Memos\StoreMemoRequest $request
     * @param \App\Domain\UseCases\Memo\StoreUseCase $useCase
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreMemoRequest $request, StoreUseCase $useCase): RedirectResponse
    {
        $memos = $useCase->execute($request);
        return redirect(route("memos.index", [Memo::MULTIPLE_MEMOS => $memos, City::CITY_ID_NAME => $request->cityId]));
    }

    /**
     * メモの詳細画面
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\View\View
     */
    public function show(Request $request, Memo $memo): View
    {
        return view('memos.show', [Memo::MEMO_ID_NAME => $memo, City::CITY_ID_NAME => $request->cityId]);
    }

    /**
     * メモの編集画面
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\View\View
     */
    public function edit(Request $request, Memo $memo): View
    {
        return view('memos.edit', [Memo::MEMO_ID_NAME => $memo, City::CITY_ID_NAME => $request->cityId]);
    }

    /**
     * メモの更新処理
     *
     * @param  \App\Http\Requests\Memos\UpdateMemoRequest  $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemoRequest $request, Memo $memo, UpdateUseCase $useCase): RedirectResponse
    {
        // TODO: ログインと都市の選択をする機能を先に作らないとエラーが発生する
        $useCase->execute($request, $memo);
        return redirect(route('memos.show', [Memo::MEMO_ID_NAME => $memo, City::CITY_ID_NAME => $request->cityId]));
    }

    /**
     * メモの削除処理
     * @param Illuminate\Http\Request $request
     * @param  \App\Models\Memo  $memo
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Memo $memo, DestroyUseCase $useCase): RedirectResponse
    {
        $memos = $useCase->execute($memo);
        return redirect(route('memos.index', [Memo::MULTIPLE_MEMOS => $memos, City::CITY_ID_NAME => $request->cityId]));
    }
}

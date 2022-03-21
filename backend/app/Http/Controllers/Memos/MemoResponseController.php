<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Memos\StoreMemoResponseRequest;
use App\Http\Requests\Memos\UpdateMemoResponseRequest;
use App\Models\Memo;
use App\Models\MemoResponse;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemoResponseController extends Controller
{
    /**
     * メモ返信の一覧機能
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // TODO: 基底クラスを作って、そこでuserIdを取得するようにする
        $user = app(User::class);
        $userId = $user->getAuthAccountId();

        $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_USER_ID, $userId)->get();

        return view('memoResponse.index', [MemoResponse::MEMO_RESPONSES => $memoResponses]);
    }

    /**
     * メモ返信の新規作成機能
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request): View
    {
        return view('memoResponse.create', [MemoResponse::MEMO_ID => $request->memoId]);
    }

    /**
     * メモ返信の保存処理
     * @param  \App\Http\Requests\Memos\StoreMemoResponseRequest  $request
     * @param string $memoId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMemoResponseRequest $request): RedirectResponse
    {
        // ログインユーザーのidを取得
        $user = app(User::class);
        $userId = $user->getAuthAccountId();

        // メモ返信の保存処理
        $memoResponse = new MemoResponse();

        $memoResponse->memo_id = $request->memoId;
        $memoResponse->user_id = $userId;
        $memoResponse->message = $request->message;
        $memoResponse->save();

        // メモ返信の一覧の取得
        $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_USER_ID, $userId)->where(MemoResponse::MEMO_RESPONSE_MEMO_ID, $request->memoId)->get();

        return redirect(route('responses.index', [MemoResponse::MEMO_RESPONSES => $memoResponses]));
    }

    /**
     * メモ返信の詳細機能
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\MemoResponse  $response
     * @param string $memoId
     * @return \Illuminate\View\View
     */
    public function show(MemoResponse $response): View
    {
        return view('memoResponse.show', [MemoResponse::MEMO_RESPONSE_ID => $response]);
    }

    /**
     * メモ返信の編集機能
     * @param  \App\Models\MemoResponse  $response
     * @param string $memoId
     * @return \Illuminate\View\View
     */
    public function edit(MemoResponse $response): View
    {
        return view('memoResponse.edit', [MemoResponse::MEMO_RESPONSE_ID => $response]);
    }

    /**
     * メモ返信の更新処理
     * @param  \App\Http\Requests\Memos\UpdateMemoResponseRequest  $request
     * @param  \App\Models\MemoResponse  $response
     * @param string $memoId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemoResponseRequest $request, MemoResponse $response): RedirectResponse
    {
        // messageの更新処理
        $response->message = $request->message;
        $response->update();

        return redirect(route('responses.show', [MemoResponse::MEMO_RESPONSE_ID => $response]));
    }

    /**
     * メモ返信の削除機能
     * @param  \App\Models\MemoResponse  $response
     * @param string $memoId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(MemoResponse $response): RedirectResponse
    {
        $userId = $response->user_id;

        // メモ返信の削除処理
        $response->delete();

        $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_USER_ID, $userId)->get();

        return redirect(route('responses.index', [MemoResponse::MEMO_RESPONSES => $memoResponses]));
    }
}

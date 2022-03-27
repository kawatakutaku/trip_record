<?php

namespace App\Http\Controllers\Memos;

use App\Domain\UseCases\MemoResponse\DestroyUseCase;
use App\Domain\UseCases\MemoResponse\IndexUseCase;
use App\Domain\UseCases\MemoResponse\StoreUseCase;
use App\Domain\UseCases\MemoResponse\UpdateUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Memos\StoreMemoResponseRequest;
use App\Http\Requests\Memos\UpdateMemoResponseRequest;
use App\Models\Memo;
use App\Models\MemoResponse;
use App\Models\User;
use App\Repositories\Memo\IMemoResponseRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemoResponseController extends Controller
{
    /**
     * メモ返信の一覧機能
     * @param \App\Domain\UseCases\MemoResponse\IndexUseCase $useCase
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request, IndexUseCase $useCase): View
    {
        $memoResponses = $useCase->getIndexMemoResponses($request->memoId);
        return view('memoResponse.index', [MemoResponse::MEMO_RESPONSES => $memoResponses, MemoResponse::MEMO_ID => $request->memoId]);
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
     * @param \App\Domain\UseCases\MemoResponse\StoreUseCase $useCase
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMemoResponseRequest $request,  StoreUseCase $useCase): RedirectResponse
    {
        $memoResponses = $useCase->execute($request);
        return redirect(route('responses.index', [MemoResponse::MEMO_RESPONSES => $memoResponses, MemoResponse::MEMO_ID => $request->memoId]));
    }

    /**
     * メモ返信の詳細機能
     * @param  \App\Models\MemoResponse  $response
     * @return \Illuminate\View\View
     */
    public function show(MemoResponse $response): View
    {
        return view('memoResponse.show', [MemoResponse::MEMO_RESPONSE_ID => $response]);
    }

    /**
     * メモ返信の編集機能
     * @param  \App\Models\MemoResponse  $response
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMemoResponseRequest $request, MemoResponse $response,  UpdateUseCase $useCase): RedirectResponse
    {
        $useCase->execute($request, $response);
        return redirect(route('responses.show', [MemoResponse::MEMO_RESPONSE_ID => $response]));
    }

    /**
     * メモ返信の削除機能
     * @param  \App\Models\MemoResponse  $response
     * @param \App\Domain\UseCases\MemoResponse\DestroyUseCase $useCase
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(MemoResponse $response, DestroyUseCase $useCase): RedirectResponse
    {
        $memoResponses = $useCase->execute($response);
        return redirect(route('responses.index', [MemoResponse::MEMO_RESPONSES => $memoResponses, MemoResponse::MEMO_ID => $response->memo_id]));
    }

}

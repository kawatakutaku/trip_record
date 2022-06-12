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
    private $repository;

    public function __construct(IMemoResponseRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * メモ返信の一覧機能
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $memoResponses = $this->repository->index($request);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMemoResponseRequest $request): RedirectResponse
    {
        $memoResponses = $this->repository->store($request);
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
    public function update(UpdateMemoResponseRequest $request, MemoResponse $response): RedirectResponse
    {
        $this->repository->update($request, $response);
        return redirect(route('responses.show', [MemoResponse::MEMO_RESPONSE_ID => $response]));
    }

    /**
     * メモ返信の削除機能
     * @param  \App\Models\MemoResponse  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(MemoResponse $response): RedirectResponse
    {
        $memoResponses = $this->repository->destroy($response);
        return redirect(route('responses.index', [MemoResponse::MEMO_RESPONSES => $memoResponses, MemoResponse::MEMO_ID => $response->memo_id]));
    }

}

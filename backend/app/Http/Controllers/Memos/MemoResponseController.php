<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoResponseRequest;
use App\Http\Requests\UpdateMemoResponseRequest;
use App\Models\Memo;
use App\Models\MemoResponse;
use App\Models\User;
use Illuminate\View\View;

class MemoResponseController extends Controller
{
    /**
     * @param string $memoId
     * @return \Illuminate\View\View
     */
    public function index(string $memoId): View
    {
        $user = app(User::class);
        $userId = $user->getAuthAccountId();

        $memoResponse = MemoResponse::where('memo_id', $memoId)->where('user_id', $userId)->get();

        return view('memoResponse.index', [MemoResponse::MEMO_ID => $memoId, MemoResponse::MEMO_RESPONSES => $memoResponse]);
    }

    /**
     * @param string $memoId
     * @return \Illuminate\View\View
     */
    public function create(string $memoId): View
    {
        return view('memoResponse.create', [MemoResponse::MEMO_ID => $memoId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemoResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function show(MemoResponse $memoResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(MemoResponse $memoResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoResponseRequest  $request
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoResponseRequest $request, MemoResponse $memoResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemoResponse  $memoResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemoResponse $memoResponse)
    {
        //
    }
}

<?php

namespace App\Repositories\Memo;

use App\Models\MemoResponse;
use App\Repositories\BaseRepository;
use App\Repositories\Memo\IMemoResponseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class MemoResponseRepository extends BaseRepository implements IMemoResponseRepository
{
    private $authUserId;

    public function getAuthUserId(string $authUserId)
    {
        $this->authUserId = $authUserId;
    }

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     */
    public function store(FormRequest $request)
    {
        // メモ返信の保存処理
        $memoResponse = new MemoResponse();

        $memoResponse->memo_id = $request->memoId;
        $memoResponse->user_id = $this->authUserId;
        $memoResponse->message = $request->message;
        $memoResponse->save();
    }

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model
     */
    public function update(FormRequest $request, Model $model)
    {
        $memoResponse = $model;
        $memoResponse->message = $request->message;
        $memoResponse->update();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model
     */
    public function destroy(Model $model)
    {
        $memoResponse = $model;
        $memoResponse->delete();
    }

}



<?php

namespace App\Repositories\Memo;

use App\Models\MemoResponse;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Memo\IMemoResponseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MemoResponseRepository extends BaseRepository implements IMemoResponseRepository
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request): Collection
    {
        $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_DB_USER_ID, $this->getAuthUserId())->where(MemoResponse::MEMO_RESPONSE_DB_MEMO_ID, $request->memoId)->get();
        return $memoResponses;
    }

    /**
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store(FormRequest $request): Collection
    {
        // メモ返信の保存処理
        $memoResponse = new MemoResponse();

        $memoResponse->memo_id = $request->memoId;
        $memoResponse->user_id = $this->getAuthUserId();
        $memoResponse->message = $request->message;
        $memoResponse->save();

        $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_DB_USER_ID, $this->getAuthUserId())->where(MemoResponse::MEMO_RESPONSE_DB_MEMO_ID, $request->memoId)->get();

        return $memoResponses;
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function destroy(Model $model): Collection
    {
        $memoResponse = $model;
        $memoResponse->delete();

        $memoResponses = MemoResponse::where(MemoResponse::MEMO_RESPONSE_DB_USER_ID, $this->getAuthUserId())->where(MemoResponse::MEMO_RESPONSE_DB_MEMO_ID, $model->memo_id)->get();

        return $memoResponses;
    }

}



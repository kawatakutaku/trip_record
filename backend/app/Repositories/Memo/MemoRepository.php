<?php

namespace App\Repositories\Memo;

use App\Models\Memo;
use App\Models\MemoResponse;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class MemoRepository extends BaseRepository implements IMemoRepository
{
    private $authUserId;

    /**
     * @param int
     */
    public function getAuthUserId(int $authUserId)
    {
        $this->authUserId = $authUserId;
    }

    /**
     * メモの保存処理
     * @param \Illuminate\Foundation\Http\FormRequest $request
     */
    public function store(FormRequest $request)
    {
        // メモの保存処理
        $memo = new Memo();

        $memo->memo = $request->memo;
        $memo->img = $request->img;
        $memo->user_id = $this->authUserId;
        $memo->city_id = $request->cityId;
        $memo->save();
    }

    /**
     * メモの更新処理
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model
     */
    public function update(FormRequest $request, Model $model)
    {
        $memo = $model;
        $memo->memo = $request->memo;
        $memo->img = $request->img;
        $memo->update();
    }

    /**
     * メモの削除処理
     * @param \Illuminate\Database\Eloquent\Model
     */
    public function destroy(Model $model)
    {
        $memo = $model;
        $memo->delete();
    }

}



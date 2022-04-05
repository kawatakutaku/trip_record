<?php

namespace App\Repositories\Memo;

use App\Models\City;
use App\Models\Memo;
use App\Models\MemoResponse;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MemoRepository extends BaseRepository implements IMemoRepository
{
    /**
     * メモの一覧表示
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request): Collection
    {
        $memos = Memo::where(City::CITY_DB_ID, $request->cityId)->get();
        return $memos;
    }

    /**
     * メモの保存処理
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store(FormRequest $request): Collection
    {
        // メモの保存処理
        $memo = new Memo();

        $memo->memo = $request->memo;
        // 画像をstorageに保存
        $memoImg = $request->file('img');
        if ($memoImg) {
            $fileName = $memoImg->getClientOriginalName();
            $memoImg = $memoImg->storeAs('memos', $fileName ,'public');
            // dd($memoImg, basename($memoImg));
            $memo->img = $memoImg;
        }
        $memo->user_id = $this->getAuthUserId();
        $memo->city_id = $request->cityId;
        $memo->save();

        // メモの一覧の取得
        $memos = Memo::where(Memo::MEMO_DB_USER_ID, $this->getAuthUserId())->where(City::CITY_DB_ID, $request->cityId)->get();

        return $memos;
    }

    /**
     * メモの更新処理
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param \Illuminate\Database\Eloquent\Model
     */
    public function update(FormRequest $request, Model $model): void
    {
        $memo = $model;
        $memo->memo = $request->memo;
        $memo->img = $request->img;
        $memo->update();
    }

    /**
     * メモの削除処理
     * @param \Illuminate\Database\Eloquent\Model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function destroy(Model $model): Collection
    {
        $memo = $model;
        $memo->delete();

        $memos = Memo::where(Memo::MEMO_DB_USER_ID, $this->getAuthUserId())->where(City::CITY_DB_ID, $model->city_id);

        return $memos;
    }

}



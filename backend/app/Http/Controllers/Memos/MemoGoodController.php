<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Models\Memo;
use App\Models\MemoGood;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoGoodController extends Controller
{
    /**
     * メモのいいね機能
     * @param \App\Models\Memo $memo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function likeOrUnlike(Memo $memo): RedirectResponse
    {
        $user = app(User::class);
        $userId = $user->getAuthAccountId();

        // いいねされている場合
        $memoGood = MemoGood::where("memo_id", $memo->id)->where("user_id", $userId)->first();
        if ($memoGood) {
            $memoGood->delete();

            return redirect()->back();
        }


        // いいねされてない場合
        $memoGoodInTrash = MemoGood::onlyTrashed()->where("memo_id", $memo->id)->where("user_id", $userId)->first();
        if ($memoGoodInTrash) {
            $memoGoodInTrash->restore();
        } else {
            $memoGood = new MemoGood();
            $memoGood->user_id = $userId;
            $memoGood->memo_id = $memo->id;
            $memoGood->created_at = Carbon::now();
            $memoGood->updated_at = Carbon::now();
            $memoGood->save();
        }


        return redirect()->back();
    }

}

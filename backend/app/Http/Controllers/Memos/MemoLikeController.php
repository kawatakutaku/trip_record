<?php

namespace App\Http\Controllers\Memos;

use App\Http\Controllers\Controller;
use App\Models\Memo;
use App\Models\MemoLike;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoLikeController extends Controller
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
        $MemoLike = MemoLike::where(MemoLike::MEMO_LIKE_MEMO_ID, $memo->id)->where(MemoLike::MEMO_LIKE_USER_ID, $userId)->first();
        if ($MemoLike) {
            $MemoLike->delete();

            return redirect()->back();
        }


        // いいねされてない場合
        $MemoLikeInTrash = MemoLike::onlyTrashed()->where(MemoLike::MEMO_LIKE_MEMO_ID, $memo->id)->where(MemoLike::MEMO_LIKE_USER_ID, $userId)->first();
        if ($MemoLikeInTrash) {
            $MemoLikeInTrash->restore();
        } else {
            $MemoLike = new MemoLike();
            $MemoLike->user_id = $userId;
            $MemoLike->memo_id = $memo->id;
            $MemoLike->save();
        }


        return redirect()->back();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "memos";

    const MEMO_ID_NAME = "memo";
    const MULTIPLE_MEMOS = "memos";
    const MEMO_IMG = "img";
    const MEMO_MEMO = "memo";
    const MEMO_DB_ID = "memo_id";
    const MEMO_DB_USER_ID = "user_id";


    /**
     * 1つのメモに対して1つのユーザーが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 1つのメモに対して複数のメモいいねが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function MemoLikes(): HasMany
    {
        return $this->hasMany(MemoLike::class);
    }

    /**
     * 1つのメモに対して複数の返信が紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memoResponses(): HasMany
    {
        return $this->hasMany(MemoResponse::class);
    }

}
